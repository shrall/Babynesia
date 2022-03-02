@extends('layouts.app')
@section('title', 'TokoBayiFiv')
@section('content')

@include('inc.navbar1')

<div class="container mx-auto xl:px-40 px-3 xl:pt-6 xl:pb-10 pt-3 pb-5">
    <div class="w-full bg-white rounded-md shadow-sm py-2 px-3">
        <p class="text-sky-500 text-sm sm:text-base font-encode-sans">
            <a href="{{ route('user.cart.index') }}" class="text-gray-400">Cart > </a>
            <a href="{{ route('user.receiver.create') }}" class="text-gray-400">Receiver ></a>
            <a href="{{ route('user.paymentart.index') }}" class="text-gray-400">Payment ></a>
            <a href="{{ route('user.detailcart.index') }}">Confirmation</a>
        </p>
        <h1 class="font-concert-one text-3xl text-sky-500 xl:text-4xl">
            Confirmation
        </h1>
    </div>
    <div class="w-full bg-white rounded-md shadow-sm mt-3 px-3 pt-3 pb-7 xl:px-4">
        <h6 class="text-slate-900 font-bold font-encode-sans mb-5 text-sm sm:text-base">
            Ordered Products
        </h6>
        <div class="w-full">
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
        <hr class="my-3">
        <div class="w-full">
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
        <hr class="my-3">
        <div class="w-full">
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
        <hr class="my-3">
        <div class="text-center">
            <p class="font-encode-sans text-gray-400 text-sm sm:text-base">
                Total Harga
            </p>
            <h6 class="text-pink-400 font-encode-sans font-bold">
                Rp. 270.000
            </h6>
        </div>
    </div>
    <div class="w-full bg-white rounded-md shadow-sm mt-3 px-3 pt-3 pb-7 xl:px-4">
        <h6 class="text-slate-900 font-bold font-encode-sans text-sm sm:text-base">
            Catatan Tambahan
        </h6>
        <div class="mt-3 p-2 rounded-lg border border-sky-500 text-sm sm:text-base font-encode-sans text-gray-400">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt eligendi a doloremque dicta quod
            asperiores molestiae impedit unde vero cupiditate.
        </div>
    </div>
    <div class="w-full bg-white rounded-md shadow-sm mt-3 px-3 pt-3 pb-7 xl:px-4">
        <h6 class="text-slate-900 font-bold font-encode-sans text-sm sm:text-base">
            Delivery Cost
        </h6>
        <div class="mt-3 px-7">
            <p class="font-encode-sans text-gray-400 text-sm sm:text-base">
                Biaya ongkos kirim akan di informasikan melalui email. <br>
                Perhitungan ongkos kirim:
            </p>
            <div class="ml-5 flex">
                <ul class="text-gray-400 list-disc text-sm sm:text-base">
                    <li>
                        Tujuan
                    </li>
                    <li>
                        Berat
                    </li>
                    <li>
                        Ongkos kirim
                    </li>
                </ul>
                <ul class="ml-5">
                    <li>:</li>
                    <li>:</li>
                    <li>:</li>
                </ul>
                <ul class="font-encode-sans text-slate-900 text-sm sm:text-base ml-2">
                    <li>Alamat rumah yang dituju</li>
                    <li>+- 1 kg</li>
                    <li>Ongkos kirim akan diinformasikan terpisah</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="sm:grid sm:grid-cols-2 sm:gap-3">
        <div class="w-full bg-white rounded-md shadow-sm mt-3 px-3 pt-3 pb-7 xl:px-4">
            <h6 class="font-encode-sans font-bold text-slate-900 text-sm sm:text-base">Receiver</h6>
            <div class="px-7 mt-3 flex">
                <ul class="font-encode-sans text-gray-400 text-sm sm:text-base">
                    <li>Name</li>
                    <li>Address</li>
                    <li>City</li>
                    <li>Province</li>
                    <li>Phone</li>
                    <li>Handphone</li>
                </ul>
                <ul class="ml-7 font-encode-sans text-gray-400 text-sm sm:text-base">
                    <li>:</li>
                    <li>:</li>
                    <li>:</li>
                    <li>:</li>
                    <li>:</li>
                    <li>:</li>
                </ul>
                <ul class="ml-2 font-encode-sans text-gray-400 text-sm sm:text-base">
                    <li>Namamu</li>
                    <li>Grued adrress goes here</li>
                    <li>Surabaya</li>
                    <li>Jawa Timur</li>
                    <li>1-2390129</li>
                    <li>0821304990</li>
                </ul>
            </div>
        </div>
        <div class="w-full bg-white rounded-md shadow-sm mt-3 px-3 pt-3 pb-7 xl:px-4">
            <h6 class="font-encode-sans font-bold text-slate-900 text-sm sm:text-base">Payment</h6>
            <div class="px-7 mt-3">
                <ul class="list-disc">
                    <li>
                        <div>
                            <h6 class="text-sm sm:text-base font-bold text-slate-900">
                                Mandiri
                            </h6>
                            <p class="text-gray-400 font-encode-sans text-sm sm:text-base">
                                142.000.7984.502
                                <i class="fa fa-copy ml-1 text-blue-400 border p-1 rounded-md border-blue-400"
                                    aria-hidden="true"></i>
                            </p>
                        </div>
                    </li>
                    <li class="mt-3">
                        <div>
                            <h6 class="text-sm sm:text-base font-bold text-slate-900">
                                BCA
                            </h6>
                            <p class="text-gray-400 font-encode-sans text-sm sm:text-base">
                                8620.101.070
                                <i class="fa fa-copy ml-1 text-blue-400 border p-1 rounded-md border-blue-400"
                                    aria-hidden="true"></i>
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <form action="{{ route('user.detailfaktur.index') }}" method="get">
        <div class="xl:flex xl:justify-between">
            <div class="w-full bg-white rounded-md shadow-sm mt-3 px-3 py-3 xl:px-4 xl:w-5/6">
                <div>
                    <input type="checkbox" id="persetujuan" name="setuju" value="setuju">
                    <label for="persetujuan" class="font-encode-sans text-red-500 text-sm sm:text-base">
                        I certify that I have read, understand, and agree to the terms and conditions
                    </label>
                </div>
                <div class="xl:hidden mt-7">
                    <div class="text-center">
                        <button type="submit"
                            class="border-2 border-pink-400 font-bold font-encode-sans text-pink-400 px-8 py-2 rounded-full">
                            Finish
                        </button>
                    </div>
                    <div class="text-center mt-1">
                        <a href="{{ route('user.paymentart.index') }}"
                            class="font-encode-sans text-gray-400 text-sm sm:text-base">
                            Back
                        </a>
                    </div>
                </div>
            </div>
            <div class="hidden xl:block">
                <div class="w-full text-center mt-3">
                    <button type="submit"
                        class="w-full inline-block border-2 border-pink-400 bg-white font-bold font-encode-sans text-pink-400 px-8 py-2 rounded-full">
                        Finish
                    </button>
                </div>
                <div class="w-full text-center mt-2">
                    <a href="{{ route('user.paymentart.index') }}"
                        class="w-full inline-block border-2 border-gray-400 bg-white font-bold font-encode-sans text-gray-400 px-8 py-2 rounded-full">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>

@include('inc.footer1')
@endsection
