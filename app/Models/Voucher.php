<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'code', 'limit', 'deadline', 'vouchertype_id', 'isLimited', 'amount'
    ];
    public function type()
    {
        return $this->belongsTo(VoucherType::class, 'vouchertype_id', 'id');
    }
}
