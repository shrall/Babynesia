@extends('layouts.app')
@section('content')

@include('inc.navbar2')

<div class="container mx-auto xl:px-32 px-3 xl:pt-6 xl:pb-10 pt-3 pb-5">
    @if (session('alert'))
            <div class="w-full bg-white mb-3 rounded-md shadow-sm py-2 px-3">
                <p class="font-encode-sans text-red-500 text-center">
                    {{ session('alert') }}
                </p>
            </div>
        @endif
    <div class="w-full bg-white rounded-md shadow-sm py-2 px-3">
        <p class="text-{{ $color[1] }}-600 text-sm sm:text-base font-encode-sans">
            <a href="#" class="text-gray-400">Cart > </a>
            <a href="#">Receiver</a>
        </p>
        <h1 class="font-concert-one text-3xl text-{{ $color[1] }}-600 xl:text-4xl">
            Receiver
        </h1>
    </div>
    <form action="{{ 
        // route('user.paymentart.index')
        route('user.detailcart.index')
    }}" method="get">
        @csrf
        <div class="xl:flex xl:justify-between">
            <div class="w-full bg-white rounded-md shadow-sm mt-3 px-3 pt-3 pb-7 xl:px-4 xl:w-5/6">
                <h6 class="mt-4 font-encode-sans font-bold text-slate-900">Opsi Dropship</h6>
                <div class="px-4 mt-3">
                    <div class="">
                        <input type="checkbox" {{ config('services.app.type') != 1 ? 'checked' : '' }} name="dropship" id="dropship" class="peer cursor-pointer" value="yes">
                        <label for="dropship"
                            class="ml-1 text-sm sm:text-base font-encode-sans text-slate-900 cursor-pointer">Dropship (Opsional)</label>
                        <div class="mt-3 peer-checked:block hidden">
                            <div> <label for="pengirim"
                                    class="text-sm font-encode-sans text-gray-400">Sender Name</label>
                            </div>
                            <input id="pengirim" type="text" placeholder="Masukkan nama pengirim"
                                class="appearance-none border-b-2 p-1 w-full"
                                name="pengirim_name" value="{{ Auth::user()->name }}">
                        </div>
                        <div class="mt-4 peer-checked:block hidden">
                            <div> <label for="pengirimaddress"
                                    class="text-sm font-encode-sans text-gray-400">Sender Address</label>
                            </div>
                            <textarea id="pengirimaddress" type="text" placeholder="Masukkan alamat pengirim"
                                class="appearance-none border p-1 w-full"
                                name="pengirim_address">{{ Auth::user()->alamat }}</textarea>
                        </div>
                        <div class="mt-4 peer-checked:block hidden">
                            <div> 
                                <label for="pengirimhp"
                                    class="text-sm font-encode-sans text-gray-400">Nomor
                                    Hp Pengirim</label>
                            </div>
                            <input id="pengirimhp" type="text" placeholder="Masukkan nomor hp pengirim"
                                class="appearance-none border-b-2 p-1 w-full" value="{{ Auth::user()->hp }}" name="pengirim_hp">
                        </div>
                    </div>
                </div>
                <h6 class="mt-4 font-encode-sans font-bold text-slate-900">Penerima Kiriman</h6>
                <div class="px-4 mt-3">
                    <div class="">
                        <div> <label for="receivername"
                                class="text-sm font-encode-sans text-gray-400">Receiver Name</label>
                        </div>
                        <input id="receivername" type="text" placeholder="Masukkan nama penerima"
                            class="appearance-none border-b-2 p-1 w-full" name="receiver_name" value="{{ Auth::user()->name }}" required>
                    </div>
                    <div class="mt-4">
                        <div> <label for="address"
                                class="text-sm font-encode-sans text-gray-400">Address</label>
                        </div>
                        <textarea id="address" type="text" required placeholder="Masukkan alamat"
                            class="appearance-none border-2 p-1 w-full"
                            name="address">{{ Auth::user()->alamat }}</textarea>
                    </div>
                    <div class="mt-4">
                        <div> <label for="postcode"
                                class="text-sm font-encode-sans text-gray-400">Postcode</label>
                        </div>
                        <input id="postcode" type="text" value="{{ Auth::user()->kodepos }}" required
                            class="appearance-none border-b-2 p-1 w-full" name="postcode">
                    </div>
                    
                    <div class="mt-4">
                        <div> <label for="provinces"
                                class="text-sm font-encode-sans text-gray-400">Provinsi</label>
                        </div>
                        <div class="border-2 relative">
                            <select name="province" id="provinces" class="appearance-none cursor-pointer p-1 w-full font-encode-sans" required>
                                @if ($propinsi_id == null)
                                <option value="" hidden>Pilih Provinsi</option>
                                @else
                                <option value="{{ $propinsi_id }}" hidden>{{ Auth::user()->propinsi }}</option>
                                @endif

                                @foreach ($provinces as $province)

                                <option value="{{ $province['province_id'] }}">
                                    {{ $province['province'] }}
                                </option>

                                @endforeach
                            </select>
                            <i class="bx bx-chevron-down absolute text-gray-400 right-2 top-1/2 -translate-y-1/2 m-auto"
                            aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div> <label for="cities"
                                class="text-sm font-encode-sans text-gray-400">Kota</label>
                        </div>
                        <div class="relative border-2">
                            <select name="city" id="cities" {{ $propinsi_id == null ? 'disabled' : '' }} class="peer disabled:bg-neutral-100 appearance-none cursor-pointer p-1 w-full font-encode-sans" required>
                                @if ($kota_id != null)
                                    
                                <option value="{{ $kota_id }}" hidden>{{ Auth::user()->kota }}</option>
                                
                                @endif
                                    
                                @foreach ($cities as $city)
                                    @if (!empty($city))
                                    <option value="{{ $city['city_id'] }}">{{ $city['city_name'] }}</option>
                                    @endif
                                @endforeach

                            </select>
                            <i class="peer-disabled:hidden bx bx-chevron-down absolute text-gray-400 right-2 top-1/2 -translate-y-1/2 m-auto"
                            aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div> <label for="subdistricts"
                                class="text-sm font-encode-sans text-gray-400">Kecamatan</label>
                        </div>
                        <div class="relative border-2">
                            <select name="subdistrict" id="subdistricts" {{ $kota_id == null ? 'disabled' : '' }} class="peer disabled:bg-neutral-100 appearance-none cursor-pointer p-1 w-full font-encode-sans" required>
                                @if ($subdistrict_id != null)
                                
                                <option value="{{ $subdistrict_id }}" hidden>{{ Auth::user()->kecamatan }}</option>
                                
                                @endif
                                
                                @if (!empty($subdistricts))
                                @foreach ($subdistricts as $subdistrict)
                                <option value="{{ $subdistrict['subdistrict_id'] }}">{{ $subdistrict['subdistrict_name'] }}</option>
                                @endforeach
                                @endif
                            </select>
                            <i class="peer-disabled:hidden bx bx-chevron-down absolute text-gray-400 right-2 top-1/2 -translate-y-1/2 m-auto"
                            aria-hidden="true"></i>
                        </div>
                    </div>

                    @if (Auth::user()->user_status_id != 1 && Auth::user()->user_status_id != 2)
                    <div class="mt-4">
                        <p class="text-sm sm:text-base font-encode-sans text-gray-900">Pilihan Ongkir</p>
                        <div class="ml-3">
                            <input type="radio" id="delivcheck" name="deliv_check" checked value="default" id="">
                            <label for="delivcheck" class="text-sm ml-2 sm:text-base font-encode-sans text-slate-900">
                                Input ongkir manual
                            </label>    
                        </div>

                        <div class="ml-3">
                            <input type="radio" id="delivcheck2" name="deliv_check" value="auto" id="">
                            <label for="delivcheck2" class="text-sm ml-2 sm:text-base font-encode-sans text-slate-900">
                                Otomatis hitung ongkir
                            </label>    
                        </div>
                    </div>

                    <div class="mt-4 deliver" id="manualdeliver">
                        <div> <label for="expedition2"
                            class="text-sm font-encode-sans text-gray-400">Pilihan Ongkir Manual</label>
                        </div>
                        <div class="relative border-2">
                            <select name="delivery_manual" id="expedition2" class="peer disabled:bg-neutral-100 appearance-none cursor-pointer p-1 w-full font-encode-sans" required>
                                <option value="J&T">
                                    J&T
                                </option>
                                <option value="J&T Cargo">
                                    J&T Cargo
                                </option>
                                <option value="JNE">
                                    JNE
                                </option>
                                <option value="siCepat">
                                    siCepat
                                </option>
                                <option value="POS">
                                    POS
                                </option>
                            </select>
                            <i class="bx bx-chevron-down absolute text-gray-400 right-2 top-1/2 -translate-y-1/2 m-auto"
                            aria-hidden="true"></i>
                        </div>
                        <div class="mt-4">
                            <div> <label for="manual"
                                class="text-sm font-encode-sans text-gray-400">Input Harga Ongkir</label>
                                <input type="number" name="harga_ongkir" id="manual" value="0"
                                    class="appearance-none border-b-2 p-1 w-full">
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 deliver" id="autodeliver">
                        <div> <label for="expedition"
                            class="text-sm font-encode-sans text-gray-400">Pilihan Ongkir Otomatis</label>
                        </div>
                        <div class="relative border-2">
                            <select name="delivery" id="expedition" disabled class="peer disabled:bg-neutral-100 appearance-none cursor-pointer p-1 w-full font-encode-sans" required>
                                {{-- <option value="JNE OKE">
                                    JNE OKE
                                </option>
                                <option value="JNE REG">
                                    JNE REG
                                </option>
                                <option value="JNE YES">
                                    JNE YES
                                </option> --}}
                            </select>
                            <i class="peer-disabled:hidden bx bx-chevron-down absolute text-gray-400 right-2 top-1/2 -translate-y-1/2 m-auto"
                            aria-hidden="true"></i>
                        </div>
                    </div>
                    @else
                    <input type="hidden" name="deliv_check" value="auto" id="">
                    <div class="mt-4" id="autodeliver">
                        <div> <label for="expedition"
                            class="text-sm font-encode-sans text-gray-400">Pilihan Ongkir</label>
                        </div>
                        <div class="relative border-2">
                            <select name="delivery" id="expedition" disabled class="peer disabled:bg-neutral-100 appearance-none cursor-pointer p-1 w-full font-encode-sans" required>
                                {{-- <option value="JNE OKE">
                                    JNE OKE
                                </option>
                                <option value="JNE REG">
                                    JNE REG
                                </option>
                                <option value="JNE YES">
                                    JNE YES
                                </option> --}}
                            </select>
                            <i class="peer-disabled:hidden bx bx-chevron-down absolute text-gray-400 right-2 top-1/2 -translate-y-1/2 m-auto"
                            aria-hidden="true"></i>
                        </div>
                    </div>
                    @endif

                    

                    

                    <div class="mt-4">
                        <div> <label for="phone"
                                class="text-sm font-encode-sans text-gray-400">Phone</label>
                        </div>
                        <input id="phone" type="text" required placeholder="Masukkan nomor telepon"
                            class="appearance-none border-b-2 p-1 w-full" name="phone" value="{{ Auth::user()->telp }}">
                    </div>
                    <div class="mt-4">
                        <div> <label for="handphone"
                                class="text-sm sm:text-base font-encode-sans text-slate-900">Handphone</label>
                        </div>
                        <input id="handphone" type="text" required placeholder="Masukkan nomor hp"
                            class="appearance-none border-b-2 p-1 w-full" name="hp" value="{{ Auth::user()->hp }}">
                    </div>
                </div>

                <div class="xl:hidden mt-7">
                    <div class="text-center">
                        <button type="submit"
                            class="bg-{{ $color[2] }}-400 hover:bg-{{ $color[2] }}-500 text-white font-bold font-encode-sans px-8 py-2 rounded-full">
                            Next Step
                        </button>
                    </div>
                    <div class="text-center mt-1">
                        <a href="javascript:history.back()"
                            class="font-encode-sans text-gray-400 text-sm sm:text-base">
                            Back
                        </a>
                    </div>
                </div>

            </div>

            {{-- if langsung ke confirmation --}}
            <input type="hidden" value="{{ $note }}" name="note">
            <input type="hidden" value="{{ $voucher }}" name="voucher">
            <input type="hidden" name="payment" value="1">

            <div class="hidden xl:block">
                <div class="w-full text-center mt-3">
                    <button type="submit"
                        class="w-full bg-{{ $color[2] }}-400 hover:bg-{{ $color[2] }}-500 text-white font-bold font-encode-sans px-8 py-2 rounded-full">
                        Next Step
                    </button>
                </div>
                <div class="w-full text-center mt-2">
                    <a href="javascript:history.back()"
                        class="w-full inline-block bg-gray-300 hover:bg-gray-400 hover:text-gray-300 font-bold font-encode-sans text-white px-8 py-2 rounded-full">
                        Back
                    </a>
                </div>
            </div>
        </div>

    </form>
