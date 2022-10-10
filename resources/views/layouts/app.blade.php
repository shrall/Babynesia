<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $tagline }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@200;400;700;900&display=swap"
        rel="stylesheet">

    <link
        href="https://fonts.googleapis.com/css2?family=Concert+One&family=Encode+Sans:wght@200;400;700;900&display=swap"
        rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />

    {{-- Box Icons --}}
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div id="app" class="bg-neutral-100 relative"
        style="{{ !empty($bg_img->content) ? 'background: url(' . asset('public/uploads/' . $bg_img->content) . ')' : '' }}">
        @yield('content')
        <a id="wa-link" target="blank">
            <img class="fixed z-50 bottom-0 right-4 cursor-pointer hover:opacity-80 w-1/2 xl:w-1/6"
                src="{{ asset('images/chat-wa.png') }}" alt="" srcset="">
        </a>
    </div>
    @if (!env('APP_DEBUG'))
        <script>
            if (location.protocol !== 'https:') {
                location.replace(`https:${location.href.substring(location.protocol.length)}`);
            }
        </script>
    @endif
    <script>
        var scrt_var =
            `https://wa.me/${@json($whatsapp_number->content)}?text=Halo%20${@json(env('APP_NAME'))}%20perkenalkan%20saya`;
        document.getElementById("wa-link").setAttribute("href", scrt_var);
    </script>
    {{-- FLOWBITE --}}
    {{-- <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script> --}}
    <script src="{{ asset('flowbite/dist/flowbite.js') }}"></script>

    {{-- TW-ELEMENTS --}}
    <script src="{{ asset('tw-elements/dist/js/index.min.js') }}"></script>

    @stack('scripts')
</body>

</html>
