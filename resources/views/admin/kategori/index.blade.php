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
                                        <a onclick="openModal('delete-{{ $kategori->no_kategori }}')"
                                            class="admin-action-button-danger cursor-pointer">
                                            <span class="fa fa-fw fa-times"></span>
                                        </a>
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
                                            <a onclick="openModal('delete-child-{{ $sub->child_id }}')"
                                                class="admin-action-button-danger cursor-pointer">
                                                <span class="fa fa-fw fa-times"></span>
                                            </a>
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

@section('modals')
    @foreach ($categories as $kategori)
        <div class="fixed w-screen h-screen hidden items-center justify-center modal z-50 text-black"
            id="delete-{{ $kategori->no_kategori }}-modal">
            <div class="bg-black opacity-50 w-screen h-screen absolute background-modal" onclick="closeModal();"></div>
            <div class="rounded-lg bg-white px-8 pt-8 pb-6 absolute flex flex-col gap-y-4 w-128">
                <span class="fa fa-fw fa-times text-xl hover:text-red-600 absolute top-4 right-4 cursor-pointer"
                    onclick="closeModal();"></span>
                <div class="flex items-center justify-center px-8 py-4">
                    <div class="flex flex-col gap-y-2 text-center">
                        <span>Apakah kamu yakin ingin menghapus data dengan nama {{ $kategori->nama_kategori }}?</span>
                    </div>
                </div>
                <div class="admin-action-button-danger w-full cursor-pointer"
                    onclick="event.preventDefault(); document.getElementById('delete-kategori-form-{{ $kategori->no_kategori }}').submit();">
                    Hapus
                    <span class=" fa fa-fw fa-trash-alt ml-2"></span>
                </div>
                <form action="{{ route('adminpage.kategori.destroy', $kategori->no_kategori) }}"
                    id="delete-kategori-form-{{ $kategori->no_kategori }}" method="post">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                </form>
            </div>
        </div>
        @foreach ($kategori->subcategories as $sub)
            <div class="fixed w-screen h-screen hidden items-center justify-center modal z-50 text-black"
                id="delete-child-{{ $sub->child_id }}-modal">
                <div class="bg-black opacity-50 w-screen h-screen absolute background-modal" onclick="closeModal();"></div>
                <div class="rounded-lg bg-white px-8 pt-8 pb-6 absolute flex flex-col gap-y-4 w-128">
                    <span class="fa fa-fw fa-times text-xl hover:text-red-600 absolute top-4 right-4 cursor-pointer"
                        onclick="closeModal();"></span>
                    <div class="flex items-center justify-center px-8 py-4">
                        <div class="flex flex-col gap-y-2 text-center">
                            <span>Apakah kamu yakin ingin menghapus data dengan nama {{ $sub->child_name }}?</span>
                        </div>
                    </div>
                    <div class="admin-action-button-danger w-full cursor-pointer"
                        onclick="event.preventDefault(); document.getElementById('delete-kategori-form-{{ $sub->child_id }}').submit();">
                        Hapus
                        <span class=" fa fa-fw fa-trash-alt ml-2"></span>
                    </div>
                    <form action="{{ route('adminpage.kategorichild.destroy', $sub->child_id) }}"
                        id="delete-kategori-form-{{ $sub->child_id }}" method="post">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                    </form>
                </div>
            </div>
        @endforeach
    @endforeach
@endsection
