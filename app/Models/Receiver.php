<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receiver extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'receiver';
    protected $fillable = [
        'id', 'faktur_id', 'user_id', 'receiver_name', 'address', 'postcode', 'city', 'province', 'phone',
        'hp', 'email', 'message', 'message_from', 'delivery_date', 'alternativ_deliverry_date', 'reminder', 'remider_subject'
    ];
    protected $primaryKey = 'id';
    // public $incrementing = false;
}
