<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'cart';
    protected $fillable = [
        'no_cart'
    ];
    protected $primaryKey = 'no_cart';
    // public $incrementing = false;
}
