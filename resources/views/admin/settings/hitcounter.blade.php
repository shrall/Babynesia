@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white p-4 flex items-center justify-between">
        <div class="flex flex-col gap-1">
            <span class="font-overpass text-3xl font-bold">Hit Counter</span>
            <span class="text-gray-400">Laporan jumlah pengunjung website.</span>
        </div>
    </div>
    <div class="w-full flex flex-col gap-y-4 p-4">
        <div class="admin-card">
            <div class="col-span-12">
                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th data-priority="1">No</th>
                            <th data-priority="2">Bulan</th>
                            <th data-priority="3">Pengunjung - Anggota</th>
                            <th data-priority="4">Pengunjung - Bukan Anggota</th>
                            <th data-priority="5">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hitcounters as $hitcounter)
                            <tr>
                                <td>{{ $hitcounter->id }}</td>
                                <td>{{ $hitcounter->month }}</td>
                                <td>{{ $hitcounter->registered }}</td>
                                <td>{{ $hitcounter->unregistered }}</td>
                                <td>{{ $hitcounter->total }}</td>
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
                "order": [
                    [1, "desc"]
                ]
            });
        });
    </script>
@endsection
