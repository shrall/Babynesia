<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Admin</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <!--Datatables -->
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    @yield('head')
</head>

<body class="font-encode-sans text-white">
    @yield('modals')
    <div class="w-screen h-full relative">
        <div class="w-full flex items-center justify-between px-24 py-4 bg-teal-400 text-white">
            <a href="{{ route('adminpage.dashboard') }}" class="font-concert-one text-2xl font-bold">Administrator
                Area</a>
            <div class="flex items-center justify-evenly gap-x-4">
                <span class="flex items-center gap-x-2">
                    <span class="fa fa-fw fa-user-circle text-3xl"></span>
                    <span class="font-medium">Aria</span>
                </span>
                <div class="px-4 py-1 rounded-full text-red-600 bg-white hover:bg-gray-100 cursor-pointer">Log out</div>
            </div>
        </div>
        <div class="w-full grid grid-cols-12">
            @include('admin.inc.sidebar')
            <div class="col-span-10 px-1 py-2 text-black bg-slate-100">
                @yield('content')
            </div>
        </div>
        <div class="w-full flex flex-col items-center px-24 py-2 bg-slate-800 text-white">
            <div class="w-full flex items-center justify-between">
                <span class="font-concert-one text-5xl">{{ config('app.name', 'Laravel') }}</span>
                <div class="flex flex-col gap-y-1">
                    <span>Kontak Kami</span>
                    <div class="flex items-center gap-x-2">
                        <a href="" class="fab fa-whatsapp text-xl hover:text-gray-100"></a>
                        <a href="" class="fab fa-line text-xl hover:text-gray-100"></a>
                        <a href="" class="fab fa-instagram text-xl hover:text-gray-100"></a>
                        <a href="" class="fab fa-facebook text-xl hover:text-gray-100"></a>
                        <a href="" class="fa fa-envelope text-xl hover:text-gray-100"></a>
                    </div>
                </div>
            </div>
            <span>Copyright © {{ date('Y') }}. <span class="font-bold">{{ config('app.name') }}</span></span>
            <span>SUPPORT: <a href="mailto:hello@babaweb.biz">hello@babaweb.biz</a></span>
        </div>
    </div>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    @yield('scripts')
    <script>
        var loadFile = function(event, id) {
            if ($('#' + id)[0].files[0].size > 2097152) {
                alert("Ukuran gambar tidak bisa melebihi 2 MB!");
                $('#' + id).val(null);
            } else {
                $('#preview-' + id).attr('src', URL.createObjectURL(event.target.files[0]));
            }
        };
    </script>
    <script>
        function openModal(type) {
            $('#' + type + '-modal').removeClass('hidden').addClass('flex');
        }

        function closeModal() {
            $('.modal').removeClass('flex').addClass('hidden');
        }
    </script>
</body>

</html>
