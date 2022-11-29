<?php

namespace App\Http\Controllers;

use App\Models\DetailCart;
use App\Models\Kategori;
use App\Models\KategoriChild;
use App\Models\PaymentMethod;
use App\Models\Produk;
use App\Models\Voucher;
use App\Models\Webconfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        // $payment = PaymentMethod::where('id', $request->payment)->get()->last();
        $payments = PaymentMethod::all();


        $carts = DetailCart::where('no_user', Auth::id())->get();

        //hitung total harga dan total berat
        $total = 0;
        $berat = 0;
        $jumlahCart = 0;
        foreach ($carts as $cart) {
            if ($cart->produk->stat == 'd') {
                $temp = $cart->produk->harga_sale * $cart->jumlah;
            } else {
                $temp = $cart->produk->harga * $cart->jumlah;
            }
            $berat += $cart->produk->weight * $cart->jumlah;
            $total += $temp;
            $jumlahCart += 1;
        }

        //hitung delivery cost
        //Rajaongkir
        // $webconfigs = Webconfig::all();
        $webconfig = Webconfig::where('name', 'kota_pengirim')->first();

        if ($request->deliv_check == "auto") {
            // pengecekan shipment
            if (empty($request->delivery)) {
                return redirect()->back()->with('alert', 'Gagal memproses, metode ongkos kirim belum dipilih');
            }

            $delivery_explode = explode('|', $request->delivery);
            $deliveryCost = (int)$delivery_explode[1];
            $delivery = $delivery_explode[0];
        } else {
            $deliveryCost = $request->harga_ongkir;
            $delivery =  $request->delivery_manual;
        }

        //get city & province yang dipilih
        //cities rajaongkir
        $cities = Http::withHeaders([
            'key' => config('services.rajaongkir.token'),
        ])->get('https://pro.rajaongkir.com/api/city')
            ->json()['rajaongkir']['results'];

        //province rajaongkir
        $provinces = Http::withHeaders([
            'key' => config('services.rajaongkir.token'),
        ])->get('https://pro.rajaongkir.com/api/province')
            ->json()['rajaongkir']['results'];


        $webcongudang = Webconfig::where('name', 'kota_pengirim')->get()->last();

        foreach ($cities as $kota) {
            if ($kota['city_id'] == $request->city) {
                $city = $kota['city_name'];
                break;
            } else {
                $city = "";
            }
        }

        foreach ($cities as $kota) {
            if ($kota['city_id'] == $webcongudang->content) {
                $gudang = $kota['city_name'];
                break;
            } else {
                $gudang = "";
            }
        }

        foreach ($provinces as $provinsi) {
            if ($provinsi['province_id'] == $request->province) {
                $province = $provinsi['province'];
                break;
            } else {
                $province = "";
            }
        }

        $voucher = null;
        $potongan = 0;
        if (!empty($request->voucher)) {
            $voucher = Voucher::findOrFail($request->voucher);
            if ($voucher->vouchertype_id == 1) {
                $potongan = $total * ($voucher->amount / 100);
            } else {
                $potongan = $voucher->amount;
            }
        }

        // $city = $cities[$request->city - 1]['city_name'];
        // $province = $provinces[$request->province - 1]['province'];

        // $gudang = $cities[$webcongudang->content - 1]['city_name'];

        //berat dalam kg
        $berat = $berat / 1000;

        if (config('services.app.type') == 1) {
            return view('user.confirmation', compact('request', 'carts', 'total', 'berat', 'jumlahCart', 'delivery', 'deliveryCost', 'city', 'province', 'payments', 'gudang', 'voucher', 'potongan'));
        } else {
            return view('user.bbn.confirmation', compact('request', 'carts', 'total', 'berat', 'jumlahCart', 'delivery', 'deliveryCost', 'city', 'province', 'payments', 'gudang', 'voucher', 'potongan'));
        }
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
        $kode_produk_stok = $request->ukuran;
        $produk = Produk::findOrFail($request->kode_produk);

        // check if ada cart yang sama produknya
        $carts = DetailCart::where('no_user', Auth::id())->get();
        if (!empty($carts[0])) {
            if ($carts[0]->produk->app_type == $produk->app_type) {
                $con = false;
                foreach ($carts as $cart) {
                    if ($cart->kode_produk == $request->kode_produk && $cart->kode_produk_stock == $kode_produk_stok) {
                        $con = true;
                        break;
                    }
                }

                if ($con == true) {
                    $cart->update([
                        'jumlah' => $cart->jumlah + $request->jumlah
                    ]);
                } else {
                    DetailCart::create([
                        'no_user' => Auth::id(),
                        'kode_produk' => $request->kode_produk,
                        'kode_produk_stock' => $kode_produk_stok,
                        'jumlah' => $request->jumlah,
                        'destination_city_id' => 0,
                        // 'note' => $request->note
                    ]);
                }
            } else {
                return redirect()->back()->with('alert', 'Mohon selesaikan transaksi yang ada di keranjang terlebih dahulu.');
            }
        } else {
            DetailCart::create([
                'no_user' => Auth::id(),
                'kode_produk' => $request->kode_produk,
                'kode_produk_stock' => $kode_produk_stok,
                'jumlah' => $request->jumlah,
                'destination_city_id' => 0,
                // 'note' => $request->note
            ]);
        }

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
        // if (!empty($request->cartnote)) {
        //     $note = $request->cartnote;
        // } else {
        //     $note = $request->cartnote1;
        // }

        $detailCart = DetailCart::where('no_detail_cart', $request->idcart)->get()->last();
        $detailCart->update([
            'jumlah' => $request->jumlah != $detailCart->jumlah ? $request->jumlah : $request->jumlah1,
            // 'note' => $note
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

    public function customDestroy(Request $request)
    {
        // if (!empty($request->select)) {
        //     foreach ($request->select as $select) {
        //         $cart = DetailCart::where('no_detail_cart', $select);
        //         $cart->delete();
        //     }
        // }

        // dd($request->iddestroy);

        $cart = DetailCart::where('no_detail_cart', $request->iddestroy);
        $cart->delete();

        return redirect()->route('user.cart.index');
    }
}
