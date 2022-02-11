<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'kategori';
    protected $fillable = [
        'no_kategori','nama_kategori','parent','urutan','image'
    ];
    protected $primarykey = 'no_kategori';
    // public $incrementing = false;
}
