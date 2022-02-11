<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hitcounter extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'hitcounter';
    protected $fillable = [
        'id', 'month', 'registered','unregistered','total'
    ];
    protected $primarykey = 'id';
    // public $incrementing = false;
}
