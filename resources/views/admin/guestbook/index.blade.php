@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white p-4 flex items-center justify-between">
        <div class="flex flex-col gap-1">
            <span class="font-overpass text-3xl font-bold">Buku Tamu</span>
        </div>
        <a href="{{ route('adminpage.guestbook.create') }}" class="admin-button">Tambah Buku Tamu</a>
    </div>
    <div class="w-full flex flex-col gap-y-4 p-4">
        <div class="admin-card">
            <div class="col-span-12">
                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em; padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Isi</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($guestbooks as $guestbook)
                            <tr>
                                <td>{{ $guestbook->datum }}</td>
                                <td>{{ $guestbook->name }}</td>
                                <td>{{ $guestbook->message }}</td>
                                <td><span
                                        class="fa fa-fw fa-circle {{ $guestbook->accepted == 0 ? 'text-red-500' : 'text-green-500' }}"></span>
                                </td>
                                <td>
                                    <div class="flex items-center justify-center gap-2">
                                        <a target="blank"
                                            href="{{ route('adminpage.guestbook.edit', $guestbook->guestbook_id) }}"
                                            class="admin-action-button-warning cursor-pointer">
                                            <span class="fa fa-fw fa-edit"></span>
                                        </a>
                                        <a onclick="event.preventDefault(); document.getElementById('delete-guestbook-form-{{ $guestbook->guestbook_id }}').submit();"
                                            class="admin-action-button-danger cursor-pointer">
                                            <span class="fa fa-fw fa-times"></span>
                                        </a>
                                        <form action="{{ route('adminpage.guestbook.destroy', $guestbook->guestbook_id) }}"
                                            id="delete-guestbook-form-{{ $guestbook->guestbook_id }}" method="post">
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
