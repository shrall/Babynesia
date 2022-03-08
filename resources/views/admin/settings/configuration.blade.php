@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white p-4">
        <span class="font-overpass text-3xl font-bold">Konfigurasi Website</span>
    </div>
    <form action="" method="post">
        @csrf
        <div class="w-full flex flex-col gap-y-4 p-4">
            <div class="admin-card">
                <div class="col-span-5">Paket-ID</div>
                <div class="col-span-7"> C3</div>
                <div class="col-span-5">Paket</div>
                <div class="col-span-7"> C2W-Online Shop</div>
                <div class="col-span-5">Nama Website</div>
                <div class="col-span-7"> www.babynesia.com</div>
                <div class="col-span-5">Kontrak dimulai</div>
                <div class="col-span-7"> 01 Agustus 2013</div>
                <div class="col-span-5">Kontrak berakhir</div>
                <div class="col-span-7"> 31 Juli 2014</div>
            </div>
            <div class="admin-card">
                <div class="col-span-5">Nama Klien</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="" id="" class="admin-input">
                </div>
                <div class="col-span-5">E-Mail Klien</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="" id="" class="admin-input">
                </div>
                <div class="col-span-5">Alamat Klien</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="" id="" class="admin-input">
                </div>
                <div class="col-span-5">Handphone Klien</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="" id="" class="admin-input">
                </div>
                <div class="col-span-5">Telepon Klien</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="" id="" class="admin-input">
                </div>
            </div>
            <div class="admin-card">
                <div class="col-span-5">Nama Perusahaan</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="" id="" class="admin-input">
                </div>
                <div class="col-span-5">Tagline</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="" id="" class="admin-input">
                </div>
                <div class="col-span-5">E-Mail Utama</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="" id="" class="admin-input">
                </div>
                <div class="col-span-5">Pengirim E-Mail</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="" id="" class="admin-input">
                </div>
                <div class="col-span-5">Rekening Bank Pembayaran 1</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="" id="" class="admin-input">
                </div>
                <div class="col-span-5">Rekening Bank pembayaran 2</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="" id="" class="admin-input">
                </div>
                <div class="col-span-5">YM Account 1</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="" id="" class="admin-input">
                </div>
                <div class="col-span-5">YM Account 2</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="" id="" class="admin-input">
                </div>
                <div class="col-span-5">YM Account 3</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="" id="" class="admin-input">
                </div>
                <div class="col-span-5">YM Account 4</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="" id="" class="admin-input">
                </div>
                <div class="col-span-5">YM Account 5</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="" id="" class="admin-input">
                </div>
                <div class="col-span-5">Facebook</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="" id="" class="admin-input">
                </div>
                <div class="col-span-5">Twitter</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="" id="" class="admin-input">
                </div>
                <div class="col-span-5">Waktu Tunggu (jam)</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="" id="" class="admin-input">
                </div>
                <div class="col-span-5">Catatan Ongkos Kirim</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="" id="" class="admin-input">
                </div>
                <div class="col-span-5">Otomatis kirim email konfirmasi pembelian ke PEMBELI (bila tidak dipilih, email
                    konfirmasi hanya dikirim ke Admin)</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="checkbox" name="" id="" class="admin-input">
                </div>
                <div class="col-span-5">Awalan Kode Produk</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="" id="" class="admin-input">
                </div>
                <div class="col-span-5">Sembunyikan Kode Produk</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="checkbox" name="" id="" class="admin-input">
                </div>
                <div class="col-span-5">Sembunyikan Produk Stok Kosong</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="checkbox" name="" id="" class="admin-input">
                </div>
                <div class="col-span-5">Ijinkan Stok Produk Minus</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="checkbox" name="" id="" class="admin-input">
                </div>
                <div class="col-span-5">Sembunyikan Produk Tanpa Gambar</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="checkbox" name="" id="" class="admin-input">
                </div>
                <div class="col-span-5">Gunakan Harga Toko</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="checkbox" name="" id="" class="admin-input">
                </div>
                <div class="col-span-12">
                    <button type="submit" class="admin-button">Simpan</button>
                </div>
            </div>
        </div>
    </form>
@endsection
