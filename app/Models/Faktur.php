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
        'deliveryDate', 'deliveryExpedition', 'deliveryResi', 'tanggal2', 'discount', 'note', 'admin_note', 'total_weight', 'sender_name', 'sender_phone', 'sender_address', 'voucher_id'
    ];
    protected $primaryKey = 'no_faktur';
    // public $incrementing = false;
    public function fakturstatus()
    {
        return $this->belongsTo(FakturStatus::class, 'status', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'kode_user', 'no_user');
    }
    public function receiver()
    {
        return $this->hasOne(Receiver::class, 'faktur_id', 'no_faktur');
    }
    public function items()
    {
        return $this->hasMany(DetailFaktur::class, 'no_faktur', 'no_faktur');
    }
    public function payment()
    {
        return $this->belongsTo(PaymentMethod::class, 'cara_bayar', 'name');
    }
    public function voucher()
    {
        return $this->belongsTo(Voucher::class, 'voucher_id', 'id');
    }
}
