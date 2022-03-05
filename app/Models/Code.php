<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'code';
    protected $fillable = [
        'id',
        'code',
        'location'
    ];
    protected $primaryKey = 'id';
    // public $incrementing = false;
}
