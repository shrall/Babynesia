<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriChild extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'kategori_child';
    protected $fillable = [
        'child_id', 'child_name', 'kategori_id', 'app_type'
    ];
    protected $primaryKey = 'child_id';
    // public $incrementing = false;
    public function category()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'no_kategori');
    }
}
