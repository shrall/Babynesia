<?php

namespace Database\Seeders;

use App\Models\UserStatus;
use Illuminate\Database\Seeder;

class UserStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $us = new UserStatus();
        $us->id = 3;
        $us->user_status = 'Admin Master';
        $us->save();

        $us = new UserStatus();
        $us->id = 4;
        $us->user_status = 'Owner Master';
        $us->save();

        $us = new UserStatus();
        $us->id = 5;
        $us->user_status = 'Owner Side';
        $us->save();

        $us = new UserStatus();
        $us->id = 6;
        $us->user_status = 'Staff Master';
        $us->save();

        $us = new UserStatus();
        $us->id = 7;
        $us->user_status = 'Staff Side';
        $us->save();
    }
}
