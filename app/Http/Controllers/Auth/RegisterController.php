<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\IndonesiaProvince;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Webconfig;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function getRegister()
    {
        $countries = Country::orderByRaw('name = ? desc', ['Indonesia'])->get();
        // $indoprovinces = IndonesiaProvince::all();

        $provinces = Http::withHeaders([
            'key' => config('services.rajaongkir.token'),
        ])->get('https://api.rajaongkir.com/starter/province')
            ->json()['rajaongkir']['results'];

        return view('auth.register', compact('countries', 'provinces'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:user'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'captcha' => ['required', 'captcha'],
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        if ($data['negara'] != "Indonesia") {
            $propinsi = $data['propinsi2'];
            $kota = $data['kota2'];
        } else {
            $cities = Http::withHeaders([
                'key' => config('services.rajaongkir.token'),
            ])->get('https://api.rajaongkir.com/starter/city')
                ->json()['rajaongkir']['results'];
            $cities = collect($cities)->where('province_id', $data['propinsi']);
            foreach ($cities as $city) {
                $propinsi = $city['province'];
                break;
            }
            $kota = $data['kota'];
        }

        return User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => md5($data['password']),
            'alamat' => $data['alamat'],
            'kota' => $kota,
            'propinsi' => $propinsi,
            'negara' => $data['negara'],
            'kodepos' => $data['kodepos'],
            'telp' => $data['telp'],
            'hp' => $data['hp'],
            'conf' => 'user',
            'stat' => 'a'
        ]);
    }
}
