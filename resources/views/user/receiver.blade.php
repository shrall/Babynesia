@extends('layouts.app')
@section('content')

@include('inc.navbar1')

<div class="container mx-auto xl:px-32 px-3 xl:pt-6 xl:pb-10 pt-3 pb-5">
    <div class="w-full bg-white rounded-md shadow-sm py-2 px-3">
        <p class="text-{{ $color[1] }}-500 text-sm sm:text-base font-encode-sans">
            <a href="#" class="text-gray-400">Cart > </a>
            <a href="#">Receiver</a>
        </p>
        <h1 class="font-concert-one text-3xl text-{{ $color[1] }}-500 xl:text-4xl">
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
                        <input type="checkbox" name="dropship" id="dropship" class="peer cursor-pointer" value="yes">
                        <label for="dropship"
                            class="ml-1 text-sm sm:text-base font-encode-sans text-slate-900 cursor-pointer">Dropship (Opsional)</label>
                        <div class="mt-3 peer-checked:block hidden">
                            <div> <label for="pengirim"
                                    class="text-sm sm:text-base font-encode-sans text-slate-900">Sender Name</label>
                            </div>
                            <input id="pengirim" type="text"
                                class="appearance-none border p-1 w-full rounded-md bg-neutral-100"
                                name="pengirim_name" value="{{ Auth::user()->name }}">
                        </div>
                        <div class="mt-4 peer-checked:block hidden">
                            <div> <label for="pengirimaddress"
                                    class="text-sm sm:text-base font-encode-sans text-slate-900">Sender Address</label>
                            </div>
                            <textarea id="pengirimaddress" type="text"
                                class="appearance-none border p-1 w-full rounded-md bg-neutral-100"
                                name="pengirim_address">{{ Auth::user()->alamat }}</textarea>
                        </div>
                        <div class="mt-4 peer-checked:block hidden">
                            <div> 
                                <label for="pengirimhp"
                                    class="text-sm sm:text-base font-encode-sans text-slate-900">Nomor
                                    Hp Pengirim</label>
                            </div>
                            <input id="pengirimhp" type="text"
                                class="appearance-none border p-1 w-full rounded-md bg-neutral-100" value="{{ Auth::user()->hp }}" name="pengirim_hp">
                        </div>
                    </div>
                </div>
                <h6 class="mt-4 font-encode-sans font-bold text-slate-900">Penerima Kiriman</h6>
                <div class="px-4 mt-3">
                    <div class="">
                        <div> <label for="receivername"
                                class="text-sm sm:text-base font-encode-sans text-slate-900">Receiver Name</label>
                        </div>
                        <input id="receivername" type="text"
                            class="appearance-none border p-1 w-full rounded-md bg-neutral-100" name="receiver_name" value="{{ Auth::user()->name }}" required>
                    </div>
                    <div class="mt-4">
                        <div> <label for="address"
                                class="text-sm sm:text-base font-encode-sans text-slate-900">Address</label>
                        </div>
                        <textarea id="address" type="text" required
                            class="appearance-none border p-1 w-full rounded-md bg-neutral-100"
                            name="address">{{ Auth::user()->alamat }}</textarea>
                    </div>
                    <div class="mt-4">
                        <div> <label for="postcode"
                                class="text-sm sm:text-base font-encode-sans text-slate-900">Postcode</label>
                        </div>
                        <input id="postcode" type="text" required
                            class="appearance-none border p-1 w-full rounded-md bg-neutral-100" name="postcode">
                    </div>
                    
                    <div class="mt-4">
                        <div> <label for="provinces"
                                class="text-sm sm:text-base font-encode-sans text-slate-900">Province</label>
                        </div>
                        <div class="border relative rounded-md">
                            <select name="province" id="provinces" class="bg-neutral-100 appearance-none cursor-pointer p-1 w-full font-encode-sans" required>
                                <option value="" hidden>Pilih provinsi</option>

                                @foreach ($provinces as $province)
                                    
                                <option value="{{ $province['province_id'] }}">
                                    {{ $province['province'] }}
                                </option>
    
                                @endforeach
                            </select>
                            <i class="fa fa-chevron-down absolute text-gray-400 right-2 top-1/2 -translate-y-1/2 m-auto"
                            aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div> <label for="cities"
                                class="text-sm sm:text-base font-encode-sans text-slate-900">City</label>
                        </div>
                        <div class="relative border rounded-md">
                            <select name="city" id="cities" disabled class="peer disabled:bg-neutral-300 bg-neutral-100 appearance-none cursor-pointer p-1 w-full font-encode-sans" required>
                                {{-- @foreach ($cities as $city)
                                    
                                <option value="{{ $city['city_id'] }}" onChange="get_shipment({{ $city['city_id'] }})">
                                    {{ $city['city_name'] }}
                                </option>
    
                                @endforeach --}}
                            </select>
                            <i class="peer-disabled:hidden fa fa-chevron-down absolute text-gray-400 right-2 top-1/2 -translate-y-1/2 m-auto"
                            aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div> <label for="expedition"
                                class="text-sm sm:text-base font-encode-sans text-slate-900">Ekspedisi Delivery</label>
                        </div>
                        <div class="relative border rounded-md">
                            <select name="delivery" id="expedition" disabled class="peer disabled:bg-neutral-300 bg-neutral-100 appearance-none cursor-pointer p-1 w-full font-encode-sans" required>
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
                            <i class="peer-disabled:hidden fa fa-chevron-down absolute text-gray-400 right-2 top-1/2 -translate-y-1/2 m-auto"
                            aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div> <label for="phone"
                                class="text-sm sm:text-base font-encode-sans text-slate-900">Phone</label>
                        </div>
                        <input id="phone" type="text" required
                            class="appearance-none border p-1 w-full rounded-md bg-neutral-100" name="phone" value="{{ Auth::user()->telp }}">
                    </div>
                    <div class="mt-4">
                        <div> <label for="handphone"
                                class="text-sm sm:text-base font-encode-sans text-slate-900">Handphone</label>
                        </div>
                        <input id="handphone" type="text" required
                            class="appearance-none border p-1 w-full rounded-md bg-neutral-100" name="hp" value="{{ Auth::user()->hp }}">
                    </div>
                </div>

                <div class="xl:hidden mt-7">
                    <input type="hidden" value="{{ $note }}" name="note">
                    <div class="text-center">
                        <button type="submit"
                            class="border-2 border-{{ $color[2] }}-400 font-bold font-encode-sans hover:text-white hover:bg-{{ $color[2] }}-400 text-{{ $color[2] }}-400 px-8 py-2 rounded-full">
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
            <input type="hidden" name="payment" value="1">

            <div class="hidden xl:block">
                <div class="w-full text-center mt-3">
                    <button type="submit"
                        class="w-full inline-block border-2 border-{{ $color[2] }}-400 hover:bg-{{ $color[2] }}-400 hover:text-white bg-white font-bold font-encode-sans text-{{ $color[2] }}-400 px-8 py-2 rounded-full">
                        Next Step
                    </button>
                </div>
                <div class="w-full text-center mt-2">
                    <a href="javascript:history.back()"
                        class="w-full inline-block border-2 border-gray-400 hover:bg-neutral-100 hover:border-gray-300 hover:text-gray-300 bg-white font-bold font-encode-sans text-gray-400 px-8 py-2 rounded-full">
                        Back
                    </a>
                </div>
            </div>
        </div>

    </form>
</div>

@include('inc.footer1')

<script>

var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

function get_shipment(city_id) {
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
            city_id: city_id,
        })
        .done(function(data) {
            // $('#container-shipment').html(data);
            // refreshSummary();
            let rupiah = Intl.NumberFormat('id-ID');
            $('#expedition').prop("disabled", false);
            $('#expedition').html('');
            console.log('arraynya '+data);
            Object.values(data['costs']).forEach((element, index) => {
                $('#expedition').append('<option value="' + element.service + '|' + element['cost'][0]['value'] +
                    '"> JNE ' +
                    element.service + ' - ' + 'Rp. ' + rupiah.format(element['cost'][0]['value']) + '</option>')
            });
        })
        .fail(function(e) {
            console.log(e);
        });
}

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
            $('#expedition').prop("disabled", false);
            $('#cities').html('');
            console.log('arraynya '+data);
            Object.values(data).forEach((element, index) => {
                if (index == 0) {
                    get_shipment(element.city_id);
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
    get_shipment($('#cities').val())
});

</script>

@endsection
