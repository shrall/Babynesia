<?php

namespace App\Providers;

use App\Models\Kategori;
use App\Models\KategoriChild;
use App\Models\ProdukStatus;
use App\Models\Sites;
use App\Models\Webconfig;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $allkategoris = Kategori::orderBy('no_kategori', 'desc')->get();
        $subkategoris = KategoriChild::all();

        //get color webconfig
        $bg_color = Webconfig::where('name', 'bg_color')->get()->last();
        $text_color = Webconfig::where('name', 'text_color')->get()->last();
        $button_color = Webconfig::where('name', 'button_color')->get()->last();
        $color = [$bg_color->content, $text_color->content, $button_color->content];
        //background image
        $bg_img = Webconfig::where('name', 'bg_img')->get()->last();

        //webconfig toggle view on off
        $hide_product_code = Webconfig::where('name', 'hide_product_code')->get()->last();
        $hide_product_sold = Webconfig::where('name', 'hide_sold_product')->get()->last();
        $hide_product_non_img = Webconfig::where('name', 'hide_product_non_img')->get()->last();
        $hideconfig = [$hide_product_code->isHidden, $hide_product_sold->isHidden, $hide_product_non_img->isHidden];

        //sites untuk navbar
        $navmenus = Sites::where('no', '!=', 36)
            ->where('no', '!=', 37)
            ->where('no', '!=', 38)
            ->where('no', '!=', 39)
            ->where('no', '!=', 10)
            ->where('no', '!=', 28)
            ->where('no', '!=', 29)
            ->where('no', '!=', 30)
            ->where('no', '!=', 33) //ongkos kirim
            ->where('no', '!=', 34)
            ->where('no', '!=', 35)
            ->get();

        $statmenus = ProdukStatus::orderBy('status_code', 'asc')->get();


        View::share('tagline', Webconfig::where('name', 'tagline')->get()->last());
        View::share('allkategoris', $allkategoris);
        View::share('subkategoris', $subkategoris);
        View::share('color', $color);
        View::share('bg_img', $bg_img);
        View::share('hideconfig', $hideconfig);
        View::share('statmenus', $statmenus);
    }
}
