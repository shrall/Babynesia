@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white mb-2 p-4">
        <span class="font-overpass text-3xl font-bold">Tambah Metode</span>
    </div>
    <form action="{{ route('adminpage.paymentmethod.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="admin-card">
            <div class="col-span-3">Info</div>
            <div class="col-span-9 flex items-center">
                <input type="text" name="info" id="info" class="admin-input" required>
            </div>
            <div class="col-span-3">Deskripsi</div>
            <div class="col-span-9 flex items-center">
                <input type="text" name="description" id="description" class="admin-input">
            </div>
            <div class="col-span-12">
                <button type="submit" class="admin-button">Simpan</button>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
@endsection
