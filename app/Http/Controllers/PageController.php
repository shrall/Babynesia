<?php

namespace App\Http\Controllers;

use App\Models\Hitcounter;
use App\Models\Guestbook;
use App\Models\Kategori;
use App\Models\KategoriChild;
use App\Models\Produk;
use App\Models\ProdukStatus;
use App\Models\Site;
use App\Models\Webconfig;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Auth;

class PageController extends Controller
{
    private $isHiddenSold;
    private $isHiddenImage;

    public function __construct()
    {
        $hcs = Hitcounter::where('month', date('Y-M', strtotime(Carbon::now())))->exists();
        if ($hcs) {
            $hc = Hitcounter::where('month', date('Y-M', strtotime(Carbon::now())))->first();
            $hc->update([
                'unregistered' => $hc->unregistered + 1,
                'total' => $hc->total + 1
            ]);
        } else {
            Hitcounter::create([
                'month' => date('Y-M', strtotime(Carbon::now())),
                'unregistered' => 1,
                'total' => 1
            ]);
        };

        $hide_product_sold = Webconfig::where('name', 'hide_sold_product')->get()->last();
        $hide_product_non_img = Webconfig::where('name', 'hide_product_non_img')->get()->last();
        $this->isHiddenSold = $hide_product_sold->isHidden;
        $this->isHiddenImage = $hide_product_non_img->isHidden;
    }

