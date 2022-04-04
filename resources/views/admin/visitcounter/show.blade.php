@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white p-4 flex items-center justify-between">
        <div class="flex flex-col gap-1">
            <span class="font-overpass text-3xl font-bold">Detail for Visitor {{ $user->name }}</span>
            {{-- <span class="text-gray-400">{{ date('m - Y', strtotime(date('Y-01-01'))) }} until {{ date('m - Y') }}</span> --}}
        </div>
    </div>
    <div class="w-full flex flex-col gap-y-4 p-4">
        <div class="admin-card">
            <div class="col-span-12">
                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th data-priority="1">No</th>
                            <th data-priority="2">Date</th>
                            <th data-priority="3">IP Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->visitcounters as $visitcounter)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $visitcounter->date }}</td>
                                <td>{{ $visitcounter->IP }}</td>
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
