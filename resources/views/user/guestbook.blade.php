@extends('layouts.app')
@section('title', 'TokoBayiFiv')
@section('content')

@include('inc.navbar1')

<div class="container mx-auto xl:px-32 px-3 xl:pt-6 xl:pb-10 pt-3 pb-5">
    <div class="w-full bg-white rounded-md shadow-sm pt-3 pb-3 px-3">
        <h1 class="font-concert-one text-3xl text-{{ $color[1] }}-500 xl:text-4xl">
            Guestbook
        </h1>
    </div>
    <div class="w-full mt-3 bg-white rounded-md shadow-sm pt-3 pb-7 px-3">
        <h2 class="font-concert-one text-slate-900 text-2xl">
            User Reviews
        </h2>
        <div class="mt-4 space-y-3 max-h-128 overflow-y-auto px-4">
            @foreach ($guestbooks as $guestbook)
            <div class="bg-neutral-100 px-3 pt-3 pb-4 w-full">
                <h6 class="font-encode-sans text-sm sm:text-base text-slate-900">
                    {{ $guestbook->name }}
                </h6>
                <p class="text-gray-400 font-encode-sans text-sm">
                    {{ $guestbook->email }}
                </p>
                <p class="text-gray-400 mt-2 font-encode-sans text-sm">
                    {{ $guestbook->message }}
                </p>
            </div>
            @endforeach
        </div>
    </div>
    <div class="w-full mt-3 bg-white rounded-md shadow-sm pt-3 pb-7 px-3">
        <h2 class="font-concert-one text-slate-900 text-2xl">
            Send Us Message
        </h2>
        <form action="{{ route('user.guestbook.store') }}" method="post">
            @csrf
            <div class="mt-4">
                <div> <label for="name" class="text-sm sm:text-base font-encode-sans text-slate-900">
                        Name</label>
                </div>
                <input id="name" type="text" class="appearance-none border p-1 w-full rounded-md bg-neutral-100"
                    name="name" required>
            </div>
            <div class="mt-4">
                <div> <label for="email" class="text-sm sm:text-base font-encode-sans text-slate-900">
                        Email</label>
                </div>
                <input id="email" type="text" class="appearance-none border p-1 w-full rounded-md bg-neutral-100"
                    name="email" required>
            </div>
            <div class="mt-4">
                <div> <label for="location" class="text-sm sm:text-base font-encode-sans text-slate-900">
                        Location</label>
                </div>
                <input id="location" type="text" class="appearance-none border p-1 w-full rounded-md bg-neutral-100"
                    name="location" required>
            </div>
            <div class="mt-4">
                <div> <label for="message" class="text-sm sm:text-base font-encode-sans text-slate-900">Message</label>
                </div>
                <textarea id="message" type="text" class="appearance-none border p-1 w-full rounded-md bg-neutral-100" required
                    name="message"></textarea>
            </div>
            <div class="mt-5 text-center">
                <button type="submit"
                    class="border-2 border-{{ $color[2] }}-400 font-bold font-encode-sans hover:bg-{{ $color[2] }}-400 hover:text-white focus:ring-{{ $color[2] }}-200 focus:ring-2 text-{{ $color[2] }}-400 px-8 py-2 rounded-full">
                    Send
                </button>
            </div>
        </form>
    </div>
</div>

@include('inc.footer1')
@endsection
