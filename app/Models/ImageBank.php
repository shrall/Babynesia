<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageBank extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'image_bank';
    protected $fillable = [
        'id','name','url'
    ];
    protected $primarykey = 'id';
    // public $incrementing = false;
}
