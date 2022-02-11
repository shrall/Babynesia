<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkLocation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'link_location';
    protected $fillable = [
        'no', 'location'
    ];
    protected $primarykey = 'no';
    // public $incrementing = false;
}
