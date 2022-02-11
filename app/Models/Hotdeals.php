<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotdeals extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'hotdeals';
    protected $fillable = [
        'id', 'name', 'image', 'type', 'link', 'height', 'area', 'position_nr', 'status', 'from_date', 'until_date'
    ];
    protected $primarykey = 'id';
    // public $incrementing = false;
}
