<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klas extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'klas';
    protected $fillable = [
        'no_klas', 'kategori', 'brand'
    ];
    protected $primarykey = 'no_klas';
    // public $incrementing = false;
}
