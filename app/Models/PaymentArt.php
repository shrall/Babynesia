<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentArt extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'payment_art';
    protected $fillable = [
        'id','valuta_id','name','description','disable'
    ];
    protected $primarykey = 'id';
    // public $incrementing = false;
}
