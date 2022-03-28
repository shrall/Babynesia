@extends('layouts.app')
@section('title', 'TokoBayiFiv')
@section('content')

@include('inc.navbar1')

<div class="container mx-auto xl:px-32 px-3 xl:pt-6 xl:pb-10 pt-3 pb-5">
    <div class="w-full bg-white rounded-md shadow-sm py-2 px-3">
        <p class="text-{{ $color[1] }}-500 text-sm sm:text-base font-encode-sans">
            <a href="{{ route('user.cart.index') }}" class="text-gray-400">Cart > </a><a
                href="{{ route('user.receiver.create') }}">Receiver</a>
        </p>
        <h1 class="font-concert-one text-3xl text-{{ $color[1] }}-500 xl:text-4xl">
            Receiver
        </h1>
    </div>
    <form action="{{ route('user.detailcart.index') }}" method="get">
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
                        {{-- <div class="hidden mt-3 peer-checked:block" id="dropship_receiver">
                            <div>
                                <label for="dropship" class="text-sm sm:text-base font-encode-sans text-slate-900">Dropship Receiver</label>
                            </div>
                            <input id="dropinput" type="text" class="appearance-none border p-1 w-full rounded-md border-{{ $color[1] }}-500"
                            name="receiver_dropship">
                        </div> --}}
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
                            class="appearance-none border p-1 w-full rounded-md bg-neutral-100" name="receiver_name" required>
                    </div>
                    <div class="mt-4">
                        <div> <label for="address"
                                class="text-sm sm:text-base font-encode-sans text-slate-900">Address</label>
                        </div>
                        <textarea id="address" type="text" required
                            class="appearance-none border p-1 w-full rounded-md bg-neutral-100"
                            name="address"></textarea>
                    </div>
                    <div class="mt-4">
                        <div> <label for="postcode"
                                class="text-sm sm:text-base font-encode-sans text-slate-900">Postcode</label>
                        </div>
                        <input id="postcode" type="text" required
                            class="appearance-none border p-1 w-full rounded-md bg-neutral-100" name="postcode">
                    </div>
                    <div class="mt-4">
                        <div> <label for="city"
                                class="text-sm sm:text-base font-encode-sans text-slate-900">City</label>
                        </div>
                        <div class="relative border rounded-md">
                            <select name="city" id="city" class="bg-neutral-100 appearance-none cursor-pointer p-1 w-full font-encode-sans">
                                @foreach ($cities as $city)
                                    
                                <option value="{{ $city['city_id'] }}">
                                    {{ $city['city_name'] }}
                                </option>
    
                                @endforeach
                            </select>
                            <i class="fa fa-chevron-down absolute text-gray-400 right-2 top-1/2 -translate-y-1/2 m-auto"
                            aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div> <label for="province"
                                class="text-sm sm:text-base font-encode-sans text-slate-900">Province</label>
                        </div>
                        <div class="border relative rounded-md">
                            <select name="province" id="province" class="bg-neutral-100 appearance-none cursor-pointer p-1 w-full font-encode-sans">
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
                        <div> <label for="expedition"
                                class="text-sm sm:text-base font-encode-sans text-slate-900">Ekspedisi Delivery</label>
                        </div>
                        <div class="relative border rounded-md">
                            <select name="delivery" id="expedition" class="bg-neutral-100 appearance-none cursor-pointer p-1 w-full font-encode-sans">
                                <option value="JNE OKE">
                                    JNE OKE
                                </option>
                                <option value="JNE REG">
                                    JNE REG
                                </option>
                                <option value="JNE YES">
                                    JNE YES
                                </option>
                            </select>
                            <i class="fa fa-chevron-down absolute text-gray-400 right-2 top-1/2 -translate-y-1/2 m-auto"
                            aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div> <label for="phone"
                                class="text-sm sm:text-base font-encode-sans text-slate-900">Phone</label>
                        </div>
                        <input id="phone" type="text" required
                            class="appearance-none border p-1 w-full rounded-md bg-neutral-100" name="phone">
                    </div>
                    <div class="mt-4">
                        <div> <label for="handphone"
                                class="text-sm sm:text-base font-encode-sans text-slate-900">Handphone</label>
                        </div>
                        <input id="handphone" type="text" required
                            class="appearance-none border p-1 w-full rounded-md bg-neutral-100" name="hp">
                    </div>
                    <div class="mt-4">
                        <div> <label for="captcha-form"
                                class="text-sm sm:text-base font-encode-sans text-slate-900">Captcha</label>
                        </div>
                        <div class="my-2 flex items-end">
                            <span id="captcha-img">
                                {!! captcha_img('flat') !!}
                            </span>
                            <button type="button" class="ml-2 py-1 px-2 bg-{{ $color[0] }}-300 hover:bg-{{ $color[0] }}-400 rounded-md text-white aspect-square h-fit text-xl"
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
                </div>

                <div class="xl:hidden mt-7">
                    <input type="hidden" value="{{ $note }}" name="note">
                    <div class="text-center">
                        <button type="submit"
                            class="border-2 border-{{ $color[2] }}-400 font-bold font-encode-sans text-{{ $color[2] }}-400 px-8 py-2 rounded-full">
                            Next Step
                        </button>
                    </div>
                    <div class="text-center mt-1">
                        <a href="{{ route('user.cart.index') }}"
                            class="font-encode-sans text-gray-400 text-sm sm:text-base">
                            Back
                        </a>
                    </div>
                </div>

            </div>
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

@push('scripts')
    
<script type="text/javascript">
$("#reload").click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "reload",
            type: 'GET',
            dataType: 'html',
            success: function(res) {
                $('#captcha-img').html(res);
            }
        });
    });

</script>

@endpush

@include('inc.footer1')
@endsection
