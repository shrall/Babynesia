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
                            {{-- <th>Tipe</th> --}}
                            <th>Link/Gambar</th>
                            <th>Dari Tanggal</th>
                            <th>Sampai Tanggal</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hotdeals as $hd)
                            {{-- @marshall ini nanti benerin kalo udah ada dummy data --}}
                            <tr>
                                <td class="">
                                    {{-- <div class="flex flex-col items-center gap-1"> --}}
                                    {{ $hd->name ?? '-' }}
                                    {{-- </div> --}}
                                </td>
                                <td>{{ $hd->position_nr }}</td>
                                {{-- <td>{{ $hd->type }}</td> --}}
                                @if ($hd->type == 'Gambar')
                                    <td>
                                        <img src="{{ 'https://tokobayifiv.com/public/uploads/'. $hd->image}}" class="h-vh-20 mx-auto">
                                    </td>
                                @else
                                    <td>{{ $hd->link }}</td>
                                @endif
                                <td>{{ $hd->from_date ?? '-' }}</td>
                                <td>{{ $hd->until_date ?? '-' }}</td>
                                <td><span
                                        class="fa fa-fw fa-circle {{ $hd->status == 0 ? 'text-red-500' : 'text-green-500' }}"></span>
                                </td>
                                <td>
                                    <div class="flex items-center justify-center gap-2">
                                        <a target="blank" href="{{ route('adminpage.hotdeals.edit', $hd->id) }}"
                                            class="admin-action-button-warning cursor-pointer">
                                            <span class="fa fa-fw fa-edit"></span>
                                        </a>
                                        <a onclick="openModal('delete-{{$hd->id}}')"
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
    @foreach ($hotdeals as $hotdeal)
        <div class="fixed w-screen h-screen hidden items-center justify-center modal z-50 text-black"
            id="delete-{{ $hotdeal->id }}-modal">
            <div class="bg-black opacity-50 w-screen h-screen absolute background-modal" onclick="closeModal();"></div>
            <div class="rounded-lg bg-white px-8 pt-8 pb-6 absolute flex flex-col gap-y-4 w-128">
                <span class="fa fa-fw fa-times text-xl hover:text-red-600 absolute top-4 right-4 cursor-pointer"
                    onclick="closeModal();"></span>
                <div class="flex items-center justify-center px-8 py-4">
                    <div class="flex flex-col gap-y-2 text-center">
                        <span>Apakah kamu yakin ingin menghapus data dengan nama {{ $hotdeal->name }}?</span>
                    </div>
                </div>
                <div class="admin-action-button-danger w-full cursor-pointer"
                    onclick="event.preventDefault(); document.getElementById('delete-hotdeal-form-{{ $hotdeal->id }}').submit();">
                    Hapus
                    <span class=" fa fa-fw fa-trash-alt ml-2"></span>
                </div>
                <form action="{{ route('adminpage.hotdeals.destroy', $hotdeal->id) }}"
                    id="delete-hotdeal-form-{{ $hotdeal->id }}" method="post">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                </form>
            </div>
        </div>
    @endforeach
@endsection
