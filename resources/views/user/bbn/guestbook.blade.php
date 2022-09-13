@extends('layouts.app')
@section('content')

@include('inc.navbar2')

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
            @foreach ($values as $guestbook)
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
        <form action="{{ route('user.guestbook.store') }}" method="post" class="px-4">
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
            <input type="hidden" value="{{ $sites->no }}" name="nosites">
            <div class="mt-5 text-center">
                <button type="submit"
                    class="border-2 border-{{ $color[2] }}-400 font-bold font-encode-sans hover:bg-{{ $color[2] }}-400 hover:text-white focus:ring-{{ $color[2] }}-200 focus:ring-2 text-{{ $color[2] }}-400 px-8 py-2 rounded-full">
                    Send
                </button>
            </div>
        </form>
    </div>
</div>

@include('inc.footer2')

@push('scripts')

<script type="text/javascript">
$("#reload").click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "{{ route('reload') }}",
            type: 'GET',
            dataType: 'html',
            success: function(res) {
                $('#captcha-img').html(res);
            }
        });
    });
</script>

@endpush

@endsection
