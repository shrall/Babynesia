@extends('layouts.app')

@section('content')

@if (config('services.app.type') == 1)
@include('inc.navbar1')
@else
@include('inc.navbar2')
@endif


@if (config('services.app.type') == 1)
<div class="sm:flex sm:justify-center px-3 pt-8 pb-14">
    <div class="bg-white rounded-lg sm:w-vw-70 xl:w-vw-50 shadow-md sm:py-5 sm:px-8 px-3 py-4">
        <h1 class="font-concert-one text-3xl sm:text-4xl text-center text-{{ $color[1] }}-500">{{ __('Reset Password') }}</h1>
        <p class="text-gray-400 font-encode-sans text-sm sm:text-base text-center">
            {{ __('Please confirm your password before continuing.') }}
        </p>
        
        <form method="POST" action="{{ route('password.confirm') }}" class="mt-7">
            @csrf

            <div class="">
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

            <div class="mt-7 text-center">
                <button type="submit"
                    class="border-2 border-{{ $color[2] }}-400 font-bold font-encode-sans hover:bg-{{ $color[2] }}-400 hover:text-white text-{{ $color[2] }}-400 px-8 py-2 rounded-full">
                    {{ __('Confirm Password') }}
                </button>
                @if (Route::has('password.request'))
            <div class="text-center mt-3">
                <a class="text-sm sm:text-base text-{{ $color[1] }}-500 font-encode-sans text-center" href="{{ route('password.request') }}">
                    {{ __('Lupa Password?') }}
                </a>
            </div>
            @endif
            </div>
        </form>
    </div>
</div>
@else
<div class="sm:flex sm:justify-center px-3 pt-8 pb-14">
    <div class="bg-white rounded-lg sm:w-vw-70 xl:w-vw-50 shadow-md sm:py-5 sm:px-8 px-3 py-4">
        <h1 class="font-concert-one text-3xl sm:text-4xl text-center text-{{ $color[1] }}-500">{{ __('Reset Password') }}</h1>
        <p class="text-gray-400 font-encode-sans text-sm sm:text-base text-center">
            {{ __('Please confirm your password before continuing.') }}
        </p>
        
        <form method="POST" action="{{ route('password.confirm') }}" class="mt-7">
            @csrf

            <div class="">
                <input id="password" type="password" placeholder="Password"
                    class="appearance-none border-b-2 p-1 w-full @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback font-encode-sans font-normal text-red-500 text-sm sm:text-base" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            <div class="mt-7 text-center">
                <button type="submit"
                    class="border-2 border-{{ $color[2] }}-400 font-bold font-encode-sans hover:bg-{{ $color[2] }}-400 hover:text-white text-{{ $color[2] }}-400 px-8 py-2 rounded-full">
                    {{ __('Confirm Password') }}
                </button>
            @if (Route::has('password.request'))
            <div class="text-center mt-3">
                <a class="text-sm sm:text-base text-gray-400 font-encode-sans text-center" href="{{ route('password.request') }}">
                    {{ __('Lupa Password?') }}
                </a>
            </div>
            @endif
            </div>
        </form>
    </div>
</div>
@endif

@if (config('services.app.type') == 1)
@include('inc.footer1')
@else
@include('inc.footer2')
@endif
@endsection

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Confirm Password') }}</div>

                <div class="card-body">
                    {{ __('Please confirm your password before continuing.') }}

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirm Password') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
