<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'brand';
    protected $fillable = [
        'no_brand',
        'nama_brand',
        'gambar',
        'app_type'
    ];
    protected $primaryKey = 'no_brand';
    // public $incrementing = false;
}
