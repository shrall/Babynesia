@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white mb-2 p-4">
        <span class="font-overpass text-3xl font-bold">Tambah Merk</span>
    </div>
    <form action="{{route('adminpage.brand.update', $brand->no_brand)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="admin-card">
            <div class="col-span-3">Nama</div>
            <div class="col-span-9 flex items-center">
                <input type="text" name="name" id="name" class="admin-input" value="{{$brand->nama_brand}}" required>
            </div>
            <div class="col-span-12 type-Gambar">
                <div class="flex flex-col gap-2">
                    <label for="" class="text-xl">Gambar</label>
                    <div class="flex items-end">
                        <img src="{{ $brand->app_type == 1 ? 'https://tokobayifiv.com/public/uploads/'. $brand->gambar : 'https://babynesia.com/public/uploads/' . $brand->gambar }}" class="w-48 h-48 bg-gray-300"
                            id="preview-ad-image">
                        <input type="file" name="image" id="ad-image" class="invisible w-2"
                            onchange="loadFile(event, 'ad-image')" accept="image/*" required>
                        <div class="flex flex-col text-sm">
                            <li>Maximal besar data 2 MB</li>
                            <li>Max besar gambar 600 x 800 pixels.</li>
                            <li>Type yang diperbolehkan: JPG, JPEG, GIF, PNG</li>
                            <li>Nama gambar tidak boleh sama dengan nama-nama yang telah tersimpan.</li>
                            <div class="flex">
                                <label for="ad-image" class="admin-button">Upload Gambar</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-12">
                <button type="submit" class="admin-button">Simpan</button>
            </div>
        </div>
    </form>
@endsection
