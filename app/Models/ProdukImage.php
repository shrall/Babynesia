<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukImage extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'produk_image';
    protected $fillable = [
        'id', 'produk_id', 'imageurl'
    ];
    protected $primaryKey = 'id';
    // public $incrementing = false;
}
