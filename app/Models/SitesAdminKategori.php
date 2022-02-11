<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SitesAdminKategori extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'sites_admin_kategori';
    protected $fillable = [
        'no','name','disable','urutan'
    ];
    protected $primarykey = 'no';
    // public $incrementing = false;
}
