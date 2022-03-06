<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukDestinationCity extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'produk_destionation_city';
    protected $fillable = [
        'id', 'produk_id', 'city_id', 'deliverycost'
    ];
    protected $primaryKey = 'id';
    // public $incrementing = false;
}
