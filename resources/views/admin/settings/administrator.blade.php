@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white p-4 flex items-center justify-between">
        <div class="flex flex-col gap-1">
            <span class="font-overpass text-3xl font-bold">Administrator</span>
            <span class="text-gray-400">Daftar administrator yang memiliki hak akses Administrator Area.</span>
        </div>
        @if (Auth::user()->user_status_id != 6 && Auth::user()->user_status_id != 7)
            <a href="{{ route('adminpage.user.create') }}" class="admin-button">Tambah Administrator</a>
        @endif
    </div>
    <div class="w-full flex flex-col gap-y-4 p-4">
        <div class="admin-card">
            <div class="col-span-12">
                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th data-priority="1">Username</th>
                            <th data-priority="2">Status</th>
                            <th data-priority="3" width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->status->user_status }}</td>
                                @if (Auth::user()->user_status_id != 6 && Auth::user()->user_status_id != 7)
                                    <td>
                                        <div class="flex items-center justify-center gap-2">
                                            <a target="blank" href="{{ route('adminpage.user.edit', $user->no_user) }}"
                                                class="admin-button-warning cursor-pointer">
                                                <span class="fa fa-fw fa-edit"></span>
                                            </a>
                                            <a onclick="event.preventDefault(); document.getElementById('delete-admin-form').submit();"
                                                class="admin-button-danger cursor-pointer">
                                                <span class="fa fa-fw fa-times"></span>
                                            </a>
                                            <form action="{{ route('adminpage.user.destroy', $user->no_user) }}"
                                                id="delete-admin-form" method="post">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                            </form>
                                        </div>
                                    </td>
                                @elseif($user->no_user == Auth::user()->no_user)
                                    <td>
                                        <div class="flex items-center justify-center gap-2">
                                            <a target="blank" href="{{ route('adminpage.user.edit', $user->no_user) }}"
                                                class="admin-button-warning cursor-pointer">
                                                <span class="fa fa-fw fa-edit"></span>
                                            </a>
                                        </div>
                                    </td>
                                @endif
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
