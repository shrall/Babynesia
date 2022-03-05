<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryCost extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'delivery_cost';
    protected $fillable = [
        'id', 'company', 'origin', 'destination', 'city_name', 'service', 'harga', 'min_weight', 'min_price'
    ];
    protected $primaryKey = 'id';
    // public $incrementing = false;
}
