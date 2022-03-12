<?php

namespace App\Http\Controllers;

use App\Models\DetailCart;
use App\Models\DetailFaktur;
use App\Models\Faktur;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Receiver;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class FakturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.tracking');
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
        $dt = Carbon::now()->format('d-m-y');
        $carts = unserialize(base64_decode($request->carts));

        //pengecekan stock
        // foreach ($carts as $cart) {
        // if ($cart->produkstock->product_stock < 1) {
        // return redirect()->back()->with('alert', 'Stock produk ' . $cart->produk->nama_produk . ' tidak tersedia.');
        // }
        // }


        $faktur = Faktur::create([
            'kode_user' => Auth::id(),
            'status' => 1,
            'tanggal' => $dt,
            // 'cara_bayar' => ,
            'total_pembayaran' => $request->total,
            'valuta_id' => 1,
            'total_profit' => $request->total,
            'deliverycost' => $request->deliveryCost,
            'deliveryDate' => '0000-00-00',
            'deliveryExpedition' => $request->delivery,
            // 'deliveryResi',
            'tanggal2' => Carbon::now(),
            'sender_name' => 'TokoBayiFiv',
            // 'discount',
            'note' => $request->note,
            // 'admin_note',
            // 'total_weight' => $request->berat
        ]);

        if (!empty($request->pengirim_name)) {
            $faktur->update([
                'sender_name' => $request->pengirim_name,
                'sender_phone' => $request->pengirim_hp,
                'sender_address' => $request->pengirim_address
            ]);
        }

        //create receiver data
        Receiver::create([
            'faktur_id' => $faktur->no_faktur,
            'user_id' => Auth::id(),
            'receiver_name' => $request->receiver_name,
            'address' => $request->address,
            'postcode' => $request->postcode,
            'city' => $request->city,
            'province' => $request->province,
            'phone' => $request->phone,
            'hp' => $request->hp,
            // 'email' => $request->email, 
            // 'message' => $request->message, 
            // 'message_from' => $request->, 
            'delivery_date' => '0000-00-00',
            'alternativ_deliverry_date' => '0000-00-00',
            // 'reminder', 
            // 'remider_subject'
        ]);

        // dd($shipments);

        foreach ($carts as $cart) {
            DetailFaktur::create([
                'no_user' => Auth::id(),
                'no_faktur' => $faktur->no_faktur,
                'kode_produk' => $cart->kode_produk,
                'kode_produk_stock' => $cart->kode_produk_stock,
                'jumlah' => $cart->jumlah,
                'tanggal' => $dt,
                'harga_satuan' => $cart->produk->harga,
                'destination_city_id' => $cart->destination_city_id,
                'ongkos_kirim' => 0,
                'subtotal' => $cart->jumlah * $cart->produk->harga,
                'valuta_id' => 1,
                'profit' => $cart->jumlah * $cart->produk->harga,
                'note' => $cart->note
            ]);

            //delete semua cart
            $cart->delete();

            //kurangin stock produk
            $cart->produk->update([
                'stock' => $cart->produk->stock - 1
            ]);

            //kurangin produk stock
            // $cart->produkstock->update([
            //     'produk_stock' => $cart->produkstock->produk_stock - 1
            // ]);
        }

        return redirect(route('user.faktur.show', $faktur));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faktur  $faktur
     * @return \Illuminate\Http\Response
     */
    public function show(Faktur $faktur)
    {
        $allkategoris = Kategori::orderBy('no_kategori', 'desc')->get();
        return view('user.invoice', compact('allkategoris', 'faktur'));
    }

    public function showDetail(Faktur $faktur)
    {
        $allkategoris = Kategori::orderBy('no_kategori', 'desc')->get();
        return view('user.detailinvoice', compact('allkategoris', 'faktur'));
    }

    public function showFaktur(Faktur $faktur)
    {
        return view('user.showfaktur', compact('faktur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faktur  $faktur
     * @return \Illuminate\Http\Response
     */
    public function edit(Faktur $faktur)
    {
        //
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
        //
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
