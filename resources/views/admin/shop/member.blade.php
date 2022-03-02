@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white p-4 flex items-center justify-between">
        <div class="flex flex-col gap-1">
            <span class="font-concert-one text-3xl font-bold">Daftar Anggota</span>
        </div>
        <a href="{{ route('adminpage.member.create') }}" class="admin-button">Tambah Anggota</a>
    </div>
    <div class="w-full flex flex-col gap-y-4 p-4">
        <div class="admin-card">
            <div class="col-span-12">
                <table id="example" class="stripe hover text-center"
                    style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>E-Mail</th>
                            <th>Kota</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>1131</td>
                            <td>Andi Sujono</td>
                            <td>andisujono@gmail.com</td>
                            <td>Kota Surabaya</td>
                            <td class="flex items-center justify-center gap-2">
                                <a target="blank" href="#" class="admin-button cursor-pointer">
                                    <span class="fa fa-fw fa-eye"></span>
                                </a>
                                <a target="blank" href="#" class="admin-button cursor-pointer">
                                    <span class="fa fa-fw fa-edit"></span>
                                </a>
                                <a onclick="event.preventDefault(); document.getElementById('delete-member-form').submit();"
                                    class="admin-button cursor-pointer">
                                    <span class="fa fa-fw fa-times"></span>
                                </a>
                                <form action="#" id="delete-member-form" method="post">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                </form>
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
