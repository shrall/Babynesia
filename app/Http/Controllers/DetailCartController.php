<?php

namespace App\Http\Controllers;

use App\Models\DetailCart;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Http;

use function PHPUnit\Framework\isEmpty;

class DetailCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $allkategoris = Kategori::orderBy('no_kategori', 'desc')->get();
        $carts = DetailCart::where('no_user', Auth::id())->get();

        //hitung total harga dan total berat
        $total = 0;
        $berat = 0;
        $jumlahCart = 0;
        foreach ($carts as $cart) {
            $temp = $cart->produk->harga * $cart->jumlah;
            $berat += $cart->produk->weight * $cart->jumlah;
            $total += $temp;
            $jumlahCart += 1;
        }

        //hitung delivery cost
        //Rajaongkir
        $shipments = Http::withHeaders([
            'key' => config('services.rajaongkir.token'),
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'origin' => 444, //@marshall ini perlu dirubah ke asal pengirim
            'destination' => $request->city,
            'weight' => $berat,
            'courier' => 'jne',
        ])->json()['rajaongkir']['results'][0];

        if ($request->delivery == "JNE OKE") {
            $deliveryCost = $shipments['costs'][0]['cost'][0]['value'];
        } else if ($request->delivery == "JNE REG") {
            $deliveryCost = $shipments['costs'][1]['cost'][0]['value'];
        } else {
            $deliveryCost = $shipments['costs'][2]['cost'][0]['value'];
        }

        //get city & province yang dipilih
        //cities rajaongkir
        $cities = Http::withHeaders([
            'key' => config('services.rajaongkir.token'),
        ])->get('https://api.rajaongkir.com/starter/city')
            ->json()['rajaongkir']['results'];

        //province rajaongkir
        $provinces = Http::withHeaders([
            'key' => config('services.rajaongkir.token'),
        ])->get('https://api.rajaongkir.com/starter/province')
            ->json()['rajaongkir']['results'];
        $city = $cities[$request->city]['city_name'];
        $province = $provinces[$request->province]['province'];

        //berat dalam kg
        $berat = $berat / 1000;

        return view('user.confirmation', compact('request', 'allkategoris', 'carts', 'total', 'berat', 'jumlahCart', 'deliveryCost', 'city', 'province'));
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
        // $produk = Produk::where('kode_produk', $request->kode_produk);
        if (isEmpty($request->ukuran)) {
            $kode_produk_stok = 0;
        } else {
            $kode_produk_stok = $request->ukuran;
        }

        //destination city dari profile

        DetailCart::create([
            'no_user' => Auth::id(),
            'kode_produk' => $request->kode_produk,
            'kode_produk_stock' => $kode_produk_stok,
            'jumlah' => $request->jumlah,
            'destination_city_id' => 0,
            'note' => $request->note
        ]);
        return redirect(route('user.cart.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailCart  $detailCart
     * @return \Illuminate\Http\Response
     */
    public function show(DetailCart $detailCart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailCart  $detailCart
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailCart $detailCart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailCart  $detailCart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailCart $detailCart)
    {
        $detailCart->update([
            'jumlah' => $request->jumlah,
            'note' => $request->note
        ]);
        return redirect()->route('user.cart.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailCart  $detailCart
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailCart $detailCart)
    {
        $detailCart->delete();
        return redirect()->route('user.cart.index');
    }
}
