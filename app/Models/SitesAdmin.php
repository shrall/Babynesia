<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SitesAdmin extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'sites_admin';
    protected $fillable = [
        'no', 'sites_admin_kategori_no', 'name', 'link', 'urutan', 'new_window', 'disable', 'admin_status'
    ];
    protected $primaryKey = 'no';
    // public $incrementing = false;
}
