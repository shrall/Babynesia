<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebLayout extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'web_layout';
    protected $fillable = [
        'id', 'name', 'sites', 'page_width', 'side_width', 'logo_height', 'image', 'css_data', 'choosed', 'note', 'package_status'
    ];
    protected $primarykey = 'id';
    // public $incrementing = false;
}
