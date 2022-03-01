<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard(){
        return view('admin.index');
    }
    public function settings_configuration(){
        return view('admin.settings.configuration');
    }
    public function layout_design(){
        return view('admin.settings.layoutdesign');
    }
    public function administrator(){
        return view('admin.settings.administrator');
    }
    public function administrator_create(){
        return view('admin.settings.administrator_create');
    }
    public function hit_counter(){
        return view('admin.settings.hitcounter');
    }
}
