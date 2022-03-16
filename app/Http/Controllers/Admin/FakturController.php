<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faktur;
use App\Models\FakturStatus;
use App\Models\ProdukStockHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FakturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fakturs = Faktur::orderBy('no_faktur', 'desc')->paginate(15);
        return view('admin.faktur.index', compact('fakturs'));
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
}
