@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white mb-2 p-4">
        <span class="font-overpass text-3xl font-bold">Tambah Subkategori</span>
    </div>
    <form action="{{route('adminpage.kategorichild.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="admin-card">
            <div class="col-span-3">Nama</div>
            <div class="col-span-9 flex items-center">
                <input type="text" name="name" id="name" class="admin-input" required>
            </div>
            <div class="col-span-3">Kategori</div>
            <div class="col-span-9">
                <select name="kategori" id="kategori" class="admin-input" required>
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->no_kategori }}">{{ $kategori->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-12">
                <button type="submit" class="admin-button">Simpan</button>
            </div>
        </div>
    </form>
@endsection
