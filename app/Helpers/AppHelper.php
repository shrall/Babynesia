<?php

namespace App\Helpers;

class AppHelper
{
    public static function rp(int $uang)
    {
        $angka = number_format($uang, 0, ',', '.');
        $hasil = 'Rp. ' . $angka;
        return $hasil;
    }
    public static function instance()
    {
        return new AppHelper();
    }
}
