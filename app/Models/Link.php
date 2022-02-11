<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'link';
    protected $fillable = [
        'link_kode', 'brand_kode', 'isi'
    ];
    protected $primarykey = 'link_kode';
    // public $incrementing = false;
}
