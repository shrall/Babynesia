@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white p-4 flex items-center justify-between">
        <div class="flex flex-col gap-1">
            <span class="font-overpass text-3xl font-bold">Berita/Artikel</span>
        </div>
        <a href="{{ route('adminpage.article.create') }}" class="admin-button">Tambah Berita</a>
    </div>
    <div class="w-full flex flex-col gap-y-4 p-4">
        <div class="admin-card">
            <div class="col-span-12">
                <table id="example" class="stripe hover"
                    style="width:100%; padding-top: 1em; padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th data-priority="1">Judul</th>
                            <th data-priority="4">Urutan</th>
                            <th data-priority="5">Isi</th>
                            <th data-priority="6">Tanggal</th>
                            <th data-priority="7">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Info 1</td>
                            <td>1</td>
                            <td>Butuh website yang elegan, fitur lengkap, namun mudah digunakan? Pesan sekarang di
                                www.BabaWeb.biz. Donec sed odio dui. Vestibulum id ligula porta felis euismod semper. Fusce
                                dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh</td>
                            <td>2022-02-13</td>
                            <td>
                                <div class="flex items-center justify-center gap-2">
                                    <a target="blank" href="#" class="admin-button cursor-pointer">
                                        <span class="fa fa-fw fa-edit"></span>
                                    </a>
                                    <a onclick="event.preventDefault(); document.getElementById('delete-article-form').submit();"
                                        class="admin-button cursor-pointer">
                                        <span class="fa fa-fw fa-times"></span>
                                    </a>
                                    <form action="#" id="delete-article-form" method="post">
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
                scrollX: true,
            });
        });
    </script>
@endsection
