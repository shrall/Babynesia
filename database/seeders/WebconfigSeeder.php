<?php

namespace Database\Seeders;

use App\Models\Webconfig;
use Illuminate\Database\Seeder;

class WebconfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = new Webconfig();
        $status->name = 'bg_color';
        $status->content = 'blue';
        $status->showed_name = 'Background Color';
        $status->save();
        $status = new Webconfig();
        $status->name = 'text_color';
        $status->content = 'sky';
        $status->showed_name = 'Text Color';
        $status->save();
        $status = new Webconfig();
        $status->name = 'button_color';
        $status->content = 'pink';
        $status->showed_name = 'Button Color';
        $status->save();
        $status = new Webconfig();
        $status->name = 'web_layout';
        $status->content = '1';
        $status->showed_name = 'Website Layout';
        $status->save();
        $status = new Webconfig();
        $status->name = 'kota_pengirim';
        $status->content = 444;
        $status->showed_name = 'ID Kota Pengirim dari API Rajaongkir';
        $status->save();
        $status = new Webconfig();
        $status->name = 'hide_product_non_img';
        $status->showed_name = 'Sembunyikan Produk Tanpa Gambar';
        $status->save();
        $status = new Webconfig();
        $status->name = 'website_type';
        $status->content = 1;
        $status->showed_name = '1 = TBF, 2 = BBN';
        $status->save();
    }
}
