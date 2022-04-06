<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukStatus extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'status_code', 'name'
    ];
}