</div>

@include('inc.footer2')

<script>
    $(document).ready(function(){
        $("div.deliver").hide();
        $("#manualdeliver").show();
        $('#delivcheck').on('change', function(){
            $("div.deliver").hide();
            if (this.checked) {
                $("#manualdeliver").show();
            }
        });

        $('#delivcheck2').on('change', function(){
            $("div.deliver").hide();
            if (this.checked) {
                $("#autodeliver").show();
            }
        });
    });
    </script>

<script>

var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

function get_shipment(subdistrict_id) {
    var hostname = "{{ request()->getHost() }}"
    var url = ""
    if (hostname.includes('www')) {
        url = "https://" + hostname
    } else {
        url = "{{ config('app.url') }}"
    }
    $.post(url + "/receiver/getshipment", {
            _token: CSRF_TOKEN,
            weight: {{ $weight }},
            subdistrict_id: subdistrict_id,
        })
        .done(function(data) {
            // $('#container-shipment').html(data);
            // refreshSummary();
            let rupiah = Intl.NumberFormat('id-ID');
            $('#expedition').prop("disabled", false);
            $('#expedition').html('');
            console.log('arraynya '+data);
            Object.values(data['costs']).forEach((element, index) => {
                $('#expedition').append('<option value="JNE ' + element.service + '|' + element['cost'][0]['value'] +
                    '"> JNE ' +
                    element.service + ' - ' + 'Rp. ' + rupiah.format(element['cost'][0]['value']) + '</option>')
            });

            $('#expedition').append('<option value="' + "Keep (maxs 3 bln)" + '|' + '0' +
                    '">' +
                    "Keep (maxs 3 bln)" + '</option>')
        })
        .fail(function(e) {
            console.log(e);
        });
}

