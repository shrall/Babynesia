<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FakturStatus extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'faktur_status';
    protected $fillable = [
        'id','status','color','sort_nr'
    ];
    protected $primarykey = 'id';
    // public $incrementing = false;
}
