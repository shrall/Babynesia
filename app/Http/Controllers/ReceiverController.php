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
        $voucher = $request->voucher;

        $carts = DetailCart::where('no_user', Auth::id())->get();

        //province rajaongkir
        $provinces = Http::withHeaders([
            'key' => config('services.rajaongkir.token'),
        ])->get('https://pro.rajaongkir.com/api/province')
            ->json()['rajaongkir']['results'];

        // dd($provinces);

        $propinsi_id = null;
        $propinsis = collect($provinces)->where('province', Auth::user()->propinsi);
        foreach ($propinsis as $propinsi) {
            $propinsi_id = $propinsi['province_id'];
            break;
        }

        $kota_id = null;
        $cities = Http::withHeaders([
            'key' => config('services.rajaongkir.token'),
        ])->get('https://pro.rajaongkir.com/api/city')
            ->json()['rajaongkir']['results'];
        $cities = collect($cities)->where('province_id', $propinsi_id);
        $directedCity = collect($cities)->where('city_name', Auth::user()->kota);
        foreach ($directedCity as $city) {
            $kota_id = $city['city_id'];
            break;
        }

        $subdistrict_id = null;
        $subdistricts = null;
        if ($kota_id != null) {
            $subdistricts = Http::withHeaders([
                'key' => config('services.rajaongkir.token'),
            ])->get('https://pro.rajaongkir.com/api/subdistrict', [
                'city' => $kota_id
            ])
                ->json()['rajaongkir']['results'];
            $directedsubdistrict = collect($subdistricts)->where('subdistrict_name', Auth::user()->kecamatan);
            foreach ($directedsubdistrict as $subdistrict) {
                $subdistrict_id = $subdistrict['subdistrict_id'];
                break;
            }
        }

        $note = $request->note;
        $weight = 0;
        foreach ($carts as $cart) {
            $weight += $cart->produk->weight * $cart->jumlah;
        }

        if (config('services.app.type') == 1) {
            return view('user.receiver', compact('note', 'provinces', 'propinsi_id', 'kota_id', 'subdistrict_id', 'cities', 'subdistricts', 'weight', 'voucher'));
        } else {
            return view('user.bbn.receiver', compact('note', 'provinces', 'propinsi_id', 'kota_id', 'subdistrict_id', 'cities', 'subdistricts', 'weight', 'voucher'));
        }
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
        ])->post('https://pro.rajaongkir.com/api/cost', [
            'origin' => $webconfig->content, //@marshall ini perlu dirubah ke asal pengirim
            "originType" => "city",
            'destination' => $request->subdistrict_id,
            "destinationType" => "subdistrict",
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
        ])->get('https://pro.rajaongkir.com/api/city')
            ->json()['rajaongkir']['results'];
        $cities = collect($cities)->where('province_id', $request->province);

        return $cities;
    }

    public function get_subdistrict(Request $request)
    {
        $subdistricts = Http::withHeaders([
            'key' => config('services.rajaongkir.token'),
        ])->get('https://pro.rajaongkir.com/api/subdistrict', [
            'city' => $request->city,
        ])
            ->json()['rajaongkir']['results'];

        return $subdistricts;
    }
}
