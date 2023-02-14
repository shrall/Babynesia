<?php

namespace App\Http\Controllers;

use App\Models\Hitcounter;
use App\Models\Guestbook;
use App\Models\Kategori;
use App\Models\KategoriChild;
use App\Models\Produk;
use App\Models\Hotdeals;
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
        }

        $hide_product_sold = Webconfig::where('name', 'hide_sold_product')->get()->last();
        $hide_product_non_img = Webconfig::where('name', 'hide_product_non_img')->get()->last();
        $this->isHiddenSold = $hide_product_sold->isHidden;
        $this->isHiddenImage = $hide_product_non_img->isHidden;
    }

    public function landing_page(Request $request)
    {
        // $filteredproduct = !empty($request->filterproduct) ? $request->filterproduct : '0';

        // if ($this->isHiddenImage != 1) {
        //     $produks = $this->isHiddenSold != 1 ? Produk::where('disable', 0)->whereHas('stocks', function (Builder $query) {
        //         $query->where('product_stock', '!=', 0);
        //     })->where('stat', !empty($filteredproduct) ? $filteredproduct : '0')
        //         ->limit(12)
        //         ->where('disable', '!=', 1)
        //         ->orderBy('kode_produk', 'desc')
        //         ->get()

        //         : Produk::where('disable', 0)->where('stat', !empty($filteredproduct) ? $filteredproduct : '0')
        //         ->limit(12)
        //         ->where('disable', '!=', 1)
        //         ->orderBy('kode_produk', 'desc')
        //         ->get();

        //     $featured = $this->isHiddenSold != 1 ? Produk::where('disable', 0)->whereHas('stocks', function (Builder $query) {
        //         $query->where('product_stock', '!=', 0);
        //     })->where('featured', 1)
        //         ->where('disable', '!=', 1)
        //         ->limit(4)
        //         ->get()

        //         : Produk::where('disable', 0)->where('featured', 1)
        //         ->where('disable', '!=', 1)
        //         ->limit(4)
        //         ->get();
        // } else {
        //     $produks = $this->isHiddenSold != 1 ? Produk::where('disable', 0)->whereHas('stocks', function (Builder $query) {
        //         $query->where('product_stock', '!=', 0);
        //     })->where('stat', !empty($filteredproduct) ? $filteredproduct : '0')
        //         ->limit(12)
        //         ->where('disable', '!=', 1)
        //         ->where('image', '!=', null)
        //         ->orderBy('kode_produk', 'desc')
        //         ->get()

        //         : Produk::where('disable', 0)->where('stat', !empty($filteredproduct) ? $filteredproduct : '0')
        //         ->limit(12)
        //         ->where('disable', '!=', 1)
        //         ->where('image', '!=', null)
        //         ->orderBy('kode_produk', 'desc')
        //         ->get();

        //     $featured = $this->isHiddenSold != 1 ? Produk::where('disable', 0)->whereHas('stocks', function (Builder $query) {
        //         $query->where('product_stock', '!=', 0);
        //     })->where('featured', 1)
        //         ->where('disable', '!=', 1)
        //         ->where('image', '!=', null)
        //         ->limit(4)
        //         ->get()

        //         : Produk::where('disable', 0)->where('featured', 1)
        //         ->where('disable', '!=', 1)
        //         ->where('image', '!=', null)
        //         ->limit(4)
        //         ->get();
        // }

        // $page = 'home';

        // return view('user.landingpage', compact('produks', 'featured', 'filteredproduct', 'page'));

        // hotdeals
        $hotdeals = Hotdeals::where('status', '!=', 0)->get();
        $indexdeal = 0;
        $dt = Carbon::now()->format('Y-m-d');
        foreach ($hotdeals as $hd) {
            if ($hd->status == 2) {
                if ($hd->from_date > $dt) {
                    unset($hotdeals[$indexdeal]);
                } else if ($hd->until_date < $dt) {
                    unset($hotdeals[$indexdeal]);
                }
            }
            $indexdeal++;
        }

        $page = $request->pagehighlight;

        $keyword = $request->keyword;
        $filter = $request->filter;
        $subfilter = $request->subfilter;
        $subsname = '';
        $filteredproduct = $request->filterproduct;

        if ($this->isHiddenImage != 1) {


            if (!empty($keyword)) {

                $reservedSymbols = ['-', '+', '<', '>', '@', '(', ')', '~'];
                $searchTerm = str_replace($reservedSymbols, ' ', $keyword);

                $searchValue = preg_split('/\s+/', $searchTerm, -1, PREG_SPLIT_NO_EMPTY);

                $produks = $this->isHiddenSold != 1 ? Produk::whereHas('stocks', function (Builder $query) {
                    $query->where('product_stock', '!=', 0);
                })->where(function ($query) use ($searchValue) {
                    foreach ($searchValue as $keyword) {
                        $query
                            ->where('nama_produk', 'LIKE', '%' . $keyword . '%')
                            ->where('disable', 0);;
                    }
                })
                    ->orWhere('kode_produk', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('ket', 'LIKE', '%' . $keyword . '%')
                    ->whereHas('brand', function (Builder $query) use ($keyword) {
                        $query->where('nama_brand', 'LIKE', '%' . $keyword . '%');
                    })
                    ->where(function ($query) {
                        if (config('services.app.type') == 1) {
                            $query->where('app_type', config('services.app.type'));
                        }
                    })
                    ->where('disable', 0)
                    ->orderBy('kode_produk', 'desc')
                    ->paginate(12)

                    : Produk::where('disable', '!=', 1)
                    ->where(function ($query) use ($searchValue) {
                        foreach ($searchValue as $keyword) {
                            $query->where('nama_produk', 'LIKE', '%' . $keyword . '%')
                                ->where('disable', 0);;
                        }
                    })
                    ->orWhere('kode_produk', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('ket', 'LIKE', '%' . $keyword . '%')
                    ->whereHas('brand', function (Builder $query) use ($keyword) {
                        $query->where('nama_brand', 'LIKE', '%' . $keyword . '%');
                    })
                    ->where(function ($query) {
                        if (config('services.app.type') == 1) {
                            $query->where('app_type', config('services.app.type'));
                        }
                    })
                    ->where('disable', '!=', 1)
                    ->orderBy('kode_produk', 'desc')
                    ->paginate(12);
            } else if (!empty($filteredproduct)) {
                if ($filteredproduct != 'featured' && $filteredproduct != 'fav') {
                    //new product
                    $produks = $this->isHiddenSold != 1 ? Produk::where('disable', 0)->whereHas('stocks', function (Builder $query) {
                        $query->where('product_stock', '!=', 0);
                    })->where('disable', '!=', 1)
                        ->where('stat', $filteredproduct)
                        ->where(function ($query) {
                            if (config('services.app.type') == 1) {
                                $query->where('app_type', config('services.app.type'));
                            }
                        })
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12)
                        : Produk::where('disable', 0)->where('disable', '!=', 1)
                        ->where('stat', $filteredproduct)
                        ->where(function ($query) {
                            if (config('services.app.type') == 1) {
                                $query->where('app_type', config('services.app.type'));
                            }
                        })
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12);
                } else if ($filteredproduct == 'fav') {
                    // fav product
                    $produks = $this->isHiddenSold != 1 ? Produk::where('disable', 0)->whereHas('stocks', function (Builder $query) {
                        $query->where('product_stock', '!=', 0);
                    })
                        ->where('disable', '!=', 1)
                        ->orderBy('kode_produk', 'desc')
                        ->where('app_type', config('services.app.type'))
                        ->paginate(12)
                        : Produk::where('disable', 0)
                        ->where('app_type', config('services.app.type'))
                        ->where('disable', '!=', 1)
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12);
                } else {
                    //featured
                    $produks = $this->isHiddenSold != 1 ? Produk::where('disable', 0)->whereHas('stocks', function (Builder $query) {
                        $query->where('product_stock', '!=', 0);
                    })->where('featured', 1)
                        ->where('disable', '!=', 1)
                        ->orderBy('kode_produk', 'desc')
                        ->where(function ($query) {
                            if (config('services.app.type') == 1) {
                                $query->where('app_type', config('services.app.type'));
                            }
                        })
                        ->paginate(12)
                        : Produk::where('disable', 0)->where('featured', 1)
                        ->where('disable', '!=', 1)
                        ->orderBy('kode_produk', 'desc')
                        ->where(function ($query) {
                            if (config('services.app.type') == 1) {
                                $query->where('app_type', config('services.app.type'));
                            }
                        })
                        ->paginate(12);
                }
            } else if (!empty($filter)) {
                $kategori = Kategori::where('no_kategori', $filter)
                    ->where(function ($query) {
                        if (config('services.app.type') == 1) {
                            $query->where('app_type', config('services.app.type'));
                        }
                    })
                    ->get()->first();
                if (!empty($subfilter)) {
                    $subs = KategoriChild::where('child_id', $subfilter)->get()->first;
                    $produks = $this->isHiddenSold != 1 ? Produk::where('disable', 0)->whereHas('stocks', function (Builder $query) {
                        $query->where('product_stock', '!=', 0);
                    })->where('subkategory', $subs->child_name->child_id)->where('disable', '!=', 1)
                        ->where(function ($query) {
                            if (config('services.app.type') == 1) {
                                $query->where('app_type', config('services.app.type'));
                            }
                        })
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12)
                        : Produk::where('disable', 0)->where('subkategory', $subs->child_name->child_id)->where('disable', '!=', 1)
                        ->where(function ($query) {
                            if (config('services.app.type') == 1) {
                                $query->where('app_type', config('services.app.type'));
                            }
                        })
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12);
                    $subsname = $subs->child_name->child_name;
                } else {
                    $produks = $this->isHiddenSold != 1 ? Produk::where('disable', 0)->whereHas('stocks', function (Builder $query) {
                        $query->where('product_stock', '!=', 0);
                    })->where('kategory', $kategori->no_kategori)->where('disable', '!=', 1)
                        ->where(function ($query) {
                            if (config('services.app.type') == 1) {
                                $query->where('app_type', config('services.app.type'));
                            }
                        })
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12)
                        : Produk::where('disable', 0)->where('kategory', $kategori->no_kategori)->where('disable', '!=', 1)
                        ->where(function ($query) {
                            if (config('services.app.type') == 1) {
                                $query->where('app_type', config('services.app.type'));
                            }
                        })
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12);
                }
            } else {
                $produks = $this->isHiddenSold != 1 ? Produk::where('disable', 0)->whereHas('stocks', function (Builder $query) {
                    $query->where('product_stock', '!=', 0);
                })->orderBy('kode_produk', 'desc')
                    ->where('stat', '0')
                    ->where(function ($query) {
                        if (config('services.app.type') == 1) {
                            $query->where('app_type', config('services.app.type'));
                        }
                    })
                    ->orderBy('kode_produk', 'desc')
                    ->paginate(12)
                    : Produk::where('disable', 0)->orderBy('kode_produk', 'desc')
                    ->where('stat', '0')
                    ->where(function ($query) {
                        if (config('services.app.type') == 1) {
                            $query->where('app_type', config('services.app.type'));
                        }
                    })
                    ->orderBy('kode_produk', 'desc')
                    ->paginate(12);
                $filteredproduct = 'allproduct';
            }
        } else {

            //image 0 hidden
            if (!empty($keyword)) {

                $reservedSymbols = ['-', '+', '<', '>', '@', '(', ')', '~'];
                $searchTerm = str_replace($reservedSymbols, ' ', $keyword);

                $searchValue = preg_split('/\s+/', $searchTerm, -1, PREG_SPLIT_NO_EMPTY);

                $produks = $this->isHiddenSold != 1 ? Produk::whereHas('stocks', function (Builder $query) {
                    $query->where('product_stock', '!=', 0);
                })->where('image', '!=', null)
                    ->where(function ($query) use ($searchValue) {
                        foreach ($searchValue as $keyword) {
                            $query->where('nama_produk', 'LIKE', '%' . $keyword . '%')
                                ->where('disable', 0);
                        }
                    })
                    ->orWhere('kode_produk', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('ket', 'LIKE', '%' . $keyword . '%')
                    ->whereHas('brand', function (Builder $query) use ($keyword) {
                        $query->where('nama_brand', 'LIKE', '%' . $keyword . '%');
                    })->where(function ($query) {
                        if (config('services.app.type') == 1) {
                            $query->where('app_type', config('services.app.type'));
                        }
                    })
                    ->where('disable', '!=', 1)
                    ->orderBy('kode_produk', 'desc')
                    ->paginate(12)
                    : Produk::where('image', '!=', null)
                    ->where('disable', '!=', 1)
                    ->where(function ($query) use ($searchValue) {
                        foreach ($searchValue as $keyword) {
                            $query->where('nama_produk', 'LIKE', '%' . $keyword . '%')
                                ->where('disable', 0);;
                        }
                    })
                    ->orWhere('kode_produk', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('ket', 'LIKE', '%' . $keyword . '%')
                    ->whereHas('brand', function (Builder $query) use ($keyword) {
                        $query->where('nama_brand', 'LIKE', '%' . $keyword . '%');
                    })->where(function ($query) {
                        if (config('services.app.type') == 1) {
                            $query->where('app_type', config('services.app.type'));
                        }
                    })
                    ->where('disable', '!=', 1)
                    ->orderBy('kode_produk', 'desc')
                    ->paginate(12);
            } else if (!empty($filteredproduct)) {

                if ($filteredproduct != 'featured' && $filteredproduct != 'fav') {
                    //new product
                    $produks = $this->isHiddenSold != 1 ? Produk::where('disable', 0)->whereHas('stocks', function (Builder $query) {
                        $query->where('product_stock', '!=', 0);
                    })->where('disable', '!=', 1)
                        ->where('stat', $filteredproduct)
                        ->where('image', '!=', null)
                        ->where(function ($query) {
                            if (config('services.app.type') == 1) {
                                $query->where('app_type', config('services.app.type'));
                            }
                        })
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12)
                        : Produk::where('disable', 0)->where('disable', '!=', 1)
                        ->where('stat', $filteredproduct)
                        ->where('image', '!=', null)
                        ->where(function ($query) {
                            if (config('services.app.type') == 1) {
                                $query->where('app_type', config('services.app.type'));
                            }
                        })
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12);
                } else if ($filteredproduct == 'fav') {
                    // fav product
                    $produks = $this->isHiddenSold != 1 ? Produk::where('disable', 0)->whereHas('stocks', function (Builder $query) {
                        $query->where('product_stock', '!=', 0);
                    })->where('image', '!=', null)
                        ->where('disable', '!=', 1)
                        ->orderBy('kode_produk', 'desc')
                        ->where('app_type', config('services.app.type'))
                        ->paginate(12)
                        : Produk::where('disable', 0)
                        ->where('app_type', config('services.app.type'))
                        ->where('disable', '!=', 1)
                        ->where('image', '!=', null)
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12);
                } else {
                    //featured
                    $produks = $this->isHiddenSold != 1 ? Produk::where('disable', 0)->whereHas('stocks', function (Builder $query) {
                        $query->where('product_stock', '!=', 0);
                    })->where('featured', 1)
                        ->where('disable', '!=', 1)
                        ->where('image', '!=', null)
                        ->where(function ($query) {
                            if (config('services.app.type') == 1) {
                                $query->where('app_type', config('services.app.type'));
                            }
                        })
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12)
                        : Produk::where('disable', 0)->where('featured', 1)
                        ->where('disable', '!=', 1)
                        ->where('image', '!=', null)
                        ->where(function ($query) {
                            if (config('services.app.type') == 1) {
                                $query->where('app_type', config('services.app.type'));
                            }
                        })
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12);
                }
            } else if (!empty($filter)) {
                $kategori = Kategori::where('no_kategori', $filter)
                    ->where(function ($query) {
                        if (config('services.app.type') == 1) {
                            $query->where('app_type', config('services.app.type'));
                        }
                    })
                    ->get()->first();
                if (!empty($subfilter)) {
                    $subs = KategoriChild::where('child_id', $subfilter)->get()->first;
                    $produks = $this->isHiddenSold != 1 ? Produk::where('disable', 0)->whereHas('stocks', function (Builder $query) {
                        $query->where('product_stock', '!=', 0);
                    })->where('subkategory', $subs->child_name->child_id)->where('image', '!=', null)->where('disable', '!=', 1)
                        ->where(function ($query) {
                            if (config('services.app.type') == 1) {
                                $query->where('app_type', config('services.app.type'));
                            }
                        })
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12)
                        : Produk::where('disable', 0)->where('subkategory', $subs->child_name->child_id)->where('image', '!=', null)->where('disable', '!=', 1)
                        ->where(function ($query) {
                            if (config('services.app.type') == 1) {
                                $query->where('app_type', config('services.app.type'));
                            }
                        })
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12);
                    $subsname = $subs->child_name->child_name;
                } else {
                    $produks = $this->isHiddenSold != 1 ? Produk::where('disable', 0)->whereHas('stocks', function (Builder $query) {
                        $query->where('product_stock', '!=', 0);
                    })->where('kategory', $kategori->no_kategori)->where('image', '!=', null)->where('disable', '!=', 1)
                        ->where(function ($query) {
                            if (config('services.app.type') == 1) {
                                $query->where('app_type', config('services.app.type'));
                            }
                        })
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12)
                        : Produk::where('disable', 0)->where('kategory', $kategori->no_kategori)->where('image', '!=', null)->where('disable', '!=', 1)
                        ->where(function ($query) {
                            if (config('services.app.type') == 1) {
                                $query->where('app_type', config('services.app.type'));
                            }
                        })
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12);
                }
            } else {
                $produks = $this->isHiddenSold != 1 ? Produk::where('disable', 0)->whereHas('stocks', function (Builder $query) {
                    $query->where('product_stock', '!=', 0);
                })->where('image', '!=', null)
                    ->where('stat', '0')
                    ->where(function ($query) {
                        if (config('services.app.type') == 1) {
                            $query->where('app_type', config('services.app.type'));
                        }
                    })
                    ->orderBy('kode_produk', 'desc')
                    ->paginate(12)
                    : Produk::where('disable', 0)->where('image', '!=', null)
                    ->where('stat', '0')
                    ->where(function ($query) {
                        if (config('services.app.type') == 1) {
                            $query->where('app_type', config('services.app.type'));
                        }
                    })
                    ->orderBy('kode_produk', 'desc')
                    ->paginate(12);
                $filteredproduct = 'allproduct';
            }
        }


        $page = 'home';

        $produks->withPath('listproducts');
        $produks->appends($request->all());



        if (config('services.app.type') == 1) {
            // TBF
            return view('user.landingpage2', compact('produks', 'keyword', 'filter', 'subfilter', 'subsname', 'filteredproduct', 'page', 'hotdeals'));
        } else {
            //BBN
            return view('user.bbn.landingpage', compact('produks', 'keyword', 'filter', 'subfilter', 'subsname', 'filteredproduct', 'page', 'hotdeals'));
        }
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
                $reservedSymbols = ['-', '+', '<', '>', '@', '(', ')', '~'];
                $searchTerm = str_replace($reservedSymbols, ' ', $keyword);

                $searchValue = preg_split('/\s+/', $searchTerm, -1, PREG_SPLIT_NO_EMPTY);

                $produks = $this->isHiddenSold != 1 ? Produk::whereHas('stocks', function (Builder $query) {
                    $query->where('product_stock', '!=', 0);
                })->where(function ($query) use ($searchValue) {
                    foreach ($searchValue as $keyword) {
                        $query->where('nama_produk', 'LIKE', '%' . $keyword . '%')
                            ->where('disable', '!=', 1);
                    }
                })
                    ->orWhere('kode_produk', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('ket', 'LIKE', '%' . $keyword . '%')
                    ->whereHas('brand', function (Builder $query) use ($keyword) {
                        $query->where('nama_brand', 'LIKE', '%' . $keyword . '%');
                    })
                    ->where(function ($query) {
                        if (config('services.app.type') == 1) {
                            $query->where('app_type', config('services.app.type'));
                        }
                    })
                    ->where('disable', '!=', 1)
                    ->orderBy('kode_produk', 'desc')
                    ->paginate(12)

                    : Produk::where(function ($query) use ($searchValue) {
                        foreach ($searchValue as $keyword) {
                            $query->where('nama_produk', 'LIKE', '%' . $keyword . '%')

                                ->where('disable', '!=', 1);
                        }
                    })
                    ->orWhere('kode_produk', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('ket', 'LIKE', '%' . $keyword . '%')
                    ->whereHas('brand', function (Builder $query) use ($keyword) {
                        $query->where('nama_brand', 'LIKE', '%' . $keyword . '%');
                    })
                    ->where(function ($query) {
                        if (config('services.app.type') == 1) {
                            $query->where('app_type', config('services.app.type'));
                        }
                    })
                    ->where('disable', '!=', 1)
                    ->orderBy('kode_produk', 'desc')
                    ->paginate(12);
            } else if (!empty($filteredproduct)) {
                if ($filteredproduct != 'featured' && $filteredproduct != 'fav') {
                    //new product
                    $produks = $this->isHiddenSold != 1 ? Produk::where('disable', 0)->whereHas('stocks', function (Builder $query) {
                        $query->where('product_stock', '!=', 0);
                    })->where('disable', '!=', 1)
                        ->where('stat', $filteredproduct)
                        ->where(function ($query) {
                            if (config('services.app.type') == 1) {
                                $query->where('app_type', config('services.app.type'));
                            }
                        })
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12)
                        : Produk::where('disable', 0)->where('disable', '!=', 1)
                        ->where('stat', $filteredproduct)
                        ->where(function ($query) {
                            if (config('services.app.type') == 1) {
                                $query->where('app_type', config('services.app.type'));
                            }
                        })
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12);
                } else if ($filteredproduct == 'fav') {
                    // fav product
                    $produks = $this->isHiddenSold != 1 ? Produk::where('disable', 0)->whereHas('stocks', function (Builder $query) {
                        $query->where('product_stock', '!=', 0);
                    })
                        ->where('disable', '!=', 1)
                        ->orderBy('kode_produk', 'desc')
                        ->where('app_type', config('services.app.type'))
                        ->paginate(12)
                        : Produk::where('disable', 0)
                        ->where('app_type', config('services.app.type'))
                        ->where('disable', '!=', 1)
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12);
                } else {
                    //featured
                    $produks = $this->isHiddenSold != 1 ? Produk::where('disable', 0)->whereHas('stocks', function (Builder $query) {
                        $query->where('product_stock', '!=', 0);
                    })->where('featured', 1)
                        ->where('disable', '!=', 1)
                        ->where(function ($query) {
                            if (config('services.app.type') == 1) {
                                $query->where('app_type', config('services.app.type'));
                            }
                        })
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12)
                        : Produk::where('disable', 0)->where('featured', 1)
                        ->where('disable', '!=', 1)
                        ->where(function ($query) {
                            if (config('services.app.type') == 1) {
                                $query->where('app_type', config('services.app.type'));
                            }
                        })
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12);
                }
            } else if (!empty($filter)) {
                $kategori = Kategori::where('no_kategori', $filter)
                    ->where(function ($query) {
                        if (config('services.app.type') == 1) {
                            $query->where('app_type', config('services.app.type'));
                        }
                    })
                    ->get()->first();
                if (!empty($subfilter)) {
                    $subs = KategoriChild::where('child_id', $subfilter)->get()->first;
                    $produks = $this->isHiddenSold != 1 ? Produk::where('disable', 0)->whereHas('stocks', function (Builder $query) {
                        $query->where('product_stock', '!=', 0);
                    })->where('subkategory', $subs->child_name->child_id)->where('disable', '!=', 1)
                        ->where(function ($query) {
                            if (config('services.app.type') == 1) {
                                $query->where('app_type', config('services.app.type'));
                            }
                        })
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12)
                        : Produk::where('disable', 0)->where('subkategory', $subs->child_name->child_id)->where('disable', '!=', 1)
                        ->where(function ($query) {
                            if (config('services.app.type') == 1) {
                                $query->where('app_type', config('services.app.type'));
                            }
                        })
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12);
                    $subsname = $subs->child_name->child_name;
                } else {
                    $produks = $this->isHiddenSold != 1 ? Produk::where('disable', 0)->whereHas('stocks', function (Builder $query) {
                        $query->where('product_stock', '!=', 0);
                    })->where('kategory', $kategori->no_kategori)->where('disable', '!=', 1)
                        ->where(function ($query) {
                            if (config('services.app.type') == 1) {
                                $query->where('app_type', config('services.app.type'));
                            }
                        })
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12)
                        : Produk::where('disable', 0)->where('kategory', $kategori->no_kategori)->where('disable', '!=', 1)
                        ->where(function ($query) {
                            if (config('services.app.type') == 1) {
                                $query->where('app_type', config('services.app.type'));
                            }
                        })
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12);
                }
            } else {
                $produks = $this->isHiddenSold != 1 ? Produk::where('disable', 0)->whereHas('stocks', function (Builder $query) {
                    $query->where('product_stock', '!=', 0);
                })->where(function ($query) {
                    if (config('services.app.type') == 1) {
                        $query->where('app_type', config('services.app.type'));
                    }
                })
                    ->orderBy('kode_produk', 'desc')
                    ->paginate(12)
                    : Produk::where('disable', 0)
                    ->where(function ($query) {
                        if (config('services.app.type') == 1) {
                            $query->where('app_type', config('services.app.type'));
                        }
                    })
                    ->orderBy('kode_produk', 'desc')
                    ->paginate(12);
                $filteredproduct = 'allproduct';
            }
        } else {

            //image 0 hidden
            if (!empty($keyword)) {

                $reservedSymbols = ['-', '+', '<', '>', '@', '(', ')', '~'];
                $searchTerm = str_replace($reservedSymbols, ' ', $keyword);

                $searchValue = preg_split('/\s+/', $searchTerm, -1, PREG_SPLIT_NO_EMPTY);

                $produks = $this->isHiddenSold != 1 ? Produk::whereHas('stocks', function (Builder $query) {
                    $query->where('product_stock', '!=', 0);
                })->where('image', '!=', null)
                    ->where(function ($query) use ($searchValue) {
                        foreach ($searchValue as $keyword) {
                            $query->where('nama_produk', 'LIKE', '%' . $keyword . '%')
                                ->where('disable', 0);;
                        }
                    })
                    ->orWhere('kode_produk', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('ket', 'LIKE', '%' . $keyword . '%')
                    ->whereHas('brand', function (Builder $query) use ($keyword) {
                        $query->where('nama_brand', 'LIKE', '%' . $keyword . '%')
                            ->where('disable', 0);;
                    })
                    ->where(function ($query) {
                        if (config('services.app.type') == 1) {
                            $query->where('app_type', config('services.app.type'));
                        }
                    })
                    ->where('disable', '!=', 1)
                    ->orderBy('kode_produk', 'desc')
                    ->paginate(12)
                    : Produk::where('image', '!=', null)
                    ->where(function ($query) use ($searchValue) {
                        foreach ($searchValue as $keyword) {
                            $query->where('nama_produk', 'LIKE', '%' . $keyword . '%')
                                ->where('disable', 0);;
                        }
                    })
                    ->orWhere('kode_produk', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('ket', 'LIKE', '%' . $keyword . '%')
                    ->whereHas('brand', function (Builder $query) use ($keyword) {
                        $query->where('nama_brand', 'LIKE', '%' . $keyword . '%');
                    })
                    ->where(function ($query) {
                        if (config('services.app.type') == 1) {
                            $query->where('app_type', config('services.app.type'));
                        }
                    })
                    ->where('disable', '!=', 1)
                    ->orderBy('kode_produk', 'desc')
                    ->paginate(12);
            } else if (!empty($filteredproduct)) {

                if ($filteredproduct != 'featured' && $filteredproduct != 'fav') {
                    //new product
                    $produks = $this->isHiddenSold != 1 ? Produk::where('disable', 0)->whereHas('stocks', function (Builder $query) {
                        $query->where('product_stock', '!=', 0);
                    })->where('disable', '!=', 1)
                        ->where('stat', $filteredproduct)
                        ->where('image', '!=', null)
                        ->where(function ($query) {
                            if (config('services.app.type') == 1) {
                                $query->where('app_type', config('services.app.type'));
                            }
                        })
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12)
                        : Produk::where('disable', 0)->where('disable', '!=', 1)
                        ->where('stat', $filteredproduct)
                        ->where('image', '!=', null)
                        ->where(function ($query) {
                            if (config('services.app.type') == 1) {
                                $query->where('app_type', config('services.app.type'));
                            }
                        })
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12);
                } else if ($filteredproduct == 'fav') {
                    // fav product
                    $produks = $this->isHiddenSold != 1 ? Produk::where('disable', 0)->whereHas('stocks', function (Builder $query) {
                        $query->where('product_stock', '!=', 0);
                    })->where('image', '!=', null)
                        ->where('disable', '!=', 1)
                        ->orderBy('kode_produk', 'desc')
                        ->where('app_type', config('services.app.type'))
                        ->paginate(12)
                        : Produk::where('disable', 0)
                        ->where('app_type', config('services.app.type'))
                        ->where('disable', '!=', 1)
                        ->where('image', '!=', null)
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12);
                } else {
                    //featured
                    $produks = $this->isHiddenSold != 1 ? Produk::where('disable', 0)->whereHas('stocks', function (Builder $query) {
                        $query->where('product_stock', '!=', 0);
                    })->where('featured', 1)
                        ->where('disable', '!=', 1)
                        ->where('image', '!=', null)
                        ->where(function ($query) {
                            if (config('services.app.type') == 1) {
                                $query->where('app_type', config('services.app.type'));
                            }
                        })
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12)
                        : Produk::where('disable', 0)->where('featured', 1)
                        ->where('disable', '!=', 1)
                        ->where('image', '!=', null)
                        ->where(function ($query) {
                            if (config('services.app.type') == 1) {
                                $query->where('app_type', config('services.app.type'));
                            }
                        })
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12);
                }
            } else if (!empty($filter)) {
                $kategori = Kategori::where('no_kategori', $filter)
                    ->where(function ($query) {
                        if (config('services.app.type') == 1) {
                            $query->where('app_type', config('services.app.type'));
                        }
                    })
                    ->get()->first();
                if (!empty($subfilter)) {
                    $subs = KategoriChild::where('child_id', $subfilter)->get()->first;
                    $produks = $this->isHiddenSold != 1 ? Produk::where('disable', 0)->whereHas('stocks', function (Builder $query) {
                        $query->where('product_stock', '!=', 0);
                    })->where('subkategory', $subs->child_name->child_id)->where('image', '!=', null)->where('disable', '!=', 1)
                        ->where(function ($query) {
                            if (config('services.app.type') == 1) {
                                $query->where('app_type', config('services.app.type'));
                            }
                        })
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12)
                        : Produk::where('disable', 0)->where('subkategory', $subs->child_name->child_id)->where('image', '!=', null)->where('disable', '!=', 1)
                        ->where(function ($query) {
                            if (config('services.app.type') == 1) {
                                $query->where('app_type', config('services.app.type'));
                            }
                        })
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12);
                    $subsname = $subs->child_name->child_name;
                } else {
                    $produks = $this->isHiddenSold != 1 ? Produk::where('disable', 0)->whereHas('stocks', function (Builder $query) {
                        $query->where('product_stock', '!=', 0);
                    })->where('kategory', $kategori->no_kategori)->where('image', '!=', null)->where('disable', '!=', 1)
                        ->where(function ($query) {
                            if (config('services.app.type') == 1) {
                                $query->where('app_type', config('services.app.type'));
                            }
                        })
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12)
                        : Produk::where('disable', 0)->where('kategory', $kategori->no_kategori)->where('image', '!=', null)->where('disable', '!=', 1)
                        ->where(function ($query) {
                            if (config('services.app.type') == 1) {
                                $query->where('app_type', config('services.app.type'));
                            }
                        })
                        ->orderBy('kode_produk', 'desc')
                        ->paginate(12);
                }
            } else {
                $produks = $this->isHiddenSold != 1 ? Produk::where('disable', 0)->whereHas('stocks', function (Builder $query) {
                    $query->where('product_stock', '!=', 0);
                })->where('image', '!=', null)
                    ->where(function ($query) {
                        if (config('services.app.type') == 1) {
                            $query->where('app_type', config('services.app.type'));
                        }
                    })
                    ->orderBy('kode_produk', 'desc')
                    ->paginate(12)
                    : Produk::where('disable', 0)->where('image', '!=', null)
                    ->where(function ($query) {
                        if (config('services.app.type') == 1) {
                            $query->where('app_type', config('services.app.type'));
                        }
                    })
                    ->orderBy('kode_produk', 'desc')
                    ->paginate(12);
                $filteredproduct = 'allproduct';
            }
        }



        $produks->withPath('listproducts');
        $produks->appends($request->all());

        if (config('services.app.type') == 1) {
            // TBF
            return view('user.listproducts', compact('produks', 'keyword', 'filter', 'subfilter', 'subsname', 'filteredproduct', 'page'));
        } else {
            //BBN
            return view('user.bbn.listproducts', compact('produks', 'keyword', 'filter', 'subfilter', 'subsname', 'filteredproduct', 'page'));
        }
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

        if (config('services.app.type') == 1) {
            // TBF
            return view('user.' . strtolower($sites->code), compact('page', 'sites', 'values'));
        } else {
            //BBN
            return view('user.bbn.' . strtolower($sites->code), compact('page', 'sites', 'values'));
        }
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
