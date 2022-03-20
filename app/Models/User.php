<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;
    protected $table = 'user';
    protected $fillable = [
        'no_user', 'email', 'password', 'name', 'lastname', 'alamat', 'kota', 'propinsi', 'negara', 'kodepos', 'telp', 'hp', 'birthday', 'gender', 'noKTP', 'stat', 'tgl_gabung', 'conf', 'user_status_id'
    ];
    protected $primaryKey = 'no_user';
    // public $incrementing = false;
    public function status()
    {
        return $this->belongsTo(UserStatus::class, 'user_status_id', 'id');
    }
    public function country()
    {
        return $this->belongsTo(Country::class, 'negara', 'id');
    }
    public function fakturs()
    {
        return $this->hasMany(Faktur::class, 'kode_user', 'no_user');
    }
    public function visitcounters()
    {
        return $this->hasMany(VisitCounter::class, 'user', 'no_user');
    }
    public function visitcountersmonth()
    {
        return $this->hasMany(VisitCounter::class, 'user', 'no_user')->whereMonth('date', date('m'));
    }
}
