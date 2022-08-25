@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white p-4 flex items-center justify-between">
        <div class="flex flex-col gap-1">
            <span class="font-overpass text-3xl font-bold">Anggota - {{ $user->name }}</span>
        </div>
        @if (Auth::user()->user_status_id != 6 && Auth::user()->user_status_id != 7)
            <a href="{{ route('adminpage.user.edit', $user->no_user) }}" class="admin-button">Edit Data</a>
        @endif
    </div>
    <div class="w-full flex flex-col gap-y-4 p-4">
        <div class="admin-card">
            <div class="col-span-3">Member-ID</div>
            <div class="col-span-9">{{ $user->no_user }}</div>
            <div class="col-span-3">Status</div>
            <div class="col-span-9">{{ $user->status->user_status }}</div>
            <div class="col-span-12 font-bold text-xl">Personal Data</div>
            <div class="col-span-3">Nama</div>
            <div class="col-span-9">{{ $user->name }}</div>
            <div class="col-span-3">Anggota Sejak</div>
            <div class="col-span-9">{{ date('d m Y', strtotime($user->tgl_gabung)) }}</div>
            <div class="col-span-12 font-bold text-xl">Kontak Data</div>
            <div class="col-span-3">E-Mail</div>
            <div class="col-span-9">{{ $user->email }}</div>
            <div class="col-span-3">Kota</div>
            <div class="col-span-9">{{ $user->kota }}</div>
            <div class="col-span-3">Alamat</div>
            <div class="col-span-9">{{ $user->alamat }}</div>
            <div class="col-span-3">Kode pos</div>
            <div class="col-span-9">{{ $user->kodepos }}</div>
            <div class="col-span-3">Provinsi</div>
            <div class="col-span-9">{{ $user->propinsi }}</div>
            <div class="col-span-3">Negara</div>
            <div class="col-span-9">{{ $user->country->name }}</div>
            <div class="col-span-3">Telepon</div>
            <div class="col-span-9">{{ $user->telp }}</div>
            <div class="col-span-3">Handphone</div>
            <div class="col-span-9">{{ $user->hp }}</div>
        </div>
        <div class="admin-card">
            <div class="col-span-12">
                <div class="text-xl font-bold">Riwayat Transaksi</div>
            </div>
            <div class="col-span-12">
                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Penerima</th>
                            <th>Subtotal</th>
                            <th>Diskon</th>
                            <th>Ongkos Kirim</th>
                            <th>Total</th>
                            <th>Bank</th>
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
                                <td>{{ ($faktur->receiver->receiver_name ?? "") . ', ' . ($faktur->receiver->city ?? "") }}</td>
                                <td>{{ AppHelper::rp($faktur->total_profit ?? 0) }}</td>
                                <td>{{ AppHelper::rp($faktur->discount ?? 0) }}</td>
                                <td>{{ AppHelper::rp($faktur->deliverycost ?? 0) }}</td>
                                <td>{{ AppHelper::rp($faktur->total_pembayaran ?? 0) }}</td>
                                <td>{{ $faktur->payment ? $faktur->payment->info : '-' }}</td>
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
