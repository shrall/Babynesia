<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'faq';
    protected $fillable = [
        'no_faq','pertanyaan','jawaban'
    ];
    protected $primarykey = 'no_faq';
    // public $incrementing = false;
}
