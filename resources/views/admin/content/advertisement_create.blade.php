@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white mb-2 p-4">
        <span class="font-concert-one text-3xl font-bold">Tambah Iklan</span>
    </div>
    <form action="" method="post">
        @csrf
        <div class="admin-card">
            <div class="col-span-3">Username</div>
            <div class="col-span-9 flex items-center gap-x-2">:
                <input type="text" name="" id="" class="bg-gray-200">
            </div>
            <div class="col-span-3">Tipe</div>
            <div class="col-span-9 flex items-center gap-x-2">:
                <div class="flex items-center gap-2">
                    <input type="radio" name="type" value="image" checked id="radio-1">
                    <label for="radio-1">Gambar</label>
                </div>
                <div class="flex items-center gap-2">
                    <input type="radio" name="type" value="video" id="radio-2">
                    <label for="radio-2">Video</label>
                </div>
            </div>
            <div class="col-span-3 type-video hidden">Link</div>
            <div class="col-span-9 items-center gap-x-2 type-video hidden">:
                <input type="text" name="" id="" class="bg-gray-200">
            </div>
            <div class="col-span-3 type-image">Gambar</div>
            <div class="col-span-9 flex items-center gap-x-2 type-image">:
                <label for="ad-image" class="admin-button">Upload Header</label>
            </div>
            <div class="col-span-12 flex flex-col gap-y-2 type-image">
                <div class="flex">
                    <img src="{{ asset('svg/images.svg') }}" class="w-vw-50 h-vh-20 bg-gray-300" id="preview-ad-image">
                    <input type="file" name="" id="ad-image" class="invisible w-2" onchange="loadFile(event, 'ad-image')"
                        accept="image/*" required>
                </div>
            </div>
            <div class="col-span-3">Status</div>
            <div class="col-span-9 gap-x-2">:
                <select name="status" id="" class="bg-gray-200">
                    <option value="1">Tampilkan</option>
                    <option value="2">Tampilkan untuk waktu tertentu</option>
                    <option value="3">Tidak ditampilkan</option>
                </select>
            </div>
            <div class="col-span-3 status-2 hidden"></div>
            <div class="col-span-3 status-2 hidden">Tampilkan dari tanggal:</div>
            <div class="col-span-6 items-center gap-2 status-2 hidden">
                <select name="day" id="" class="bg-gray-200">
                    @for ($i = 1; $i <= 31; $i++)
                        <option value={{ $i }}>{{ $i }}</option>
                    @endfor
                </select>
                -
                <select name="month" id="" class="bg-gray-200">
                    @for ($i = 1; $i <= 12; $i++)
                        <option value={{ $i }}>{{ $i }}</option>
                    @endfor
                </select>
                -
                <select name="year" id="" class="bg-gray-200">
                    @for ($i = date('Y'); $i <= date('Y', strtotime('+1 year')); $i++)
                        <option value={{ $i }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="col-span-3 status-2 hidden"></div>
            <div class="col-span-3 status-2 hidden">Tampilkan hingga tanggal:</div>
            <div class="col-span-6 items-center gap-2 status-2 hidden">
                <select name="day" id="" class="bg-gray-200">
                    @for ($i = 1; $i <= 31; $i++)
                        <option value={{ $i }}>{{ $i }}</option>
                    @endfor
                </select>
                -
                <select name="month" id="" class="bg-gray-200">
                    @for ($i = 1; $i <= 12; $i++)
                        <option value={{ $i }}>{{ $i }}</option>
                    @endfor
                </select>
                -
                <select name="year" id="" class="bg-gray-200">
                    @for ($i = date('Y'); $i <= date('Y', strtotime('+1 year')); $i++)
                        <option value={{ $i }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="col-span-12 text-center">
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
            if (this.value == 'video') {
                $('.type-image').each(function() {
                    $(this).removeClass('flex').addClass('hidden');
                })
            } else {
                $('.type-video').each(function() {
                    $(this).removeClass('flex').addClass('hidden');
                })
            }
        });
        $('select[name=status]').change(function() {
            //@marshall ini nanti berubah tergantung value yang di dapet dari master data di database
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
