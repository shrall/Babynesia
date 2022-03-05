<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukStockHistory extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'produk_stock_history';
    protected $fillable = [
        'id','trxdate','admin','product_id','amount','faktur_id','notes'
    ];
    protected $primaryKey = 'id';
    // public $incrementing = false;
}
