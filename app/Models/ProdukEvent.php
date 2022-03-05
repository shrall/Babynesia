<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukEvent extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'produk_events';
    protected $fillable = [
        'id','produk_kode','event_id'
    ];
    protected $primaryKey = 'id';
    // public $incrementing = false;
}
