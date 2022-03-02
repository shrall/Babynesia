@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white p-4 flex items-center justify-between">
        <div class="flex flex-col gap-1">
            <span class="font-concert-one text-3xl font-bold">Daftar Merk</span>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('adminpage.brands.create') }}" class="admin-button">Tambah Merk</a>
        </div>
    </div>
    <div class="w-full flex flex-col gap-y-4 p-4">
        <div class="admin-card">
            <div class="col-span-12">
                <table id="example" class="stripe hover text-center"
                    style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Gambar</th>
                            <th>Link</th>
                            <th>Tampilkan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Girl</td>
                            <td><img src="{{ asset('svg/images.svg') }}" class="h-24"></td>
                            <td></td>
                            <td><span class="fa fa-fw fa-circle text-red-500"></span></td>
                            <td>
                                <div class="flex items-center justify-center gap-2">
                                    <a target="blank" href="#" class="admin-button cursor-pointer">
                                        <span class="fa fa-fw fa-edit"></span>
                                    </a>
                                    <a onclick="event.preventDefault(); document.getElementById('delete-brand-form').submit();"
                                        class="admin-button cursor-pointer">
                                        <span class="fa fa-fw fa-times"></span>
                                    </a>
                                    <form action="#" id="delete-brand-form" method="post">
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
