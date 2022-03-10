@extends('layouts.app')

@section('content')
<div class="min-h-screen sm:flex sm:justify-center px-3 pt-4">
    <div class="bg-white rounded-lg sm:w-vw-70 xl:w-vw-50 shadow-md sm:py-5 sm:px-8 px-3 py-4">
        <h1 class="font-concert-one text-3xl sm:text-4xl text-center text-sky-500">Registration</h1>
        <p class="text-gray-400 font-encode-sans text-sm sm:text-base text-clip mt-3">
            Dengan melakukan registrasi, maka data Anda akan tersimpan dalam sistem kami.
            Untuk selanjutnya bila Anda berbelanja, Anda hanya perlu login dan tidak perlu setiap kali mengisi ulang
            alamat dan data lainnya.
            <br> <br>
            Data yang Anda berikan TIDAK akan diberikan kepada pihak lain untuk kepentingan APAPUN juga.
            Untuk menjaga kepercayaan Anda, kami akan menjaga kerahasiaan data Anda.
        </p>

        <form method="POST" action="{{ route('register') }}" class="mt-7">
            @csrf
            <h6 class="font-encode-sans font-bold text-slate-900">
                Login and Password
            </h6>
            <div class="mt-4">
                <div>
                    <label for="email"
                        class="text-sm sm:text-base font-encode-sans text-slate-900">{{ __('Email Address') }}</label>
                </div>

                <input id="email" type="email"
                    class="appearance-none border p-1 rounded-md w-full border-sky-500 @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback text-red-500 font-light font-encode-sans text-sm sm:text-base"
                    role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mt-4">
                <div> <label for="password"
                        class="text-sm sm:text-base font-encode-sans text-slate-900">{{ __('Password') }}</label>
                </div>
                <input id="password" type="password"
                    class="appearance-none border p-1 w-full rounded-md border-sky-500 @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback text-red-500 font-light font-encode-sans text-sm sm:text-base"
                    role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>
            <div class="mt-4">
                <div> <label for="password-confirm"
                        class="text-sm sm:text-base font-encode-sans text-slate-900">{{ __('Confirm Password') }}</label>
                </div>
                <input id="password-confirm" type="password"
                    class="appearance-none border p-1 w-full rounded-md border-sky-500 @error('password') is-invalid @enderror"
                    name="password_confirmation" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback text-red-500 font-normal font-encode-sans text-sm sm:text-base"
                    role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            <h6 class="font-encode-sans font-bold mt-7 text-slate-900">
                Personal Data
            </h6>

            <div class="mt-4 grid grid-cols-2 gap-3">
                <div class="w-full">
                    <div> <label for="name" class="text-sm sm:text-base font-encode-sans text-slate-900">Name</label>
                    </div>
                    <input id="name" type="text" class="appearance-none border p-1 w-full rounded-md border-sky-500"
                        name="name">

                </div>
                <div class="w-full">
                    <div> <label for="last-name" class="text-sm sm:text-base font-encode-sans text-slate-900">Last
                            Name</label>
                    </div>
                    <input id="last-name" type="text"
                        class="appearance-none border p-1 w-full rounded-md border-sky-500" name="lastname">
                </div>
            </div>
            <div class="mt-4">
                <div> <label for="address" class="text-sm sm:text-base font-encode-sans text-slate-900">Address</label>
                </div>
                <textarea id="address" type="text" class="appearance-none border p-1 w-full rounded-md border-sky-500"
                    name="alamat"></textarea>
            </div>
            <div class="mt-4">
                <div> <label for="city" class="text-sm sm:text-base font-encode-sans text-slate-900">City</label>
                </div>
                <input id="city" type="text" class="appearance-none border p-1 w-full rounded-md border-sky-500"
                    name="kota">
            </div>
            <div class="mt-4">
                <div> <label for="postcode"
                        class="text-sm sm:text-base font-encode-sans text-slate-900">Postcode</label>
                </div>
                <input id="postcode" type="text" class="appearance-none border p-1 w-full rounded-md border-sky-500"
                    name="kodepos">
            </div>
            <div class="mt-4">
                <div> <label for="country" class="text-sm sm:text-base font-encode-sans text-slate-900">Country</label>
                </div>
                <select id="country" type="text" class="appearance-none border p-1 w-full rounded-md border-sky-500"
                    name="negara">
                    <option value="Indonesia">Indonesia</option>
                </select>
            </div>
            <div class="mt-4">
                <div> <label for="provinsi-indo"
                        class="text-sm sm:text-base font-encode-sans text-slate-900">Provinsi</label>
                </div>
                <select id="provinsi-indo" class="appearance-none border p-1 w-full rounded-md border-sky-500"
                    name="propinsi">
                    <option value="Indonesia"> Indonesia</option>
                </select>
            </div>
            <div class="mt-4">
                <div> <label for="provinsi-notindo"
                        class="text-sm sm:text-base font-encode-sans text-slate-900">Provinsi (Selain Indonesia)</label>
                </div>
                <input id="provinsi-notindo" type="text"
                    class="appearance-none border p-1 w-full rounded-md border-sky-500" name="kodepos">
            </div>
            <div class="mt-4">
                <div> <label for="phone" class="text-sm sm:text-base font-encode-sans text-slate-900">Phone</label>
                </div>
                <input id="phone" type="text" class="appearance-none border p-1 w-full rounded-md border-sky-500"
                    name="telp">
            </div>
            <div class="mt-4">
                <div> <label for="mobile" class="text-sm sm:text-base font-encode-sans text-slate-900">Mobile</label>
                </div>
                <input id="mobile" type="text" class="appearance-none border p-1 w-full rounded-md border-sky-500"
                    name="hp">
            </div>

            <div class="mt-7 text-center">
                <button type="submit"
                    class="border-2 border-pink-400 font-bold font-encode-sans hover:bg-pink-400 hover:text-white text-pink-400 px-8 py-2 rounded-full">
                    {{ __('Register') }}
                </button>
            </div>
            <div class="text-center mt-3">
                <a class="text-sm sm:text-base text-sky-500 font-encode-sans text-center" href="{{ route('login') }}">
                    {{ __('Sudah punya akun? Login sekarang') }}
                </a>
            </div>
        </form>
    </div>
</div>


{{-- DUMMY LARAVEL --}}
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email">

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
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password-confirm"
                class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password">
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div> --}}
@endsection
