<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guestbook extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'guestbook';
    protected $fillable = [
        'guestbook_id', 'datum', 'name', 'location', 'email', 'message', 'accepted'
    ];
    protected $primaryKey = 'guestbook_id';
    // public $incrementing = false;
}
