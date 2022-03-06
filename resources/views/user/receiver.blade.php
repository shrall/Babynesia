@extends('layouts.app')
@section('title', 'TokoBayiFiv')
@section('content')

@include('inc.navbar1')

<div class="container mx-auto xl:px-32 px-3 xl:pt-6 xl:pb-10 pt-3 pb-5">
    <div class="w-full bg-white rounded-md shadow-sm py-2 px-3">
        <p class="text-sky-500 text-sm sm:text-base font-encode-sans">
            <a href="{{ route('user.cart.index') }}" class="text-gray-400">Cart > </a><a href="{{ route('user.receiver.create') }}">Receiver</a> 
        </p>
        <h1 class="font-concert-one text-3xl text-sky-500 xl:text-4xl">
            Receiver
        </h1>
    </div>
    <form action="{{ route('user.paymentart.index') }}" method="get">
        <div class="xl:flex xl:justify-between">
            <div class="w-full bg-white rounded-md shadow-sm mt-3 px-3 pt-3 pb-7 xl:px-4 xl:w-5/6">
                <h6 class="font-encode-sans font-bold text-slate-900">Penerima Kiriman</h6>
                <div class="px-4 mt-3">
                    <div class="">
                        <div> <label for="receivername" class="text-sm sm:text-base font-encode-sans text-slate-900">Receiver Name</label>
                        </div>
                        <input id="receivername" type="text" class="appearance-none border-2 p-1 w-full rounded-md border-sky-500"
                            name="receiver_name">
                    </div>
                    <div class="mt-4">
                        <div> <label for="pengirim" class="text-sm sm:text-base font-encode-sans text-slate-900">Pengirim</label>
                        </div>
                        <input id="pengirim" type="text" class="appearance-none border-2 p-1 w-full rounded-md border-sky-500"
                            name="pengirim">
                    </div>
                    <div class="mt-4">
                        <input type="checkbox" name="dropship" id="dropship" class="peer" value="tes">
                        <label for="dropship" class="ml-1 text-sm sm:text-base font-encode-sans text-slate-900">Dropship</label>
                        <div class="hidden mt-3 peer-checked:block" id="dropship_receiver">
                            <div>
                                <label for="dropship" class="text-sm sm:text-base font-encode-sans text-slate-900">Dropship Receiver</label>
                            </div>
                            <input id="dropinput" type="text" class="appearance-none border-2 p-1 w-full rounded-md border-sky-500"
                            name="receiver_dropship">
                        </div>
                    </div>
                    <div class="mt-4">
                        <div> <label for="address" class="text-sm sm:text-base font-encode-sans text-slate-900">Address</label>
                        </div>
                        <textarea id="address" type="text" class="appearance-none border-2 p-1 w-full rounded-md border-sky-500"
                            name="address"></textarea>
                    </div>
                    <div class="mt-4">
                        <div> <label for="postcode" class="text-sm sm:text-base font-encode-sans text-slate-900">Postcode</label>
                        </div>
                        <input id="postcode" type="text" class="appearance-none border-2 p-1 w-full rounded-md border-sky-500"
                            name="postcode">
                    </div>
                    <div class="mt-4">
                        <div> <label for="city" class="text-sm sm:text-base font-encode-sans text-slate-900">City</label>
                        </div>
                        <input id="city" type="text" class="appearance-none border-2 p-1 w-full rounded-md border-sky-500"
                            name="city">
                    </div>
                    <div class="mt-4">
                        <div> <label for="province" class="text-sm sm:text-base font-encode-sans text-slate-900">Province</label>
                        </div>
                        <input id="province" type="text" class="appearance-none border-2 p-1 w-full rounded-md border-sky-500"
                            name="province">
                    </div>
                    <div class="mt-4">
                        <div> <label for="phone" class="text-sm sm:text-base font-encode-sans text-slate-900">Phone</label>
                        </div>
                        <input id="phone" type="text" class="appearance-none border-2 p-1 w-full rounded-md border-sky-500"
                            name="phone">
                    </div>
                    <div class="mt-4">
                        <div> <label for="handphone" class="text-sm sm:text-base font-encode-sans text-slate-900">Handphone</label>
                        </div>
                        <input id="handphone" type="text" class="appearance-none border-2 p-1 w-full rounded-md border-sky-500"
                            name="hp">
                    </div>
                </div>
                <div class="xl:hidden mt-7">
                    <div class="text-center">
                        <button type="submit"
                            class="border-2 border-pink-400 font-bold font-encode-sans text-pink-400 px-8 py-2 rounded-full">
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
                        class="w-full inline-block border-2 border-pink-400 bg-white font-bold font-encode-sans text-pink-400 px-8 py-2 rounded-full">
                        Next Step
                    </button>
                </div>
                <div class="w-full text-center mt-2">
                    <a href="{{ route('user.cart.index') }}"
                        class="w-full inline-block border-2 border-gray-400 bg-white font-bold font-encode-sans text-gray-400 px-8 py-2 rounded-full">
                        Back
                    </a>
                </div>
            </div>
        </div>

    </form>
</div>

@include('inc.footer1')
@endsection