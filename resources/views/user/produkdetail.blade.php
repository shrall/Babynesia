@extends('layouts.app')
@section('title', 'TokoBayiFiv')
@section('content')

@include('inc.navbar1')

<div class="container mx-auto xl:px-40 px-3 xl:pt-6 xl:pb-10 pt-3 pb-5">
    <div class="w-full bg-white rounded-md shadow-sm py-3 px-3 xl:hidden">
        <h1 class="font-concert-one text-3xl text-sky-500 xl:text-4xl">
            Nama Produk
        </h1>
        <p class="text-gray-400 text-sm sm:text-base font-encode-sans">
            Product description goes here
        </p>
    </div>
    <div class="xl:grid xl:grid-cols-2 xl:gap-3">
        <div class="mt-3">
            <div class="mb-3">
                <img src="https://images.unsplash.com/photo-1461988320302-91bde64fc8e4?ixid=2yJhcHBfaWQiOjEyMDd9&w=750&dpr=2"
                    alt="" class="aspect-square w-full rounded-lg object-cover">
            </div>
            <div class="flex items-center flex-wrap">
                <img src="https://images.unsplash.com/photo-1461988320302-91bde64fc8e4?ixid=2yJhcHBfaWQiOjEyMDd9&w=750&dpr=2"
                    alt="" class="aspect-square w-1/4 rounded-lg object-cover mr-3">
                <img src="https://images.unsplash.com/photo-1461988320302-91bde64fc8e4?ixid=2yJhcHBfaWQiOjEyMDd9&w=750&dpr=2"
                    alt="" class="aspect-square w-1/4 rounded-lg object-cover mr-3">
            </div>
        </div>
        <div class="mt-3 px-3 pt-3 pb-5 bg-white rounded-lg shadow-sm">
            <div class="hidden xl:block">
                <h1 class="font-concert-one text-sky-500 xl:text-4xl">
                    Nama Produk
                </h1>
                <p class="text-gray-400 font-encode-sans">
                    Product description goes here
                </p>
            </div>
            <div class="flex xl:mt-6">
                <p class="text-sm sm:text-base text-gray-400 font-encode-sans leading-7">
                    Category <br>
                    Brand/Produsen <br>
                    Berat
                </p>
                <p class="text-sm sm:text-base text-gray-400 font-encode-sans ml-5 leading-7">
                    : <br>
                    : <br>
                    :
                </p>
                <p class="font-bold sm:text-base font-encode-sans text-slate-900 text-sm ml-2 leading-7">
                    Baju Dewasa <br>
                    A/N <br>
                    150 gram
                </p>
            </div>
            <form action="{{ route('user.produk.create') }}" method="post">
                <div class="mt-3 xl:mt-6 grid grid-cols-3 sm:grid-cols-5 xl:grid-cols-4 gap-2">
                    <div class="w-full text-center">
                        <input type="radio" name="ukuran" class="hidden peer" id="tes">
                        <label for="tes"
                            class="border-2 border-gray-400 py-2 inline-block w-full text-gray-400 text-sm sm:text-base font-bold rounded-lg cursor-pointer peer-checked:bg-blue-400 peer-checked:text-white peer-checked:border-blue-400">
                            M-Cream
                        </label>
                    </div>
                    <div class="w-full text-center">
                        <input type="radio" name="ukuran" class="hidden peer" id="tes1">
                        <label for="tes1"
                            class="border-2 border-gray-400 py-2 inline-block w-full text-gray-400 text-sm sm:text-base font-bold rounded-lg cursor-pointer peer-checked:bg-blue-400 peer-checked:text-white peer-checked:border-blue-400">
                            XL-Cream
                        </label>
                    </div>
                    <div class="w-full text-center">
                        <input type="radio" name="ukuran" class="hidden peer" id="tes2">
                        <label for="tes2"
                            class="border-2 border-gray-400 py-2 inline-block w-full text-gray-400 text-sm sm:text-base font-bold rounded-lg cursor-pointer peer-checked:bg-blue-400 peer-checked:text-white peer-checked:border-blue-400">
                            M-Abu
                        </label>
                    </div>
                    <div class="w-full text-center">
                        <input type="radio" name="ukuran" class="hidden peer" id="tes3">
                        <label for="tes3"
                            class="border-2 border-gray-400 py-2 inline-block w-full text-gray-400 text-sm sm:text-base font-bold rounded-lg cursor-pointer peer-checked:bg-blue-400 peer-checked:text-white peer-checked:border-blue-400">
                            XL-Abu
                        </label>
                    </div>
                </div>
                <div class="mt-4 xl:mt-7 flex items-center justify-between">
                    <h6 class="font-encode-sans text-slate-900 font-bold text-sm sm:text-base">
                        Jumlah
                    </h6>
                    <div class="flex items-center">
                        <a href="#" type="button">
                            <i class="fa fa-chevron-left text-md p-1 bg-blue-400 focus:bg-pink-600 rounded-md text-white"
                                aria-hidden="true"></i>
                        </a>
                        <h6
                            class="font-encode-sans font-bold text-slate-900 text-sm sm:text-base px-2 py-1 border-2 rounded-lg border-blue-400 mx-2">
                            1</h6>
                        <input type="hidden">
                        <a href="#" type="button">
                            <i class="fa fa-chevron-right text-md p-1 bg-blue-400 focus:bg-pink-600 rounded-md text-white"
                                aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <div class="my-4 xl:my-7">
                    <h1 class="text-3xl font-concert-one text-slate-900">
                        Rp. 28.000
                    </h1>
                </div>
                <a href="#" role="button" id="open-modal"
                    class="bg-sky-500 hover:bg-sky-600 focus:ring-sky-300 rounded-full py-3 w-full inline-block text-center text-sm sm:text-base text-white font-encode-sans font-bold">
                    Add to Cart
                </a>

                {{-- modal --}}
                <div class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full"
                    id="my-modal-bg">
                </div>

                <div class="left-1/2 transform -translate-x-1/2 ease-out fixed hidden top-20 mx-auto py-5 px-7 border w-96 shadow-lg rounded-md bg-white"
                    id="my-modal">
                    <div class="flex justify-between">
                        <h1 class="text-3xl font-concert-one text-sky-500">
                            Add to Cart
                        </h1>
                        <a href="#" type="button" class="appearance-none" id="close-modal">
                            <i class="fa fa-times text-3xl text-rose-600" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="mt-4">
                        <div>
                            <label for="" class="text-sm font-encode-sans text-slate-900">Catatan
                                (size/color/etc)</label>

                        </div>
                        <textarea name="" id="" cols="20"
                            class="border-sky-500 border-2 appearance-none w-full rounded-lg p-1 text-slate-900 font-encode-sans"></textarea>
                    </div>
                    <button type="submit"
                        class="mt-5 bg-sky-500 hover:bg-sky-600 focus:ring-sky-300 rounded-full py-3 w-full inline-block text-center text-sm sm:text-base text-white font-encode-sans font-bold">
                        Add to Cart
                    </button>

                </div>
                {{-- modal end --}}
            </form>
        </div>
    </div>

    {{-- more product --}}
    <div class="mt-5 bg-white rounded-md px-3 py-5 shadow-sm">
        <h1 class="font-concert-one text-3xl text-sky-500 xl:text-4xl">
            More Product
        </h1>
    </div>
    <div class="mt-5 mb-5">
        <div class="grid grid-cols-2 gap-2 sm:grid-cols-4 sm:gap-3 xl:mx-auto">
            <a href="{{ route('user.produk.show', 1) }}" class="rounded-lg shadow-sm bg-white">
                <img src="https://images.unsplash.com/photo-1461988320302-91bde64fc8e4?ixid=2yJhcHBfaWQiOjEyMDd9&w=750&dpr=2"
                    class="aspect-square w-full bg-red-500 rounded-t-lg object-cover" alt="">
                <div class="p-4 pb-6">
                    <h6 class="font-encode-sans font-bold sm:text-base text-sm text-clip">
                        Nama produk panjangnya 2 baris
                    </h6>
                    <div class="flex justify-between items-center sm:my-3 my-2">
                        <h2 class="font-concert-one text-gray-400 xl:text-2xl text-xl">
                            Rp. 15.000
                        </h2>
                        <h6
                            class="py-1 px-2 rounded-md bg-red-500 text-white font-encode-sans font-bold text-sm sm:text-base">
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
</div>

<script>
    let modal = document.getElementById("my-modal");
    let modalbg = document.getElementById("my-modal-bg");
    let btn = document.getElementById("open-modal");
    let button = document.getElementById("close-modal");

    // We want the modal to open when the Open button is clicked
    btn.onclick = function () {
        modal.style.display = "block";
        modalbg.style.display = "block";
    }
    // We want the modal to close when the OK button is clicked
    button.onclick = function () {
        modal.style.display = "none";
        modalbg.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target == modalbg) {
            modal.style.display = "none";
            modalbg.style.display = "none";
        }
    }

</script>

@include('inc.footer1')

@endsection
