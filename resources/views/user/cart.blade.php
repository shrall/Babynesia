@extends('layouts.app')
@section('title', 'TokoBayiFiv')
@section('content')

@include('inc.navbar1')

<div class="container mx-auto xl:px-32 px-3 xl:pt-6 xl:pb-10 pt-3 pb-5">
    <div class="w-full bg-white rounded-md shadow-sm py-2 px-3">
        <p class="text-sky-500 text-sm sm:text-base font-encode-sans">
            Cart
        </p>
        <h1 class="font-concert-one text-3xl text-sky-500 xl:text-4xl">
            Cart
        </h1>
    </div>
    <div class="w-full bg-white rounded-md shadow-sm mt-3 px-3 py-5">
        <div class="sm:flex sm:justify-between">
            <div class="flex">
                <div class="w-20 sm:w-40">
                    <img src="https://images.unsplash.com/photo-1461988320302-91bde64fc8e4?ixid=2yJhcHBfaWQiOjEyMDd9&w=750&dpr=2"
                        alt="" class="aspect-square w-full rounded-md object-cover">
                </div>
                <div class="ml-2">
                    <h6 class="font-bold font-encode-sans text-base text-clip text-slate-900">
                        Nama produk panjangnya 2 baris
                    </h6>
                    <p class="font-encode-sans text-sm text-gray-400 sm:text-base">
                        3 barang x Rp. 30.000,-
                    </p>
                    <p class="hidden sm:block font-encode-sans text-gray-400 text-sm mt-3 text-clip">
                        Note: <br>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, explicabo.
                    </p>
                    <h6
                        class="py-1 sm:py-2 sm:mt-3 mt-2 px-3 inline-block text-sm sm:text-base font-bold rounded-lg bg-blue-400 text-white font-encode-sans">
                        M-Cream
                    </h6>
                </div>
            </div>
            <div class="hidden sm:block border-l-2 border-gray-100 pl-4 w-40">
                <div>
                    <p class="font-encode-sans text-sm sm:text-base text-gray-400">
                        Total Harga
                    </p>
                    <h6 class="font-encode-sans font-bold text-slate-900">
                        Rp. 90.000
                    </h6>
                </div>
                <button id="dropdownButton" data-dropdown-toggle="dropdown"
                    class="appearance-none mt-4 xl:mt-8 flex items-center">
                    <i class="fas fa-edit  text-pink-400 text-2xl" aria-hidden="true"></i>
                    <p class="ml-1 font-encode-sans font-bold text-slate-900">Action</p>
                </button>
                <div id="dropdown"
                    class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow">
                    <ul class="py-1" aria-labelledby="dropdownButton">
                        <li>
                            <button type="button" data-modal-toggle="modal-edit"
                                class="w-full text-left hover:bg-neutral-100 py-2 px-4 text-sm sm:text-base font-encode-sans text-slate-900">Edit
                                Cart</button>
                            <form action="">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left hover:bg-neutral-100 py-2 px-4 text-sm sm:text-base font-encode-sans text-red-500">Delete
                                    Cart</button>
                            </form>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="sm:hidden mt-3">
            <p class="font-encode-sans text-gray-400 text-sm text-clip">
                Note: <br>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, explicabo.
            </p>
            <hr class="my-3">
            <div class="mt-3 flex justify-between items-center">
                <div>
                    <p class="font-encode-sans text-sm sm:text-base text-gray-400">
                        Total Harga
                    </p>
                    <h6 class="font-encode-sans font-bold text-slate-900">
                        Rp. 90.000
                    </h6>
                </div>
                <button id="dropdownButton" data-dropdown-toggle="dropdown1"
                    class="appearance-none mt-4 xl:mt-8 flex items-center">
                    <i class="fas fa-edit  text-pink-400 text-2xl" aria-hidden="true"></i>
                    <p class="ml-1 font-encode-sans text-sm font-bold text-slate-900">Action</p>
                </button>
                <div id="dropdown1"
                    class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow">
                    <ul class="py-1" aria-labelledby="dropdownButton">
                        <li>
                            <button type="button" data-modal-toggle="modal-edit"
                                class="w-full text-left hover:bg-neutral-100 py-2 px-4 text-sm sm:text-base font-encode-sans text-slate-900">Edit
                                Cart</button>
                            <form action="">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left hover:bg-neutral-100 py-2 px-4 text-sm sm:text-base font-encode-sans text-red-500">Delete
                                    Cart</button>
                            </form>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full bg-white rounded-md shadow-sm mt-3 px-3 py-5">
        <div class="sm:flex sm:justify-between">
            <div class="flex">
                <div class="w-20 sm:w-40">
                    <img src="https://images.unsplash.com/photo-1461988320302-91bde64fc8e4?ixid=2yJhcHBfaWQiOjEyMDd9&w=750&dpr=2"
                        alt="" class="aspect-square w-full rounded-md object-cover">
                </div>
                <div class="ml-2">
                    <h6 class="font-bold font-encode-sans text-base text-clip text-slate-900">
                        Nama produk panjangnya 2 baris
                    </h6>
                    <p class="font-encode-sans text-sm text-gray-400 sm:text-base">
                        3 barang x Rp. 30.000,-
                    </p>
                    <p class="hidden sm:block font-encode-sans text-gray-400 text-sm mt-3 text-clip">
                        Note: <br>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, explicabo.
                    </p>
                    <h6
                        class="py-1 sm:py-2 sm:mt-3 mt-2 px-3 inline-block text-sm sm:text-base font-bold rounded-lg bg-blue-400 text-white font-encode-sans">
                        M-Cream
                    </h6>
                </div>
            </div>
            <div class="hidden sm:block border-l-2 border-gray-100 pl-4 w-40">
                <div>
                    <p class="font-encode-sans text-sm sm:text-base text-gray-400">
                        Total Harga
                    </p>
                    <h6 class="font-encode-sans font-bold text-slate-900">
                        Rp. 90.000
                    </h6>
                </div>
                <button id="dropdownButton" data-dropdown-toggle="dropdown"
                    class="appearance-none mt-4 xl:mt-8 flex items-center">
                    <i class="fas fa-edit  text-pink-400 text-2xl" aria-hidden="true"></i>
                    <p class="ml-1 font-encode-sans font-bold text-slate-900">Action</p>
                </button>
                <div id="dropdown"
                    class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow">
                    <ul class="py-1" aria-labelledby="dropdownButton">
                        <li>
                            <button type="button" data-modal-toggle="modal-edit"
                                class="w-full text-left hover:bg-neutral-100 py-2 px-4 text-sm sm:text-base font-encode-sans text-slate-900">Edit
                                Cart</button>
                            <form action="">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left hover:bg-neutral-100 py-2 px-4 text-sm sm:text-base font-encode-sans text-red-500">Delete
                                    Cart</button>
                            </form>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="sm:hidden mt-3">
            <p class="font-encode-sans text-gray-400 text-sm text-clip">
                Note: <br>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, explicabo.
            </p>
            <hr class="my-3">
            <div class="mt-3 flex justify-between items-center">
                <div>
                    <p class="font-encode-sans text-sm sm:text-base text-gray-400">
                        Total Harga
                    </p>
                    <h6 class="font-encode-sans font-bold text-slate-900">
                        Rp. 90.000
                    </h6>
                </div>
                <button id="dropdownButton" data-dropdown-toggle="dropdown1"
                    class="appearance-none mt-4 xl:mt-8 flex items-center">
                    <i class="fas fa-edit  text-pink-400 text-2xl" aria-hidden="true"></i>
                    <p class="ml-1 font-encode-sans text-sm font-bold text-slate-900">Action</p>
                </button>
                <div id="dropdown1"
                    class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow">
                    <ul class="py-1" aria-labelledby="dropdownButton">
                        <li>
                            <button type="button" data-modal-toggle="modal-edit"
                                class="w-full text-left hover:bg-neutral-100 py-2 px-4 text-sm sm:text-base font-encode-sans text-slate-900">Edit
                                Cart</button>
                            <form action="">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left hover:bg-neutral-100 py-2 px-4 text-sm sm:text-base font-encode-sans text-red-500">Delete
                                    Cart</button>
                            </form>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full bg-white rounded-md shadow-sm mt-3 px-3 py-5">
        <div class="sm:flex sm:justify-between">
            <div class="flex">
                <div class="w-20 sm:w-40">
                    <img src="https://images.unsplash.com/photo-1461988320302-91bde64fc8e4?ixid=2yJhcHBfaWQiOjEyMDd9&w=750&dpr=2"
                        alt="" class="aspect-square w-full rounded-md object-cover">
                </div>
                <div class="ml-2">
                    <h6 class="font-bold font-encode-sans text-base text-clip text-slate-900">
                        Nama produk panjangnya 2 baris
                    </h6>
                    <p class="font-encode-sans text-sm text-gray-400 sm:text-base">
                        3 barang x Rp. 30.000,-
                    </p>
                    <p class="hidden sm:block font-encode-sans text-gray-400 text-sm mt-3 text-clip">
                        Note: <br>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, explicabo.
                    </p>
                    <h6
                        class="py-1 sm:py-2 sm:mt-3 mt-2 px-3 inline-block text-sm sm:text-base font-bold rounded-lg bg-blue-400 text-white font-encode-sans">
                        M-Cream
                    </h6>
                </div>
            </div>
            <div class="hidden sm:block border-l-2 border-gray-100 pl-4 w-40">
                <div>
                    <p class="font-encode-sans text-sm sm:text-base text-gray-400">
                        Total Harga
                    </p>
                    <h6 class="font-encode-sans font-bold text-slate-900">
                        Rp. 90.000
                    </h6>
                </div>
                <button id="dropdownButton" data-dropdown-toggle="dropdown"
                    class="appearance-none mt-4 xl:mt-8 flex items-center">
                    <i class="fas fa-edit  text-pink-400 text-2xl" aria-hidden="true"></i>
                    <p class="ml-1 font-encode-sans font-bold text-slate-900">Action</p>
                </button>
                <div id="dropdown"
                    class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow">
                    <ul class="py-1" aria-labelledby="dropdownButton">
                        <li>
                            <button type="button" data-modal-toggle="modal-edit"
                                class="w-full text-left hover:bg-neutral-100 py-2 px-4 text-sm sm:text-base font-encode-sans text-slate-900">Edit
                                Cart</button>
                            <form action="">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left hover:bg-neutral-100 py-2 px-4 text-sm sm:text-base font-encode-sans text-red-500">Delete
                                    Cart</button>
                            </form>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="sm:hidden mt-3">
            <p class="font-encode-sans text-gray-400 text-sm text-clip">
                Note: <br>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, explicabo.
            </p>
            <hr class="my-3">
            <div class="mt-3 flex justify-between items-center">
                <div>
                    <p class="font-encode-sans text-sm sm:text-base text-gray-400">
                        Total Harga
                    </p>
                    <h6 class="font-encode-sans font-bold text-slate-900">
                        Rp. 90.000
                    </h6>
                </div>
                <button id="dropdownButton" data-dropdown-toggle="dropdown1"
                    class="appearance-none mt-4 xl:mt-8 flex items-center">
                    <i class="fas fa-edit  text-pink-400 text-2xl" aria-hidden="true"></i>
                    <p class="ml-1 font-encode-sans text-sm font-bold text-slate-900">Action</p>
                </button>
                <div id="dropdown1"
                    class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow">
                    <ul class="py-1" aria-labelledby="dropdownButton">
                        <li>
                            <button type="button" data-modal-toggle="modal-edit"
                                class="w-full text-left hover:bg-neutral-100 py-2 px-4 text-sm sm:text-base font-encode-sans text-slate-900">Edit
                                Cart</button>
                            <form action="">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left hover:bg-neutral-100 py-2 px-4 text-sm sm:text-base font-encode-sans text-red-500">Delete
                                    Cart</button>
                            </form>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('user.receiver.create') }}" method="get">
        <div class="xl:flex xl:items-center">
            <div class="w-full bg-white rounded-md shadow-sm mt-3 px-3 py-5 xl:w-8/10">

                <div>
                    <label for="catatan-tambahan"
                        class="font-encode-sans font-bold text-slate-900 text-sm sm:text-base">
                        Catatan Tambahan
                    </label>
                </div>
                <textarea name="" id="catatan-tambahan"
                    class="mt-2 p-1 appearance-none border-2 border-sky-500 rounded-lg w-full"></textarea>
                <div class="xl:hidden">
                    <div class="text-center mt-2">
                        <button type="submit"
                            class="border-2 border-pink-400 font-bold font-encode-sans text-pink-400 px-8 py-2 rounded-full">
                            Next Step
                        </button>
                    </div>
                    <div class="text-center mt-1">
                        <a href="{{ route('user.list_products') }}"
                            class="font-encode-sans text-gray-400 text-sm sm:text-base">
                            Continue Shopping
                        </a>
                    </div>
                </div>

            </div>
            <div class="ml-3 hidden xl:block">
                <div class="text-center mt-2">
                    <button type="submit"
                        class="w-full border-2 border-pink-400 bg-white font-bold font-encode-sans text-pink-400 px-8 py-2 rounded-full">
                        Next Step
                    </button>
                </div>
                <div class="text-center mt-4">
                    <a href="{{ route('user.list_products') }}"
                        class="w-full border-2 border-gray-400 bg-white font-bold font-encode-sans text-gray-400 px-4 py-2 rounded-full">
                        Continue Shopping
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Main modal -->
<div id="modal-edit" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center h-modal md:h-full md:inset-0">
    <div class="relative px-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-5 rounded-t border-b">
                <h3 class="text-3xl sm:text-4xl font-concert-one text-sky-500">
                    Edit Cart #1
                </h3>
                <button type="button" class="appearance-none" data-modal-toggle="modal-edit">
                    <i class="appearance-none fa fa-times text-3xl text-red-500" aria-hidden="true"></i>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-4">
                <div>
                    <div>
                        <label for="jumlah" class="text-sm font-encode-sans text-slate-900">Jumlah</label>
                    </div>
                    <Input name="jumlah" id="jumlah" type="number" required
                        class="border-sky-500 border appearance-none w-full rounded-lg p-1 text-slate-900 font-encode-sans">
                </div>
                <div>
                    <div>
                        <label for="" class="text-sm font-encode-sans text-slate-900">Catatan
                            (size/color/etc)</label>
                    </div>
                    <textarea name="" id="" cols="20" required
                        class="border-sky-500 border appearance-none w-full rounded-lg p-1 text-slate-900 font-encode-sans"></textarea>
                    <button type="submit"
                        class="mt-5 bg-sky-500 hover:bg-sky-600 focus:ring-sky-300 rounded-full py-3 w-full inline-block text-center text-sm sm:text-base text-white font-encode-sans font-bold">
                        Edit
                    </button>
                </div>
            </div>
            <!-- Modal footer -->
        </div>
    </div>
</div>


@include('inc.footer1')

@endsection
