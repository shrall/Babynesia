<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = new PaymentMethod();
        $status->name = 'bank_1';
        $status->info = 'BCA 0101';
        $status->description = 'BCA 0101-66-2828, an Rita Koeswatie';
        $status->save();

        $status = new PaymentMethod();
        $status->name = 'bank_2';
        $status->info = 'Mandiri 144';
        $status->description = 'Mandiri 144-0011-852-032, an Rita Koeswatie';
        $status->save();
    }
}
