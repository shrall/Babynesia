<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Produk::paginate(15);
        $categories = Kategori::all();
        $brands = Brand::all();
        return view('admin.produk.index', compact('products', 'categories', 'brands'));
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
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        //
    }

    public function index_search(Request $request)
    {
        $products = Produk::where('disable', session('product_search_status'));
        if (session('product_search_search')) {
            $products = Produk::where('nama_produk', 'like', '%' . session('product_search_search'). '%');
        }
        if (session('product_search_category') != 'no') {
            $products->where('kategory', session('product_search_category'));
        }
        if (session('product_search_brand') != 'no') {
            $products->where('brand_produk', session('product_search_brand'));
        }
        if (session('product_search_rule') == '2') {
            dd($products);
            $products->whereNotNull('image');
        }
        $products = $products->paginate(15);
        $categories = Kategori::all();
        $brands = Brand::all();
        return view('admin.produk.index', compact('products', 'categories', 'brands'));
    }
    public function search(Request $request)
    {
        session()->flush();
        session(['product_search_status' => $request->status]);
        session(['product_search_search' => $request->search]);
        session(['product_search_category' => $request->category]);
        session(['product_search_brand' => $request->brand]);
        session(['product_search_rule' => $request->rule]);
        $products = Produk::where('disable', $request->status);
        if ($request->search) {
            $products = Produk::where('nama_produk', 'like', '%' . $request->search . '%');
        }
        if ($request->category != 'no') {
            $products->where('kategory', $request->category);
        }
        if ($request->brand != 'no') {
            $products->where('brand_produk', $request->brand);
        }
        if ($request->rule == '2') {
            $products->whereNotNull('image');
        }
        $products = $products->paginate(15);

        $categories = Kategori::all();
        $brands = Brand::all();
        return view('admin.produk.index', compact('products', 'categories', 'brands'));
    }
}
