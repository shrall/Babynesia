@extends('layouts.app')
@section('content')

@include('inc.navbar1')

<div class="container mx-auto xl:px-32 px-3 xl:pt-6 xl:pb-10 pt-3 pb-5">
    <div class="w-full bg-white rounded-md shadow-sm py-3 px-3">
        <h1 class="font-concert-one text-3xl text-{{ $color[1] }}-500 xl:text-4xl">
            FAQ
        </h1>
    </div>

    @foreach ($faqs as $faq)
        
    <div class="mt-3 w-full bg-white rounded-md shadow-sm py-3 px-3 relative grid grid-cols-12 justify-between">
        <input type="checkbox" name="faq" id="pertanyaan2" class="peer" hidden>
        <label for="pertanyaan2" class="cursor-pointer inline-block h-full w-full absolute"></label>
        <h6 class="font-encode-sans font-bold text-slate-900 w-full text-sm sm:text-base col-span-11">
            {{ $faq->pertanyaan }}
        </h6>
        <i class="fa fa-chevron-down text-xl text-slate-900 peer-checked:rotate-180 w-fit" aria-hidden="true"></i>
        <div class="mt-2 peer-checked:block hidden pb-5 col-span-12">
            <p class="px-5 text-gray-400 font-encode-sans text-sm sm:text-base">
                {{ $faq->jawaban }}
            </p>
        </div>
    </div>

    @endforeach
    
    {{-- <div class="mt-3 w-full bg-white rounded-md shadow-sm py-3 px-3 relative grid grid-cols-12 justify-between">
        <input type="checkbox" name="faq" id="pertanyaan1" class="peer" hidden>
        <label for="pertanyaan1" class="cursor-pointer inline-block h-full w-full absolute"></label>
        <h6 class="font-encode-sans font-bold text-slate-900 w-full text-sm sm:text-base col-span-11">
            Bagaimana cara belanja di TokoBayiFiv
        </h6>
        <i class="fa fa-chevron-down text-xl text-slate-900 peer-checked:rotate-180 w-fit" aria-hidden="true"></i>
        <div class="mt-2 peer-checked:block hidden pb-5 col-span-12">
            <ul class="pl-8 pr-5 text-gray-400 font-encode-sans text-sm sm:text-base list-disc">
                <li>Silahkan login dahulu. Bila belum terdaftar, lakukan registrasi member.</li>
                <li>Pilih produk. Produk akan otomatis tersimpan di keranjang belanja.</li>
                <li>Cantumkan alamat tujuan kirim (bisa berbeda dari alamat yang terdaftar saat registrasi)</li>
                <li>Pilih bank tujuan transfer.</li>
                <li>Konfirmasi dan selesai.</li>
                <li>Tunggu email konfirmasi dari TokoBayiFiv berisi rincian order.</li>
                <li>Lakukan pembayaran max 48 jam setelah email diterima ke rekening bank yang tercantum di email.
                    <span class="text-{{ $color[2] }}-400 font-bold">Waktu tunggu / keep adalah 24 jam.</span> Bila pembayaran
                    belum diterima dalam kurun waktu tersebut, order akan otomatis dibatalkan dan barang kembali
                    disediakan untuk dibeli oleh customer lain.</li>
                <li>Konfirmasi pembayaran ke <span class="font-bold text-{{ $color[2] }}-400">SMS/WA 0812.5020.5040</span> dengan
                    format: <br> <br> <span class="text-slate-900 font-bold">BAYAR - NOTA 1234 - RP 500.000 - TGL
                        20/1/2013 - BCA</span> </li>
                <br>
                <li>Waktu proses pengiriman barang kami adalah max 48 jam setelah pembayaran diterima.</li>
            </ul>
        </div>
    </div>

    <div class="mt-3 w-full bg-white rounded-md shadow-sm py-3 px-3 relative grid grid-cols-12 justify-between">
        <input type="checkbox" name="faq" id="pertanyaan2" class="peer" hidden>
        <label for="pertanyaan2" class="cursor-pointer inline-block h-full w-full absolute"></label>
        <h6 class="font-encode-sans font-bold text-slate-900 w-full text-sm sm:text-base col-span-11">
            Pembelian Eceran
        </h6>
        <i class="fa fa-chevron-down text-xl text-slate-900 peer-checked:rotate-180 w-fit" aria-hidden="true"></i>
        <div class="mt-2 peer-checked:block hidden pb-5 col-span-12">
            <p class="px-5 text-gray-400 font-encode-sans text-sm sm:text-base">
                tes isi
            </p>
        </div>
    </div>

    <div class="mt-3 w-full bg-white rounded-md shadow-sm py-3 px-3 relative grid grid-cols-12 justify-between">
        <input type="checkbox" name="faq" id="pertanyaan3" class="peer" hidden>
        <label for="pertanyaan3" class="cursor-pointer inline-block h-full w-full absolute"></label>
        <h6 class="font-encode-sans font-bold text-slate-900 w-full text-sm sm:text-base col-span-11">
            Bisa Grosir? PO?
        </h6>
        <i class="fa fa-chevron-down text-xl text-slate-900 peer-checked:rotate-180 w-fit" aria-hidden="true"></i>
        <div class="mt-2 peer-checked:block hidden pb-5 col-span-12">
            <p class="px-5 text-gray-400 font-encode-sans text-sm sm:text-base">
                tes isi
            </p>
        </div>
    </div>

    <div class="mt-3 w-full bg-white rounded-md shadow-sm py-3 px-3 relative grid grid-cols-12 justify-between">
        <input type="checkbox" name="faq" id="pertanyaan4" class="peer" hidden>
        <label for="pertanyaan4" class="cursor-pointer inline-block h-full w-full absolute"></label>
        <h6 class="font-encode-sans font-bold text-slate-900 w-full text-sm sm:text-base col-span-11">
            Bisa Dropship?
        </h6>
        <i class="fa fa-chevron-down text-xl text-slate-900 peer-checked:rotate-180 w-fit" aria-hidden="true"></i>
        <div class="mt-2 peer-checked:block hidden pb-5 col-span-12">
            <p class="px-5 text-gray-400 font-encode-sans text-sm sm:text-base">
                tes isi
            </p>
        </div>
    </div>

    <div class="mt-3 w-full bg-white rounded-md shadow-sm py-3 px-3 relative grid grid-cols-12 justify-between">
        <input type="checkbox" name="faq" id="pertanyaan5" class="peer" hidden>
        <label for="pertanyaan5" class="cursor-pointer inline-block h-full w-full absolute"></label>
        <h6 class="font-encode-sans font-bold text-slate-900 w-full text-sm sm:text-base col-span-11">
            Boleh revisi / cancel order?
        </h6>
        <i class="fa fa-chevron-down text-xl text-slate-900 peer-checked:rotate-180 w-fit" aria-hidden="true"></i>
        <div class="mt-2 peer-checked:block hidden pb-5 col-span-12">
            <p class="px-5 text-gray-400 font-encode-sans text-sm sm:text-base">
                tes isi
            </p>
        </div>
    </div>

    <div class="mt-3 w-full bg-white rounded-md shadow-sm py-3 px-3 relative grid grid-cols-12 justify-between">
        <input type="checkbox" name="faq" id="pertanyaan6" class="peer" hidden>
        <label for="pertanyaan6" class="cursor-pointer inline-block h-full w-full absolute"></label>
        <h6 class="font-encode-sans font-bold text-slate-900 w-full text-sm sm:text-base col-span-11">
            Pakai ekspedisi apa saja
        </h6>
        <i class="fa fa-chevron-down text-xl text-slate-900 peer-checked:rotate-180 w-fit" aria-hidden="true"></i>
        <div class="mt-2 peer-checked:block hidden pb-5 col-span-12">
            <p class="px-5 text-gray-400 font-encode-sans text-sm sm:text-base">
                tes isi
            </p>
        </div>
    </div>

    <div class="mt-3 w-full bg-white rounded-md shadow-sm py-3 px-3 relative grid grid-cols-12 justify-between">
        <input type="checkbox" name="faq" id="pertanyaan7" class="peer" hidden>
        <label for="pertanyaan7" class="cursor-pointer inline-block h-full w-full absolute"></label>
        <h6 class="font-encode-sans font-bold text-slate-900 w-full text-sm sm:text-base col-span-11">
            Bisakah gabung pengiriman order dengan order sebelumnya/berikutnya?
        </h6>
        <i class="fa fa-chevron-down text-xl text-slate-900 peer-checked:rotate-180 w-fit" aria-hidden="true"></i>
        <div class="mt-2 peer-checked:block hidden pb-5 col-span-12">
            <p class="px-5 text-gray-400 font-encode-sans text-sm sm:text-base">
                tes isi
            </p>
        </div>
    </div>

    <div class="mt-3 w-full bg-white rounded-md shadow-sm py-3 px-3 relative grid grid-cols-12 justify-between">
        <input type="checkbox" name="faq" id="pertanyaan8" class="peer" hidden>
        <label for="pertanyaan8" class="cursor-pointer inline-block h-full w-full absolute"></label>
        <h6 class="font-encode-sans font-bold text-slate-900 w-full text-sm sm:text-base col-span-11">
            Mau contact TokoBayiFiv dimana?
        </h6>
        <i class="fa fa-chevron-down text-xl text-slate-900 peer-checked:rotate-180 w-fit" aria-hidden="true"></i>
        <div class="mt-2 peer-checked:block hidden pb-5 col-span-12">
            <p class="px-5 text-gray-400 font-encode-sans text-sm sm:text-base">
                tes isi
            </p>
        </div>
    </div>

    <div class="mt-3 w-full bg-white rounded-md shadow-sm py-3 px-3 relative grid grid-cols-12 justify-between">
        <input type="checkbox" name="faq" id="pertanyaan9" class="peer" hidden>
        <label for="pertanyaan9" class="cursor-pointer inline-block h-full w-full absolute"></label>
        <h6 class="font-encode-sans font-bold text-slate-900 w-full text-sm sm:text-base col-span-11">
            Lokasi Dimana
        </h6>
        <i class="fa fa-chevron-down text-xl text-slate-900 peer-checked:rotate-180 w-fit" aria-hidden="true"></i>
        <div class="mt-2 peer-checked:block hidden pb-5 col-span-12">
            <p class="px-5 text-gray-400 font-encode-sans text-sm sm:text-base">
                tes isi
            </p>
        </div>
    </div>

    <div class="mt-3 w-full bg-white rounded-md shadow-sm py-3 px-3 relative grid grid-cols-12 justify-between">
        <input type="checkbox" name="faq" id="pertanyaan10" class="peer" hidden>
        <label for="pertanyaan10" class="cursor-pointer inline-block h-full w-full absolute"></label>
        <h6 class="font-encode-sans font-bold text-slate-900 w-full text-sm sm:text-base col-span-11">
            Ada offline shop? bisa pilih langsung? Bisa bayar COD (Cash on Delivery / ditempat)?
        </h6>
        <i class="fa fa-chevron-down text-xl text-slate-900 peer-checked:rotate-180 w-fit" aria-hidden="true"></i>
        <div class="mt-2 peer-checked:block hidden pb-5 col-span-12">
            <p class="px-5 text-gray-400 font-encode-sans text-sm sm:text-base">
                tes isi
            </p>
        </div>
    </div>

    <div class="mt-3 w-full bg-white rounded-md shadow-sm py-3 px-3 relative grid grid-cols-12 justify-between">
        <input type="checkbox" name="faq" id="pertanyaan11" class="peer" hidden>
        <label for="pertanyaan11" class="cursor-pointer inline-block h-full w-full absolute"></label>
        <h6 class="font-encode-sans font-bold text-slate-900 w-full text-sm sm:text-base col-span-11">
            Ada WA / Line / IG / Facebook? Kalo update barang baru dimana?
        </h6>
        <i class="fa fa-chevron-down text-xl text-slate-900 peer-checked:rotate-180 w-fit" aria-hidden="true"></i>
        <div class="mt-2 peer-checked:block hidden pb-5 col-span-12">
            <p class="px-5 text-gray-400 font-encode-sans text-sm sm:text-base">
                tes isi
            </p>
        </div>
    </div>

    <div class="mt-3 w-full bg-white rounded-md shadow-sm py-3 px-3 relative grid grid-cols-12 justify-between">
        <input type="checkbox" name="faq" id="pertanyaan12" class="peer" hidden>
        <label for="pertanyaan12" class="cursor-pointer inline-block h-full w-full absolute"></label>
        <h6 class="font-encode-sans font-bold text-slate-900 w-full text-sm sm:text-base col-span-11">
            Nomor rekeningnya berapa ya?
        </h6>
        <i class="fa fa-chevron-down text-xl text-slate-900 peer-checked:rotate-180 w-fit" aria-hidden="true"></i>
        <div class="mt-2 peer-checked:block hidden pb-5 col-span-12">
            <p class="px-5 text-gray-400 font-encode-sans text-sm sm:text-base">
                tes isi
            </p>
        </div>
    </div>

    <div class="mt-3 w-full bg-white rounded-md shadow-sm py-3 px-3 relative grid grid-cols-12 justify-between">
        <input type="checkbox" name="faq" id="pertanyaan13" class="peer" hidden>
        <label for="pertanyaan13" class="cursor-pointer inline-block h-full w-full absolute"></label>
        <h6 class="font-encode-sans font-bold text-slate-900 w-full text-sm sm:text-base col-span-11">
            Saya transfer hari ini, barang dikirim kapan?
        </h6>
        <i class="fa fa-chevron-down text-xl text-slate-900 peer-checked:rotate-180 w-fit" aria-hidden="true"></i>
        <div class="mt-2 peer-checked:block hidden pb-5 col-span-12">
            <p class="px-5 text-gray-400 font-encode-sans text-sm sm:text-base">
                tes isi
            </p>
        </div>
    </div>

    <div class="mt-3 w-full bg-white rounded-md shadow-sm py-3 px-3 relative grid grid-cols-12 justify-between">
        <input type="checkbox" name="faq" id="pertanyaan14" class="peer" hidden>
        <label for="pertanyaan14" class="cursor-pointer inline-block h-full w-full absolute"></label>
        <h6 class="font-encode-sans font-bold text-slate-900 w-full text-sm sm:text-base col-span-11">
            Saya sudah transfer, lalu saya konfirmasi pembayaran kemana?
        </h6>
        <i class="fa fa-chevron-down text-xl text-slate-900 peer-checked:rotate-180 w-fit" aria-hidden="true"></i>
        <div class="mt-2 peer-checked:block hidden pb-5 col-span-12">
            <p class="px-5 text-gray-400 font-encode-sans text-sm sm:text-base">
                tes isi
            </p>
        </div>
    </div>

    <div class="mt-3 w-full bg-white rounded-md shadow-sm py-3 px-3 relative grid grid-cols-12 justify-between">
        <input type="checkbox" name="faq" id="pertanyaan15" class="peer" hidden>
        <label for="pertanyaan15" class="cursor-pointer inline-block h-full w-full absolute"></label>
        <h6 class="font-encode-sans font-bold text-slate-900 w-full text-sm sm:text-base col-span-11">
            Jika ada lebih bayar bagaimana?
        </h6>
        <i class="fa fa-chevron-down text-xl text-slate-900 peer-checked:rotate-180 w-fit" aria-hidden="true"></i>
        <div class="mt-2 peer-checked:block hidden pb-5 col-span-12">
            <p class="px-5 text-gray-400 font-encode-sans text-sm sm:text-base">
                tes isi
            </p>
        </div>
    </div>

    <div class="mt-3 w-full bg-white rounded-md shadow-sm py-3 px-3 relative grid grid-cols-12 justify-between">
        <input type="checkbox" name="faq" id="pertanyaan15" class="peer" hidden>
        <label for="pertanyaan15" class="cursor-pointer inline-block h-full w-full absolute"></label>
        <h6 class="font-encode-sans font-bold text-slate-900 w-full text-sm sm:text-base col-span-11">
            Refung dan Retur
        </h6>
        <i class="fa fa-chevron-down text-xl text-slate-900 peer-checked:rotate-180 w-fit" aria-hidden="true"></i>
        <div class="mt-2 peer-checked:block hidden pb-5 col-span-12">
            <p class="px-5 text-gray-400 font-encode-sans text-sm sm:text-base">
                tes isi
            </p>
        </div>
    </div> --}}


</div>

@include('inc.footer1')
@endsection
