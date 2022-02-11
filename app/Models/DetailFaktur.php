<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailFaktur extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'detail_faktur';
    protected $fillable = [
        'no_detail_faktur', 'no_user', 'no_faktur', 'kode_produk', 'kode_produk_stock', 'jumlah', 'tanggal', 'harga_satuan', 'destination_city_id',
        'ongkos_kirim', 'subtotal', 'valuta_id', 'profit'
    ];
    protected $primarykey = 'no_detail_faktur';
    // public $incrementing = false;
}
