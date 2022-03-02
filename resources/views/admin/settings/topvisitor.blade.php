@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white p-4 flex items-center justify-between">
        <div class="flex flex-col gap-1">
            <span class="font-concert-one text-3xl font-bold">Top 100 Visitor ({{ date('M Y') }})</span>
        </div>
    </div>
    <div class="w-full flex flex-col gap-y-4 p-4">
        <div class="admin-card">
            <div class="col-span-12">
                <table id="example" class="stripe hover text-center"
                    style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
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
                        <tr>
                            <td>1</td>
                            <td>132</td>
                            <td>Joko Susanto</td>
                            <td>12</td>
                            <td>20</td>
                            <td>
                                <a target="blank" href="#" class="admin-button cursor-pointer">
                                    Detail
                                </a>
                            </td>
                            <td>
                                <div class="flex items-center justify-center gap-2">
                                    <a target="blank" href="#" class="admin-button cursor-pointer">
                                        View
                                    </a>
                                    <a onclick="event.preventDefault(); document.getElementById('delete-user-form').submit();"
                                        class="admin-button cursor-pointer">
                                        Delete
                                    </a>
                                    <form action="#" id="delete-user-form" method="post">
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
