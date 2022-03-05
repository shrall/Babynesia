<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailCart extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'detail_cart';
    protected $fillable = [
        'no_detail_cart', 'no_user', 'kode_produk', 'kode_produk_stock', 'jumlah', 'destination_city_id'
    ];
    protected $primaryKey = 'no_detail_cart';
    // public $incrementing = false;
}
