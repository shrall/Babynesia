@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white mb-2 p-4">
        <span class="font-overpass text-3xl font-bold">Tambah Member</span>
    </div>
    <form action="" method="post">
        @csrf
        <div class="admin-card">
            <div class="col-span-12">
                <div class="text-xl font-bold">Login and Password</div>
            </div>
            <div class="col-span-3">E-Mail</div>
            <div class="col-span-9 flex items-center gap-x-2">:
                <input type="email" name="" id="" class="admin-input">
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
                <div class="text-xl font-bold">Personal Data</div>
            </div>
            <div class="col-span-3">Status</div>
            <div class="col-span-9 flex items-center gap-x-2">:
                <select name="" id="" class="admin-input">
                    <option value="1">Regular Customer</option>
                    <option value="2">Priority Customer</option>
                </select>
            </div>
            <div class="col-span-3">Nama</div>
            <div class="col-span-9 flex items-center gap-x-2">:
                <input type="text" name="" id="" class="admin-input">
            </div>
            <div class="col-span-3">Alamat</div>
            <div class="col-span-9 flex items-center gap-x-2">:
                <input type="text" name="" id="" class="admin-input">
            </div>
            <div class="col-span-3">Kota</div>
            <div class="col-span-9 flex items-center gap-x-2">:
                <input type="text" name="" id="" class="admin-input">
            </div>
            <div class="col-span-3">Kode Pos</div>
            <div class="col-span-9 flex items-center gap-x-2">:
                <input type="text" name="" id="" class="admin-input">
            </div>
            <div class="col-span-3">Negara</div>
            <div class="col-span-9 flex items-center gap-x-2">:
                <select name="" id="" class="admin-input">
                    <option value="1">Indonesia</option>
                    <option value="2">Australia</option>
                </select>
            </div>
            <div class="col-span-3">Provinsi (Selain Indonesia)</div>
            <div class="col-span-9 flex items-center gap-x-2">:
                <input type="text" name="" id="" class="admin-input">
            </div>
            <div class="col-span-3">Provinsi</div>
            <div class="col-span-9 flex items-center gap-x-2">:
                <select name="" id="" class="admin-input">
                    <option value="1">Bali</option>
                    <option value="2">Jawa Timur</option>
                </select>
            </div>
            <div class="col-span-3">Telepon</div>
            <div class="col-span-9 flex items-center gap-x-2">:
                <input type="number" name="" id="" class="admin-input">
            </div>
            <div class="col-span-3">Handphone</div>
            <div class="col-span-9 flex items-center gap-x-2">:
                <input type="number" name="" id="" class="admin-input">
            </div>
            <div class="col-span-12">
                <button type="submit" class="admin-button">Simpan</button>
            </div>
        </div>
    </form>
@endsection
