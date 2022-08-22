<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Faktur;
use App\Models\IndonesiaProvince;
use App\Models\User;
use App\Models\UserStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('user_status_id', '<=', '2')->get();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        $provinces = IndonesiaProvince::all();
        $statuses = UserStatus::all();
        return view('admin.user.create', compact('countries', 'provinces', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->password != $request->password_confirmation) {
            return redirect()->route('adminpage.user.create')->with('wrong', 'Password Konfirmasi Salah!');
        }
        if ($request->country != 'ID') {
            $prv = $request->other_province;
        } else {
            $prv = $request->province;
        }
        $user = User::create([
            'email' => $request->email,
            'password' => md5($request->password),
            'name' => $request->name,
            'alamat' => $request->address,
            'kota' => $request->city,
            'propinsi' => $prv,
            'negara' => $request->country,
            'kodepos' => $request->postal_code,
            'hp' => $request->handphone,
            'telp' => $request->telephone ?? 0,
            'tgl_gabung' => Carbon::now(),
            'user_status_id' => $request->status
        ]);
        return redirect()->route('adminpage.user.show', $user->no_user);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $fakturs = Faktur::where('kode_user', $user->no_user)->paginate(15);
        $sortedResult = $fakturs->getCollection()->sortByDesc('no_faktur')->values();
        $fakturs->setCollection($sortedResult);
        return view('admin.user.show', compact('user', 'fakturs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $countries = Country::all();
        $provinces = IndonesiaProvince::all();
        $statuses = UserStatus::all();
        return view('admin.user.edit', compact('countries', 'provinces', 'statuses', 'user'));
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
        if ($request->password) {
            if ($request->password != $request->password_confirmation) {
                return redirect()->route('adminpage.user.create')->with('wrong', 'Password Konfirmasi Salah!');
            } else {
                $password = md5($request->password);
            }
        } else {
            $password = $user->password;
        }
        if ($request->country != 'ID') {
            $prv = $request->other_province;
        } else {
            $prv = $request->province;
        }
        $user->update([
            'email' => $request->email,
            'password' => $password,
            'name' => $request->name,
            'alamat' => $request->address,
            'kota' => $request->city,
            'propinsi' => $prv,
            'negara' => $request->country,
            'kodepos' => $request->postal_code,
            'hp' => $request->handphone,
            'telp' => $request->telephone ?? 0,
            'user_status_id' => $request->status
        ]);
        return redirect()->route('adminpage.user.show', $user->no_user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $redirect = null;
        if($user->user_status_id <= 2){
            $redirect = redirect()->route('adminpage.user.index');
        }else{
            $redirect = redirect()->route('adminpage.administrator');
        }
        $user->delete();
        return $redirect;
    }
}
