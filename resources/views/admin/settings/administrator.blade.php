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
                            @if (Auth::user()->user_status_id != 6 && Auth::user()->user_status_id != 7)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->status->user_status }}</td>
                                    @if (Auth::user()->user_status_id != 6 && Auth::user()->user_status_id != 7)
                                        <td>
                                            <div class="flex items-center justify-center gap-2">
                                                <a target="blank"
                                                    href="{{ route('adminpage.user.edit', $user->no_user) }}"
                                                    class="admin-button-warning cursor-pointer">
                                                    <span class="fa fa-fw fa-edit"></span>
                                                </a>
                                                <a onclick="openModal('delete-{{ $user->no_user }}');"
                                                    class="admin-button-danger cursor-pointer">
                                                    <span class="fa fa-fw fa-times"></span>
                                                </a>
                                            </div>
                                        </td>
                                    @elseif($user->no_user == Auth::user()->no_user)
                                        <td>
                                            <div class="flex items-center justify-center gap-2">
                                                <a target="blank"
                                                    href="{{ route('adminpage.user.edit', $user->no_user) }}"
                                                    class="admin-button-warning cursor-pointer">
                                                    <span class="fa fa-fw fa-edit"></span>
                                                </a>
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                            @else
                                @if ($user->no_user == Auth::user()->no_user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->status->user_status }}</td>
                                        @if (Auth::user()->user_status_id != 6 && Auth::user()->user_status_id != 7)
                                            <td>
                                                <div class="flex items-center justify-center gap-2">
                                                    <a target="blank"
                                                        href="{{ route('adminpage.user.edit', $user->no_user) }}"
                                                        class="admin-button-warning cursor-pointer">
                                                        <span class="fa fa-fw fa-edit"></span>
                                                    </a>
                                                    <a onclick="openModal('delete-{{ $user->no_user }}');"
                                                        class="admin-button-danger cursor-pointer">
                                                        <span class="fa fa-fw fa-times"></span>
                                                    </a>
                                                </div>
                                            </td>
                                        @elseif($user->no_user == Auth::user()->no_user)
                                            <td>
                                                <div class="flex items-center justify-center gap-2">
                                                    <a target="blank"
                                                        href="{{ route('adminpage.user.edit', $user->no_user) }}"
                                                        class="admin-button-warning cursor-pointer">
                                                        <span class="fa fa-fw fa-edit"></span>
                                                    </a>
                                                </div>
                                            </td>
                                        @endif
                                    </tr>
                                @endif
                            @endif
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
    @foreach ($admins as $user)
        <div class="fixed w-screen h-screen hidden items-center justify-center modal z-50 text-black"
            id="delete-{{ $user->no_user }}-modal">
            <div class="bg-black opacity-50 w-screen h-screen absolute background-modal" onclick="closeModal();"></div>
            <div class="rounded-lg bg-white px-8 pt-8 pb-6 absolute flex flex-col gap-y-4 w-128">
                <span class="fa fa-fw fa-times text-xl hover:text-red-600 absolute top-4 right-4 cursor-pointer"
                    onclick="closeModal();"></span>
                <div class="flex items-center justify-center px-8 py-4">
                    <div class="flex flex-col gap-y-2 text-center">
                        <span>Apakah kamu yakin ingin menghapus data dengan nama {{ $user->name }}?</span>
                    </div>
                </div>
                <div class="admin-action-button-danger w-full cursor-pointer"
                    onclick="event.preventDefault(); document.getElementById('delete-user-form-{{ $user->no_user }}').submit();">
                    Hapus
                    <span class=" fa fa-fw fa-trash-alt ml-2"></span>
                </div>
                <form action="{{ route('adminpage.user.destroy', $user->no_user) }}"
                    id="delete-user-form-{{ $user->no_user }}" method="post">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                </form>
            </div>
        </div>
    @endforeach
@endsection
