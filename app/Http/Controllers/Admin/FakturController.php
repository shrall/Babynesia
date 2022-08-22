<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faktur;
use App\Models\FakturStatus;
use App\Models\ProdukStockHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FakturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fakturs = Faktur::where('tanggal2', '>', Carbon::now()->subDays(3))->orderBy('no_faktur', 'desc')->get();
        $fakturstatuses = FakturStatus::all();
        return view('admin.faktur.index', compact('fakturs', 'fakturstatuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faktur  $faktur
     * @return \Illuminate\Http\Response
     */
    public function show(Faktur $faktur)
    {
        return view('admin.faktur.show', compact('faktur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faktur  $faktur
     * @return \Illuminate\Http\Response
     */
    public function edit(Faktur $faktur)
    {
        $fakturstatuses = FakturStatus::all();
        return view('admin.faktur.edit', compact('faktur', 'fakturstatuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faktur  $faktur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faktur $faktur)
    {
        $faktur->update([
            'admin_note' => $request->admin_note,
            'deliveryResi' => $request->no_resi
        ]);
        if ($request->faktur_status) {
            $faktur->update([
                'status' => $request->faktur_status,
            ]);
        }
        if ($request->faktur_status == 5) {
            foreach ($faktur->items as $key => $item) {
                $item->productstock->update([
                    'product_stock' => $item->productstock->product_stock + $item->jumlah
                ]);
                ProdukStockHistory::create([
                    'trxdate' => Carbon::now(),
                    'admin' => 'Admin',
                    'product_id' => $item->kode_produk,
                    'amount' => $item->jumlah,
                    'faktur_id' => $faktur->no_faktur,
                    'notes' => 'Penjualan dibatalkan admin. Stok +'
                ]);
            }
        }
        return redirect()->route('adminpage.faktur.edit', $faktur->no_faktur);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faktur  $faktur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faktur $faktur)
    {
        //
    }
    public function filter(Request $request)
    {
        session()->forget('faktur_date_start');
        session()->forget('faktur_date_end');
        session()->forget('faktur_status');
        session()->forget('faktur_string');
        session(['faktur_date_start' => $request->date_start]);
        session(['faktur_date_end' => $request->date_end]);
        session(['faktur_status' => $request->status]);
        session(['faktur_string' => $request->string]);
        $fakturs = Faktur::orderBy('no_faktur', 'desc');
        if ($request->status != "0") {
            $fakturs->where('status', $request->status);
        }
        if ($request->string) {
            $fakturs
            ->where('no_faktur', intval($request->string))
            ->orWhere('sender_name', 'like', '%' . $request->string . '%');
            // ->orWhereHas('receiver', function (Builder $query)  use ($request) {
            //     $query->where('receiver_name', 'like', '%' . $request->string . '%');
            // });
        }
        if ($request->date_start) {
            $fakturs->where('tanggal2', '>=', $request->date_start);
        }
        if ($request->date_end) {
            $fakturs->where('tanggal2', '<=', $request->date_end);
        }
        $fakturs = $fakturs->paginate(100);
        $fakturstatuses = FakturStatus::all();
        return view('admin.faktur.index', compact('fakturs', 'fakturstatuses'));
    }
}
