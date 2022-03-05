<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationCity extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'destination_city';
    protected $fillable = [
        'id', 'city'
    ];
    protected $primaryKey = 'id';
    // public $incrementing = false;
}
