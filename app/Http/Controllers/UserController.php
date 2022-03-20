<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Faktur;
use App\Models\IndonesiaProvince;
use App\Models\Kategori;
use App\Models\KategoriChild;
use App\Models\User;
use App\Models\Webconfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allkategoris = Kategori::orderBy('no_kategori', 'desc')->get();
        $subkategoris = KategoriChild::all();
        $fakturs = Faktur::where('kode_user', Auth::id())->get();
        $countries = Country::all();
        $indoprovinces = IndonesiaProvince::all();

        //get color webconfig
        $bg_color = Webconfig::where('name', 'bg_color')->get()->last();
        $text_color = Webconfig::where('name', 'text_color')->get()->last();
        $button_color = Webconfig::where('name', 'button_color')->get()->last();
        $color = [$bg_color->content, $text_color->content, $button_color->content];
        //background image
        $bg_img = Webconfig::where('name', 'bg_img')->get()->last();

        return view('user.profile', compact('allkategoris', 'subkategoris', 'fakturs', 'countries', 'indoprovinces', 'color', 'bg_img'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if (!empty($request->password)) {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            $user->update([
                'password' => Hash::make($request->password)
            ]);
        }

        if (!empty($request->propinsi2)) {
            $propinsi = $request->propinsi2;
        } else {
            $propinsi = $request->propinsi;
        }
        $user->update([
            'name' => $request->name,
            'lastname' => $request->lastname,
            // 'email' => $request->email,
            // 'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'propinsi' => $propinsi,
            'negara' => $request->negara,
            'kodepos' => $request->kodepos,
            'telp' => $request->telp,
            'hp' => $request->hp,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
