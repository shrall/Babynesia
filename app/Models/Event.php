<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'events';
    protected $fillable = [
        'id', 'event', 'sort_nr'
    ];
    protected $primarykey = 'id';
    // public $incrementing = false;
}
