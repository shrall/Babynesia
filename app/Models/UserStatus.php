<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStatus extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'user_status';
    protected $fillable = [
        'id', 'user_status'
    ];
    protected $primaryKey = 'id';
    // public $incrementing = false;
}
