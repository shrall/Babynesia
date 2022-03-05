<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriChild extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'kategori_child';
    protected $fillable = [
        'child_id', 'child_name', 'kategori_id'
    ];
    protected $primaryKey = 'child_id';
    // public $incrementing = false;
}
