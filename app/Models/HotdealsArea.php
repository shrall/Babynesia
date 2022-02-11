<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotdealsArea extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'hotdeals_area';
    protected $fillable = [
        'id', 'area_name', 'disable','urutan'
    ];
    protected $primarykey = 'id';
    // public $incrementing = false;
}
