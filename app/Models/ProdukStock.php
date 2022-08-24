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
        'id', 'produk_id', 'size', 'color', 'product_stock', 'type'
    ];
    protected $primaryKey = 'id';
    // public $incrementing = false;
    public function fakturs()
    {
        return $this->hasMany(DetailFaktur::class, 'kode_produk_stock', 'id');
    }
    public function product()
    {
        return $this->belongsTo(Produk::class, 'produk_id', 'kode_produk');
    }
}
