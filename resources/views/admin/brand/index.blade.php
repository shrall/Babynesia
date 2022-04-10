@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white p-4 flex items-center justify-between">
        <div class="flex flex-col gap-1">
            <span class="font-overpass text-3xl font-bold">Daftar Merk</span>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('adminpage.brand.create') }}" class="admin-button">Tambah Merk</a>
        </div>
    </div>
    <div class="w-full flex flex-col gap-y-4 p-4">
        <div class="admin-card">
            <div class="col-span-12">
                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $brand)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="">
                                    {{ $brand->nama_brand }}
                                </td>
                                <td><img src="{{ asset('uploads/' . $brand->gambar) }}" class="h-12"></td>
                                <td>
                                    <div class="flex items-center justify-center gap-2">
                                        <a target="blank" href="{{ route('adminpage.brand.edit', $brand->no_brand) }}"
                                            class="admin-action-button-warning cursor-pointer">
                                            <span class="fa fa-fw fa-edit"></span>
                                        </a>
                                        <a onclick="openModal('delete-{{ $brand->no_brand }}')"
                                            class="admin-action-button-danger cursor-pointer">
                                            <span class="fa fa-fw fa-times"></span>
                                        </a>
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

@section('modals')
    @foreach ($brands as $brand)
        <div class="fixed w-screen h-screen hidden items-center justify-center modal z-50 text-black"
            id="delete-{{ $brand->no_brand }}-modal">
            <div class="bg-black opacity-50 w-screen h-screen absolute background-modal" onclick="closeModal();"></div>
            <div class="rounded-lg bg-white px-8 pt-8 pb-6 absolute flex flex-col gap-y-4 w-128">
                <span class="fa fa-fw fa-times text-xl hover:text-red-600 absolute top-4 right-4 cursor-pointer"
                    onclick="closeModal();"></span>
                <div class="flex items-center justify-center px-8 py-4">
                    <div class="flex flex-col gap-y-2 text-center">
                        <span>Apakah kamu yakin ingin menghapus data dengan nama {{ $brand->nama_brand }}?</span>
                    </div>
                </div>
                <div class="admin-action-button-danger w-full cursor-pointer"
                    onclick="event.preventDefault(); document.getElementById('delete-brand-form-{{ $brand->no_brand }}').submit();">
                    Hapus
                    <span class=" fa fa-fw fa-trash-alt ml-2"></span>
                </div>
                <form action="{{ route('adminpage.brand.destroy', $brand->no_brand) }}"
                    id="delete-brand-form-{{ $brand->no_brand }}" method="post">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                </form>
            </div>
        </div>
    @endforeach
@endsection
