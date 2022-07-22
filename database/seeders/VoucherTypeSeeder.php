<?php

namespace Database\Seeders;

use App\Models\VoucherType;
use Illuminate\Database\Seeder;

class VoucherTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vt = new VoucherType();
        $vt->name = "Persen";
        $vt->save();

        $vt = new VoucherType();
        $vt->name = "Langsung";
        $vt->save();
    }
}
