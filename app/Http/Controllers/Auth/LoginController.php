<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Webconfig;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        //get color webconfig
        $bg_color = Webconfig::where('name', 'bg_color')->get()->last();
        $text_color = Webconfig::where('name', 'text_color')->get()->last();
        $button_color = Webconfig::where('name', 'button_color')->get()->last();
        $color = [$bg_color->content, $text_color->content, $button_color->content];
        //background image
        $bg_img = Webconfig::where('name', 'bg_img')->get()->last();

        return view('auth.login', compact('color', 'bg_img'));
    }
}
