<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->email = 'user@tbf.com';
        $user->password = md5('wars1234');
        $user->name = 'user';
        $user->lastname = 'lastname';
        $user->alamat = 'alamat';
        $user->kota = 'Surabaya';
        $user->propinsi = 'Jawa Timur';
        $user->negara = 'Indonesia';
        $user->kodepos = '60252';
        $user->telp = '08123213';
        $user->hp = '081231231';
        $user->conf = '-';
        $user->user_status_id = 1;
        $user->save();

        $user = new User();
        $user->email = 'adminmaster@tbf.com';
        $user->password = md5('wars1234');
        $user->name = 'admin';
        $user->lastname = 'lastname';
        $user->alamat = 'alamat';
        $user->kota = 'Surabaya';
        $user->propinsi = 'Jawa Timur';
        $user->negara = 'Indonesia';
        $user->kodepos = '60252';
        $user->telp = '08123213';
        $user->hp = '081231231';
        $user->conf = '-';
        $user->user_status_id = 3;
        $user->save();

        $user = new User();
        $user->email = 'owner@tbf.com';
        $user->password = md5('wars1234');
        $user->name = 'owner';
        $user->lastname = 'lastname';
        $user->alamat = 'alamat';
        $user->kota = 'Surabaya';
        $user->propinsi = 'Jawa Timur';
        $user->negara = 'Indonesia';
        $user->kodepos = '60252';
        $user->telp = '08123213';
        $user->hp = '081231231';
        $user->conf = '-';
        $user->user_status_id = 4;
        $user->save();

        $user = new User();
        $user->email = 'owner@bbn.com';
        $user->password = md5('wars1234');
        $user->name = 'owner';
        $user->lastname = 'lastname';
        $user->alamat = 'alamat';
        $user->kota = 'Surabaya';
        $user->propinsi = 'Jawa Timur';
        $user->negara = 'Indonesia';
        $user->kodepos = '60252';
        $user->telp = '08123213';
        $user->hp = '081231231';
        $user->conf = '-';
        $user->user_status_id = 5;
        $user->save();

        $user = new User();
        $user->email = 'staff@tbf.com';
        $user->password = md5('wars1234');
        $user->name = 'staff';
        $user->lastname = 'lastname';
        $user->alamat = 'alamat';
        $user->kota = 'Surabaya';
        $user->propinsi = 'Jawa Timur';
        $user->negara = 'Indonesia';
        $user->kodepos = '60252';
        $user->telp = '08123213';
        $user->hp = '081231231';
        $user->conf = '-';
        $user->user_status_id = 6;
        $user->save();

        $user = new User();
        $user->email = 'staff@bbn.com';
        $user->password = md5('wars1234');
        $user->name = 'staff';
        $user->lastname = 'lastname';
        $user->alamat = 'alamat';
        $user->kota = 'Surabaya';
        $user->propinsi = 'Jawa Timur';
        $user->negara = 'Indonesia';
        $user->kodepos = '60252';
        $user->telp = '08123213';
        $user->hp = '081231231';
        $user->conf = '-';
        $user->user_status_id = 7;
        $user->save();
    }
}
