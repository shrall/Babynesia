@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white mb-2 p-4">
        <span class="font-overpass text-3xl font-bold">Tambah Merk</span>
    </div>
    <form action="{{route('adminpage.kategori.update', $kategori->no_kategori)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="admin-card">
            <div class="col-span-12">
                <div class="flex flex-col gap-2">
                    <label for="name" class="text-xl">Nama</label>
                    <input type="text" name="name" id="name" class="admin-input" value="{{$kategori->nama_kategori}}" required>
                </div>
            </div>
            <div class="col-span-12">
                <button type="submit" class="admin-button">Simpan</button>
            </div>
        </div>
    </form>
@endsection
