<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Faktur;
use App\Models\User;
use App\Models\Webconfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->user_status_id == 1 || Auth::user()->user_status_id == 2) {
        } else {
            return redirect()->route('adminpage.dashboard');
        }
        $fakturs = Faktur::where('kode_user', Auth::id())->orderBy('no_faktur', 'desc')->paginate(10);
        $countries = Country::orderByRaw('name = ? desc', ['Indonesia'])->get();

        // $indoprovinces = IndonesiaProvince::all();
        //province rajaongkir
        $provinces = Http::withHeaders([
            'key' => config('services.rajaongkir.token'),
        ])->get('https://api.rajaongkir.com/starter/province')
            ->json()['rajaongkir']['results'];

        $checker = $request->checker;
        if (empty($checker)) {
            $checker = 'history';
            $page = 'history';
        } else {
            $page = $checker;
        }

        if (config('services.app.type') == 1) {
            return view('user.profile', compact('fakturs', 'countries', 'provinces', 'checker', 'page'));
        } else {
            return view('user.bbn.profile', compact('fakturs', 'countries', 'provinces', 'checker', 'page'));
        }
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
                'password' => md5($request->password)
            ]);
        }

        if ($request->negara != "Indonesia") {
            $propinsi = $request->propinsi2;
            $kota = $request->kota2;
            $kecamatan = null;
        } else {
            $cities = Http::withHeaders([
                'key' => config('services.rajaongkir.token'),
            ])->get('https://pro.rajaongkir.com/api/city')
                ->json()['rajaongkir']['results'];
            $cities = collect($cities)->where('city_id', $request->kota);
            $propinsi = null;
            $kota = null;
            foreach ($cities as $city) {
                $propinsi = $city['province'];
                $kota = $city['city_name'];
                break;
            }

            if (empty($request->subdistrict)) {
                return redirect()->back();
            }

            if ($propinsi == null) {
                $propinsi = $request->propinsi;
            }

            if ($kota == null) {
                $kota = $request->kota;
            }
            $kecamatan = $request->subdistrict;
        }


        $user->update([
            'name' => $request->name,
            'lastname' => $request->lastname,
            // 'email' => $request->email,
            // 'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'kota' => $kota,
            'propinsi' => $propinsi,
            'negara' => $request->negara,
            'kodepos' => $request->kodepos,
            'telp' => $request->telp,
            'hp' => $request->hp,
            'kecamatan' => $kecamatan
        ]);

        return redirect(route('user.user.index'));
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
