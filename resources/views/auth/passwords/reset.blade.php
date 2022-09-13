@extends('layouts.app')

@section('content')

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

        <form method="POST" action="{{ route('password.update') }}" class="mt-7">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="">
                <div>
                    <label for="email" class="text-sm sm:text-base font-encode-sans text-slate-900">{{ __('Email Address') }}</label>
                </div>

                <input id="email" type="email"
                    class="appearance-none border p-1 rounded-md w-full bg-neutral-100 @error('email') is-invalid @enderror"
                    name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

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
                    name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback font-encode-sans font-normal text-red-500 text-sm sm:text-base" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            <div class="mt-4">
                <div> <label for="password" class="text-sm sm:text-base font-encode-sans text-slate-900">{{ __('Password') }}</label>
                </div>
                <input id="password-confirm" type="password-confirmation"
                    class="appearance-none border p-1 w-full rounded-md bg-neutral-100 @error('password-confirmation') is-invalid @enderror"
                    name="password-confirm" required autocomplete="new-password">

            </div>

            <div class="mt-7 text-center">
                <button type="submit"
                    class="border-2 border-{{ $color[2] }}-400 font-bold font-encode-sans hover:bg-{{ $color[2] }}-400 hover:text-white text-{{ $color[2] }}-400 px-8 py-2 rounded-full">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
    </div>
</div>

@else

<div class="sm:flex sm:justify-center px-3 pt-8 pb-14">
    <div class="bg-white rounded-lg sm:w-vw-70 xl:w-vw-50 shadow-md sm:py-5 sm:px-8 px-3 py-4">
        <h1 class="font-concert-one text-3xl sm:text-4xl text-center text-{{ $color[1] }}-600">{{ __('Reset Password') }}</h1>

        <form method="POST" action="{{ route('password.update') }}" class="mt-7">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="">

                <input id="email" type="email" placeholder="Email Address"
                    class="appearance-none border-b-2 p-1 w-full @error('email') is-invalid @enderror"
                    name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback font-encode-sans font-normal text-red-500 text-sm sm:text-base" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mt-6">
                <input id="password" type="password" placeholder="Password"
                    class="appearance-none border-b-2 w-full @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback font-encode-sans font-normal text-red-500 text-sm sm:text-base" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            <div class="mt-6">
                <input id="password-confirm" type="password-confirmation" placeholder="Confirm Password"
                    class="appearance-none border-b-2 w-full @error('password-confirmation') is-invalid @enderror"
                    name="password-confirm" required autocomplete="new-password">

            </div>

            <div class="mt-7 text-center">
                <button type="submit"
                    class="bg-{{ $color[2] }}-400 font-bold w-full font-encode-sans hover:bg-{{ $color[2] }}-500 text-white px-8 py-3 rounded-full">
                    {{ __('Reset Password') }}
                </button>
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
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
