@extends('layouts.app')
@section('content')

@include('inc.navbar1')

<div class="container mx-auto xl:px-40 px-3 xl:pt-6 xl:pb-10 pt-3 pb-5">
    <div class="w-full bg-white rounded-md shadow-sm py-3 px-3">
        <h1 class="font-concert-one text-3xl text-{{ $color[1] }}-500 xl:text-4xl">
            Invoice
        </h1>
    </div>
    
    @include('inc.invoicecontent')

    <div class="mt-3 w-full bg-white rounded-md shadow-sm py-3 px-3">
        <p class="text-red-400 font-bold font-encode-sans text-sm sm:text-base">
            We will process your order and send you the confirmation mail. Please check your email. Thank You!
        </p>
    </div>
    <div class="">
        <div class="w-full text-center mt-3">
            <a href="{{ route('list_products') }}"
                class="inline-block border-2 border-{{ $color[2] }}-400 hover:bg-{{ $color[2] }}-400 hover:text-white bg-white font-bold font-encode-sans text-{{ $color[2] }}-400 px-8 py-2 rounded-full">
                Lanjutkan Belanja
            </a>
        </div>
    </div>
</div>

@include('inc.footer1')
@endsection