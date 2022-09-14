@extends('layouts.app')
@section('content')

@include('inc.navbar2')

<div class="xl:grid xl:grid-cols-3 xl:gap-3 container mx-auto xl:px-32 px-3 xl:pt-6 xl:pb-10 pt-3 pb-5">
    <div class="w-full bg-white rounded-md shadow-sm pt-3 pb-7 px-3 h-fit">
        <h1 class="font-concert-one text-3xl text-{{ $color[1] }}-600 xl:text-4xl">
            Contact
        </h1>
        <hr class="my-3">
        <div class="ml-3">
            {!! $sites->isi !!}
            {{-- <div class="flex items-center">
                <i class="fab fa-whatsapp text-{{ $color[0] }}-400 text-xl" aria-hidden="true"></i>
                <div class="text-slate-900 font-encode-sans ml-2 text-sm sm:text-base">
                    0812 5020 5040
                </div>
            </div>
            <div class="flex items-center mt-1 xl:mt-2">
                <i class="fab fa-line text-{{ $color[0] }}-400 text-xl" aria-hidden="true"></i>
                <div class="text-slate-900 font-encode-sans ml-2 text-sm sm:text-base">
                    @meu1858i
                </div>
            </div>
            <div class="flex items-center mt-1 xl:mt-2">
                <i class="fab fa-instagram text-{{ $color[0] }}-400 text-xl" aria-hidden="true"></i>
                <div class="text-slate-900 font-encode-sans ml-2 text-sm sm:text-base">
                    @TokoBayiFiv
                </div>
            </div>
            <div class="flex items-center mt-1 xl:mt-2">
                <i class="fab fa-facebook text-{{ $color[0] }}-400 text-xl" aria-hidden="true"></i>
                <div class="text-slate-900 font-encode-sans ml-2 text-sm sm:text-base">
                    www.facebook.com/tokobayifiv
                </div>
            </div>
            <div class="flex items-center mt-1 xl:mt-2">
                <i class="fa fa-envelope text-{{ $color[0] }}-400 text-lg" aria-hidden="true"></i>
                <div class="text-slate-900 font-encode-sans ml-2 text-sm sm:text-base">
                    tokobayifiv.online@gmail.com
                </div>
            </div>
            <div class="flex items-center mt-1 xl:mt-2">
                <i class="fa fa-location-arrow text-{{ $color[0] }}-400 text-lg" aria-hidden="true"></i>
                <div class="text-slate-900 font-encode-sans ml-2 text-sm sm:text-base">
                    Surabaya - Indonesia
                </div>
            </div> --}}
        </div>
    </div>
    <div class="xl:col-span-2 mt-3 xl:mt-0 w-full bg-white rounded-md shadow-sm pt-3 pb-7 px-3">
        @if (session('status'))
        <div class="font-encode-sans text-{{ $color[1] }}-500 font-bold mb-4">
            {{ session('status') }}
        </div>
        @endif
        <p class="font-encode-sans text-gray-400 text-sm sm:text-base">
            Untuk pemesanan / pertanyaan silahkan hubungi kami melalui kontak di samping, atau tinggalkan pesan
            dibawah ini dan akan kami kirimkan jawaban langsung ke email Anda.
            <br><br>
            Thanks,
            {{ config('app.name') }}
        </p>
        <h2 class="mt-4 font-concert-one text-slate-900 text-2xl">
            Send Us Message
        </h2>
        <form action="{{ route('contact.store') }}" method="post">
            @csrf
            <div class="mt-4">
                <div> <label for="name" class="text-sm font-encode-sans text-gray-400">
                        Name</label>
                </div>
                <input id="name" type="text" placeholder="Masukkan nama"
                    class="appearance-none border-b-2 p-1 w-full" name="name">
            </div>
            <div class="mt-4">
                <div> <label for="email" class="text-sm font-encode-sans text-gray-400">
                        Email</label>
                </div>
                <input id="email" type="text" placeholder="Masukkan email"
                    class="appearance-none border-b-2 p-1 w-full" name="email">
            </div>
            <div class="mt-4">
                <div> <label for="subject" class="text-sm font-encode-sans text-gray-400">
                        Subject</label>
                </div>
                <input id="subject" type="text" placeholder="Masukkan subject"
                    class="appearance-none border-b-2 p-1 w-full" name="subject">
            </div>
            <div class="mt-4">
                <div> <label for="message" class="text-sm font-encode-sans text-gray-400">Message</label>
                </div>
                <textarea placeholder="Masukkan pesan" id="message" type="text" class="appearance-none border-2 p-1 w-full"
                    name="message"></textarea>
            </div>
            <input type="hidden" value="{{ $sites->no }}" name="nosites">
            <div class="mt-5 text-center">
                <button type="submit"
                    class="text-white hover:bg-{{ $color[2] }}-500 bg-{{ $color[2] }}-400 font-bold font-encode-sans px-8 py-2 rounded-full">
                    Send
                </button>
            </div>
        </form>
    </div>
</div>

@include('inc.footer2')
@endsection
