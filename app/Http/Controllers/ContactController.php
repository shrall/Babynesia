<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Kategori;
use App\Models\KategoriChild;
use App\Models\Webconfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = 'contact';
        $allkategoris = Kategori::orderBy('no_kategori', 'desc')->get();
        $subkategoris = KategoriChild::all();

        //get color webconfig
        $bg_color = Webconfig::where('name', 'bg_color')->get()->last();
        $text_color = Webconfig::where('name', 'text_color')->get()->last();
        $button_color = Webconfig::where('name', 'button_color')->get()->last();
        $color = [$bg_color->content, $text_color->content, $button_color->content];
        //background image
        $bg_img = Webconfig::where('name', 'bg_img')->get()->last();

        return view('user.contact', compact('page', 'allkategoris', 'subkategoris', 'color', 'bg_img'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new \stdClass();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->subject = $request->subject;
        $data->message = $request->message;

        // ganti receiver mailnya
        Mail::to('ezralfredoo@gmail.com')->send(new ContactMail($data));

        if (Mail::failures()) {
            return redirect('contact')->with('status', 'Sorry! Please try again latter');
        } else {
            return redirect('contact')->with('status', 'Great! Successfully send in your mail');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
