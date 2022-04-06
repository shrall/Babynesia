<?php

namespace Database\Seeders;

use App\Models\ProdukStatus;
use Illuminate\Database\Seeder;

class ProdukStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ps = new ProdukStatus();
        $ps->name = 'Promo';
        $ps->status_code = 'd';
        $ps->save();

        $ps = new ProdukStatus();
        $ps->name = 'Restock';
        $ps->status_code = 'r';
        $ps->save();

        $ps = new ProdukStatus();
        $ps->name = 'Normal';
        $ps->status_code = '0';
        $ps->save();

        $ps = new ProdukStatus();
        $ps->name = 'Grosir Ready';
        $ps->status_code = 'grd';
        $ps->save();

        $ps = new ProdukStatus();
        $ps->name = 'Grosir PO';
        $ps->status_code = 'gpo';
        $ps->save();

        $ps = new ProdukStatus();
        $ps->name = 'Pre-Order';
        $ps->status_code = 'po';
        $ps->save();
    }
}
