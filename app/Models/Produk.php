<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'produk';
    protected $fillable = [
        'kode_produk', 'kode_alias', 'kategory', 'subkategory', 'nama_produk', 'brand_produk', 'ket', 'harga', 'harga_sale', 'stat', 'complement', 'image', 'promo',
        'hpp', 'hpp_sale', 'ket2', 'ket3', 'ket4', 'stock', 'sort_nr', 'max_buy_amount', 'disable', 'weight', 'featured', 'harga_grosir', 'harga_toko   '
    ];
    protected $primaryKey = 'kode_produk';
    // public $incrementing = false;
    public function category()
    {
        return $this->belongsTo(Kategori::class, 'kategory', 'no_kategori');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_produk', 'no_brand');
    }
    public function stocks()
    {
        return $this->hasMany(ProdukStock::class, 'produk_id', 'kode_produk');
    }
    public function stockhistory()
    {
        return $this->hasMany(ProdukStockHistory::class, 'product_id', 'kode_produk');
    }
    public function carts()
    {
        return $this->hasMany(DetailCart::class, 'kode_produk', 'kode_produk');
    }
    public function images()
    {
        return $this->hasMany(ProdukImage::class, 'produk_id', 'kode_produk');
    }
    public function status()
    {
        return $this->belongsTo(ProdukStatus::class, 'stat', 'status_code');
    }
    public function complement()
    {
        return $this->belongsTo(Produk::class, 'complement', 'kode_produk');
    }
}
