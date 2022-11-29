@extends('layouts.app')

@section('content')
@include('inc.navbar1')
<div class="min-h-screen sm:flex sm:justify-center px-3 pt-8 pb-14">
    <div class="bg-white rounded-lg sm:w-vw-70 xl:w-vw-50 shadow-md sm:py-5 sm:px-8 px-3 py-4">
        <h1 class="font-concert-one text-3xl sm:text-4xl text-center text-{{ $color[1] }}-500">Registration</h1>
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
                    class="appearance-none border p-1 rounded-md w-full bg-neutral-100 @error('email') is-invalid @enderror"
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
                    class="appearance-none border p-1 w-full rounded-md bg-neutral-100 @error('password') is-invalid @enderror"
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
                    class="appearance-none border p-1 w-full rounded-md bg-neutral-100 @error('password') is-invalid @enderror"
                    name="password_confirmation" required autocomplete="new-password">

                {{-- @error('password')
                <span class="invalid-feedback text-red-500 font-normal font-encode-sans text-sm sm:text-base"
                    role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror --}}

            </div>

            <h6 class="font-encode-sans font-bold mt-7 text-slate-900">
                Personal Data
            </h6>

            <div class="mt-4 grid grid-cols-2 gap-3">
                <div class="w-full">
                    <div> <label for="name" class="text-sm sm:text-base font-encode-sans text-slate-900">Name</label>
                    </div>
                    <input id="name" type="text" class="appearance-none border p-1 w-full rounded-md bg-neutral-100"
                        name="name">

                </div>
                <div class="w-full">
                    <div> <label for="last-name" class="text-sm sm:text-base font-encode-sans text-slate-900">Last
                            Name</label>
                    </div>
                    <input id="last-name" type="text"
                        class="appearance-none border p-1 w-full rounded-md bg-neutral-100" name="lastname">
                </div>
            </div>
            <div class="mt-4">
                <div> <label for="address" class="text-sm sm:text-base font-encode-sans text-slate-900">Address</label>
                </div>
                <textarea id="address" type="text" class="appearance-none border p-1 w-full rounded-md bg-neutral-100"
                    name="alamat"></textarea>
            </div>
            <div class="mt-4">
                <div> <label for="postcode"
                        class="text-sm sm:text-base font-encode-sans text-slate-900">Postcode</label>
                </div>
                <input id="postcode" type="text" class="appearance-none border p-1 w-full rounded-md bg-neutral-100"
                    name="kodepos">
            </div>
            <div class="mt-4">
                <div> <label for="countryselection" class="text-sm sm:text-base font-encode-sans text-slate-900">Country</label>
                </div>
                <div class="relative border rounded-md">
                    <select id="countryselection" type="text"
                        class="appearance-none cursor-pointer p-1 w-full rounded-md bg-neutral-100" name="negara">
                        @foreach ($countries as $country)
                        <option value="{{ $country->name }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                    <i class="fa fa-chevron-down absolute text-gray-400 right-2 top-1/2 -translate-y-1/2 m-auto"
                        aria-hidden="true"></i>
                </div>

            </div>

                <div class="country" id="showIndonesia">
                    <div class="mt-4">
                        <div> <label for="provinsi-indo"
                                class="ml-2 text-sm sm:text-base font-encode-sans text-slate-900">Provinsi
                                (Indonesia)</label>
                        </div>
                        <div class="relative border rounded-md">
                            <select id="provinsi-indo"
                                class="appearance-none cursor-pointer p-1 w-full rounded-md bg-neutral-100"
                                name="propinsi">
                                <option value="" hidden>Pilih provinsi</option>
                                @foreach ($provinces as $province)
                                <option value="{{ $province['province_id'] }}">{{ $province['province'] }}</option>
                                @endforeach
                            </select>
                            <i class="fa fa-chevron-down absolute text-gray-400 right-2 top-1/2 -translate-y-1/2 m-auto"
                                aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div> <label for="city-indo" class="text-sm sm:text-base font-encode-sans text-slate-900">Kota
                                (Indonesia)</label>
                        </div>
                        <div class="relative border rounded-md">
                            <select id="city-indo" disabled
                                class="appearance-none cursor-pointer p-1 w-full rounded-md disabled:bg-neutral-300 bg-neutral-100" name="kota">
                                {{-- @foreach ($cities as $city)
                            <option value="{{ $province['province'] }}">{{ $province['province'] }}</option>
                                @endforeach --}}
                            </select>
                            <i class="fa fa-chevron-down peer-disabled:hidden absolute text-gray-400 right-2 top-1/2 -translate-y-1/2 m-auto"
                                aria-hidden="true"></i>
                        </div>
                    </div>
                </div>

                <div class="country" id="showOther">
                    <div class="mt-4">
                        <div> <label for="provinsi-notindo"
                                class="text-sm sm:text-base font-encode-sans text-slate-900">Provinsi (Selain
                                Indonesia)</label>
                        </div>
                        <input id="provinsi-notindo" type="text"
                            class="appearance-none border p-1 w-full rounded-md bg-neutral-100" name="propinsi2">
                    </div>

                    <div class="mt-4">
                        <div> <label for="city" class="text-sm sm:text-base font-encode-sans text-slate-900">Kota
                                (Selain Indonesia)</label>
                        </div>
                        <input id="city" type="text" class="appearance-none border p-1 w-full rounded-md bg-neutral-100"
                            name="kota2">
                    </div>
                </div>
            <div class="mt-4">
                <div> <label for="phone" class="text-sm sm:text-base font-encode-sans text-slate-900">Phone</label>
                </div>
                <input id="phone" type="text" class="appearance-none border p-1 w-full rounded-md bg-neutral-100"
                    name="telp">
            </div>
            <div class="mt-4">
                <div> <label for="mobile" class="text-sm sm:text-base font-encode-sans text-slate-900">Mobile</label>
                </div>
                <input id="mobile" type="text" class="appearance-none border p-1 w-full rounded-md bg-neutral-100"
                    name="hp">
            </div>

            {{-- Captcha --}}
            <div class="mt-4">
                <div> <label for="captcha-form"
                        class="text-sm sm:text-base font-encode-sans text-slate-900">Captcha</label>
                </div>
                <div class="my-2 flex items-end">
                    <span id="captcha-img">
                        {!! captcha_img('flat') !!}
                    </span>
                    <button type="button"
                        class="ml-2 py-1 px-2 bg-{{ $color[0] }}-300 hover:bg-{{ $color[0] }}-400 rounded-md text-white aspect-square h-fit text-xl"
                        id="reload">
                        &#x21bb;
                    </button>

                </div>
                <input id="captcha-form" type="text" class="appearance-none border p-1 w-full rounded-md bg-neutral-100"
                    name="captcha">
                @error('captcha')
                <span class="invalid-feedback text-red-500 font-light font-encode-sans text-sm sm:text-base"
                    role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            {{-- End Captcha --}}

            <div class="mt-7 text-center">
                <button type="submit"
                    class="border-2 border-{{ $color[2] }}-400 font-bold font-encode-sans hover:bg-{{ $color[2] }}-400 hover:text-white text-{{ $color[2] }}-400 px-8 py-2 rounded-full">
                    {{ __('Register') }}
                </button>
            </div>
            <div class="text-center mt-3">
                <a class="text-sm sm:text-base text-{{ $color[1] }}-500 font-encode-sans text-center"
                    href="{{ route('login') }}">
                    {{ __('Sudah punya akun? Login sekarang') }}
                </a>
            </div>
        </form>
    </div>
