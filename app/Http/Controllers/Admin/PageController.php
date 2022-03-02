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
    public function webpage(){
        return view('admin.content.webpage');
    }
    public function webpage_create(){
        return view('admin.content.webpage_create');
    }
    public function sidearea(){
        return view('admin.content.sidearea');
    }
    public function sidearea_create(){
        return view('admin.content.sidearea_create');
    }
    public function article(){
        return view('admin.content.article');
    }
    public function article_create(){
        return view('admin.content.article_create');
    }
    public function guestbook(){
        return view('admin.content.guestbook');
    }
    public function guestbook_create(){
        return view('admin.content.guestbook_create');
    }
    public function gallery(){
        return view('admin.content.gallery');
    }
    public function gallery_create(){
        return view('admin.content.gallery_create');
    }
}
