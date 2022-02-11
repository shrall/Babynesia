<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukStock extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'produk_stock';
    protected $fillable = [
        'id', 'produk_id', 'size', 'color', 'produk_stock'
    ];
    protected $primarykey = 'id';
    // public $incrementing = false;
}
