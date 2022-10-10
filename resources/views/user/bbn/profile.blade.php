@extends('layouts.app')
@section('content')

@include('inc.navbar2')

<div
    class="xl:grid xl:grid-cols-4 xl:grid-flow-row-dense xl:gap-3 container mx-auto xl:px-32 px-3 xl:pt-6 xl:pb-10 pt-3 pb-5">
    <div>
        <div class="w-full bg-white rounded-md shadow-sm pt-3 pb-7 px-3">
            <div>
                <input type="radio" name="test" onclick="showcontent()" id="profile" value="profile" class="peer"
                    {{ $checker == 'profile' ? 'checked' : '' }} hidden>
                <label for="profile" type="button"
                    class="appearance-none peer-checked:font-bold peer-checked:text-{{ $color[1] }}-500 cursor-pointer font-encode-sans text-slate-900 hover:text-{{ $color[1] }}-500 text-sm sm:text-base ">
                    Profile Info
                </label>
            </div>
            <hr class="my-3">
            <div>
                <input type="radio" name="test" onclick="showcontent()" id="editprofile" value="edit-profile"
                    class="peer" hidden>
                <label for="editprofile" type="button"
                    class="appearance-none peer-checked:font-bold peer-checked:text-{{ $color[1] }}-500 cursor-pointer font-encode-sans text-slate-900 hover:text-{{ $color[1] }}-500 text-sm sm:text-base ">
                    Edit Profile
                </label>
            </div>
            <hr class="my-3">
            <div>
                <input type="radio" name="test" onclick="showcontent()" id="history" value="history" class="peer"
                {{ $checker == 'history' ? 'checked' : '' }} hidden>
                <label for="history" type="button"
                    class="appearance-none peer-checked:font-bold peer-checked:text-{{ $color[1] }}-500 cursor-pointer font-encode-sans text-slate-900 hover:text-{{ $color[1] }}-500 text-sm sm:text-base ">
                    History Transaksi
                </label>
            </div>

            {{-- <hr class="my-3">
            <a href="#" type="button"
                class="appearance-none font-encode-sans text-slate-900 hover:text-{{ $color[1] }}-500 text-sm sm:text-base ">
                Chat Us
            </a> --}}
            <hr class="my-3">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="font-encode-sans text-red-500 hover:text-red-600 text-sm sm:text-base ">
                    Logout
                </button>
            </form>

        </div>
    </div>

    <div id="profile_info"
        class="hidden w-full mt-3 xl:mt-0 xl:col-span-3 bg-white rounded-md shadow-sm pt-3 pb-7 px-3">
        <h1 class="font-concert-one text-{{ $color[1] }}-600 text-3xl sm:text-4xl">
            Profile Info
        </h1>
        <hr class="my-3">
        <div class="flex">
            <i class="bx bx-user-circle size sm:text-8xl text-6xl text-slate-900"></i>
            <div class="ml-4">
                <div class="sm:mt-4">
                    <h1 class="font-concert-one text-{{ $color[1] }}-600 text-3xl sm:text-4xl">
                        {{ Auth::user()->name . " " . Auth::user()->lastname }}
                    </h1>
                    <p class="mt-1 font-encode-sans text-gray-400 text-sm sm:text-base">
                        {{ Auth::user()->email }}
                    </p>
                </div>
                <div class="mt-6">
                    <p class="font-encode-sans text-gray-400 text-sm sm:text-base">
                        Address
                    </p>
                    <p class="font-encode-sans text-slate-900 text-sm sm:text-base">
                        {{ Auth::user()->alamat }}
                    </p>
                </div>
                <div class="mt-4 flex">
                    <div>
                        <div>
                            <p class="font-encode-sans text-gray-400 text-sm sm:text-base">
                                Country
                            </p>
                            <p class="font-encode-sans font-bold text-slate-900 text-sm sm:text-base">
                                {{ Auth::user()->negara }}
                            </p>
                        </div>
                        <div class="mt-4">
                            <p class="font-encode-sans text-gray-400 text-sm sm:text-base">
                                Kota
                            </p>
                            <p class="font-encode-sans font-bold text-slate-900 text-sm sm:text-base">
                                {{ Auth::user()->kota }}
                            </p>
                        </div>
                        <div class="mt-4">
                            <p class="font-encode-sans text-gray-400 text-sm sm:text-base">
                                Phone
                            </p>
                            <p class="font-encode-sans font-bold text-slate-900 text-sm sm:text-base">
                                {{ Auth::user()->telp }}
                            </p>
                        </div>
                    </div>
                    <div class="ml-20 xl:ml-48">
                        <div>
                            <p class="font-encode-sans text-gray-400 text-sm sm:text-base">
                                Province
                            </p>
                            <p class="font-encode-sans font-bold text-slate-900 text-sm sm:text-base">
                                {{ Auth::user()->propinsi }}
                            </p>
                        </div>
                        <div class="mt-4">
                            <p class="font-encode-sans text-gray-400 text-sm sm:text-base">
                                Post Code
                            </p>
                            <p class="font-encode-sans font-bold text-slate-900 text-sm sm:text-base">
                                {{ Auth::user()->kodepos }}
                            </p>
                        </div>
                        <div class="mt-4">
                            <p class="font-encode-sans text-gray-400 text-sm sm:text-base">
                                Handphone
                            </p>
                            <p class="font-encode-sans font-bold text-slate-900 text-sm sm:text-base">
                                {{ Auth::user()->hp }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="profile_edit"
        class="hidden w-full mt-3 xl:mt-0 xl:col-span-3 bg-white rounded-md shadow-sm pt-3 pb-7 px-3">
        <h1 class="font-concert-one text-{{ $color[1] }}-500 text-3xl sm:text-4xl">
            Edit Profile
        </h1>
        <hr class="my-3">
        <form method="POST" action="{{ route('user.user.update', Auth::user()) }}" class="mt-7">
            @csrf
            @method('PATCH')
            <h6 class="font-encode-sans font-bold mt-7 text-slate-900">
                Personal Data
            </h6>

            <div class="mt-4 grid grid-cols-2 gap-3">
                <div class="w-full">
                    <div> <label for="name" class="text-sm font-encode-sans text-gray-400">Name</label>
                    </div>
                    <input id="name" type="text" placeholder="Masukkan nama" class="appearance-none border-b-2 p-1 w-full"
                        name="name" value="{{ Auth::user()->name }}" required>

                </div>
                <div class="w-full">
                    <div> <label for="last-name" class="text-sm font-encode-sans text-gray-400">Last
                            Name</label>
                    </div>
                    <input id="last-name" type="text" placeholder="Last name"
                        class="appearance-none border-b-2 p-1 w-full" required
                        value="{{ Auth::user()->lastname }}" name="lastname">
                </div>
            </div>
            <div class="mt-4">
                <div> <label for="address" class="text-sm font-encode-sans text-gray-400">Address</label>
                </div>
                <textarea id="address" type="text" class="appearance-none border-2 p-1 w-full"
                    name="alamat" required>{{ Auth::user()->alamat }}</textarea>
            </div>
            <div class="mt-4">
                <div> <label for="postcode"
                        class="text-sm font-encode-sans text-gray-400">Postcode</label>
                </div>
                <input id="postcode" type="text" class="appearance-none border-b-2 p-1 w-full"
                    name="kodepos" required value="{{ Auth::user()->kodepos }}">
            </div>
            <div class="mt-4">
                <div> <label for="countryselection" class="text-sm font-encode-sans text-gray-400">Country</label>
                </div>
                <div class="relative border-2">
                    <select id="countryselection" type="text"
                        class="appearance-none cursor-pointer p-1 w-full" name="negara">
                        @if (Auth::user()->negara != "Indonesia")
                        <option hidden value="{{ Auth::user()->negara }}">{{ Auth::user()->negara }}</option>
                        @endif
                        @foreach ($countries as $country)
                        <option value="{{ $country->name }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                    <i class="bx bx-chevron-down absolute text-gray-400 right-2 top-1/2 -translate-y-1/2 m-auto"
                        aria-hidden="true"></i>
                </div>
            </div>
                
            <div class="country" id="showIndonesia">
                <div class="mt-4">
                    <div> <label for="provinsi-indo" class="text-sm font-encode-sans text-gray-400">Provinsi
                            (Indonesia)</label>
                    </div>
                    <div class="relative border-2">
                        <select id="provinsi-indo"
                            class="appearance-none cursor-pointer p-1 w-full" name="propinsi">
                            <option hidden value="{{ Auth::user()->propinsi }}">{{ Auth::user()->propinsi }}</option>
                            @foreach ($provinces as $province)
                            <option value="{{ $province['province_id'] }}">{{ $province['province'] }}</option>
                            @endforeach
                        </select>
                        <i class="bx bx-chevron-down absolute text-gray-400 right-2 top-1/2 -translate-y-1/2 m-auto"
                            aria-hidden="true"></i>
                    </div>
                </div>
                <div class="mt-4">
                    <div> <label for="city-indo" class="text-sm font-encode-sans text-gray-400">Kota
                            (Indonesia)</label>
                    </div>
                    <div class="relative border-2">
                        <select id="city-indo"
                            class="appearance-none cursor-pointer p-1 w-full" name="kota">
                            <option hidden value="{{ Auth::user()->kota }}">{{ Auth::user()->kota }}</option>
                            {{-- @foreach ($cities as $city)
                            <option value="{{ $province['province'] }}">{{ $province['province'] }}</option>
                            @endforeach --}}
                        </select>
                        <i class="bx bx-chevron-down absolute text-gray-400 right-2 top-1/2 -translate-y-1/2 m-auto"
                            aria-hidden="true"></i>
                    </div>
                </div>
                <div class="mt-4">
                    <div> <label for="subdistricts"
                            class="text-sm font-encode-sans text-gray-400">Kecamatan (Indonesia)</label>
                    </div>
                    <div class="relative border-2">
                        <select name="subdistrict" id="subdistricts" {{ empty(Auth::user()->kecamatan) ? 'disabled' : '' }} class="peer disabled:bg-neutral-100 appearance-none cursor-pointer p-1 w-full font-encode-sans">
                            <option hidden value="{{ Auth::user()->kecamatan }}">{{ Auth::user()->kecamatan }}</option>
                        </select>
                        <i class="peer-disabled:hidden bx bx-chevron-down absolute text-gray-400 right-2 top-1/2 -translate-y-1/2 m-auto"
                        aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="country" id="showOther">
                <div class="mt-4">
                    <div> <label for="provinsi-notindo"
                            class="text-sm font-encode-sans text-gray-400">Provinsi (Selain Indonesia)</label>
                    </div>
                    <input id="provinsi-notindo" type="text" placeholder="Masukkan nama provinsi"
                        class="appearance-none border-b-2 p-1 w-full" name="propinsi2"
                        value="{{ Auth::user()->propinsi }}">
                </div>

                <div class="mt-4">
                    <div> <label for="city" class="text-sm font-encode-sans text-gray-400">Kota (Selain Indonesia)</label>
                    </div>
                    <input id="city" type="text" class="appearance-none border-b-2 p-1 w-full" placeholder="Masukkan nama kota"
                        name="kota2" value="{{ Auth::user()->kota }}">
                </div>
            </div>
            

            <div class="mt-4">
                <div> <label for="phone" class="text-sm font-encode-sans text-gray-400">Phone</label>
                </div>
                <input id="phone" type="text" class="appearance-none border-b-2 p-1 w-full"
                    name="telp" required value="{{ Auth::user()->telp }}">
            </div>
            <div class="mt-4">
                <div> <label for="mobile" class="text-sm font-encode-sans text-gray-400">Mobile</label>
                </div>
                <input id="mobile" type="text" class="appearance-none border-b-2 p-1 w-full"
                    name="hp" required value="{{ Auth::user()->hp }}">
            </div>
            <h6 class="mt-7 font-encode-sans font-bold text-slate-900">
                Login and Password
            </h6>
            <div class="mt-4">
                <div>
                    <label for="email"
                        class="text-sm font-encode-sans text-gray-400">{{ __('Email Address') }}</label>
                </div>

                <input id="email" type="email" placeholder="Email"
                    class="appearance-none border-b-2 p-1 rounded-md w-full disabled:bg-neutral-100 @error('email') is-invalid @enderror"
                    name="email" required autocomplete="email" autofocus
                    value="{{ Auth::user()->email }}" disabled>

                @error('email')
                <span class="invalid-feedback text-red-500 font-normal font-encode-sans text-sm sm:text-base"
                    role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mt-4">
                <div> <label for="old-password"
                        class="text-sm font-encode-sans text-gray-400">{{ __('Old Password') }}</label>
                </div>
                <input id="old-password" type="password" placeholder="Masukkan password lama"
                    class="appearance-none border-b-2 p-1 w-full @error('password') is-invalid @enderror"
                    name="old-password" autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback text-red-500 font-normal font-encode-sans text-sm sm:text-base"
                    role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mt-4">
                <div> <label for="password"
                        class="text-sm font-encode-sans text-gray-400">{{ __('New Password') }}</label>
                </div>
                <input id="password" type="password" placeholder="Masukkan password baru"
                    class="appearance-none border-b-2 p-1 w-full @error('password') is-invalid @enderror"
                    name="password" autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback text-red-500 font-normal font-encode-sans text-sm sm:text-base"
                    role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mt-4">
                <div> <label for="password-confirm"
                        class="text-sm font-encode-sans text-gray-400">{{ __('Confirm Password') }}</label>
                </div>
                <input id="password-confirm" type="password" placeholder="Konfirmasi password baru"
                    class="appearance-none border-b-2 p-1 w-full @error('password') is-invalid @enderror"
                    name="password_confirmation" autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback text-red-500 font-normal font-encode-sans text-sm sm:text-base"
                    role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mt-7 text-center">
                <button type="submit"
                    class="text-white hover:bg-{{ $color[2] }}-500 bg-{{ $color[2] }}-400 font-bold font-encode-sans px-8 py-2 rounded-full">
                    Simpan
                </button>
            </div>
        </form>
    </div>

    <div id="profile_history" class="w-full hidden mt-3 xl:mt-0 xl:col-span-3">
        <div class="w-full bg-white rounded-md shadow-sm pt-3 pb-3 px-3">
            <h1 class="font-concert-one text-{{ $color[1] }}-600 text-3xl sm:text-4xl">
                History Transaksi
            </h1>
        </div>

        @if (empty($fakturs[0]))
        <div class="w-full bg-white rounded-md shadow-sm mt-3 px-3 pt-3 h-vh-50 pb-5 flex justify-center items-center">
            <p class="font-encode-sans text-gray-400 text-sm sm:text-base">
                Tidak ada data history transaksi
            </p>
        </div>
        @endif

        @foreach ($fakturs as $faktur)

        <div class="w-full bg-white rounded-md shadow-sm mt-3 px-3 py-5">
            <div class="sm:flex sm:justify-between ">
                <div class="">
                    <p class="text-gray-400 font-encode-sans text-sm sm:text-base">
                        @if (!empty($faktur->sender_name))
                        <span class="text-red-500 font-bold"> Dropship </span>   
                        <br> 
                        @endif
                        Invoice No. <span class="text-slate-900 font-bold">{{ $faktur->no_faktur }}</span> 
                        
                        
                        {{-- <a href="#">
                            <i class="fa fa-copy ml-1 text-{{ $color[0] }}-400 border p-1 hover:text-{{ $color[0] }}-500 hover:border-{{ $color[0] }}-500 rounded-md border-{{ $color[0] }}-400"
                                aria-hidden="true"></i>
                        </a> --}}
                    </p>
                    <p class="my-2 py-1 px-2 w-fit font-encode-sans text-sm text-white font-bold" style="background-color: {{ $faktur->fakturstatus->color }}">
                        {{ $faktur->fakturstatus->status }}
                    </p>
                    <p class="font-encode-sans mt-1 text-sm text-gray-400 sm:text-base">
                        {{ count($faktur->items) }} barang
                    </p>
                    <p class="font-encode-sans mt-1 text-sm text-gray-400 sm:text-base">
                        <i class="bx bx-calendar" aria-hidden="true"></i>
                        {{ $faktur->tanggal }}
                    </p>

                    {{-- <h6
                        class="hidden sm:block py-1 px-2 w-fit bg-{{ $color[0] }}-300 mt-5 rounded-md font-bold font-encode-sans text-white text-sm sm:text-base">
                        {{ $faktur->deliveryExpedition }} </h6> --}}
                </div>
                <div class="hidden sm:block border-l-2 border-gray-100 pl-4 w-40">
                    <div>
                        <p class="font-encode-sans text-sm sm:text-base text-gray-400">
                            Total Harga
                        </p>
                        <h6 class="font-encode-sans font-bold text-slate-900">
                            Rp. {{ substr(number_format($faktur->total_pembayaran+intval(substr($faktur->no_faktur, -3)),2,",","."), 0, -3) }}
                        </h6>
                    </div>
                    <div class="mt-8">
                        <a href="{{ route('user.faktur.showdetail', $faktur) }}"
                            class="appearance-none xl:mt-8 py-2 px-3 text-white rounded-full hover:bg-{{ $color[2] }}-500 bg-{{ $color[2] }}-400 font-bold font-encode-sans text-sm sm:text-base">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
            <div class="sm:hidden mt-2">
                <div class="mt-2 flex justify-between items-center">
                    <div>
                        <p class="font-encode-sans text-sm sm:text-base text-gray-400">
                            Total Harga
                        </p>
                        <h6 class="font-encode-sans font-bold text-slate-900">
                            Rp. {{ substr(number_format($faktur->total_pembayaran,2,",","."), 0, -3) }}
                        </h6>
                    </div>
                    <div class="">
                        <a href="{{ route('user.faktur.showdetail', $faktur) }}"
                            class="appearance-none py-2 px-3 text-white rounded-full hover:bg-{{ $color[2] }}-500 bg-{{ $color[2] }}-400 font-bold font-encode-sans text-sm sm:text-base">
                            Lihat Detail
                        </a>
                    </div>

                </div>
            </div>
        </div>

        @endforeach

        <div class="mt-3">
            {{ $fakturs->onEachSide(1)->links('vendor.pagination.custom-2', compact('color')) }}
        </div>

    </div>

</div>

<script>
    $(document).ready(function(){
        $("div.country").hide();
        if ($('#countryselection').val() == "Indonesia") {
            $("#showIndonesia").show();
        } else {
            $("#showOther").show();
        }
        
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

<script>
    let profileCheck = document.getElementById("profile");
    let editCheck = document.getElementById("editprofile");
    let historyCheck = document.getElementById("history");

    let profile_info = document.getElementById("profile_info");
    let profile_edit = document.getElementById("profile_edit");
    let profile_history = document.getElementById("profile_history");

    if (profileCheck.checked) {
        profile_info.style.display = "block";
        profile_edit.style.display = "none";
        profile_history.style.display = "none";
    } else if (historyCheck.checked) {
            profile_edit.style.display = "none";
            profile_info.style.display = "none";
            profile_history.style.display = "block";
        }

    function showcontent() {
        if (profileCheck.checked) {
            profile_info.style.display = "block";
            profile_edit.style.display = "none";
            profile_history.style.display = "none";
        } else if (editCheck.checked) {
            profile_edit.style.display = "block";
            profile_info.style.display = "none";
            profile_history.style.display = "none";
        } else if (historyCheck.checked) {
            profile_edit.style.display = "none";
            profile_info.style.display = "none";
            profile_history.style.display = "block";
        }
    }


    // untuk province rajaongkir
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

$('#provinsi-indo').on('change', function(e) {
    var hostname = "{{ request()->getHost() }}"
    var url = ""
    if (hostname.includes('www')) {
        url = "https://" + hostname
    } else {
        url = "{{ config('app.url') }}"
    }

    $.post(url + "/receiver/getcity", {
            _token: CSRF_TOKEN,
            province: $('#provinsi-indo').val(),
        })
        .done(function(data) {
            // $('.tempprovince').remove();
            // $('#city-indo').prop("disabled", false);
            // $('#expedition').prop("disabled", false);
            $('#city-indo').html('');
            Object.values(data).forEach((element, index) => {
                if (index == 0) {
                        runDistrict(element.city_id);
                    }
                $('#city-indo').append('<option value="' + element.city_id +
                    '">' +
                    element.city_name + '</option>')
            });
        })
        .fail(function(e) {
            console.log(e);
        });
});

$('#city-indo').on('change', function(e) {
    var hostname = "{{ request()->getHost() }}"
    var url = ""
    if (hostname.includes('www')) {
        url = "https://" + hostname
    } else {
        url = "{{ config('app.url') }}"
    }

    $.post(url + "/getsubdistrict", {
            _token: CSRF_TOKEN,
            city: $('#city-indo').val(),
        })
        .done(function(data) {
            // $('.tempprovince').remove();
            $('#subdistricts').prop("disabled", false);
            // $('#expedition').prop("disabled", false);
            $('#subdistricts').html('');
            Object.values(data).forEach((element, index) => {
                $('#subdistricts').append('<option value="' + element.subdistrict_name +
                    '">' +
                    element.subdistrict_name + '</option>')
            });
        })
        .fail(function(e) {
            console.log(e);
        });
});

function runDistrict (city_id) {
    var hostname = "{{ request()->getHost() }}"
    var url = ""
    if (hostname.includes('www')) {
        url = "https://" + hostname
    } else {
        url = "{{ config('app.url') }}"
    }

    $.post(url + "/getsubdistrict", {
            _token: CSRF_TOKEN,
            city: city_id
        })
        .done(function(data) {
            // $('.tempprovince').remove();
            $('#subdistricts').prop("disabled", false);
            // $('#expedition').prop("disabled", false);
            $('#subdistricts').html('');
            Object.values(data).forEach((element, index) => {
                $('#subdistricts').append('<option value="' + element.subdistrict_name +
                    '">' +
                    element.subdistrict_name + '</option>')
            });
        })
        .fail(function(e) {
            console.log(e);
        });
}
    

</script>

@include('inc.footer2')
@endsection
