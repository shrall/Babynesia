<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\DetailCart;
use App\Models\Kategori;
use App\Models\KategoriChild;
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
    public function index()
    {
        if (Auth::check()) {
            $allkategoris = Kategori::orderBy('no_kategori', 'desc')->get();
            $subkategoris = KategoriChild::all();
            $carts = DetailCart::where('no_user', Auth::id())->get();

            //get color webconfig
            $bg_color = Webconfig::where('name', 'bg_color')->get()->last();
            $text_color = Webconfig::where('name', 'text_color')->get()->last();
            $button_color = Webconfig::where('name', 'button_color')->get()->last();
            $color = [$bg_color->content, $text_color->content, $button_color->content];
            //background image
            $bg_img = Webconfig::where('name', 'bg_img')->get()->last();

            return view('user.cart', compact('allkategoris', 'carts', 'subkategoris', 'color', 'bg_img'));
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
