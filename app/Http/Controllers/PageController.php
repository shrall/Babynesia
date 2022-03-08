<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\KategoriChild;
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

        $page = 'home';
        $allkategoris = Kategori::orderBy('no_kategori', 'desc')->get();


        return view('user.landingpage', compact('produks', 'newproduct', 'hotdeals', 'restock', 'allkategoris', 'page'));
    }
    public function list_products(Request $request)
    {
        $keyword = $request->keyword;
        $filter = $request->filter;
        $subfilter = $request->subfilter;
        $allkategoris = Kategori::orderBy('no_kategori', 'desc')->get();
        $subkategoris = KategoriChild::all();

        if (!empty($keyword)) {
            $produks = Produk::where('nama_produk', 'LIKE', '%' . $keyword . '%')->paginate(9);
        } else if (!empty($filter)) {
            $kategori = Kategori::where('no_kategori', $filter)->get();
            $produks = Produk::where('kategory', $kategori[0]->no_kategori)->paginate(9);

            if (!empty($subfilter)) {
            }
        } else {
            $produks = Produk::paginate(9);
        }
        $produks->withPath('listproducts');
        $produks->appends($request->all());
        return view('user.listproducts', compact('produks', 'keyword', 'allkategoris', 'subkategoris', 'filter', 'subfilter'));
    }
    public function contact()
    {
        $page = 'contact';
        return view('user.contact', compact('page'));
    }
}
