@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white p-4 flex items-center justify-between">
        <div class="flex flex-col gap-1">
            <span class="font-concert-one text-3xl font-bold">Anggota - Nama Anggotanya</span>
        </div>
    </div>
    <div class="w-full flex flex-col gap-y-4 p-4">
        <div class="admin-card">
            <div class="col-span-3">Member-ID</div>
            <div class="col-span-9">: 1131</div>
            <div class="col-span-3">Status</div>
            <div class="col-span-9">: Reguler Customer</div>
            <div class="col-span-12 font-bold">Personal Data</div>
            <div class="col-span-3">Nama</div>
            <div class="col-span-9">: tes123</div>
            <div class="col-span-3">Anggota Sejak</div>
            <div class="col-span-9">: 13 Januari 2022</div>
            <div class="col-span-12 font-bold">Kontak Data</div>
            <div class="col-span-3">E-Mail</div>
            <div class="col-span-9">: ads@gmail.com</div>
            <div class="col-span-3">Kota</div>
            <div class="col-span-9">: Surabaya</div>
            <div class="col-span-3">Alamat</div>
            <div class="col-span-9">: Jl. Mawar 123</div>
            <div class="col-span-3">Kode pos</div>
            <div class="col-span-9">: 60232</div>
            <div class="col-span-3">Provinsi</div>
            <div class="col-span-9">: Jawa Timur</div>
            <div class="col-span-3">Negara</div>
            <div class="col-span-9">: Surabaya</div>
            <div class="col-span-3">Telepon</div>
            <div class="col-span-9">: 0318282823</div>
            <div class="col-span-3">Handphone</div>
            <div class="col-span-9">: 081233212888</div>
        </div>
        <div class="admin-card">
            <div class="col-span-12">
                <div class="text-xl font-bold">Riwayat Transaksi</div>
            </div>
            <div class="col-span-12">
                <table id="example" class="stripe hover text-center"
                    style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th>No</th>
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
                        <tr>
                            <td>1</td>
                            <td>CANCELED</td>
                            <td>3-1-2022</td>
                            <td>Andi Sujono</td>
                            <td>Rp. 625.000</td>
                            <td>Rp. 0</td>
                            <td>Rp. 12.000</td>
                            <td>Rp. 637.000</td>
                            <td>BCA: 8620.101.070</td>
                            <td class="flex items-center justify-center gap-2">
                                <a target="blank" href="#" class="admin-button cursor-pointer">
                                    <span class="fa fa-fw fa-eye"></span>
                                </a>
                                <a target="blank" href="#" class="admin-button cursor-pointer">
                                    <span class="fa fa-fw fa-edit"></span>
                                </a>
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
