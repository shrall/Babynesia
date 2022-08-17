<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\DetailCart;
use App\Models\Kategori;
use App\Models\KategoriChild;
use App\Models\Voucher;
use Carbon\Carbon;
use App\Models\Webconfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::check()) {

            $textVoucher = "";
            $voucher = null;
            if (!empty($request->voucher)) {
                // run some voucher code
                $voucher = Voucher::where('code', $request->voucher)->get()->last();
                if (!empty($voucher)) {
                    $dt = Carbon::now()->format('Y-m-d');
                    if ($dt > $voucher->deadline || $voucher->isLimited == 1) {
                        $textVoucher = "Kode sudah tidak berlaku";
                        $voucher = null;
                    } else {
                        $textVoucher = "Voucher berhasil digunakan";
                    }
                } else {
                    $textVoucher = "Kode yang anda masukkan tidak sesuai";
                    $voucher = null;
                }
            }

            $carts = DetailCart::where('no_user', Auth::id())->get();
            $total = 0;
            foreach ($carts as $cart) {
                if ($cart->produk->stat == 'd') {
                    $temp = $cart->produk->harga_sale * $cart->jumlah;
                } else {
                    $temp = $cart->produk->harga * $cart->jumlah;
                }
                $total += $temp;
            }

            return view('user.cart', compact('carts', 'total', 'textVoucher', 'voucher'));
        }

        return redirect()->route('login');
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
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
