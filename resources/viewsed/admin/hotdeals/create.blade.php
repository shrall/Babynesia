@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white mb-2 p-4">
        <span class="font-overpass text-3xl font-bold">Tambah Iklan</span>
    </div>
    <form action="{{ route('adminpage.hotdeals.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="admin-card">
            <div class="col-span-3">Nama</div>
            <div class="col-span-9 flex items-center">
                <input type="text" name="name" id="name" class="admin-input" required>
            </div>
            <div class="col-span-3">Nomor Urut</div>
            <div class="col-span-9 flex items-center">
                <input type="number" name="position_nr" id="position_nr" class="admin-input">
            </div>
            <div class="col-span-3">Status</div>
            <div class="col-span-9">
                <select name="status" id="status" class="admin-input" required>
                    @foreach ($hotdeals_status as $hd_status)
                        <option value="{{ $hd_status->id }}">{{ $hd_status->status }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-3 status-2 hidden">Tampilkan dari tanggal</div>
            <div class="col-span-9 status-2 hidden">
                <input type="date" name="from_date" id="from_date" class="admin-input">
            </div>
            <div class="col-span-3 status-2 hidden">Sampai dengan tanggal</div>
            <div class="col-span-9 status-2 hidden">
                <input type="date" name="until_date" id="until_date" class="admin-input">
            </div>
            {{-- @marshall ini comment yang hidden kalo udah ga di uncomment --}}
            <input type="hidden" name="type" value="Gambar">
            {{-- <div class="col-span-3">Tipe</div>
            <div class="col-span-9 flex items-center">
                <div class="flex items-center gap-2">
                    <div class="flex items-center gap-2">
                        <input type="radio" name="type" value="Gambar" checked id="radio-1">
                        <label for="radio-1">Gambar</label>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="radio" name="type" value="Video" id="radio-2">
                        <label for="radio-2">Video</label>
                    </div>
                </div>
            </div> --}}
            <div class="col-span-12 type-Gambar">
                <div class="flex flex-col gap-2">
                    <label for="" class="">Gambar</label>
                    <div class="flex items-end">
                        <img src="{{ asset('svg/images.svg') }}" class="w-vw-50 h-vh-20 bg-gray-300"
                            id="preview-ad-image">
                        <input type="file" name="image" id="ad-image" class="invisible w-2"
                            onchange="loadFile(event, 'ad-image')" accept="image/*">
                        <label for="ad-image" class="admin-button">Upload Gambar</label>
                    </div>
                </div>
            </div>
            <div class="col-span-3 type-Video hidden">Link</div>
            <div class="col-span-9 type-Video hidden">
                <input type="text" name="link" id="link" class="admin-input">
            </div>
            <div class="col-span-12">
                <button type="submit" class="admin-button">Simpan</button>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        $('input[type=radio][name=type]').change(function() {
            $('.type-' + this.value).each(function() {
                $(this).removeClass('hidden').addClass('flex');
            })
            if (this.value == 'Video') {
                $('.type-Gambar').each(function() {
                    $(this).removeClass('flex').addClass('hidden');
                })
            } else {
                $('.type-Video').each(function() {
                    $(this).removeClass('flex').addClass('hidden');
                })
            }
        });
        $('select[name=status]').change(function() {
            if (this.value == '2') {
                $('.status-2').each(function() {
                    $(this).removeClass('hidden').addClass('flex');
                })
            } else {
                $('.status-2').each(function() {
                    $(this).removeClass('flex').addClass('hidden');
                })
            }
        });
    </script>
@endsection
