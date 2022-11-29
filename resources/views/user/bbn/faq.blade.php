@extends('layouts.app')
@section('content')
    @include('inc.navbar2')

    <div class="container mx-auto xl:px-32 px-3 xl:pt-6 xl:pb-10 pt-3 pb-5">
        <div class="w-full bg-white rounded-md shadow-sm py-3 px-3">
            <h1 class="font-concert-one text-3xl text-{{ $color[1] }}-600 xl:text-4xl">
                FAQ
            </h1>
        </div>

        @foreach ($faqs as $faq)
            <div class="mt-3 w-full bg-white rounded-md shadow-sm py-3 px-3 relative grid grid-cols-12 justify-between">
                <input type="checkbox" name="faq" id="pertanyaan{{$faq->no_faq}}" class="peer" hidden>
                <label for="pertanyaan{{$faq->no_faq}}" class="cursor-pointer inline-block h-full w-full absolute"></label>
                <h6 class="font-encode-sans font-bold text-slate-900 w-full text-sm sm:text-base col-span-11">
                    {{ $faq->pertanyaan }}
                </h6>
                <i class="bx bx-chevron-down text-xl text-slate-900 peer-checked:rotate-180 w-fit" aria-hidden="true"></i>
                <div class="mt-2 peer-checked:block hidden pb-5 col-span-12">
                    <p class="px-5 text-gray-400 font-encode-sans text-sm sm:text-base">
                        {{ $faq->jawaban }}
                    </p>
                </div>
            </div>
        @endforeach


    </div>

    @include('inc.footer2')
@endsection
