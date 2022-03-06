<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndonesiaProvince extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'indonesia_province';
    protected $fillable = [
        'id','name'
    ];
    protected $primaryKey = 'id';
    // public $incrementing = false;
}
