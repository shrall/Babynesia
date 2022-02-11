<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Techhelp extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'techhelp';
    protected $fillable = [
        'no_techhelp', 'alamat', 'kota', 'nama', 'telepon', 'email', 'no_faktur', 'judul_keluhan', 'keluhan', 'replied'
    ];
    protected $primarykey = 'no_techhelp';
    // public $incrementing = false;
}
