<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faktur extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'faktur';
    protected $fillable = [
        'no_faktur', 'kode_user', 'status', 'tanggal', 'cara_bayar', 'total_pembayaran', 'valuta_id', 'total_profit', 'deliverycost',
        'deliveryDate', 'deliveryExpedition', 'deliveryResi', 'tanggal2', 'discount', 'note', 'admin_note'
    ];
    protected $primaryKey = 'no_faktur';
    // public $incrementing = false;
}
