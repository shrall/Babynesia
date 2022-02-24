@extends('layouts.app')
@section('title', 'TokoBayiFiv')
@section('content')

<div class="container mx-auto xl:px-40 px-3 xl:pt-6 xl:pb-10 pt-3 pb-5">
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
    <div class="mt-5 mb-5">
        <div class="grid grid-cols-2 gap-2 sm:grid-cols-3 sm:gap-3">
            <a href="" class="rounded-lg shadow-sm bg-white">
                <img src="https://images.unsplash.com/photo-1461988320302-91bde64fc8e4?ixid=2yJhcHBfaWQiOjEyMDd9&w=750&dpr=2" class="aspect-square w-full bg-red-500 rounded-t-lg object-cover" alt="">
                <div class="p-4 pb-6">
                    <h6 class="font-encode-sans font-bold sm:text-base text-sm text-clip">
                        Nama produk panjangnya 2 baris
                    </h6>
                    <div class="flex justify-between items-center sm:my-3 my-2">
                        <h2 class="font-concert-one text-gray-400 xl:text-3xl text-xl">
                            Rp. 15.000
                        </h2>
                        <h6 class="py-1 px-2 rounded-md bg-red-500 text-white font-encode-sans font-bold text-sm sm:text-base">
                            Sold
                        </h6>
                    </div>
                    <h6 class="font-encode-sans text-gray-400 sm:text-base text-sm">
                        R̶p̶.̶ ̶3̶0̶.̶0̶0̶0
                    </h6>
                </div>
            </a>
            <a href="" class="rounded-lg shadow-sm bg-white">
                <img src="https://images.unsplash.com/photo-1461988320302-91bde64fc8e4?ixid=2yJhcHBfaWQiOjEyMDd9&w=750&dpr=2" class="aspect-square w-full bg-red-500 rounded-t-lg object-cover" alt="">
                <div class="p-4 pb-6">
                    <h6 class="font-encode-sans font-bold sm:text-base text-sm text-clip">
                        Nama produk panjangnya 2 baris
                    </h6>
                    <div class="flex justify-between items-center sm:my-3 my-2">
                        <h2 class="font-concert-one text-gray-400 xl:text-3xl text-xl">
                            Rp. 15.000
                        </h2>
                        <h6 class="py-1 px-2 rounded-md bg-red-500 text-white font-encode-sans font-bold text-sm sm:text-base">
                            Sold
                        </h6>
                    </div>
                    <h6 class="font-encode-sans text-gray-400 sm:text-base text-sm">
                        R̶p̶.̶ ̶3̶0̶.̶0̶0̶0
                    </h6>
                </div>
            </a>
            <a href="" class="rounded-lg shadow-sm bg-white">
                <img src="https://images.unsplash.com/photo-1461988320302-91bde64fc8e4?ixid=2yJhcHBfaWQiOjEyMDd9&w=750&dpr=2" class="aspect-square w-full bg-red-500 rounded-t-lg object-cover" alt="">
                <div class="p-4 pb-6">
                    <h6 class="font-encode-sans font-bold sm:text-base text-sm text-clip">
                        Nama produk panjangnya 2 baris
                    </h6>
                    <div class="flex justify-between items-center sm:my-3 my-2">
                        <h2 class="font-concert-one text-gray-400 xl:text-3xl text-xl">
                            Rp. 15.000
                        </h2>
                        <h6 class="py-1 px-2 rounded-md bg-red-500 text-white font-encode-sans font-bold text-sm sm:text-base">
                            Sold
                        </h6>
                    </div>
                    <h6 class="font-encode-sans text-gray-400 sm:text-base text-sm">
                        R̶p̶.̶ ̶3̶0̶.̶0̶0̶0
                    </h6>
                </div>
            </a>
            <a href="" class="rounded-lg shadow-sm bg-white">
                <img src="https://images.unsplash.com/photo-1461988320302-91bde64fc8e4?ixid=2yJhcHBfaWQiOjEyMDd9&w=750&dpr=2" class="aspect-square w-full bg-red-500 rounded-t-lg object-cover" alt="">
                <div class="p-4 pb-6">
                    <h6 class="font-encode-sans font-bold sm:text-base text-sm text-clip">
                        Nama produk panjangnya 2 baris
                    </h6>
                    <div class="flex justify-between items-center sm:my-3 my-2">
                        <h2 class="font-concert-one text-gray-400 xl:text-3xl text-xl">
                            Rp. 15.000
                        </h2>
                        <h6 class="py-1 px-2 rounded-md bg-red-500 text-white font-encode-sans font-bold text-sm sm:text-base">
                            Sold
                        </h6>
                    </div>
                    <h6 class="font-encode-sans text-gray-400 sm:text-base text-sm">
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
    <div class="mt-5 mb-5">
        <div class="grid grid-cols-2 gap-2 xl:grid-cols-3 xl:gap-3 mb-7">
            {{-- sek gajelas --}}
            <a href="" class="rounded-lg shadow-sm bg-white">
                <img src="https://images.unsplash.com/photo-1461988320302-91bde64fc8e4?ixid=2yJhcHBfaWQiOjEyMDd9&w=750&dpr=2" class="aspect-square w-full bg-red-500 rounded-t-lg object-cover" alt="">
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
            <a href="" class="rounded-lg shadow-sm bg-white">
                <img src="https://images.unsplash.com/photo-1461988320302-91bde64fc8e4?ixid=2yJhcHBfaWQiOjEyMDd9&w=750&dpr=2" class="aspect-square w-full bg-red-500 rounded-t-lg object-cover" alt="">
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
            <a href="" class="rounded-lg shadow-sm bg-white">
                <img src="https://images.unsplash.com/photo-1461988320302-91bde64fc8e4?ixid=2yJhcHBfaWQiOjEyMDd9&w=750&dpr=2" class="aspect-square w-full bg-red-500 rounded-t-lg object-cover" alt="">
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
        <div class="flex justify-center">
            <a href="{{ route('user.list_products') }}" class="border-2 border-pink-400 font-bold font-encode-sans text-pink-400 px-4 py-2 rounded-full">
                More Products
            </a>
        </div>
        
    </div>
</div>

@endsection
