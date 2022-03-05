<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitCounter extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'visit_counter';
    protected $fillable = [
        'no','user','date','IP'
    ];
    protected $primaryKey = 'no';
    // public $incrementing = false;
}
