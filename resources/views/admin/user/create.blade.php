@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white mb-2 p-4">
        <span class="font-overpass text-3xl font-bold">Tambah Member</span>
    </div>
    <form action="{{ route('adminpage.user.store') }}" method="post">
        @csrf
        <div class="admin-card">
            <div class="col-span-12">
                <div class="text-xl font-bold">Login and Password</div>
            </div>
            <div class="col-span-3">E-Mail</div>
            <div class="col-span-9 flex items-center gap-x-2">
                <input type="email" name="email" id="email" class="admin-input" required>
            </div>
            <div class="col-span-3">Password</div>
            <div class="col-span-9 flex items-center gap-x-2">
                <input type="password" name="password" id="password"
                    class="admin-input @if (session('wrong')) border border-red-400 @endif" required>
            </div>
            <div class="col-span-3">Ulang Password</div>
            <div class="col-span-9 flex items-center gap-x-2">
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="admin-input @if (session('wrong')) border border-red-400 @endif" required>
            </div>
            @if (session('wrong'))
                <div class="col-span-12 text-red-700">{{ session('wrong') }}</div>
            @endif
            <div class="col-span-12">
                <div class="text-xl font-bold">Personal Data</div>
            </div>
            <div class="col-span-3">Status</div>
            <div class="col-span-9 flex items-center gap-x-2">
                <select name="status" id="status" class="admin-input" required>
                    @foreach ($statuses as $status)
                        @if (env('APP_TYPE') == 1)
                            @if ($status->id != 5 && $status->id != 7 && $status->id != 2)
                                <option value="{{ $status->id }}">{{ $status->user_status }}</option>
                            @endif
                        @else
                            @if ($status->id == 5 || $status->id == 7 || $status->id == 1)
                                <option value="{{ $status->id }}">{{ $status->user_status }}</option>
                            @endif
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-span-3">Nama</div>
            <div class="col-span-9 flex items-center gap-x-2">
                <input type="text" name="name" id="name" class="admin-input" required>
            </div>
            <div class="col-span-3">Alamat</div>
            <div class="col-span-9 flex items-center gap-x-2">
                <input type="text" name="address" id="address" class="admin-input" required>
            </div>
            <div class="col-span-3">Kota</div>
            <div class="col-span-9 flex items-center gap-x-2">
                <input type="text" name="city" id="city" class="admin-input" required>
            </div>
            <div class="col-span-3">Kode Pos</div>
            <div class="col-span-9 flex items-center gap-x-2">
                <input type="text" name="postal_code" id="postal_code" class="admin-input" required>
            </div>
            <div class="col-span-3">Negara</div>
            <div class="col-span-9 flex items-center gap-x-2">
                <select name="country" id="country" class="admin-input" required>
                    @foreach ($countries as $ctr)
                        <option value="{{ $ctr->id }}">{{ $ctr->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-3">Provinsi (Selain Indonesia)</div>
            <div class="col-span-9 flex items-center gap-x-2">
                <input type="text" name="other_province" id="other_province" class="admin-input">
            </div>
            <div class="col-span-3">Provinsi</div>
            <div class="col-span-9 flex items-center gap-x-2">
                <select name="province" id="province" class="admin-input" required>
                    @foreach ($provinces as $prv)
                        <option value="{{ $prv->name }}">{{ $prv->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-3">Telepon</div>
            <div class="col-span-9 flex items-center gap-x-2">
                <input type="number" name="telephone" id="telephone" class="admin-input">
            </div>
            <div class="col-span-3">Handphone</div>
            <div class="col-span-9 flex items-center gap-x-2">
                <input type="number" name="handphone" id="handphone" class="admin-input" required>
            </div>
            <div class="col-span-12">
                <button type="submit" class="admin-button">Simpan</button>
            </div>
        </div>
    </form>
@endsection