    public function landing_page(Request $request)
    {
        // $filteredproduct = !empty($request->filterproduct) ? $request->filterproduct : '0';

        // if ($this->isHiddenImage != 1) {
        //     $produks = $this->isHiddenSold != 1 ? Produk::whereHas('stocks', function (Builder $query) {
        //         $query->where('product_stock', '!=', 0);
        //     })->where('stat', !empty($filteredproduct) ? $filteredproduct : '0')
        //         ->limit(12)
        //         ->where('disable', '!=', 1)
        //         ->orderBy('kode_produk', 'desc')
        //         ->get()

        //         : Produk::where('stat', !empty($filteredproduct) ? $filteredproduct : '0')
        //         ->limit(12)
        //         ->where('disable', '!=', 1)
        //         ->orderBy('kode_produk', 'desc')
        //         ->get();

        //     $featured = $this->isHiddenSold != 1 ? Produk::whereHas('stocks', function (Builder $query) {
        //         $query->where('product_stock', '!=', 0);
        //     })->where('featured', 1)
        //         ->where('disable', '!=', 1)
        //         ->limit(4)
        //         ->get()

        //         : Produk::where('featured', 1)
        //         ->where('disable', '!=', 1)
        //         ->limit(4)
        //         ->get();
        // } else {
        //     $produks = $this->isHiddenSold != 1 ? Produk::whereHas('stocks', function (Builder $query) {
        //         $query->where('product_stock', '!=', 0);
        //     })->where('stat', !empty($filteredproduct) ? $filteredproduct : '0')
        //         ->limit(12)
        //         ->where('disable', '!=', 1)
        //         ->where('image', '!=', null)
        //         ->orderBy('kode_produk', 'desc')
        //         ->get()

        //         : Produk::where('stat', !empty($filteredproduct) ? $filteredproduct : '0')
        //         ->limit(12)
        //         ->where('disable', '!=', 1)
        //         ->where('image', '!=', null)
        //         ->orderBy('kode_produk', 'desc')
        //         ->get();

        //     $featured = $this->isHiddenSold != 1 ? Produk::whereHas('stocks', function (Builder $query) {
        //         $query->where('product_stock', '!=', 0);
        //     })->where('featured', 1)
        //         ->where('disable', '!=', 1)
        //         ->where('image', '!=', null)
        //         ->limit(4)
        //         ->get()

        //         : Produk::where('featured', 1)
        //         ->where('disable', '!=', 1)
        //         ->where('image', '!=', null)
        //         ->limit(4)
        //         ->get();
        // }

        // $page = 'home';

        // return view('user.landingpage', compact('produks', 'featured', 'filteredproduct', 'page'));

        $page = $request->pagehighlight;

        $keyword = $request->keyword;
        $filter = $request->filter;
        $subfilter = $request->subfilter;
        $subsname = '';
        $filteredproduct = $request->filterproduct;

        if ($this->isHiddenImage != 1) {


            if (!empty($keyword)) {
                $produks = $this->isHiddenSold != 1 ? Produk::whereHas('stocks', function (Builder $query) {
                    $query->where('product_stock', '!=', 0);
                })->where('disable', '!=', 1)->where('nama_produk', 'LIKE', '%' . $keyword . '%')->paginate(12)
                    : Produk::where('disable', '!=', 1)->where('nama_produk', 'LIKE', '%' . $keyword . '%')->paginate(12);
            } else if (!empty($filteredproduct)) {
                if ($filteredproduct != 'featured') {
                    //new product
                    $produks = $this->isHiddenSold != 1 ? Produk::whereHas('stocks', function (Builder $query) {
                        $query->where('product_stock', '!=', 0);
                    })->where('disable', '!=', 1)
                        ->where('stat', $filteredproduct)
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12)
                        : Produk::where('disable', '!=', 1)
                        ->where('stat', $filteredproduct)
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12);
                } else {
                    //featured
                    $produks = $this->isHiddenSold != 1 ? Produk::whereHas('stocks', function (Builder $query) {
                        $query->where('product_stock', '!=', 0);
                    })->where('featured', 1)
                        ->where('disable', '!=', 1)
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12)
                        : Produk::where('featured', 1)
                        ->where('disable', '!=', 1)
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12);
                }
            } else if (!empty($filter)) {
                $kategori = Kategori::where('no_kategori', $filter)->get()->first();
                if (!empty($subfilter)) {
                    $subs = KategoriChild::where('child_id', $subfilter)->get()->first;
                    $produks = $this->isHiddenSold != 1 ? Produk::whereHas('stocks', function (Builder $query) {
                        $query->where('product_stock', '!=', 0);
                    })->where('kategory', $kategori->no_kategori . '-' . $subs->child_name->child_id)->where('disable', '!=', 1)->orderBy('kode_produk', 'desc')->paginate(12)
                        : Produk::where('kategory', $kategori->no_kategori . '-' . $subs->child_name->child_id)->where('disable', '!=', 1)->orderBy('kode_produk', 'desc')->paginate(12);
                    $subsname = $subs->child_name->child_name;
                } else {
                    $produks = $this->isHiddenSold != 1 ? Produk::whereHas('stocks', function (Builder $query) {
                        $query->where('product_stock', '!=', 0);
                    })->where('kategory', $kategori->no_kategori)->where('disable', '!=', 1)->orderBy('kode_produk', 'desc')->paginate(12)
                        : Produk::where('kategory', $kategori->no_kategori)->where('disable', '!=', 1)->orderBy('kode_produk', 'desc')->paginate(12);
                }
            } else {
                $produks = $this->isHiddenSold != 1 ? Produk::whereHas('stocks', function (Builder $query) {
                    $query->where('product_stock', '!=', 0);
                })->orderBy('kode_produk', 'desc')->paginate(12)
                    : Produk::orderBy('kode_produk', 'desc')->paginate(12);
                $filteredproduct = 'allproduct';
            }
        } else {

            //image 0 hidden
            if (!empty($keyword)) {
                $produks = $this->isHiddenSold != 1 ? Produk::whereHas('stocks', function (Builder $query) {
                    $query->where('product_stock', '!=', 0);
                })->where('disable', '!=', 1)->where('image', '!=', null)->where('nama_produk', 'LIKE', '%' . $keyword . '%')->paginate(12)
                    : Produk::where('disable', '!=', 1)->where('image', '!=', null)->where('nama_produk', 'LIKE', '%' . $keyword . '%')->paginate(12);
            } else if (!empty($filteredproduct)) {

                if ($filteredproduct != 'featured') {
                    //new product
                    $produks = $this->isHiddenSold != 1 ? Produk::whereHas('stocks', function (Builder $query) {
                        $query->where('product_stock', '!=', 0);
                    })->where('disable', '!=', 1)
                        ->where('stat', $filteredproduct)
                        ->where('image', '!=', null)
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12)
                        : Produk::where('disable', '!=', 1)
                        ->where('stat', $filteredproduct)
                        ->where('image', '!=', null)
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12);
                } else {
                    //featured
                    $produks = $this->isHiddenSold != 1 ? Produk::whereHas('stocks', function (Builder $query) {
                        $query->where('product_stock', '!=', 0);
                    })->where('featured', 1)
                        ->where('disable', '!=', 1)
                        ->orderBy('kode_produk', 'desc')
                        ->where('image', '!=', null)
                        ->paginate(12)
                        : Produk::where('featured', 1)
                        ->where('disable', '!=', 1)
                        ->orderBy('kode_produk', 'desc')
                        ->where('image', '!=', null)
                        ->paginate(12);
                }
            } else if (!empty($filter)) {
                $kategori = Kategori::where('no_kategori', $filter)->get()->first();
                if (!empty($subfilter)) {
                    $subs = KategoriChild::where('child_id', $subfilter)->get()->first;
                    $produks = $this->isHiddenSold != 1 ? Produk::whereHas('stocks', function (Builder $query) {
                        $query->where('product_stock', '!=', 0);
                    })->where('kategory', $kategori->no_kategori . '-' . $subs->child_name->child_id)->where('image', '!=', null)->where('disable', '!=', 1)->orderBy('kode_produk', 'desc')->paginate(12)
                        : Produk::where('kategory', $kategori->no_kategori . '-' . $subs->child_name->child_id)->where('image', '!=', null)->where('disable', '!=', 1)->orderBy('kode_produk', 'desc')->paginate(12);
                    $subsname = $subs->child_name->child_name;
                } else {
                    $produks = $this->isHiddenSold != 1 ? Produk::whereHas('stocks', function (Builder $query) {
                        $query->where('product_stock', '!=', 0);
                    })->where('kategory', $kategori->no_kategori)->where('image', '!=', null)->where('disable', '!=', 1)->orderBy('kode_produk', 'desc')->paginate(12)
                        : Produk::where('kategory', $kategori->no_kategori)->where('image', '!=', null)->where('disable', '!=', 1)->orderBy('kode_produk', 'desc')->paginate(12);
                }
            } else {
                $produks = $this->isHiddenSold != 1 ? Produk::whereHas('stocks', function (Builder $query) {
                    $query->where('product_stock', '!=', 0);
                })->where('image', '!=', null)
                    ->orderBy('kode_produk', 'desc')->paginate(12)
                    : Produk::where('image', '!=', null)
                    ->orderBy('kode_produk', 'desc')->paginate(12);
                $filteredproduct = 'allproduct';
            }
        }


        $page = 'home';

        $produks->withPath('listproducts');
        $produks->appends($request->all());
        return view('user.landingpage2', compact('produks', 'keyword', 'filter', 'subfilter', 'subsname', 'filteredproduct', 'page'));
    }

    public function list_products(Request $request)
    {
        $page = $request->pagehighlight;

        $keyword = $request->keyword;
        $filter = $request->filter;
        $subfilter = $request->subfilter;
        $subsname = '';
        $filteredproduct = $request->filterproduct;

        if ($this->isHiddenImage != 1) {


            if (!empty($keyword)) {
                $produks = $this->isHiddenSold != 1 ? Produk::whereHas('stocks', function (Builder $query) {
                    $query->where('product_stock', '!=', 0);
                })->where('disable', '!=', 1)->where('nama_produk', 'LIKE', '%' . $keyword . '%')->paginate(12)
                    : Produk::where('disable', '!=', 1)->where('nama_produk', 'LIKE', '%' . $keyword . '%')->paginate(12);
            } else if (!empty($filteredproduct)) {
                if ($filteredproduct != 'featured') {
                    //new product
                    $produks = $this->isHiddenSold != 1 ? Produk::whereHas('stocks', function (Builder $query) {
                        $query->where('product_stock', '!=', 0);
                    })->where('disable', '!=', 1)
                        ->where('stat', $filteredproduct)
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12)
                        : Produk::where('disable', '!=', 1)
                        ->where('stat', $filteredproduct)
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12);
                } else {
                    //featured
                    $produks = $this->isHiddenSold != 1 ? Produk::whereHas('stocks', function (Builder $query) {
                        $query->where('product_stock', '!=', 0);
                    })->where('featured', 1)
                        ->where('disable', '!=', 1)
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12)
                        : Produk::where('featured', 1)
                        ->where('disable', '!=', 1)
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12);
                }
            } else if (!empty($filter)) {
                $kategori = Kategori::where('no_kategori', $filter)->get()->first();
                if (!empty($subfilter)) {
                    $subs = KategoriChild::where('child_id', $subfilter)->get()->first;
                    $produks = $this->isHiddenSold != 1 ? Produk::whereHas('stocks', function (Builder $query) {
                        $query->where('product_stock', '!=', 0);
                    })->where('kategory', $kategori->no_kategori . '-' . $subs->child_name->child_id)->where('disable', '!=', 1)->orderBy('kode_produk', 'desc')->paginate(12)
                        : Produk::where('kategory', $kategori->no_kategori . '-' . $subs->child_name->child_id)->where('disable', '!=', 1)->orderBy('kode_produk', 'desc')->paginate(12);
                    $subsname = $subs->child_name->child_name;
                } else {
                    $produks = $this->isHiddenSold != 1 ? Produk::whereHas('stocks', function (Builder $query) {
                        $query->where('product_stock', '!=', 0);
                    })->where('kategory', $kategori->no_kategori)->where('disable', '!=', 1)->orderBy('kode_produk', 'desc')->paginate(12)
                        : Produk::where('kategory', $kategori->no_kategori)->where('disable', '!=', 1)->orderBy('kode_produk', 'desc')->paginate(12);
                }
            } else {
                $produks = $this->isHiddenSold != 1 ? Produk::whereHas('stocks', function (Builder $query) {
                    $query->where('product_stock', '!=', 0);
                })->orderBy('kode_produk', 'desc')->paginate(12)
                    : Produk::orderBy('kode_produk', 'desc')->paginate(12);
                $filteredproduct = 'allproduct';
            }
        } else {

            //image 0 hidden
            if (!empty($keyword)) {
                $produks = $this->isHiddenSold != 1 ? Produk::whereHas('stocks', function (Builder $query) {
                    $query->where('product_stock', '!=', 0);
                })->where('disable', '!=', 1)->where('image', '!=', null)->where('nama_produk', 'LIKE', '%' . $keyword . '%')->paginate(12)
                    : Produk::where('disable', '!=', 1)->where('image', '!=', null)->where('nama_produk', 'LIKE', '%' . $keyword . '%')->paginate(12);
            } else if (!empty($filteredproduct)) {

                if ($filteredproduct != 'featured') {
                    //new product
                    $produks = $this->isHiddenSold != 1 ? Produk::whereHas('stocks', function (Builder $query) {
                        $query->where('product_stock', '!=', 0);
                    })->where('disable', '!=', 1)
                        ->where('stat', $filteredproduct)
                        ->where('image', '!=', null)
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12)
                        : Produk::where('disable', '!=', 1)
                        ->where('stat', $filteredproduct)
                        ->where('image', '!=', null)
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12);
                } else {
                    //featured
                    $produks = $this->isHiddenSold != 1 ? Produk::whereHas('stocks', function (Builder $query) {
                        $query->where('product_stock', '!=', 0);
                    })->where('featured', 1)
                        ->where('disable', '!=', 1)
                        ->orderBy('kode_produk', 'desc')
                        ->where('image', '!=', null)
                        ->paginate(12)
                        : Produk::where('featured', 1)
                        ->where('disable', '!=', 1)
                        ->orderBy('kode_produk', 'desc')
                        ->where('image', '!=', null)
                        ->paginate(12);
                }
            } else if (!empty($filter)) {
                $kategori = Kategori::where('no_kategori', $filter)->get()->first();
                if (!empty($subfilter)) {
                    $subs = KategoriChild::where('child_id', $subfilter)->get()->first;
                    $produks = $this->isHiddenSold != 1 ? Produk::whereHas('stocks', function (Builder $query) {
                        $query->where('product_stock', '!=', 0);
                    })->where('kategory', $kategori->no_kategori . '-' . $subs->child_name->child_id)->where('image', '!=', null)->where('disable', '!=', 1)->orderBy('kode_produk', 'desc')->paginate(12)
                        : Produk::where('kategory', $kategori->no_kategori . '-' . $subs->child_name->child_id)->where('image', '!=', null)->where('disable', '!=', 1)->orderBy('kode_produk', 'desc')->paginate(12);
                    $subsname = $subs->child_name->child_name;
                } else {
                    $produks = $this->isHiddenSold != 1 ? Produk::whereHas('stocks', function (Builder $query) {
                        $query->where('product_stock', '!=', 0);
                    })->where('kategory', $kategori->no_kategori)->where('image', '!=', null)->where('disable', '!=', 1)->orderBy('kode_produk', 'desc')->paginate(12)
                        : Produk::where('kategory', $kategori->no_kategori)->where('image', '!=', null)->where('disable', '!=', 1)->orderBy('kode_produk', 'desc')->paginate(12);
                }
            } else {
                $produks = $this->isHiddenSold != 1 ? Produk::whereHas('stocks', function (Builder $query) {
                    $query->where('product_stock', '!=', 0);
                })->where('image', '!=', null)
                    ->orderBy('kode_produk', 'desc')->paginate(12)
                    : Produk::where('image', '!=', null)
                    ->orderBy('kode_produk', 'desc')->paginate(12);
                $filteredproduct = 'allproduct';
            }
        }



        $produks->withPath('listproducts');
        $produks->appends($request->all());
        return view('user.listproducts', compact('produks', 'keyword', 'filter', 'subfilter', 'subsname', 'filteredproduct', 'page'));
    }


    public function showpage($id)
    {
        $sites = Site::findOrFail($id);
        $page = $sites->code;

        if ($sites->no == 4) {
            // if (Auth::check()) {
            // } else {
            //     return redirect(route('login'));
            // }
            $values = Guestbook::all();
        } else {
            $values = null;
        }

        return view('user.' . strtolower($sites->code), compact('page', 'sites', 'values'));
    }

    public function list_articles()
    {
        $page = 'article';

        return view('user.articles', compact('page'));
    }

    public function article_detail()
    {
        $page = 'article';

        return view('user.detailarticle', compact('page'));
    }
}
