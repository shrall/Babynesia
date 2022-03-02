@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white mb-2 p-4">
        <span class="font-concert-one text-3xl font-bold">Tambah Merk</span>
    </div>
    <form action="" method="post">
        @csrf
        <div class="admin-card">
            <div class="col-span-3">Nama</div>
            <div class="col-span-9 flex items-center gap-x-2">:
                <input type="text" name="" id="" class="bg-gray-200">
            </div>
            <div class="col-span-3">Link</div>
            <div class="col-span-9 flex items-center gap-x-2">:
                <input type="text" name="" id="" class="bg-gray-200">
            </div>
            <div class="col-span-3">Gambar</div>
            <div class="col-span-9 flex items-center gap-x-2">:
                <label for="brand-image" class="admin-button">Upload Gambar</label>
            </div>
            <div class="col-span-3 text-sm">
                <li>Maximal besar data 2 MB</li>
                <li>Max besar gambar 600 x 800 pixels.</li>
                <li>Type yang diperbolehkan: JPG, JPEG, GIF, PNG</li>
                <li>Nama gambar tidak boleh sama dengan nama-nama yang telah tersimpan.</li>
            </div>
            <div class="col-span-9 flex flex-col gap-y-2">
                <div class="flex">
                    <img src="{{ asset('svg/images.svg') }}" class="w-vw-50 h-vh-20 bg-gray-300" id="preview-brand-image">
                    <input type="file" name="" id="brand-image" class="invisible w-2"
                        onchange="loadFile(event, 'brand-image')" accept="image/*" required>
                </div>
            </div>
            <div class="col-span-3">Status</div>
            <div class="col-span-9 flex items-center gap-x-2">:
                <input type="checkbox" name="" id="" class="bg-gray-200">
                Sembunyikan
            </div>
            <div class="col-span-12 text-center">
                <button type="submit" class="admin-button">Simpan</button>
            </div>
        </div>
    </form>
@endsection
