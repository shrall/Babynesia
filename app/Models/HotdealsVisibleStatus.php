<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotdealsVisibleStatus extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'hotdeals_visible_status';
    protected $fillable = [
        'id','status'
    ];
    protected $primarykey = 'id';
    // public $incrementing = false;
}
