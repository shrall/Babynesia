<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard(){
        return view('admin.index');
    }
    public function configuration(){
        return view('admin.settings.configuration');
    }
    public function layoutdesign(){
        return view('admin.settings.layoutdesign');
    }
    public function administrator(){
        return view('admin.settings.administrator');
    }
    public function administratorcreate(){
        return view('admin.settings.administrator_create');
    }
    public function hitcounter(){
        return view('admin.settings.hitcounter');
    }
    public function topvisitor(){
        return view('admin.settings.topvisitor');
    }
    //@marshall ini nanti ada parameternya Model $model trus di compact ke view
    public function topvisitor_detail(){
        return view('admin.settings.topvisitor_detail');
    }
    public function sendmail(){
        return view('admin.settings.sendmail');
    }
    public function tutorial(){
        return view('admin.settings.tutorial');
    }
    public function advertisement(){
        return view('admin.content.advertisement');
    }
    public function advertisement_create(){
        return view('admin.content.advertisement_create');
    }
    public function sidearea(){
        return view('admin.content.sidearea');
    }
    public function sidearea_create(){
        return view('admin.content.sidearea_create');
    }
}
