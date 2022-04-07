@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white p-4 flex items-center justify-between">
        <div class="flex flex-col gap-1">
            <span class="font-overpass text-3xl font-bold">Laporan Penjualan</span>
        </div>
    </div>
    <div class="w-full flex flex-col gap-y-4 p-4">
        <form action="{{ route('adminpage.faktur.filter') }}" method="post">
            @csrf
            <div class="admin-card">
                <div class="col-span-3">
                    <div class="flex flex-col">
                        Tanggal Mulai:
                        <input type="date" name="date_start" id="" class="admin-input w-full">
                    </div>
                </div>
                <div class="col-span-3">
                    <div class="flex flex-col">
                        Sampai Tanggal:
                        <input type="date" name="date_end" id="" class="admin-input w-full">
                    </div>
                </div>
                <div class="col-span-6">
                    <div class="flex flex-col">
                        Status:
                        <select name="status" id="status" class="admin-input w-full">
                            @foreach ($fakturstatuses as $fakturstatus)
                                <option value="{{ $fakturstatus->id }}">{{ $fakturstatus->status }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-span-12">
                    <button type="submit" class="admin-button">Tampilkan</button>
                </div>
            </div>
        </form>
        <div class="admin-card">
            <div class="col-span-12">
                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em; padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Pembeli</th>
                            <th>Penerima</th>
                            <th>Subtotal</th>
                            <th>Diskon</th>
                            <th>Ongkos Kirim</th>
                            <th>Total</th>
                            @if (Auth::user()->user_status_id != 6 && Auth::user()->user_status_id != 7)
                                <th>Bank</th>
                            @endif
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fakturs as $faktur)
                            <tr>
                                <td>{{ $faktur->no_faktur }}</td>
                                <td style="color: {{ $faktur->fakturstatus->color }};">
                                    {{ $faktur->fakturstatus->status }}</td>
                                <td>{{ $faktur->tanggal2 }}</td>
                                <td>{{ $faktur->receiver->receiver_name . ', ' . $faktur->receiver->city }}</td>
                                <td>{{ $faktur->receiver->sender_name ?? config('app.name') }}</td>
                                <td>{{ AppHelper::rp($faktur->total_profit ?? 0) }}</td>
                                <td>{{ AppHelper::rp($faktur->discount ?? 0) }}</td>
                                <td>{{ AppHelper::rp($faktur->deliverycost ?? 0) }}</td>
                                <td>{{ AppHelper::rp($faktur->total_pembayaran ?? 0) }}</td>
                                @if (Auth::user()->user_status_id != 6 && Auth::user()->user_status_id != 7)
                                    <td>{{ $faktur->payment ? $faktur->payment->info : '-' }}</td>
                                @endif
                                <td>
                                    <div class="flex items-center justify-center gap-2">
                                        <a target="popup" href="{{ route('adminpage.faktur.show', $faktur->no_faktur) }}"
                                            onclick="window.open('{{ route('adminpage.faktur.show', $faktur->no_faktur) }}','name','width=700,height=550')"
                                            class="admin-action-button-info cursor-pointer">
                                            <span class="fa fa-fw fa-eye"></span>
                                        </a>
                                        <a target="blank" href="{{ route('adminpage.faktur.edit', $faktur->no_faktur) }}"
                                            class="admin-action-button-warning cursor-pointer">
                                            <span class="fa fa-fw fa-edit"></span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ $fakturs->links() }}
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                scrollX: true,
                "paging": false,
                "searching": false,
                "lengthChange": false,
                "info": false,
                "ordering": false
            });
        });
    </script>
@endsection
