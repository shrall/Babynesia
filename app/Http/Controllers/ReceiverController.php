<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\KategoriChild;
use App\Models\Receiver;
use App\Models\Webconfig;
use App\Models\DetailCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Auth;

class ReceiverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $carts = DetailCart::where('no_user', Auth::id())->get();

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

        $note = $request->note;

        $weight = 0;
        foreach ($carts as $cart) {
            $weight += $cart->produk->weight * $cart->jumlah;
        }

        //temp
        // $webconfig = Webconfig::where('name', 'kota_pengirim')->first();
        // $shipments = Http::withHeaders([
        //     'key' => config('services.rajaongkir.token'),
        // ])->post('https://api.rajaongkir.com/starter/cost', [
        //     'origin' => $webconfig->content, //@marshall ini perlu dirubah ke asal pengirim
        //     'destination' => 5,
        //     'weight' => $weight,
        //     'courier' => 'jne',
        // ])->json()['rajaongkir']['results'][0];
        // dd($shipments);


        return view('user.receiver', compact('note', 'cities', 'provinces', 'weight'));
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
     * @param  \App\Models\Receiver  $receiver
     * @return \Illuminate\Http\Response
     */
    public function show(Receiver $receiver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receiver  $receiver
     * @return \Illuminate\Http\Response
     */
    public function edit(Receiver $receiver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receiver  $receiver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receiver $receiver)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receiver  $receiver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receiver $receiver)
    {
        //
    }

    public function get_shipment(Request $request)
    {
        $webconfig = Webconfig::where('name', 'kota_pengirim')->first();
        $shipments = Http::withHeaders([
            'key' => config('services.rajaongkir.token'),
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'origin' => $webconfig->content, //@marshall ini perlu dirubah ke asal pengirim
            'destination' => $request->city_id,
            'weight' => $request->weight,
            'courier' => 'jne',
        ])->json()['rajaongkir']['results'][0];
        // return view('inc.shipment_list', compact('shipments'));
        return $shipments;
    }

    public function get_city(Request $request)
    {
        $cities = Http::withHeaders([
            'key' => config('services.rajaongkir.token'),
        ])->get('https://api.rajaongkir.com/starter/city')
            ->json()['rajaongkir']['results'];
        $cities = collect($cities)->where('province_id', $request->province);
        return $cities;
    }
}
