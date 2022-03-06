@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white mb-2 p-4">
        <span class="font-overpass text-3xl font-bold">Tambah Administrator</span>
    </div>
    <form action="" method="post">
        @csrf
        <div class="admin-card">
            <div class="col-span-3">Username</div>
            <div class="col-span-9 flex items-center gap-x-2">:
                <input type="text" name="" id="" class="admin-input">
            </div>
            <div class="col-span-3">Tipe</div>
            <div class="col-span-9 flex items-center gap-x-2">:
                <div class="flex items-center gap-2">
                    <input type="radio" name="" id="radio-1">
                    <label for="radio-1">Master Admin</label>
                </div>
                <div class="flex items-center gap-2">
                    <input type="radio" name="" id="radio-2">
                    <label for="radio-2">Master Admin</label>
                </div>
            </div>
            <div class="col-span-3">Password</div>
            <div class="col-span-9 flex items-center gap-x-2">:
                <input type="password" name="" id="" class="admin-input">
            </div>
            <div class="col-span-3">Ulang Password</div>
            <div class="col-span-9 flex items-center gap-x-2">:
                <input type="password" name="" id="" class="admin-input">
            </div>
            <div class="col-span-12">
                <button type="submit" class="admin-button">Simpan</button>
            </div>
        </div>
    </form>
@endsection
