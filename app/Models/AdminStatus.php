<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminStatus extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'admin_status';
    protected $fillable = [
        'id', 'status'
    ];
    protected $primarykey = 'id';
    // public $incrementing = false;
}
