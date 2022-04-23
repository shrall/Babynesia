@extends('layouts.app')
@section('content')

@include('inc.navbar1')

<div class="container mx-auto xl:px-32 px-3 xl:pt-6 xl:pb-10 pt-3 pb-5">
    <div class="w-full bg-white rounded-md shadow-sm pt-3 pb-3 px-3">
        <h1 class="font-concert-one text-3xl text-{{ $color[1] }}-500 xl:text-4xl">
            {{ $sites->code }}
        </h1>
    </div>

    <div class="w-full mt-3 bg-white rounded-md shadow-sm pt-3 pb-7 px-3">
        <div class="">
            <p class="font-encode-sans text-gray-400 text-sm sm:text-base">
                {!! $sites->isi !!}
            </p>
        </div>
    </div>
</div>

@include('inc.footer1')

@endsection