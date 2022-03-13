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
        $newproduct = Produk::where('stock', '!=', 0)
            ->limit(9)
            ->where('disable', '!=', 1)
            ->where('disable', '!=', 1)
            ->orderBy('kode_produk', 'desc')
            ->get();
        $hotdeals = Produk::where('stat', 'd')
            ->where('stock', '!=', 0)
            ->where('disable', '!=', 1)
            ->limit(9)
            ->get();
        $restock = Produk::where('stat', 'r')
            ->where('stock', '!=', 0)
            ->where('disable', '!=', 1)
            ->limit(9)
            ->get();
        $featured = Produk::where('featured', 1)
            ->where('stock', '!=', 0)
            ->where('disable', '!=', 1)
            ->limit(3)
            ->get();

        $page = 'home';
        $allkategoris = Kategori::orderBy('no_kategori', 'desc')->get();


        return view('user.landingpage', compact('produks', 'newproduct', 'hotdeals', 'restock', 'featured', 'allkategoris', 'page'));
    }
    public function list_products(Request $request)
    {
        $keyword = $request->keyword;
        $filter = $request->filter;
        $subfilter = $request->subfilter;
        $allkategoris = Kategori::orderBy('no_kategori', 'desc')->get();
        $subkategoris = KategoriChild::all();
        $subsname = '';

        if (!empty($keyword)) {
            $produks = Produk::where('nama_produk', 'LIKE', '%' . $keyword . '%')->paginate(9);
        } else if (!empty($filter)) {
            $kategori = Kategori::where('no_kategori', $filter)->get()->first();
            if (!empty($subfilter)) {
                $subs = KategoriChild::where('child_id', $subfilter)->get()->first;
                $produks = Produk::where('kategory', $kategori->no_kategori . '-' . $subs->child_name->child_id)->where('disable', '!=', 1)->paginate(9);
                $subsname = $subs->child_name->child_name;
            } else {
                $produks = Produk::where('kategory', $kategori->no_kategori)->where('disable', '!=', 1)->paginate(9);
            }
        } else {
            $produks = Produk::paginate(9);
        }
        $produks->withPath('listproducts');
        $produks->appends($request->all());
        return view('user.listproducts', compact('produks', 'keyword', 'allkategoris', 'subkategoris', 'filter', 'subfilter', 'subsname'));
    }
    public function contact()
    {
        $page = 'contact';
        $allkategoris = Kategori::orderBy('no_kategori', 'desc')->get();
        return view('user.contact', compact('page', 'allkategoris'));
    }
}
