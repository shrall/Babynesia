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
        'kode_produk', 'kode_alias', 'kategory', 'nama_produk', 'brand_produk', 'ket', 'harga', 'harga_sale', 'stat', 'complement', 'image', 'promo',
        'harga_pokok', 'ket2', 'ket3', 'ket4', 'stock', 'sort_nr', 'max_buy_amount', 'disable', 'weight'
    ];
    protected $primarykey = 'kode_produk';
    // public $incrementing = false;
}
