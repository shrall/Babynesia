@extends('layouts.app')
@section('title', 'TokoBayiFiv')
@section('content')

@include('inc.navbar1')

<div class="container mx-auto xl:px-40 px-3 xl:pt-6 xl:pb-10 pt-3 pb-5">
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
                        Rp. 30.000,- x 3 barang
                    </p>
                    <p class="hidden sm:block font-encode-sans text-gray-400 text-sm mt-3 text-clip">
                        Note: <br>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, explicabo.
                    </p>
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
                <a href="" class="mt-4 xl:mt-8 flex items-center">
                    <i class="fas fa-edit text-pink-400 text-2xl" aria-hidden="true"></i>
                    <p class="ml-1 font-encode-sans font-bold text-slate-900">Edit</p>
                </a>
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
                <a href="" class="flex items-center">
                    <i class="fas fa-edit text-pink-400 text-2xl" aria-hidden="true"></i>
                    <p class="ml-1 font-encode-sans font-bold text-slate-900">Edit</p>
                </a>
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
                        Rp. 30.000,- x 3 barang
                    </p>
                    <p class="hidden sm:block font-encode-sans text-gray-400 text-sm mt-3 text-clip">
                        Note: <br>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, explicabo.
                    </p>
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
                <a href="" class="mt-4 xl:mt-8 flex items-center">
                    <i class="fas fa-edit text-pink-400 text-2xl" aria-hidden="true"></i>
                    <p class="ml-1 font-encode-sans font-bold text-slate-900">Edit</p>
                </a>
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
                <a href="" class="flex items-center">
                    <i class="fas fa-edit text-pink-400 text-2xl" aria-hidden="true"></i>
                    <p class="ml-1 font-encode-sans font-bold text-slate-900">Edit</p>
                </a>
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
                        Rp. 30.000,- x 3 barang
                    </p>
                    <p class="hidden sm:block font-encode-sans text-gray-400 text-sm mt-3 text-clip">
                        Note: <br>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, explicabo.
                    </p>
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
                <a href="" class="mt-4 xl:mt-8 flex items-center">
                    <i class="fas fa-edit text-pink-400 text-2xl" aria-hidden="true"></i>
                    <p class="ml-1 font-encode-sans font-bold text-slate-900">Edit</p>
                </a>
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
                <a href="" class="flex items-center">
                    <i class="fas fa-edit text-pink-400 text-2xl" aria-hidden="true"></i>
                    <p class="ml-1 font-encode-sans font-bold text-slate-900">Edit</p>
                </a>
            </div>
        </div>
    </div>
    <form action="" method="post">
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

@include('inc.footer1')

@endsection
