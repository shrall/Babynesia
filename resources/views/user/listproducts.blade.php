@extends('layouts.app')
@section('title', 'TokoBayiFiv')
@section('content')

@include('inc.navbar1')

<div class="container mx-auto xl:px-40 px-3 xl:pt-6 xl:pb-10 pt-3 pb-5 xl:grid xl:grid-cols-4 gap-4 xl:auto-cols-min">
    <div class="hidden xl:block">
        <div class="bg-sky-500 rounded-t-lg px-4 py-3">
            <h6 class="font-encode-sans text-white text-sm font-bold">
                Filter
            </h6>
        </div>
        <div class="bg-white rounded-b-lg shadow-sm px-3 py-3">
            <h2 class="font-concert-one text-slate-900 text-2xl">Type</h2>
            <ul class="mt-3">
                <li class="my-1">
                    <a href="" class="text-gray-400 text-sm font-bold font-encode-sans">
                        New Product
                    </a>
                </li>
                <li class="my-1">
                    <a href="" class="text-gray-400 text-sm font-bold font-encode-sans">
                        Hotdeals
                    </a>
                </li>
                <li class="my-1">
                    <a href="" class="text-gray-400 text-sm font-bold font-encode-sans">
                        Restock
                    </a>
                </li>
            </ul>
            <h2 class="font-concert-one text-slate-900 text-2xl mt-5">Kategori</h2>
            <ul class="mt-3">
                <li class="my-1">
                    <a href="" class="text-sky-500 text-sm font-bold font-encode-sans">
                        Shoes
                    </a>
                </li>
                <li class="my-1">
                    <a href="" class="text-gray-400 text-sm font-bold font-encode-sans">
                        Bedding Accesories
                    </a>
                </li>
                <li class="my-1">
                    <a href="" class="text-gray-400 text-sm font-bold font-encode-sans">
                        Clothes
                    </a>
                </li>
                <li class="my-1">
                    <a href="" class="text-gray-400 text-sm font-bold font-encode-sans">
                        Pajamas
                    </a>
                </li>
                <li class="my-1">
                    <a href="" class="text-gray-400 text-sm font-bold font-encode-sans">
                        Sock and Legging
                    </a>
                </li>
                <li class="my-1">
                    <a href="" class="text-gray-400 text-sm font-bold font-encode-sans">
                        Accesories
                    </a>
                </li>
                <li class="my-1">
                    <a href="" class="text-gray-400 text-sm font-bold font-encode-sans">
                        Bento Tools
                    </a>
                </li>
                <li class="my-1">
                    <a href="" class="text-gray-400 text-sm font-bold font-encode-sans">
                        Diaper Bag & Kids Bag
                    </a>
                </li>
                <li class="my-1">
                    <a href="" class="text-gray-400 text-sm font-bold font-encode-sans">
                        Peralatan Renang & Mandi
                    </a>
                </li>
                <li class="my-1">
                    <a href="" class="text-gray-400 text-sm font-bold font-encode-sans">
                        Storage and Organiser Items
                    </a>
                </li>
                <li class="my-1">
                    <a href="" class="text-gray-400 text-sm font-bold font-encode-sans">
                        Baju Dewasa
                    </a>
                </li>
                <li class="my-1">
                    <a href="" class="text-gray-400 text-sm font-bold font-encode-sans">
                        Casual Dewasa
                    </a>
                </li>
                <li class="my-1">
                    <a href="" class="text-gray-400 text-sm font-bold font-encode-sans">
                        Casual Set
                    </a>
                </li>
                <li class="my-1">
                    <a href="" class="text-gray-400 text-sm font-bold font-encode-sans">
                        Feeding and Breast Feeding Accesories
                    </a>
                </li>
                <li class="my-1">
                    <a href="" class="text-gray-400 text-sm font-bold font-encode-sans">
                        Safety Tools
                    </a>
                </li>
                <li class="my-1">
                    <a href="" class="text-gray-400 text-sm font-bold font-encode-sans">
                        Others
                    </a>
                </li>
            </ul>
        </div>
    
    </div>
    <div class="col-span-3">
        <div class="bg-white rounded-md px-3 py-5 flex justify-between items-center shadow-sm">
            <h1 class="font-concert-one text-3xl text-sky-500 xl:text-4xl">
                Shoes
            </h1>
            <a href="" class="rounded-full px-4 py-2 bg-sky-500 text-white text-sm font-bold xl:hidden font-encode-sans">
                Filter
            </a>
        </div>
        <div class="mt-5 mb-5">
            <div class="grid grid-cols-2 gap-2 sm:grid-cols-3 sm:gap-3 xl:mx-auto">
                <a href="{{ route('user.produk.show', 1) }}" class="rounded-lg shadow-sm bg-white">
                    <img src="https://images.unsplash.com/photo-1461988320302-91bde64fc8e4?ixid=2yJhcHBfaWQiOjEyMDd9&w=750&dpr=2" class="aspect-square w-full bg-red-500 rounded-t-lg object-cover" alt="">
                    <div class="p-4 pb-6">
                        <h6 class="font-encode-sans font-bold sm:text-base text-sm text-clip">
                            Nama produk panjangnya 2 baris
                        </h6>
                        <div class="flex justify-between items-center sm:my-3 my-2">
                            <h2 class="font-concert-one text-gray-400 xl:text-2xl text-xl">
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
        <div class="bg-white rounded-md px-3 py-3 flex justify-center items-center shadow-sm">
            <a href="">
                <i class="fa fa-chevron-left mx-2" aria-hidden="true"></i>
            </a>
            <a href="" class="p-2 bg-sky-500 text-sm font-bold font-encode-sans mx-2 rounded-md text-white">1</a>
            <a href="" class="text-sm xl:text-base mx-2 sm:mx-3">2</a>
            <a href="" class="text-sm xl:text-base mx-2 sm:mx-3">3</a>
            <a href="" class="text-sm xl:text-base mx-2 sm:mx-3">4</a>
            <a href="" class="text-sm xl:text-base mx-2 sm:mx-3">5</a>
            <a href="" class="text-sm xl:text-base mx-2 sm:mx-3">...</a>
            <a href="" class="text-sm xl:text-base mx-2 sm:mx-3">32</a>
            <a href="">
                <i class="fa fa-chevron-right mx-2" aria-hidden="true"></i> 
            </a>
        </div>
    </div>
</div>

@include('inc.footer1')

@endsection