@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white p-4 flex items-center justify-between">
        <div class="flex flex-col gap-1">
            <span class="font-overpass text-3xl font-bold">Iklan Utama</span>
            <span class="text-gray-400">Gambar/Flash yang ditampilkan di halaman utama, berguna untuk menarik perhatian
                pengunjung website.</span>
        </div>
        <a href="{{ route('adminpage.hotdeals.create') }}" class="admin-button">Tambah Iklan</a>
    </div>
    <div class="w-full flex flex-col gap-y-4 p-4">
        <div class="admin-card">
            <div class="col-span-12">
                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Urutan</th>
                            <th>Tipe</th>
                            <th>Link/Gambar</th>
                            <th>Dari Tanggal</th>
                            <th>Sampai Tanggal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hotdeals as $hd)
                            {{-- @marshall ini nanti benerin kalo udah ada dummy data --}}
                            <tr>
                                <td class="">
                                    <div class="flex flex-col items-center gap-1">
                                        {{ $hd->name }}
                                        <span
                                            class="fa fa-fw fa-circle {{ $hd->status == 0 ? 'text-red-500' : 'text-green-500' }}"></span>
                                    </div>
                                </td>
                                <td>{{ $hd->position_nr }}</td>
                                <td>{{ $hd->type }}</td>
                                @if ($hd->type == 'Gambar')
                                    <td>
                                        <img src="{{ asset('uploads/' . $hd->image) }}" class="h-vh-20 mx-auto">
                                    </td>
                                @else
                                    <td>{{ $hd->link }}</td>
                                @endif
                                <td>{{ $hd->from_date ?? '-' }}</td>
                                <td>{{ $hd->until_date ?? '-' }}</td>
                                <td>
                                    <div class="flex items-center justify-center gap-2">
                                        <a target="blank" href="{{ route('adminpage.hotdeals.edit', $hd->id) }}"
                                            class="admin-button-warning cursor-pointer">
                                            <span class="fa fa-fw fa-edit"></span>
                                        </a>
                                        <a onclick="event.preventDefault(); document.getElementById('delete-ad-form-{{$hd->id}}').submit();"
                                            class="admin-button-danger cursor-pointer">
                                            <span class="fa fa-fw fa-times"></span>
                                        </a>
                                        <form action="{{ route('adminpage.hotdeals.destroy', $hd->id) }}" id="delete-ad-form-{{$hd->id}}"
                                            method="post">
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
