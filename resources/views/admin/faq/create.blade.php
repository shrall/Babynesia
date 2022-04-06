@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white mb-2 p-4">
        <span class="font-overpass text-3xl font-bold">Tambah FAQ</span>
    </div>
    <form action="{{ route('adminpage.faq.store') }}" method="post">
        @csrf
        <div class="admin-card mb-2">
            <div class="col-span-3">Pertanyaan</div>
            <div class="col-span-9 flex items-center gap-x-2">
                <input type="text" name="pertanyaan" id="pertanyaan" class="admin-input" required>
            </div>
            <div class="col-span-3">Jawaban</div>
            <div class="col-span-9 flex items-center gap-x-2">
                <input type="text" name="jawaban" id="jawaban" class="admin-input" required>
            </div>
            <div class="col-span-12">
                <button type="submit" class="admin-button">Simpan</button>
            </div>
        </div>
    </form>
@endsection
