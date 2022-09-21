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
                <div class="col-span-7">
                    {{ array_values($webconfigs->where('name', 'package_id')->toArray())[0]['content'] }}</div>
                <div class="col-span-5">Paket</div>
                <div class="col-span-7">
                    {{ array_values($webconfigs->where('name', 'package_name')->toArray())[0]['content'] }}</div>
                <div class="col-span-5">Nama Website</div>
                <div class="col-span-7">{{ array_values($webconfigs->where('name', 'title')->toArray())[0]['content'] }}
                </div>
                <div class="col-span-5">Kontrak dimulai</div>
                <div class="col-span-7">
                    {{ array_values($webconfigs->where('name', 'start_date')->toArray())[0]['content'] }}</div>
                <div class="col-span-5">Kontrak berakhir</div>
                <div class="col-span-7">{{ array_values($webconfigs->where('name', 'end_date')->toArray())[0]['content'] }}
                </div>
            </div>
            {{-- <div class="admin-card">
                <div class="col-span-5">Nama Klien</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="client_name" id="client_name" class="admin-input"
                        value="{{
                        array_values($webconfigs->where("name", "customer_name")->toArray())[0]["content"] }}">
                </div>
                <div class="col-span-5">E-Mail Klien</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="client_email" id="client_email" class="admin-input"
                        value="{{
                        array_values($webconfigs->where("name", "customer_email")->toArray())[0]["content"] }}">
                </div>
                <div class="col-span-5">Alamat Klien</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="client_address" id="client_address" class="admin-input"
                        value="{{
                        array_values($webconfigs->where("name", "customer_address")->toArray())[0]["content"] }}">
                </div>
                <div class="col-span-5">Handphone Klien</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="client_hp" id="client_hp" class="admin-input"
                        value="{{
                        array_values($webconfigs->where("name", "customer_mobile")->toArray())[0]["content"] }}">
                </div>
                <div class="col-span-5">Telepon Klien</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="client_phone" id="client_phone" class="admin-input"
                        value="{{
                        array_values($webconfigs->where("name", "customer_phone")->toArray())[0]["content"] }}">
                </div>
            </div> --}}
            <div class="admin-card">
                <div class="col-span-5">Nama Perusahaan</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="company_name" id="company_name" class="admin-input"
                        value="{{ array_values($webconfigs->where('name', 'company_name')->toArray())[0]['content'] }}">
                </div>
                {{-- <div class="col-span-5">Tagline</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="tagline" id="tagline" class="admin-input"
                        value="{{
                        array_values($webconfigs->where("name", "tagline")->toArray())[0]["content"] }}">
                </div> --}}
                <div class="col-span-5">E-Mail Utama</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="main_email" id="main_email" class="admin-input"
                        value="{{ array_values($webconfigs->where('name', 'email')->toArray())[0]['content'] }}">
                </div>
                <div class="col-span-5">Pengirim E-Mail</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="sender_email" id="sender_email" class="admin-input"
                        value="{{ array_values($webconfigs->where('name', 'email_from')->toArray())[0]['content'] }}">
                </div>
                <div class="col-span-5">Facebook</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="facebook" id="facebook" class="admin-input"
                        value="{{ array_values($webconfigs->where('name', 'fb')->toArray())[0]['content'] }}">
                </div>
                <div class="col-span-5">Twitter</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="twitter" id="twitter" class="admin-input"
                        value="{{ array_values($webconfigs->where('name', 'twitter')->toArray())[0]['content'] }}">
                </div>
                <div class="col-span-5">Waktu Tunggu (jam)</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="wait_time" id="wait_time" class="admin-input"
                        value="{{ array_values($webconfigs->where('name', 'waittime')->toArray())[0]['content'] }}">
                </div>
                <div class="col-span-5">Kota Pengirim</div>
                @if (env('APP_TYPE') == 1)
                    <div class="col-span-7 flex items-center gap-x-2">
                        <select name="kota_pengirim" id="kota_pengirim" class="admin-input">
                            @foreach ($cities as $city)
                                <option value={{ $city['city_id'] }}
                                    {{ $city['city_id'] == array_values($webconfigs->where('name', 'kota_pengirim')->toArray())[0]['content']
                                        ? 'selected'
                                        : '' }}>
                                    {{ $city['city_name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                @elseif(env('APP_TYPE') == 2)
                    <div class="col-span-7 flex items-center gap-x-2">
                        <select name="kota_pengirim" id="kota_pengirim" class="admin-input">
                            @foreach ($cities as $city)
                                <option value={{ $city['city_id'] }}
                                    {{ $city['city_id'] == array_values($webconfigs->where('name', 'kota_pengirim_fav')->toArray())[0]['content']
                                        ? 'selected'
                                        : '' }}>
                                    {{ $city['city_name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
                {{-- <div class="col-span-5">Catatan Ongkos Kirim</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="ongkir_note" id="ongkir_note" class="admin-input"
                        value="{{ $webconfigs[16] }}">
                </div> --}}
                {{-- <div class="col-span-5">Otomatis kirim email konfirmasi pembelian ke PEMBELI (bila tidak dipilih, email
                    konfirmasi hanya dikirim ke Admin)</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="checkbox" name="auto_email" id="auto_email" class="admin-input"
                        {{ $webconfigs[24] == '' ? '' : 'checked' }}>
                </div> --}}
                {{-- <div class="col-span-5">Awalan Kode Produk</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="text" name="starting_code" id="starting_code" class="admin-input"
                        value="{{ $webconfigs[25] }}">
                </div> --}}
                <div class="col-span-5">Sembunyikan Kode Produk</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="checkbox" name="hide_code" id="hide_code" class="admin-input"
                        {{ array_values($webconfigs->where('name', 'hide_product_code')->toArray())[0]['isHidden'] == 0 ? '' : 'checked' }}>
                </div>
                <div class="col-span-5">Sembunyikan Produk Stok Kosong</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="checkbox" name="hide_soldout" id="hide_soldout" class="admin-input"
                        {{ array_values($webconfigs->where('name', 'hide_sold_product')->toArray())[0]['isHidden'] == 0 ? '' : 'checked' }}>
                </div>
                <div class="col-span-5">Sembunyikan Produk Tanpa Gambar</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="checkbox" name="hide_noimage" id="hide_noimage" class="admin-input"
                        {{ array_values($webconfigs->where('name', 'hide_product_non_img')->toArray())[0]['isHidden'] == 0 ? '' : 'checked' }}>
                </div>
                {{-- ini khusus BBN --}}
                {{-- <div class="col-span-5">Gunakan Harga Toko</div>
                <div class="col-span-7 flex items-center gap-x-2">
                    <input type="checkbox" name="use_store_price" id="use_store_price" class="admin-input"
                        {{ $webconfigs[36] == '' ? '' : 'checked' }}>
                </div> --}}
                <div class="col-span-12">
                    <button type="submit" class="admin-button">Simpan</button>
                </div>
            </div>
        </div>
    </form>
@endsection
