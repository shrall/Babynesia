<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SitesSidearea extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'sites_sidearea';
    protected $fillable = [
        'no', 'code', 'titlepage', 'link', 'isi', 'urutan', 'isLeft', 'admin_status', 'editable', 'hidden', 'viewMobile', 'disabled'
    ];
    protected $primaryKey = 'no';
    // public $incrementing = false;
}
