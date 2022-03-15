@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white p-4 flex items-center justify-between">
        <div class="flex flex-col gap-1">
            <span class="font-overpass text-3xl font-bold">Daftar Kategori</span>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('adminpage.kategori.create') }}" class="admin-button">Tambah Kategori</a>
            <a href="{{ route('adminpage.kategorichild.create') }}" class="admin-button">Tambah Subkategori</a>
        </div>
    </div>
    <div class="w-full flex flex-col gap-y-4 p-4">
        <div class="admin-card">
            <div class="col-span-12">
                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th>Kategori</th>
                            <th>Subkategori</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $kategori)
                            <tr>
                                <td class="bg-blue-100">{{ $kategori->nama_kategori }}</td>
                                <td class="bg-blue-100"></td>
                                <td>
                                    <div class="flex items-center justify-center gap-2">
                                        <a target="blank"
                                            href="{{ route('adminpage.kategori.edit', $kategori->no_kategori) }}"
                                            class="admin-action-button-warning cursor-pointer">
                                            <span class="fa fa-fw fa-edit"></span>
                                        </a>
                                        <a onclick="event.preventDefault(); document.getElementById('delete-kategori-form-{{ $kategori->no_kategori }}').submit();"
                                            class="admin-action-button-danger cursor-pointer">
                                            <span class="fa fa-fw fa-times"></span>
                                        </a>
                                        <form action="{{ route('adminpage.kategori.destroy', $kategori->no_kategori) }}"
                                            id="delete-kategori-form-{{ $kategori->no_kategori }}" method="post">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @foreach ($kategori->subcategories as $sub)
                                <tr>
                                    <td></td>
                                    <td class="bg-green-100">{{ $sub->child_name }}</td>
                                    <td>
                                        <div class="flex items-center justify-center gap-2">
                                            <a target="blank"
                                                href="{{ route('adminpage.kategorichild.edit', $sub->child_id) }}"
                                                class="admin-action-button-warning cursor-pointer">
                                                <span class="fa fa-fw fa-edit"></span>
                                            </a>
                                            <a onclick="event.preventDefault(); document.getElementById('delete-kategorichild-form-{{ $sub->child_id }}').submit();"
                                                class="admin-action-button-danger cursor-pointer">
                                                <span class="fa fa-fw fa-times"></span>
                                            </a>
                                            <form
                                                action="{{ route('adminpage.kategorichild.destroy', $sub->child_id) }}"
                                                id="delete-kategorichild-form-{{ $sub->child_id }}" method="post">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
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
  "ordering": false
            });
        });
    </script>
@endsection
