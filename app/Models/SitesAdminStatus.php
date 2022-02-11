<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SitesAdminStatus extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'sites_admin_status';
    protected $fillable = [
        'sites_admin_id','admin_status','disable'
    ];
    protected $primarykey = null;
    public $incrementing = false;
}
