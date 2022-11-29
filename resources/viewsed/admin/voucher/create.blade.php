@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white mb-2 p-4">
        <span class="font-overpass text-3xl font-bold">Tambah Voucher</span>
    </div>
    <form action="{{ route('adminpage.voucher.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="admin-card">
            <div class="col-span-3">Nama</div>
            <div class="col-span-9 flex items-center">
                <input type="text" name="name" id="name" class="admin-input" required>
            </div>
            <div class="col-span-3">Kode</div>
            @if ($errors->any())
                <div class="col-span-9 flex flex-col items-start">
                    <input type="text" name="code" id="code" class="admin-input border-2 border-red-400" required>
                    <span class="text-xs text-red-500">
                        Kode sudah ada di database!</span>
                </div>
            @else
                <div class="col-span-9 flex flex-col items-start">
                    <input type="text" name="code" id="code" class="admin-input"
                        required>
                </div>
            @endif
            <div class="col-span-3">Tipe</div>
            <div class="col-span-9 flex items-center">
                <div class="flex items-center gap-2">
                    @foreach ($types as $voucher_type)
                        <div class="flex items-center gap-2">
                            <input type="radio" name="type" value="{{ $voucher_type->id }}"
                                @if ($loop->first) checked @endif id="type-{{ $voucher_type->id }}">
                            <label for="type-{{ $voucher_type->id }}">{{ $voucher_type->name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-span-3">Jumlah</div>
            <div class="col-span-9 flex items-center">
                <input type="number" name="amount" id="amount" class="admin-input">
            </div>
            <div class="col-span-3">Limit</div>
            <div class="col-span-9 flex items-center">
                <input type="number" name="limit" id="limit" class="admin-input"
                    placeholder="*kosongkan saja apabila tidak ada batas penggunaan">
            </div>
            <div class="col-span-3">Tanggal Akhir Promo</div>
            <div class="col-span-9 flex items-center">
                <input type="date" name="deadline" id="deadline" class="admin-input" required>
            </div>
            <div class="col-span-12">
                <button type="submit" class="admin-button">Simpan</button>
            </div>
        </div>
    </form>
@endsection
