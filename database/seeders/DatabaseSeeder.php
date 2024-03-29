<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(PaymentMethodSeeder::class);
        $this->call(WebconfigSeeder::class);
        $this->call(ProdukStatusSeeder::class);
        $this->call(UserStatusSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(VoucherTypeSeeder::class);
    }
}
