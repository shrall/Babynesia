@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white p-4 flex items-center justify-between">
        <div class="flex flex-col gap-1">
            <span class="font-overpass text-3xl font-bold">Top 100 Visitor ({{ date('M Y') }})</span>
        </div>
    </div>
    <div class="w-full flex flex-col gap-y-4 p-4">
        <div class="admin-card">
            <div class="col-span-12">
                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th data-priority="1">No</th>
                            <th data-priority="2">Customer ID</th>
                            <th data-priority="3">Customer Name</th>
                            <th data-priority="4">Login This Month</th>
                            <th data-priority="4">Login Until Now</th>
                            <th data-priority="5">Action</th>
                            <th data-priority="6">User Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->no_user }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->visitcountersmonth->count() }}</td>
                                <td>{{ $user->visitcounters->count() }}</td>
                                <td>
                                    <a onclick="event.preventDefault(); document.getElementById('detail-user-form-{{ $user->no_user }}').submit();"
                                        class="admin-button cursor-pointer">
                                        Detail
                                    </a>
                                    <form action="{{ route('adminpage.visitcounter.store') }}"
                                        id="detail-user-form-{{ $user->no_user }}" method="post">
                                        @csrf
                                        <input type="hidden" name="user" value="{{ $user->no_user }}">
                                    </form>
                                </td>
                                <td>
                                    <div class="flex items-center justify-center gap-2">
                                        <a target="blank" href="{{ route('adminpage.user.show', $user->no_user) }}"
                                            class="admin-action-button-info cursor-pointer">
                                            <span class="fa fa-fw fa-eye"></span>
                                        </a>
                                        <a onclick="event.preventDefault(); document.getElementById('delete-user-form-{{ $user->no_user }}').submit();"
                                            class="admin-action-button-danger cursor-pointer">
                                            <span class="fa fa-fw fa-times"></span>
                                        </a>
                                        <form action="{{ route('adminpage.user.destroy', $user->no_user) }}"
                                            id="delete-user-form-{{ $user->no_user }}" method="post">
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
