@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white mb-2 p-4">
        <span class="font-overpass text-3xl font-bold">Tambah Kategori</span>
    </div>
    <form action="" method="post">
        @csrf
        <div class="admin-card">
            <div class="col-span-3">Nama Subkategori</div>
            <div class="col-span-9 flex items-center gap-x-2">:
                <input type="text" name="" id="" class="admin-input">
            </div>
            <div class="col-span-3">Kategori</div>
            <div class="col-span-9 flex items-center gap-x-2">:
                <select name="" id="" class="admin-input">
                    <option value="1">Fashion</option>
                    <option value="2">Parcel & Goods</option>
                </select>
            </div>
            <div class="col-span-12 text-center">
                <button type="submit" class="admin-button">Simpan</button>
            </div>
        </div>
    </form>
@endsection
