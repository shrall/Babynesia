@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white p-4">
        <span class="font-overpass text-3xl font-bold">Konfigurasi Website</span>
    </div>
    <form action="{{ route('adminpage.webconfig.store') }}" method="post">
        @csrf
        <input type="hidden" name="type" value="configuration">
        <div class="w-full flex flex-col gap-y-4 p-4">
            <div class="admin-card">
                <div class="col-span-5">Paket-ID</div>
                <div class="col-span-7">{{ $webconfigs[0]['content'] }}</div>
                <div class="col-span-5">Paket</div>
                <div class="col-span-7">{{ $webconfigs[1]['content'] }}</div>
                <div class="col-span-5">Nama Website</div>
                <div class="col-span-7">{{ $webconfigs[2]['content'] }}</div>
                <div class="col-span-5">Kontrak dimulai</div>
                <div class="col-span-7">{{ $webconfigs[3]['content'] }}</div>
                <div class="col-span-5">Kontrak berakhir</div>
                <div class="col-span-7">{{ $webconfigs[4]['content'] }}</div>
            </div>
            <div class="admin-card">
                <div class="col-span-5">Nama Klien</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="client_name" id="client_name" class="admin-input"
                        value="{{ $webconfigs[5]['content'] }}">
                </div>
                <div class="col-span-5">E-Mail Klien</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="client_email" id="client_email" class="admin-input"
                        value="{{ $webconfigs[6]['content'] }}">
                </div>
                <div class="col-span-5">Alamat Klien</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="client_address" id="client_address" class="admin-input"
                        value="{{ $webconfigs[7]['content'] }}">
                </div>
                <div class="col-span-5">Handphone Klien</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="client_hp" id="client_hp" class="admin-input"
                        value="{{ $webconfigs[8]['content'] }}">
                </div>
                <div class="col-span-5">Telepon Klien</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="client_phone" id="client_phone" class="admin-input"
                        value="{{ $webconfigs[9]['content'] }}">
                </div>
            </div>
            <div class="admin-card">
                <div class="col-span-5">Nama Perusahaan</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="company_name" id="company_name" class="admin-input"
                        value="{{ $webconfigs[10]['content'] }}">
                </div>
                <div class="col-span-5">Tagline</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="tagline" id="tagline" class="admin-input"
                        value="{{ $webconfigs[11]['content'] }}">
                </div>
                <div class="col-span-5">E-Mail Utama</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="main_email" id="main_email" class="admin-input"
                        value="{{ $webconfigs[12]['content'] }}">
                </div>
                <div class="col-span-5">Pengirim E-Mail</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="sender_email" id="sender_email" class="admin-input"
                        value="{{ $webconfigs[13]['content'] }}">
                </div>
                <div class="col-span-5">Facebook</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="facebook" id="facebook" class="admin-input"
                        value="{{ $webconfigs[28]['content'] }}">
                </div>
                <div class="col-span-5">Twitter</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="twitter" id="twitter" class="admin-input"
                        value="{{ $webconfigs[29]['content'] }}">
                </div>
                <div class="col-span-5">Waktu Tunggu (jam)</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="wait_time" id="wait_time" class="admin-input"
                        value="{{ $webconfigs[30]['content'] }}">
                </div>
                <div class="col-span-5">Kota Pengirim</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <select name="kota_pengirim" id="kota_pengirim" class="admin-input">
                        @foreach ($cities as $city)
                            <option value={{ $city['city_id'] }}
                                {{ $city['city_id'] == $webconfigs[41]['content'] ? 'selected' : '' }}>
                                {{ $city['city_name'] }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- <div class="col-span-5">Catatan Ongkos Kirim</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="ongkir_note" id="ongkir_note" class="admin-input"
                        value="{{ $webconfigs[16]['content'] }}">
                </div> --}}
                {{-- <div class="col-span-5">Otomatis kirim email konfirmasi pembelian ke PEMBELI (bila tidak dipilih, email
                    konfirmasi hanya dikirim ke Admin)</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="checkbox" name="auto_email" id="auto_email" class="admin-input"
                        {{ $webconfigs[24]['content'] == '' ? '' : 'checked' }}>
                </div> --}}
                {{-- <div class="col-span-5">Awalan Kode Produk</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="starting_code" id="starting_code" class="admin-input"
                        value="{{ $webconfigs[25]['content'] }}">
                </div> --}}
                <div class="col-span-5">Sembunyikan Kode Produk</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="checkbox" name="hide_code" id="hide_code" class="admin-input"
                        {{ $webconfigs[27]['content'] == '' ? '' : 'checked' }}>
                </div>
                <div class="col-span-5">Sembunyikan Produk Stok Kosong</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="checkbox" name="hide_soldout" id="hide_soldout" class="admin-input"
                        {{ $webconfigs[32]['content'] == '' ? '' : 'checked' }}>
                </div>
                <div class="col-span-5">Ijinkan Stok Produk Minus</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="checkbox" name="allow_minus" id="allow_minus" class="admin-input"
                        {{ $webconfigs[33]['content'] == '' ? '' : 'checked' }}>
                </div>
                <div class="col-span-5">Sembunyikan Produk Tanpa Gambar</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="checkbox" name="hide_noimage" id="hide_noimage" class="admin-input"
                        {{ $webconfigs[35]['content'] == '' ? '' : 'checked' }}>
                </div>
                <div class="col-span-5">Gunakan Harga Toko</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="checkbox" name="use_store_price" id="use_store_price" class="admin-input"
                        {{ $webconfigs[36]['content'] == '' ? '' : 'checked' }}>
                </div>
                <div class="col-span-12">
                    <button type="submit" class="admin-button">Simpan</button>
                </div>
            </div>
        </div>
    </form>
@endsection
