<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function landing_page()
    {
        $produks = Produk::all();
        $newproduct = Produk::where('stat', '0')
            ->limit(9)
            ->get();
        $hotdeals = Produk::where('stat', 'd')
            ->limit(9)
            ->get();
        $restock = Produk::where('stat', 'r')
            ->limit(9)
            ->get();


        return view('user.landingpage', compact('produks', 'newproduct', 'hotdeals', 'restock'));
    }
    public function list_products(Request $request)
    {
        $keyword = $request->keyword;
        $produks = Produk::where('nama_produk', 'LIKE', '%' . $keyword . '%')->paginate(9);
        $produks->withPath('listproducts');
        $produks->appends($request->all());
        return view('user.listproducts', compact('produks', 'keyword'));
    }
}
