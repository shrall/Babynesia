@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white mb-2 p-4">
        <span class="font-overpass text-3xl font-bold">Tambah Merk</span>
    </div>
    <form action="{{route('adminpage.brand.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="admin-card">
            <div class="col-span-12">
                <div class="flex flex-col gap-2">
                    <label for="name" class="text-xl">Nama</label>
                    <input type="text" name="name" id="name" class="admin-input" required>
                </div>
            </div>
            <div class="col-span-12 type-Gambar">
                <div class="flex flex-col gap-2">
                    <label for="" class="text-xl">Gambar</label>
                    <div class="flex items-end">
                        <img src="{{ asset('svg/images.svg') }}" class="w-48 h-48 bg-gray-300"
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
