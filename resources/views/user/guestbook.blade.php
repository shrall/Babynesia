@extends('layouts.app')
@section('title', 'TokoBayiFiv')
@section('content')

@include('inc.navbar1')

<div class="container mx-auto xl:px-40 px-3 xl:pt-6 xl:pb-10 pt-3 pb-5">
    <div class="w-full bg-white rounded-md shadow-sm pt-3 pb-7 px-3">
        <h1 class="font-concert-one text-3xl text-sky-500 xl:text-4xl">
            Guestbook
        </h1>
        <div class="mt-4 px-4">
            <p class="font-encode-sans text-gray-400 text-sm sm:text-base">
                Untuk pemesanan / pertanyaan silahkan hubungi kami melalui kontak di samping, atau tinggalkan pesan
                dibawah ini dan akan kami kirimkan jawaban langsung ke email Anda.
                <br><br>
                Thanks,
                Babynesia
            </p>
            <h2 class="mt-4 font-concert-one text-slate-900 text-2xl">
                Send Us Message
            </h2>
            <form action="" method="post">
                @csrf
                <div class="mt-4">
                    <div> <label for="name" class="text-sm sm:text-base font-encode-sans text-slate-900">
                            Name</label>
                    </div>
                    <input id="name" type="text" class="appearance-none border p-1 w-full rounded-md border-sky-500"
                        name="name">
                </div>
                <div class="mt-4">
                    <div> <label for="email" class="text-sm sm:text-base font-encode-sans text-slate-900">
                            Email</label>
                    </div>
                    <input id="email" type="text" class="appearance-none border p-1 w-full rounded-md border-sky-500"
                        name="email">
                </div>
                <div class="mt-4">
                    <div> <label for="location" class="text-sm sm:text-base font-encode-sans text-slate-900">
                            Location</label>
                    </div>
                    <input id="location" type="text" class="appearance-none border p-1 w-full rounded-md border-sky-500"
                        name="location">
                </div>
                <div class="mt-4">
                    <div> <label for="message"
                            class="text-sm sm:text-base font-encode-sans text-slate-900">Message</label>
                    </div>
                    <textarea id="message" type="text"
                        class="appearance-none border p-1 w-full rounded-md border-sky-500" name="message"></textarea>
                </div>
                <div class="mt-5 text-center">
                    <button type="submit"
                        class="border-2 border-pink-400 font-bold font-encode-sans hover:bg-pink-400 hover:text-white focus:ring-pink-200 focus:ring-2 text-pink-400 px-8 py-2 rounded-full">
                        Send
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('inc.footer1')
@endsection
