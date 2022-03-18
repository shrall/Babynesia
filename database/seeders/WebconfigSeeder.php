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
        $status->content = 'bg-blue-100';
        $status->showed_name = 'Background Color';
        $status->save();
        $status = new Webconfig();
        $status->name = 'text_color';
        $status->content = 'bg-blue-100';
        $status->showed_name = 'Text Color';
        $status->save();
        $status = new Webconfig();
        $status->name = 'button_color';
        $status->content = 'bg-blue-100';
        $status->showed_name = 'Button Color';
        $status->save();
        $status = new Webconfig();
        $status->name = 'web_layout';
        $status->content = '1';
        $status->showed_name = 'Website Layout';
        $status->save();
    }
}
