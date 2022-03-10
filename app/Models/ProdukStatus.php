<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukStatus extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'produk';
    protected $fillable = [
        'status_code', 'status_desc', 'urutan'
    ];
    protected $primaryKey = 'status_code';
    public $incrementing = false;
}
