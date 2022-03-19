<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\KategoriChild;
use App\Models\Produk;
use App\Models\Webconfig;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function landing_page()
    {
        $produks = Produk::all();

        $newproduct = Produk::whereHas('stocks', function (Builder $query) {
            $query->where('product_stock', '!=', 0);
        })->limit(12)
            ->where('disable', '!=', 1)
            ->orderBy('kode_produk', 'desc')
            ->get();

        $hotdeals = Produk::whereHas('stocks', function (Builder $query) {
            $query->where('product_stock', '!=', 0);
        })->where('stat', 'd')
            ->where('disable', '!=', 1)
            ->limit(12)
            ->get();

        $restock = Produk::whereHas('stocks', function (Builder $query) {
            $query->where('product_stock', '!=', 0);
        })->where('stat', 'r')
            ->where('disable', '!=', 1)
            ->limit(12)
            ->get();

        $featured = Produk::whereHas('stocks', function (Builder $query) {
            $query->where('product_stock', '!=', 0);
        })->where('featured', 1)
            ->where('disable', '!=', 1)
            ->limit(4)
            ->get();

        $page = 'home';
        $subkategoris = KategoriChild::all();
        $allkategoris = Kategori::orderBy('no_kategori', 'desc')->get();
        $webconfig = Webconfig::all();
        $config = [];
        for ($x = 38; $x <= 41; $x++) {
            array_push($config, $webconfig[$x]->content);
        }

        dd($config);


        return view('user.landingpage', compact('produks', 'newproduct', 'hotdeals', 'restock', 'featured', 'allkategoris', 'subkategoris', 'page', 'config'));
    }
    public function list_products(Request $request)
    {

        $keyword = $request->keyword;
        $filter = $request->filter;
        $subfilter = $request->subfilter;
        $allkategoris = Kategori::orderBy('no_kategori', 'desc')->get();
        $subkategoris = KategoriChild::all();
        $subsname = '';
        $filteredproduct = $request->filterproduct;

        if (!empty($keyword)) {
            $produks = Produk::where('nama_produk', 'LIKE', '%' . $keyword . '%')->paginate(9);
        } else if (!empty($filteredproduct) && $filteredproduct != 'allproduct') {
            if ($filteredproduct == 'newproduct') {
                //new product
                $produks = Produk::whereHas('stocks', function (Builder $query) {
                    $query->where('product_stock', '!=', 0);
                })->where('disable', '!=', 1)
                    ->orderBy('kode_produk', 'desc')
                    ->paginate(9);
            } else if ($filteredproduct == 'hotdeals') {
                //hotdeals
                $produks = Produk::whereHas('stocks', function (Builder $query) {
                    $query->where('product_stock', '!=', 0);
                })->where('stat', 'd')
                    ->where('disable', '!=', 1)
                    ->paginate(9);
            } else if ($filteredproduct == 'restock') {
                //restock
                $produks = Produk::whereHas('stocks', function (Builder $query) {
                    $query->where('product_stock', '!=', 0);
                })->where('stat', 'r')
                    ->where('disable', '!=', 1)
                    ->paginate(9);
            } else if ($filteredproduct == 'featured') {
                //featured
                $produks = Produk::whereHas('stocks', function (Builder $query) {
                    $query->where('product_stock', '!=', 0);
                })->where('featured', 1)
                    ->where('disable', '!=', 1)
                    ->paginate(9);
            }
        } else if (!empty($filter)) {
            $kategori = Kategori::where('no_kategori', $filter)->get()->first();
            if (!empty($subfilter)) {
                $subs = KategoriChild::where('child_id', $subfilter)->get()->first;
                $produks = Produk::whereHas('stocks', function (Builder $query) {
                    $query->where('product_stock', '!=', 0);
                })->where('kategory', $kategori->no_kategori . '-' . $subs->child_name->child_id)->where('disable', '!=', 1)->paginate(9);
                $subsname = $subs->child_name->child_name;
            } else {
                $produks = Produk::whereHas('stocks', function (Builder $query) {
                    $query->where('product_stock', '!=', 0);
                })->where('kategory', $kategori->no_kategori)->where('disable', '!=', 1)->paginate(9);
            }
        } else {
            $produks = Produk::whereHas('stocks', function (Builder $query) {
                $query->where('product_stock', '!=', 0);
            })->paginate(9);
            $filteredproduct = 'allproduct';
        }
        $produks->withPath('listproducts');
        $produks->appends($request->all());
        return view('user.listproducts', compact('produks', 'keyword', 'allkategoris', 'subkategoris', 'filter', 'subfilter', 'subsname', 'filteredproduct'));
    }
    public function contact()
    {
        $page = 'contact';
        $allkategoris = Kategori::orderBy('no_kategori', 'desc')->get();
        $subkategoris = KategoriChild::all();

        return view('user.contact', compact('page', 'allkategoris', 'subkategoris'));
    }

    public function list_articles()
    {
        $page = 'article';
        $allkategoris = Kategori::orderBy('no_kategori', 'desc')->get();
        $subkategoris = KategoriChild::all();

        return view('user.articles', compact('page', 'allkategoris', 'subkategoris'));
    }

    public function article_detail()
    {
        $page = 'article';
        $allkategoris = Kategori::orderBy('no_kategori', 'desc')->get();
        $subkategoris = KategoriChild::all();

        return view('user.detailarticle', compact('page', 'allkategoris', 'subkategoris'));
    }
}
