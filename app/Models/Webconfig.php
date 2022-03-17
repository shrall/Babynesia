<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webconfig extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'webconfig';
    protected $fillable = [
        'name', 'showed_name', 'content', 'urutan', 'admin_status', 'type', 'isHidden', 'color_bg', 'color_text', 'color_button'
    ];
    protected $primaryKey = 'name';
    public $incrementing = false;
}
