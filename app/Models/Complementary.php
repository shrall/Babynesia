<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complementary extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'complementary';
    protected $fillable = [
        'product_id', 'suggested_id'
    ];
    protected $primarykey = null;
    public $incrementing = false;
}
