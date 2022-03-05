<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriParent extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'kategori_parent';
    protected $fillable = [
        'id', 'parent_kategori_nama', 'urutan', 'gambar'
    ];
    protected $primaryKey = 'id';
    // public $incrementing = false;
}
