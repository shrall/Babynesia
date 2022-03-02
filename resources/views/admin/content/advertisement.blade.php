@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white p-4 flex items-center justify-between">
        <div class="flex flex-col gap-1">
            <span class="font-concert-one text-3xl font-bold">Iklan Utama</span>
            <span class="text-gray-400">Gambar/Flash yang ditampilkan di halaman utama, berguna untuk menarik perhatian
                pengunjung website.</span>
        </div>
        <a href="{{ route('adminpage.advertisement.create') }}" class="admin-button">Tambah Iklan</a>
    </div>
    <div class="w-full flex flex-col gap-y-4 p-4">
        <div class="admin-card">
            <div class="col-span-12">
                <table id="example" class="stripe hover text-center"
                    style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th data-priority="1">Nama</th>
                            <th data-priority="2">Tipe</th>
                            <th data-priority="3">Link</th>
                            <th data-priority="4">Tampilkan</th>
                            <th data-priority="5">Dari Tanggal</th>
                            <th data-priority="6">Sampai Tanggal</th>
                            <th data-priority="7">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="flex flex-col gap-1">
                                <img src="{{ asset('svg/images.svg') }}" class="h-4">
                                image
                            </td>
                            <td>Gambar</td>
                            <td>{{ asset('svg/images.svg') }}</td>
                            <td><span class="fa fa-fw fa-circle text-red-500"></span></td>
                            <td>01-01-2022</td>
                            <td>12-12-2022</td>
                            <td>
                                <div class="flex items-center justify-center gap-2">
                                    <a target="blank" href="#" class="admin-button cursor-pointer">
                                        <span class="fa fa-fw fa-edit"></span>
                                    </a>
                                    <a onclick="event.preventDefault(); document.getElementById('delete-ad-form').submit();"
                                        class="admin-button cursor-pointer">
                                        <span class="fa fa-fw fa-times"></span>
                                    </a>
                                    <form action="#" id="delete-ad-form" method="post">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                    </form>
                                </div>
                            </td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                    responsive: true
                })
                .columns.adjust();
        });
    </script>
@endsection
