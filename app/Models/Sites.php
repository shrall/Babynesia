<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sites extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'sites';
    protected $fillable = [
        'no', 'code', 'isi', 'link', 'urutan', 'location', 'new_window', 'admin_status', 'editable'
    ];
    protected $primarykey = 'no';
    // public $incrementing = false;
}