function runShipment () {
    get_shipment($('#subdistricts').val());
};
runShipment();

$('#provinces').on('change', function(e) {
    var hostname = "{{ request()->getHost() }}"
    var url = ""
    if (hostname.includes('www')) {
        url = "https://" + hostname
    } else {
        url = "{{ config('app.url') }}"
    }

    $.post(url + "/receiver/getcity", {
            _token: CSRF_TOKEN,
            province: $('#provinces').val(),
        })
        .done(function(data) {
            // $('.tempprovince').remove();
            $('#cities').prop("disabled", false);
            // $('#expedition').prop("disabled", false);
            $('#cities').html('');
            console.log('arraynya '+data);
            Object.values(data).forEach((element, index) => {
                if (index == 0) {
                    runDistrict(element.city_id);
                }
                $('#cities').append('<option value="' + element.city_id +
                    '">' +
                    element.city_name + '</option>')
            });
        })
        .fail(function(e) {
            console.log(e);
        });
});

$('#cities').on('change', function(e) {
    var hostname = "{{ request()->getHost() }}"
    var url = ""
    if (hostname.includes('www')) {
        url = "https://" + hostname
    } else {
        url = "{{ config('app.url') }}"
    }

    $.post(url + "/receiver/getsubdistrict", {
            _token: CSRF_TOKEN,
            city: $('#cities').val(),
        })
        .done(function(data) {
            // $('.tempprovince').remove();
            $('#subdistricts').prop("disabled", false);
            // $('#expedition').prop("disabled", false);
            $('#subdistricts').html('');
            console.log('arraynya '+data);
            Object.values(data).forEach((element, index) => {
                if (index == 0) {
                    get_shipment(element.subdistrict_id);
                }
                $('#subdistricts').append('<option value="' + element.subdistrict_id +
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

    $.post(url + "/receiver/getsubdistrict", {
            _token: CSRF_TOKEN,
            city: city_id,
        })
        .done(function(data) {
            // $('.tempprovince').remove();
            $('#subdistricts').prop("disabled", false);
            // $('#expedition').prop("disabled", false);
            $('#subdistricts').html('');
            console.log('arraynya '+data);
            Object.values(data).forEach((element, index) => {
                if (index == 0) {
                    get_shipment(element.subdistrict_id);
                }
                $('#subdistricts').append('<option value="' + element.subdistrict_id +
                    '">' +
                    element.subdistrict_name + '</option>')
            });
        })
        .fail(function(e) {
            console.log(e);
        });
}

$('#subdistricts').on('change', function(e) {
    get_shipment($('#subdistricts').val())
});

</script>

@endsection
