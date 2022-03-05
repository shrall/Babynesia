<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'promo';
    protected $fillable = [
        'promo_kode', 'produk_kode', 'isi'
    ];
    protected $primaryKey = 'promo_kode';
    // public $incrementing = false;
}
