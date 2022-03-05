<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebImage extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'web_image';
    protected $fillable = [
        'id', 'imageurl'
    ];
    protected $primaryKey = 'id';
    // public $incrementing = false;
}
