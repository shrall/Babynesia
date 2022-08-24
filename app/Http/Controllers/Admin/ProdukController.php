<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Kategori;
use App\Models\KategoriChild;
use App\Models\Produk;
use App\Models\ProdukImage;
use App\Models\ProdukStatus;
use App\Models\ProdukStock;
use App\Models\ProdukStockHistory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
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
        $products = Produk::with('stocks')->where('disable', 0)->orderBy('kode_produk', 'desc')->where('disable', 0)->paginate(15);
        $categories = Kategori::all();
        $brands = Brand::all();
        $tipeproduk = ' ';
        return view('admin.produk.index', compact('products', 'categories', 'brands', 'tipeproduk'));
    }

    public function index_promo()
    {
        $products = Produk::where('stat', 'd')->orderBy('kode_produk', 'desc')->where('disable', 0)->paginate(15);
        $categories = Kategori::all();
        $brands = Brand::all();
        $tipeproduk = 'Promo';
        return view('admin.produk.index', compact('products', 'categories', 'brands', 'tipeproduk'));
    }

    public function index_restock()
    {
        $products = Produk::where('stat', 'r')->orderBy('kode_produk', 'desc')->where('disable', 0)->paginate(15);
        $categories = Kategori::all();
        $brands = Brand::all();
        $tipeproduk = 'Restock';
        return view('admin.produk.index', compact('products', 'categories', 'brands', 'tipeproduk'));
    }

    public function index_disabled()
    {
        $products = Produk::where('disable', 1)->orderBy('kode_produk', 'desc')->paginate(15);
        $categories = Kategori::all();
        $brands = Brand::all();
        $tipeproduk = 'Non-Aktif';
        return view('admin.produk.index', compact('products', 'categories', 'brands', 'tipeproduk'));
    }

    public function index_soldout()
    {
        $products = Produk::with('stocks')->orderBy('kode_produk', 'desc')
            ->where('disable', 0)
            ->whereRelation('stocks', 'product_stock', 0)
            ->get();
        $categories = Kategori::all();
        $brands = Brand::all();
        $tipeproduk = 'Sold Out';
        return view('admin.produk.soldout', compact('products', 'categories', 'brands', 'tipeproduk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Kategori::all();
        $subcategories = KategoriChild::all();
        $brands = Brand::all();
        $products = Produk::where('disable', 0)->where('nama_produk', '!=', ' ')->orderBy('nama_produk', 'asc')->get();
        $produkstatuses = ProdukStatus::all();
        return view('admin.produk.create', compact('categories', 'brands', 'products', 'produkstatuses', 'subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $images = [];
        $keys = [];
        $key_doesnt_exist = false;
        foreach ($request->image as $key => $value) {
            $image = 'product-' . time() . '-' . $value->getClientOriginalName();
            $value->move(public_path('uploads/'), $image);
            $images[$key] = $image;
            array_push($keys, $key);
        }
        foreach ($keys as $key => $value) {
            if ($value == $request->image_primary) {
                $key_doesnt_exist = true;
            }
        }
        if ($key_doesnt_exist == false) {
            return redirect()->route('adminpage.produk.create')->with('image', 'Gambar Utama Tidak Boleh Kosong!');;
        }
        $product = Produk::create([
            'kode_alias' => $request->alias_code,
            'stat' => $request->status,
            'nama_produk' => $request->name,
            'kategory' => $request->category,
            'subkategory' => $request->subcategory,
            'brand_produk' => $request->brand,
            'weight' => $request->weight,
            'sort_nr' => $request->order ?? 100,
            'harga_pokok' => $request->hpp,
            'harga' => $request->harga,
            'harga_toko' => $request->harga_toko,
            // 'harga_grosir' => $request->harga_grosir,
            // 'disc1' => $request->disc1,
            // 'disc2' => $request->disc2,
            // 'disc3' => $request->disc3,
            'image' => $images[$request->image_primary],
            // 'featured' => $request->featured,
            'stat' => $request->stat,
            'harga_sale' => $request->harga_sale,
            'ket' => $request->content,
            // 'complement' => $request->complement
        ]);
        foreach ($images as $key => $value) {
            ProdukImage::create([
                'produk_id' => $product->kode_produk,
                'produk_id_alias' => $product->kode_alias,
                'imageurl' => $value
            ]);
        }
        if ($request->stock_type) {
            foreach ($request->stock_type as $key => $types) {
                $item = ProdukStock::create([
                    'produk_id' => $product->kode_produk,
                    'produk_id_alias' => $product->kode_alias,
                    'type' => $request->stock_type[$key],
                    'size' => $request->stock_size[$key],
                    'color' => $request->stock_color[$key],
                    'product_stock' => $request->stock_left[$key] ?? 0,
                ]);
                ProdukStockHistory::create([
                    'trxdate' => Carbon::now(),
                    'admin' => 'Admin',
                    'product_id' => $item->produk_id,
                    'amount' => $item->product_stock,
                    'faktur_id' => 0,
                    'notes' => 'Produk baru - ' . $item->type . ' ' . $item->size . ' ', $item->color
                ]);
            }
        }
        return redirect()->route('adminpage.produk.edit', $product->kode_produk);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        return view('admin.produk.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        $categories = Kategori::all();
        $subcategories = KategoriChild::all();
        $brands = Brand::all();
        $products = Produk::where('disable', 0)->where('nama_produk', '!=', ' ')->orderBy('nama_produk', 'asc')->get();
        $produkstatuses = ProdukStatus::all();
        return view('admin.produk.edit', compact('produk', 'categories', 'subcategories', 'brands', 'products', 'produkstatuses'));
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
        $imagecount = $produk->images->count();
        if ($request->deleteimg) {
            if (count($request->deleteimg) == $imagecount) {
                if ($request->image == null) {
                    return redirect()->route('adminpage.produk.edit', $produk->kode_produk)->with('image', 'Foto Tidak Boleh Kosong!');
                }
            }
        }
        $images = [];
        $keys = [];
        foreach ($produk->images as $key => $value) {
            array_push($images, $value->imageurl);
            $images[$key] = $value->imageurl;
            array_push($keys, $key);
        }
        if ($request->deleteimg) {
            foreach ($request->deleteimg as $key => $value) {
                $produk->images[$key]->delete();
                array_splice($images, $key, 1);
                array_splice($keys, $key, 1);
            }
        }
        $loope = 0;
        $truekey = $request->image_primary;
        if ($request->image) {
            foreach ($request->image as $key => $value) {
                $loope++;
                $image = 'product-' . time() . '-' . $value->getClientOriginalName();
                $value->move(public_path('uploads/'), $image);
                if (count($images) < $key) {
                    array_push($keys, count($images));
                    $images[count($images)] = $image;
                } else {
                    array_push($keys, $key);
                    $images[$key] = $image;
                }
            }
        }
        $produk->update([
            'kode_alias' => $request->alias_code,
            'stat' => $request->status,
            'nama_produk' => $request->name,
            'kategory' => $request->category,
            'subkategory' => $request->subcategory,
            'brand_produk' => $request->brand,
            'weight' => $request->weight,
            'sort_nr' => $request->order ?? 100,
            'harga_pokok' => $request->hpp,
            'harga' => $request->harga,
            'harga_toko' => $request->harga_toko,
            // 'harga_grosir' => $request->harga_grosir,
            // 'disc1' => $request->disc1,
            // 'disc2' => $request->disc2,
            // 'disc3' => $request->disc3,
            'image' => count($images) == 0 ? $produk->image : $images[$truekey],
            // 'featured' => $request->featured,
            'stat' => $request->stat,
            'harga_sale' => $request->harga_sale,
            'ket' => $request->content,
            // 'complement' => $request->complement
        ]);
        if ($request->image) {
            // dd($images);
            $oldImages = ProdukImage::where("produk_id", $produk->kode_produk)->get();
            // dd($oldImages);
            foreach ($oldImages as $key => $oldimage) {
                $oldimage->delete();
            }
            foreach ($images as $key => $value) {
                ProdukImage::create([
                    'produk_id' => $produk->kode_produk,
                    'produk_id_alias' => $produk->kode_alias,
                    'imageurl' => $value
                ]);
            }
        }
        $kodeprodstok = [];
        foreach ($produk->stocks as $key => $value) {
            array_push($kodeprodstok, $value->id);
        }
        foreach ($kodeprodstok as $key => $value) {
            if (array_key_exists($key + 1, $request->stock_code)) {
                if (in_array($request->stock_code[$key + 1], $kodeprodstok)) {
                    $oldstock = $produk->stocks->where('id', $request->stock_code[$key + 1])->first()->product_stock;
                    $produk->stocks->where('id', $request->stock_code[$key + 1])->first()->update([
                        'produk_id' => $produk->kode_produk,
                        'produk_id_alias' => $request->alias_code,
                        'size' => $request->stock_size[$key + 1],
                        'color' => $request->stock_color[$key + 1],
                        'type' => $request->stock_type[$key + 1],
                        'product_stock' => $request->stock_left[$key + 1] ?? 0,
                    ]);
                    ProdukStockHistory::create([
                        'trxdate' => Carbon::now(),
                        'admin' => 'Admin',
                        'product_id' => $produk->stocks->where('id', $request->stock_code[$key + 1])->first()->produk_id,
                        'amount' => $produk->stocks->where('id', $request->stock_code[$key + 1])->first()->product_stock - $oldstock,
                        'faktur_id' => 0,
                        'notes' => 'Edit Stock'
                    ]);
                } else {
                    $oldstock = $produk->stocks->where('id', $request->stock_code[$key + 1])->first()->product_stock;
                    $produk->stocks->where('id', $request->stock_code[$key + 1])->first()->delete();
                    ProdukStockHistory::create([
                        'trxdate' => Carbon::now(),
                        'admin' => 'Admin',
                        'product_id' => $produk->stocks->where('id', $request->stock_code[$key + 1])->first()->produk_id,
                        'amount' => -1 * abs($oldstock),
                        'faktur_id' => 0,
                        'notes' => 'Edit Stock'
                    ]);
                }
            } else {
                $oldstock = $produk->stocks->where('id', $kodeprodstok[$key])->first()->product_stock;
                $produk->stocks->where('id', $kodeprodstok[$key])->first()->delete();
                ProdukStockHistory::create([
                    'trxdate' => Carbon::now(),
                    'admin' => 'Admin',
                    'product_id' => $produk->stocks->where('id', $kodeprodstok[$key])->first()->produk_id,
                    'amount' => -1 * abs($oldstock),
                    'faktur_id' => 0,
                    'notes' => 'Edit Stock'
                ]);
            }
        };
        foreach ($request->stock_code as $key => $value) {
            if ($value == null) {
                $item = ProdukStock::create([
                    'produk_id' => $produk->kode_produk,
                    'produk_id_alias' => $request->alias_code,
                    'size' => $request->stock_size[$key],
                    'color' => $request->stock_color[$key],
                    'type' => $request->stock_type[$key],
                    'product_stock' => $request->stock_left[$key] ?? 0,
                ]);
                ProdukStockHistory::create([
                    'trxdate' => Carbon::now(),
                    'admin' => 'Admin',
                    'product_id' => $item->produk_id,
                    'amount' => $item->product_stock,
                    'faktur_id' => 0,
                    'notes' => 'Tambah jenis baru - ' . $item->type . ' ' . $item->size . ' ', $item->color
                ]);
            }
        }

        return redirect()->route('adminpage.produk.edit', $produk->kode_produk);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        $produk->update([
            'disable' => 1
        ]);
        return redirect()->back();
    }

    public function index_search(Request $request)
    {
        $products = Produk::where('disable', session('product_search_status'));
        if (session('product_search_search')) {
            $products = Produk::where('nama_produk', 'like', '%' . session('product_search_search') . '%');
        }
        if (session('product_search_category') != 'no') {
            $products->where('kategory', session('product_search_category'));
        }
        if (session('product_search_brand') != 'no') {
            $products->where('brand_produk', session('product_search_brand'));
        }
        if (session('product_search_rule') == '2') {
            $products->whereNotNull('image');
        }
        $products = $products->orderBy('kode_produk', 'desc')->paginate(15);
        $categories = Kategori::all();
        $brands = Brand::all();
        $tipeproduk = " ";
        return view('admin.produk.index', compact('products', 'categories', 'brands', 'tipeproduk'));
    }
    public function search(Request $request)
    {
        session()->forget('product_search_status');
        session()->forget('product_search_search');
        session()->forget('product_search_category');
        session()->forget('product_search_brand');
        session()->forget('product_search_rule');
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
        $products = $products->orderBy('kode_produk', 'desc')->paginate(15);

        $categories = Kategori::all();
        $brands = Brand::all();
        $tipeproduk = " ";
        return view('admin.produk.index', compact('products', 'categories', 'brands', 'tipeproduk'));
    }

    public function add_type(Request $request)
    {
        $order = $request->prodstok;
        return view('admin.produk.inc.newstockfield', compact('order'));
    }

    public function getsubcategory(Request $request){
        $subcategories = KategoriChild::where('kategori_id', $request->category_id)->get();
        return $subcategories;
    }
}
