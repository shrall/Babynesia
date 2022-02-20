@extends('layouts.app')
@section('title', 'TokoBayiFiv')
@section('content')

<div class="container mx-auto xl:px-40 px-3 xl:py-10 py-5">
    <div class="w-full bg-white rounded-md shadow-sm py-5">
        <div class="flex justify-center">
            <ul>
                <li class="font-encode-sans inline-block border-b-4 border-sky-500 px-1 text-sky-500 font-bold">
                    <a href="">
                        New Product
                    </a>
                </li>
                <li class="ml-4 font-encode-sans text-gray-400 inline-block">
                    <a href="">
                        Hot Deals
                    </a>
                </li>
                <li class="ml-4 font-encode-sans text-gray-400 inline-block">
                    <a href="">
                        Restock
                    </a>
                </li>
            </ul>
        </div>
        <h1 class="text-center font-concert-one text-4xl mt-3 text-sky-500">
            Our Newest Product
        </h1>
    </div>
    <div class="mt-5">
        <div class=" w-full mx-auto grid grid-cols-2 gap-2 xl:grid-cols-3 xl:gap-3">
            {{-- sek gajelas --}}
            <a href="" class="rounded-lg shadow-sm xl:mx-2 mb-5 bg-white xl:w-72 w-full">
                <img src="https://images.unsplash.com/photo-1461988320302-91bde64fc8e4?ixid=2yJhcHBfaWQiOjEyMDd9&w=750&dpr=2" class="xl:w-72 xl:h-72 w-full bg-red-500 rounded-t-lg object-cover" alt="">
                <div class="p-4 pb-6">
                    <h6 class="font-encode-sans font-bold xl:text-base text-sm">
                        Nama produk panjangnya 2 baris
                    </h6>
                    <div class="flex justify-between items-center xl:my-3 my-2">
                        <h2 class="font-concert-one text-gray-400 xl:text-3xl text-xl">
                            Rp. 15.000
                        </h2>
                        <h6 class="py-1 px-2 rounded-md bg-red-500 text-white font-encode-sans font-bold text-sm xl:text-base">
                            Sold
                        </h6>
                    </div>
                    <h6 class="font-encode-sans text-gray-400 xl:text-base text-sm">
                        R̶p̶.̶ ̶3̶0̶.̶0̶0̶0
                    </h6>
                </div>
            </a>
        </div>
    </div>

    {{-- FEATURED PRODUCT --}}

    <div class="w-full bg-white rounded-md shadow-sm py-5">
        <h1 class="text-center font-concert-one text-4xl text-sky-500">
            Featured Product
        </h1>
    </div>
    <div class="mt-5">
        <div class=" w-3/4 mx-auto flex flex-wrap">
            <a href="" class="rounded-lg shadow-sm mx-2 mb-5 bg-white w-72">
                <img src="https://images.unsplash.com/photo-1461988320302-91bde64fc8e4?ixid=2yJhcHBfaWQiOjEyMDd9&w=750&dpr=2" class="w-72 h-72 bg-red-500 rounded-t-lg" alt="">
                <div class="p-4 pb-6">
                    <h6 class="font-encode-sans font-bold">
                        Nama produk panjangnya 2 baris
                    </h6>
                    <div class="flex justify-between items-center my-3">
                        <h2 class="font-concert-one text-gray-400 text-3xl">
                            Rp. 15.000
                        </h2>
                        <h6 class="py-1 px-2 rounded-md bg-red-500 text-white font-encode-sans font-bold">
                            Sold
                        </h6>
                    </div>
                    <h6 class="font-encode-sans text-gray-400">
                        R̶p̶.̶ ̶3̶0̶.̶0̶0̶0
                    </h6>
                </div>
            </a>
            <a href="" class="rounded-lg shadow-sm mx-2 mb-5 bg-white w-72">
                <img src="https://images.unsplash.com/photo-1461988320302-91bde64fc8e4?ixid=2yJhcHBfaWQiOjEyMDd9&w=750&dpr=2" class="w-72 h-72 bg-red-500 rounded-t-lg" alt="">
                <div class="p-4 pb-6">
                    <h6 class="font-encode-sans font-bold">
                        Nama produk panjangnya 2 baris
                    </h6>
                    <div class="flex justify-between items-center my-3">
                        <h2 class="font-concert-one text-gray-400 text-3xl">
                            Rp. 15.000
                        </h2>
                        <h6 class="py-1 px-2 rounded-md bg-red-500 text-white font-encode-sans font-bold">
                            Sold
                        </h6>
                    </div>
                    <h6 class="font-encode-sans text-gray-400">
                        R̶p̶.̶ ̶3̶0̶.̶0̶0̶0
                    </h6>
                </div>
            </a>
            <a href="" class="rounded-lg shadow-sm mx-2 mb-5 bg-white w-72">
                <img src="https://images.unsplash.com/photo-1461988320302-91bde64fc8e4?ixid=2yJhcHBfaWQiOjEyMDd9&w=750&dpr=2" class="w-72 h-72 bg-red-500 rounded-t-lg" alt="">
                <div class="p-4 pb-6">
                    <h6 class="font-encode-sans font-bold">
                        Nama produk panjangnya 2 baris
                    </h6>
                    <div class="flex justify-between items-center my-3">
                        <h2 class="font-concert-one text-gray-400 text-3xl">
                            Rp. 15.000
                        </h2>
                        <h6 class="py-1 px-2 rounded-md bg-red-500 text-white font-encode-sans font-bold">
                            Sold
                        </h6>
                    </div>
                    <h6 class="font-encode-sans text-gray-400">
                        R̶p̶.̶ ̶3̶0̶.̶0̶0̶0
                    </h6>
                </div>
            </a>
        </div>
    </div>
</div>

@endsection