</div>

@push('scripts')

<script>
$(document).ready(function(){
    $("div.country").hide();
    $("#showIndonesia").show();
    $('#countryselection').on('change', function(){
        var countryvalue = $(this).val(); 
        $("div.country").hide();
        if (countryvalue == "Indonesia") {
            $("#show"+countryvalue).show();
        } else {
            $("#showOther").show();
        }
    });
});
</script>

<script type="text/javascript">

    $("#reload").click(function (e) {
        e.preventDefault();
        $.ajax({
            url: "reload",
            type: 'GET',
            dataType: 'html',
            success: function (res) {
                $('#captcha-img').html(res);
            }
        });
    });

    // untuk province rajaongkir
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $('#provinsi-indo').on('change', function (e) {
        var hostname = "{{ request()->getHost() }}"
        var url = ""
        if (hostname.includes('www')) {
            url = "https://" + hostname
        } else {
            url = "{{ config('app.url') }}"
        }

        $.post(url + "/getcity", {
                _token: CSRF_TOKEN,
                province: $('#provinsi-indo').val(),
            })
            .done(function (data) {
                // $('.tempprovince').remove();
                $('#city-indo').prop("disabled", false);
                // $('#expedition').prop("disabled", false);
                $('#city-indo').html('');
                console.log('arraynya ' + data);
                Object.values(data).forEach((element, index) => {
                    $('#city-indo').append('<option value="' + element.city_name +
                        '">' +
                        element.city_name + '</option>')
                });
            })
            .fail(function (e) {
                console.log(e);
            });
    });

</script>

@endpush


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
@include('inc.footer1')
@endsection
