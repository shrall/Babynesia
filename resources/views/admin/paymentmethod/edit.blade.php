@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white mb-2 p-4">
        <span class="font-overpass text-3xl font-bold">Edit Metode</span>
    </div>
    <form action="{{ route('adminpage.paymentmethod.update', $paymentMethod->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="admin-card">
            <div class="col-span-3">Info</div>
            <div class="col-span-9 flex items-center">
                <input type="text" name="info" id="info" class="admin-input" value="{{$paymentMethod->info}}" required>
            </div>
            <div class="col-span-3">Deskripsi</div>
            <div class="col-span-9 flex items-center">
                <input type="text" name="description" id="description" class="admin-input" value="{{$paymentMethod->description}}">
            </div>
            <div class="col-span-12">
                <button type="submit" class="admin-button">Simpan</button>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
@endsection
