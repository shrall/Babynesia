@extends('layouts.app')

@section('content')
<div class="h-screen sm:flex sm:justify-center sm:items-center px-3 pt-4">
    <div class="bg-white rounded-lg sm:w-vw-70 xl:w-vw-50 shadow-md sm:py-5 sm:px-8 px-3 py-4">
        <h1 class="font-concert-one text-3xl sm:text-4xl text-center text-sky-500">TokoBayiFiv Login</h1>
        <p class="text-gray-400 font-encode-sans text-sm sm:text-base text-center">
            Member baru? <span><a href="{{ route('register') }}" class="text-sky-500">Daftar disini</a></span>
        </p>

        <form method="POST" action="{{ route('login') }}" class="mt-7">
            @csrf

            <div class="">
                <div>
                    <label for="email" class="text-sm sm:text-base font-encode-sans text-slate-900">{{ __('Email Address') }}</label>
                </div>

                <input id="email" type="email"
                    class="appearance-none border p-1 rounded-md w-full bg-neutral-100 @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback font-encode-sans font-normal text-red-500 text-sm sm:text-base" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mt-4">
                <div> <label for="password" class="text-sm sm:text-base font-encode-sans text-slate-900">{{ __('Password') }}</label>
                </div>
                <input id="password" type="password"
                    class="appearance-none border p-1 w-full rounded-md bg-neutral-100 @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback font-encode-sans font-normal text-red-500 text-sm sm:text-base" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            <div class="text-sm sm:text-base mt-7 flex items-center">
                <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="font-encode-sans text-slate-900 ml-2" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>

            <div class="mt-7 text-center">
                <button type="submit"
                    class="border-2 border-pink-400 font-bold font-encode-sans hover:bg-pink-400 hover:text-white text-pink-400 px-8 py-2 rounded-full">
                    {{ __('Login') }}
                </button>
            </div>
            @if (Route::has('password.request'))
            <div class="text-center mt-3">
                <a class="text-sm sm:text-base text-sky-500 font-encode-sans text-center" href="{{ route('password.request') }}">
                    {{ __('Lupa Password?') }}
                </a>
            </div>
            @endif
        </form>
    </div>
</div>
@endsection
