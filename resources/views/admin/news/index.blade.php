@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white p-4 flex items-center justify-between">
        <div class="flex flex-col gap-1">
            <span class="font-overpass text-3xl font-bold">Berita/Artikel</span>
        </div>
        <a href="{{ route('adminpage.news.create') }}" class="admin-button">Tambah Berita</a>
    </div>
    <div class="w-full flex flex-col gap-y-4 p-4">
        <div class="admin-card">
            <div class="col-span-12">
                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em; padding-bottom: 1em;">
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
                        @foreach ($newses as $news)
                            <tr>
                                <td>{{ $news->judul }}</td>
                                <td>{{ $news->urutan }}</td>
                                <td>{{ $news->isi }}</td>
                                <td>{{ $news->tanggal }}</td>
                                <td>
                                    <div class="flex items-center justify-center gap-2">
                                        <a target="blank" href="{{ route('adminpage.news.edit', $news->no) }}"
                                            class="admin-action-button-warning cursor-pointer">
                                            <span class="fa fa-fw fa-edit"></span>
                                        </a>
                                        <a onclick="event.preventDefault(); document.getElementById('delete-article-form-{{$news->no}}').submit();"
                                            class="admin-action-button-danger cursor-pointer">
                                            <span class="fa fa-fw fa-times"></span>
                                        </a>
                                        <form action="{{ route('adminpage.news.destroy', $news->no) }}"
                                            id="delete-article-form-{{$news->no}}" method="post">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
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
