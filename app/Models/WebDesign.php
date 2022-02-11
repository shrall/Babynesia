<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebDesign extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'web_design';
    protected $fillable = [
        'id', 'queue', 'name', 'choosed', 'body_bgcolor', 'main_bgcolor', 'header_bgcolor', 'mainmenu_bgcolor', 'bottom_bgcolor',
        'overview_header_bgcolor', 'side_header_bgcolor', 'side_bgcolor', 'productmenu_bgcolor_hover', 'title_color', 'mainmenu_color',
        'link_color', 'hover_color', 'border_color'
    ];
    protected $primarykey = 'id';
    // public $incrementing = false;
}
