@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white mb-2 p-4">
        <span class="font-overpass text-3xl font-bold">Edit Member</span>
    </div>
    <form action="{{ route('adminpage.user.update', $user->no_user) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="admin-card">
            <div class="col-span-12">
                <div class="text-xl font-bold">Login and Password</div>
            </div>
            <div class="col-span-3">E-Mail</div>
            <div class="col-span-9 flex items-center gap-x-2">
                <input type="email" name="email" id="email" class="admin-input" value="{{ $user->email }}" required>
            </div>
            <div class="col-span-3">Password (Abaikan jika tidak ingin dirubah)</div>
            <div class="col-span-9 flex items-center gap-x-2">
                <input type="password" name="password" id="password"
                    class="admin-input @if (session('wrong')) border border-red-400 @endif">
            </div>
            <div class="col-span-3">Ulang Password</div>
            <div class="col-span-9 flex items-center gap-x-2">
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="admin-input @if (session('wrong')) border border-red-400 @endif">
            </div>
            @if (session('wrong'))
                <div class="col-span-12 text-red-700">{{ session('wrong') }}</div>
            @endif
            <div class="col-span-12">
                <div class="text-xl font-bold">Personal Data</div>
            </div>
            <div class="col-span-3">Status</div>
            <div class="col-span-9 flex items-center gap-x-2">
                @if (Auth::user()->user_status_id != 6 && Auth::user()->user_status_id != 7)
                    @if ($user->user_status_id == 1 || $user->user_status_id == 2)
                        <select name="status" id="status" class="admin-input" required>
                            @foreach ($statuses as $status)
                                @if ($status->id == 1 || $status->id == 2)
                                    <option value="{{ $status->id }}"
                                        {{ $user->user_status_id == $status->id ? 'selected' : '' }}>
                                        {{ $status->user_status }}</option>
                                @endif
                            @endforeach
                        </select>
                    @else
                        <select name="status" id="status" class="admin-input" required>
                            @foreach ($statuses as $status)
                                @if (Auth::user()->user_status_id == 4)
                                    @if ($status->id == 4 || $status->id == 6)
                                        <option value="{{ $status->id }}"
                                            {{ $user->user_status_id == $status->id ? 'selected' : '' }}>
                                            {{ $status->user_status }}</option>
                                    @endif
                                @elseif (Auth::user()->user_status_id == 5)
                                    @if ($status->id == 5 || $status->id == 7)
                                        <option value="{{ $status->id }}"
                                            {{ $user->user_status_id == $status->id ? 'selected' : '' }}>
                                            {{ $status->user_status }}</option>
                                    @endif
                                @else
                                    @if ($status->id != 1 && $status->id != 2)
                                        <option value="{{ $status->id }}"
                                            {{ $user->user_status_id == $status->id ? 'selected' : '' }}>
                                            {{ $status->user_status }}</option>
                                    @endif
                                @endif
                            @endforeach
                        </select>
                    @endif
                @else
                    <select name="status" id="status" class="admin-input" required disabled>
                        @foreach ($statuses as $status)
                            <option value="{{ $status->id }}"
                                {{ $user->user_status_id == $status->id ? 'selected' : '' }}>
                                {{ $status->user_status }}</option>
                        @endforeach
                    </select>
                @endif
            </div>
            <div class="col-span-3">Nama</div>
            <div class="col-span-9 flex items-center gap-x-2">
                <input type="text" name="name" id="name" class="admin-input" value="{{ $user->name }}" required>
            </div>
            <div class="col-span-3">Alamat</div>
            <div class="col-span-9 flex items-center gap-x-2">
                <input type="text" name="address" id="address" class="admin-input" value="{{ $user->alamat }}"
                    required>
            </div>
            <div class="col-span-3">Kota</div>
            <div class="col-span-9 flex items-center gap-x-2">
                <input type="text" name="city" id="city" class="admin-input" value="{{ $user->kota }}" required>
            </div>
            <div class="col-span-3">Kode Pos</div>
            <div class="col-span-9 flex items-center gap-x-2">
                <input type="text" name="postal_code" id="postal_code" class="admin-input"
                    value="{{ $user->kodepos }}" required>
            </div>
            <div class="col-span-3">Negara</div>
            <div class="col-span-9 flex items-center gap-x-2">
                <select name="country" id="country" class="admin-input" . required>
                    @foreach ($countries as $ctr)
                        <option value="{{ $ctr->id }}" {{ $user->negara == $ctr->id ? 'selected' : '' }}>
                            {{ $ctr->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-3">Provinsi (Selain Indonesia)</div>
            <div class="col-span-9 flex items-center gap-x-2">
                <input type="text" name="other_province" id="other_province" class="admin-input"
                    @if ($user->negara != 'ID') value="{{ $user->propinsi }}" @endif>
            </div>
            <div class="col-span-3">Provinsi</div>
            <div class="col-span-9 flex items-center gap-x-2">
                <select name="province" id="province" class="admin-input" required>
                    @foreach ($provinces as $prv)
                        <option value="{{ $prv->name }}" {{ $user->propinsi == $prv->name ? 'selected' : '' }}>
                            {{ $prv->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-3">Telepon</div>
            <div class="col-span-9 flex items-center gap-x-2">
                <input type="number" name="telephone" id="telephone" class="admin-input" value="{{ $user->telp }}">
            </div>
            <div class="col-span-3">Handphone</div>
            <div class="col-span-9 flex items-center gap-x-2">
                <input type="number" name="handphone" id="handphone" class="admin-input" value="{{ $user->hp }}"
                    required>
            </div>
            <div class="col-span-12">
                <button type="submit" class="admin-button">Simpan</button>
            </div>
        </div>
    </form>
@endsection
