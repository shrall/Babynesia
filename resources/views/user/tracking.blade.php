@extends('layouts.app')
@section('title', 'TokoBayiFiv')
@section('content')

@include('inc.navbar1')

<div class="container mx-auto xl:px-32 px-3 xl:pt-6 xl:pb-10 pt-3 pb-5">
    <div class="w-full bg-white rounded-md shadow-sm pt-3 pb-4 px-3">
        <h1 class="font-concert-one text-3xl text-sky-500 xl:text-4xl">
            Tracking
        </h1>
        <div class="mt-3 flex flex-wrap gap-3">
            <div class="">
                <input type="radio" name="ukuran" class="hidden peer" id="tes">
                <label for="tes"
                    class="px-3 border-2 border-gray-400 py-2 inline-block w-full text-gray-400 text-sm sm:text-base font-bold rounded-lg cursor-pointer peer-checked:bg-blue-400 peer-checked:text-white peer-checked:border-blue-400">
                    Menunggu Konfirmasi
                </label>
            </div>
            <div class="">
                <input type="radio" name="ukuran" class="hidden peer" id="tes1">
                <label for="tes1"
                    class="px-3 border-2 border-gray-400 py-2 inline-block w-full text-gray-400 text-sm sm:text-base font-bold rounded-lg cursor-pointer peer-checked:bg-blue-400 peer-checked:text-white peer-checked:border-blue-400">
                    Dikirim
                </label>
            </div>
            <div class="">
                <input type="radio" name="ukuran" class="hidden peer" id="tes2">
                <label for="tes2"
                    class="px-3 border-2 border-gray-400 py-2 inline-block w-full text-gray-400 text-sm sm:text-base font-bold rounded-lg cursor-pointer peer-checked:bg-blue-400 peer-checked:text-white peer-checked:border-blue-400">
                    Selesai
                </label>
            </div>
            <div class="">
                <input type="radio" name="ukuran" class="hidden peer" id="tes3">
                <label for="tes3"
                    class="px-3 border-2 border-gray-400 py-2 inline-block w-full text-gray-400 text-sm sm:text-base font-bold rounded-lg cursor-pointer peer-checked:bg-blue-400 peer-checked:text-white peer-checked:border-blue-400">
                    Batal
                </label>
            </div>
        </div>
    </div>
    <div class="w-full bg-white rounded-md shadow-sm mt-3 px-3 py-5">
        <p class="text-gray-400 font-encode-sans text-sm sm:text-base">
            Invoice No. <span class="text-slate-900 font-bold">1051</span>
            <a href="#">
                <i class="fa fa-copy ml-1 text-blue-400 border p-1 hover:text-blue-500 hover:border-blue-500 rounded-md border-blue-400"
                    aria-hidden="true"></i>
            </a>
        </p>
        <div class="mt-3 sm:flex sm:justify-between ">
            <div class="flex">
                <div class="w-20 sm:w-40">
                    <img src="https://images.unsplash.com/photo-1461988320302-91bde64fc8e4?ixid=2yJhcHBfaWQiOjEyMDd9&w=750&dpr=2"
                        alt="" class="aspect-square w-full rounded-md object-cover">
                </div>
                <div class="ml-3">
                    <h6 class="font-bold font-encode-sans text-base text-clip text-slate-900">
                        Nama produk panjangnya 2 baris
                    </h6>
                    <p class="font-encode-sans mt-2 text-sm text-gray-400 sm:text-base">
                        Rp. 30.000,- x 3 barang
                    </p>
                    <p class="font-encode-sans mt-2 text-sm text-gray-400 sm:text-base">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        13 Oktober 2021
                    </p>

                    <h6
                        class="hidden sm:block py-1 px-2 w-fit bg-amber-400 mt-5 rounded-md font-bold font-encode-sans text-white text-sm sm:text-base">
                        Menunggu Konfirmasi
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
                <div class="mt-8">
                    <a href="#" type="button" onclick="showmodal()"
                        class="appearance-none xl:mt-8 py-2 px-3 border-2 border-pink-400 text-pink-400 rounded-md hover:bg-pink-400 hover:text-white font-bold font-encode-sans text-sm sm:text-base">
                        Lihat Detail
                    </a>
                </div>
            </div>
        </div>
        <div class="sm:hidden mt-2">
            <h6
                class="sm:hidden py-1 px-2 w-fit bg-amber-400 mt-5 rounded-md font-bold font-encode-sans text-white text-sm sm:text-base">
                Menunggu Konfirmasi
            </h6>
            <div class="mt-2 flex justify-between items-center">
                <div>
                    <p class="font-encode-sans text-sm sm:text-base text-gray-400">
                        Total Harga
                    </p>
                    <h6 class="font-encode-sans font-bold text-slate-900">
                        Rp. 90.000
                    </h6>
                </div>
                <div class="">
                    <a href="#" type="button" onclick="showmodal()"
                        class="appearance-none py-2 px-3 border-2 border-pink-400 text-pink-400 rounded-md hover:bg-pink-400 hover:text-white font-bold font-encode-sans text-sm sm:text-base">
                        Lihat Detail
                    </a>
                </div>

            </div>
        </div>
    </div>

    <div class="w-full bg-white rounded-md shadow-sm mt-3 px-3 py-5">
        <p class="text-gray-400 font-encode-sans text-sm sm:text-base">
            Invoice No. <span class="text-slate-900 font-bold">1051</span>
            <a href="#">
                <i class="fa fa-copy ml-1 text-blue-400 border p-1 hover:text-blue-500 hover:border-blue-500 rounded-md border-blue-400"
                    aria-hidden="true"></i>
            </a>
        </p>
        <div class="mt-3 sm:flex sm:justify-between ">
            <div class="flex">
                <div class="w-20 sm:w-40">
                    <img src="https://images.unsplash.com/photo-1461988320302-91bde64fc8e4?ixid=2yJhcHBfaWQiOjEyMDd9&w=750&dpr=2"
                        alt="" class="aspect-square w-full rounded-md object-cover">
                </div>
                <div class="ml-3">
                    <h6 class="font-bold font-encode-sans text-base text-clip text-slate-900">
                        Nama produk panjangnya 2 baris
                    </h6>
                    <p class="font-encode-sans mt-2 text-sm text-gray-400 sm:text-base">
                        Rp. 30.000,- x 3 barang
                    </p>
                    <p class="font-encode-sans mt-2 text-sm text-gray-400 sm:text-base">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        13 Oktober 2021
                    </p>

                    <h6
                        class="hidden sm:block py-1 px-2 w-fit bg-blue-400 mt-5 rounded-md font-bold font-encode-sans text-white text-sm sm:text-base">
                        Dikirim
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
                <div class="mt-8">
                    <a href="#" type="button" onclick="showmodal()"
                        class="appearance-none xl:mt-8 py-2 px-3 border-2 border-pink-400 text-pink-400 rounded-md hover:bg-pink-400 hover:text-white font-bold font-encode-sans text-sm sm:text-base">
                        Lihat Detail
                    </a>
                </div>
            </div>
        </div>
        <div class="sm:hidden mt-2">
            <h6
                class="sm:hidden py-1 px-2 w-fit bg-blue-400 mt-5 rounded-md font-bold font-encode-sans text-white text-sm sm:text-base">
                Dikirim
            </h6>
            <div class="mt-2 flex justify-between items-center">
                <div>
                    <p class="font-encode-sans text-sm sm:text-base text-gray-400">
                        Total Harga
                    </p>
                    <h6 class="font-encode-sans font-bold text-slate-900">
                        Rp. 90.000
                    </h6>
                </div>
                <div class="">
                    <a href="#" type="button" onclick="showmodal()"
                        class="appearance-none py-2 px-3 border-2 border-pink-400 text-pink-400 rounded-md hover:bg-pink-400 hover:text-white font-bold font-encode-sans text-sm sm:text-base">
                        Lihat Detail
                    </a>
                </div>

            </div>
        </div>
    </div>

    <div class="w-full bg-white rounded-md shadow-sm mt-3 px-3 py-5">
        <p class="text-gray-400 font-encode-sans text-sm sm:text-base">
            Invoice No. <span class="text-slate-900 font-bold">1051</span>
            <a href="#">
                <i class="fa fa-copy ml-1 text-blue-400 border p-1 hover:text-blue-500 hover:border-blue-500 rounded-md border-blue-400"
                    aria-hidden="true"></i>
            </a>
        </p>
        <div class="mt-3 sm:flex sm:justify-between ">
            <div class="flex">
                <div class="w-20 sm:w-40">
                    <img src="https://images.unsplash.com/photo-1461988320302-91bde64fc8e4?ixid=2yJhcHBfaWQiOjEyMDd9&w=750&dpr=2"
                        alt="" class="aspect-square w-full rounded-md object-cover">
                </div>
                <div class="ml-3">
                    <h6 class="font-bold font-encode-sans text-base text-clip text-slate-900">
                        Nama produk panjangnya 2 baris
                    </h6>
                    <p class="font-encode-sans mt-2 text-sm text-gray-400 sm:text-base">
                        Rp. 30.000,- x 3 barang
                    </p>
                    <p class="font-encode-sans mt-2 text-sm text-gray-400 sm:text-base">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        13 Oktober 2021
                    </p>

                    <h6
                        class="hidden sm:block py-1 px-2 w-fit bg-lime-600 mt-5 rounded-md font-bold font-encode-sans text-white text-sm sm:text-base">
                        Selesai
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
                <div class="mt-8">
                    <a href="#" type="button" onclick="showmodal()"
                        class="appearance-none xl:mt-8 py-2 px-3 border-2 border-pink-400 text-pink-400 rounded-md hover:bg-pink-400 hover:text-white font-bold font-encode-sans text-sm sm:text-base">
                        Lihat Detail
                    </a>
                </div>
            </div>
        </div>
        <div class="sm:hidden mt-2">
            <h6
                class="sm:hidden py-1 px-2 w-fit bg-lime-600 mt-5 rounded-md font-bold font-encode-sans text-white text-sm sm:text-base">
                Selesai
            </h6>
            <div class="mt-2 flex justify-between items-center">
                <div>
                    <p class="font-encode-sans text-sm sm:text-base text-gray-400">
                        Total Harga
                    </p>
                    <h6 class="font-encode-sans font-bold text-slate-900">
                        Rp. 90.000
                    </h6>
                </div>
                <div class="">
                    <a href="#" type="button" onclick="showmodal()"
                        class="appearance-none py-2 px-3 border-2 border-pink-400 text-pink-400 rounded-md hover:bg-pink-400 hover:text-white font-bold font-encode-sans text-sm sm:text-base">
                        Lihat Detail
                    </a>
                </div>

            </div>
        </div>
    </div>

    {{-- modal --}}
    <div class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" id="modal-bg">
    </div>

    <div id="detail-modal"
        class="left-1/2 transform -translate-x-1/2 ease-out hidden fixed sm:px-24 xl:px-80 w-full px-3 sm:top-20 top-0 overflow-y-auto h-vh-80">
        <div class="mx-auto py-3 sm:py-5 px-3 sm:px-7 w-full shadow-lg rounded-md bg-white">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-concert-one text-sky-500">
                        Detail Transaksi
                    </h1>
                    <p class="text-gray-400 font-encode-sans text-sm sm:text-base">
                        Invoice No. <span class="text-slate-900 font-bold">1051</span>
                        <a href="#">
                            <i class="fa fa-copy ml-1 text-blue-400 border p-1 hover:text-blue-500 hover:border-blue-500 rounded-md border-blue-400"
                                aria-hidden="true"></i>
                        </a>
                    </p>
                </div>
                <a href="#" type="button" class="appearance-none" id="close-modal">
                    <i class="fa fa-times text-3xl text-red-500" aria-hidden="true"></i>
                </a>
            </div>
            <hr class="my-3">
            <div class="border border-gray-400  py-3 px-4 rounded-lg flex justify-between items-center">
                <div class="flex">
                    <div class="w-20">
                        <img src="https://images.unsplash.com/photo-1461988320302-91bde64fc8e4?ixid=2yJhcHBfaWQiOjEyMDd9&w=750&dpr=2"
                            alt="" class="aspect-square w-full rounded-md object-cover">
                    </div>
                    <div class="ml-3">
                        <h6 class="font-bold font-encode-sans text-sm sm:text-base text-clip text-slate-900">
                            Nama produk panjangnya 2 baris
                        </h6>
                        <p class="font-encode-sans mt-1 text-sm sm:text-base text-gray-400">
                            Rp. 30.000,- x 3 barang
                        </p>
                        <p class="font-encode-sans mt-1 text-sm sm:text-base text-gray-400 ">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            13 Oktober 2021
                        </p>
                    </div>
                </div>
                <div class="border-l-2 border-gray-100 pl-4 w-28">
                    <div>
                        <p class="font-encode-sans text-sm sm:text-base text-gray-400">
                            Total Harga
                        </p>
                        <h6 class="font-encode-sans font-bold sm:text-base text-sm text-slate-900">
                            Rp. 90.000
                        </h6>
                    </div>
                </div>
            </div>
            <div class="mt-2 border border-gray-400 py-3 px-4 rounded-lg">
                <h6 class="font-bold font-encode-sans text-sm sm:text-base text-slate-900">
                    Tracking
                </h6>
                <ul class="mt-2 list-disc ml-5">
                    <li class=>
                        <div class="flex justify-between items-end">
                            <h6 class="font-bold font-encode-sans text-sm sm:text-base text-slate-900">
                                Paket dikirim - 17 Nov 2021
                            </h6>
                            <p class="text-sm sm:text-base text-right font-encode-sans text-gray-400">
                                13.20 WIB
                            </p>
                        </div>
                        <p class="text-sm sm:text-base text-clip font-encode-sans text-gray-400">
                            Paket telah dikirim dari mojokerto pada tanggal sekian
                        </p>
                    </li>
                    <li class="mt-3">
                        <div class="flex justify-between items-end">
                            <h6 class="font-bold font-encode-sans text-sm sm:text-base text-slate-900">
                                Paket dikirim - 17 Nov 2021
                            </h6>
                            <p class="text-sm sm:text-base text-right font-encode-sans text-gray-400">
                                13.20 WIB
                            </p>
                        </div>
                        <p class="text-sm sm:text-base text-clip font-encode-sans text-gray-400">
                            Paket telah dikirim dari mojokerto pada tanggal sekian
                        </p>
                    </li>
                    <li class="mt-3">
                        <div class="flex justify-between items-end">
                            <h6 class="font-bold font-encode-sans text-sm sm:text-base text-slate-900">
                                Paket dikirim - 17 Nov 2021
                            </h6>
                            <p class="text-sm sm:text-base text-right font-encode-sans text-gray-400">
                                13.20 WIB
                            </p>
                        </div>
                        <p class="text-sm sm:text-base text-clip font-encode-sans text-gray-400">
                            Paket telah dikirim dari mojokerto pada tanggal sekian
                        </p>
                    </li>
                </ul>
            </div>
            <div class="mt-2 border border-gray-400 py-3 px-4 rounded-lg">
                <h6 class="font-bold font-encode-sans text-sm sm:text-base text-slate-900">
                    Info Produk
                </h6>
                <div class="ml-5 mt-2 flex">
                    <ul class="font-encode-sans text-gray-400 text-sm sm:text-base">
                        <li>Category</li>
                        <li>Brand/Produsen</li>
                        <li>Berat</li>
                        <li>Pilihan Varian</li>
                    </ul>
                    <ul class="font-encode-sans text-gray-400 text-sm sm:text-base ml-3">
                        <li>:</li>
                        <li>:</li>
                        <li>:</li>
                        <li>:</li>
                    </ul>
                    <ul class="font-encode-sans text-slate-4900 text-sm sm:text-base ml-1">
                        <li>Baju Dewasa</li>
                        <li>A/N</li>
                        <li>150 gram</li>
                        <li>XL Navy</li>
                    </ul>
                </div>
            </div>
            <div class="mt-2 border border-gray-400 py-3 px-4 rounded-lg">
                <h6 class="font-bold font-encode-sans text-sm sm:text-base text-slate-900">
                    Info Pengiriman
                </h6>
                <div class="ml-5 mt-2 flex">
                    <ul class="font-encode-sans text-gray-400 text-sm sm:text-base">
                        <li>Kurir</li>
                        <li>No Resi</li>
                        <li>Alamat</li>
                    </ul>
                    <ul class="font-encode-sans text-gray-400 text-sm sm:text-base ml-3">
                        <li>:</li>
                        <li>:</li>
                        <li>:</li>
                    </ul>
                    <ul class="font-encode-sans text-slate-4900 text-sm sm:text-base ml-1">
                        <li>Baju Dewasa</li>
                        <li>5030503</li>
                        <li>Alamat rumahmu, Surabaya 60914</li>
                    </ul>
                </div>
            </div>
            <div class="mt-2 border border-gray-400 py-3 px-4 rounded-lg">
                <h6 class="font-bold font-encode-sans text-sm sm:text-base text-slate-900">
                    Rincian Pembayaran
                </h6>
                <div class="px-4 mt-2 flex justify-between">
                    <p class="font-encode-sans text-slate-900 text-sm sm:text-base">
                        Metode pembayaran
                    </p>
                    <p class="font-encode-sans text-right text-slate-900 text-sm sm:text-base">
                        Transfer
                    </p>
                </div>
                <hr class="my-1">
                <div class="px-4 flex justify-between">
                    <p class="font-encode-sans text-slate-900 text-sm sm:text-base">
                        Total harga barang
                    </p>
                    <p class="font-encode-sans text-right text-slate-900 text-sm sm:text-base">
                        Rp. 100.000
                    </p>
                </div>
                <div class="px-4 mt-2 flex justify-between">
                    <p class="font-encode-sans text-slate-900 text-sm sm:text-base">
                        Ongkos pengiriman
                    </p>
                    <p class="font-encode-sans text-right text-slate-900 text-sm sm:text-base">
                        Rp. 25.000
                    </p>
                </div>
                <hr class="my-1">
                <div class="px-4 flex justify-between">
                    <p class="font-encode-sans text-slate-900 font-bold text-sm sm:text-base">
                        Total harga
                    </p>
                    <p class="font-encode-sans text-right text-slate-900 font-bold text-sm sm:text-base">
                        Rp. 125.000
                    </p>
                </div>
            </div>
            <div class="mt-2 border border-gray-400 py-3 px-4 rounded-lg">
                <h6 class="font-bold font-encode-sans text-sm sm:text-base text-slate-900">
                    Status pengiriman
                </h6>
                <div class="ml-5">
                    <h6
                        class="hidden sm:block py-1 px-2 w-fit bg-amber-400 mt-5 rounded-md font-bold font-encode-sans text-white text-sm sm:text-base">
                        Menunggu Konfirmasi
                    </h6>
                </div>
            </div>

        </div>
    </div>

    {{-- modal end --}}

</div>

<script>
    let modal = document.getElementById("detail-modal");
    let modalbg = document.getElementById("modal-bg");
    let button = document.getElementById("close-modal");

    // We want the modal to open when the Open button is clicked
    function showmodal() {
        modal.style.display = "block";
        modalbg.style.display = "block";

        // Get the current page scroll position
        scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        scrollLeft = window.pageXOffset || document.documentElement.scrollLeft,

        // if any scroll is attempted, set this to the previous value
        window.onscroll = function() {
            window.scrollTo(scrollLeft, scrollTop);
        };
    }
    // btn.onclick = function () {
    //     modal.style.display = "block";
    //     modalbg.style.display = "block";
    // }

    // We want the modal to close when the OK button is clicked
    button.onclick = function () {
        modal.style.display = "none";
        modalbg.style.display = "none";

        window.onscroll = function() {};
    }

    window.onclick = function (event) {
        if (event.target == modalbg) {
            modal.style.display = "none";
            modalbg.style.display = "none";

            window.onscroll = function() {};
        }
    }

</script>

@include('inc.footer1')

@endsection
