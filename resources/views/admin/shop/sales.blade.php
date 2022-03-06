@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white p-4 flex items-center justify-between">
        <div class="flex flex-col gap-1">
            <span class="font-overpass text-3xl font-bold">Laporan Penjualan</span>
        </div>
    </div>
    <div class="w-full flex flex-col gap-y-4 p-4">
        <div class="admin-card">
            <div class="col-span-3">
                <div class="flex flex-col">
                    Tanggal Mulai:
                    <input type="date" name="" id="" class="admin-input w-full">
                </div>
            </div>
            <div class="col-span-3">
                <div class="flex flex-col">
                    Sampai Tanggal:
                    <input type="date" name="" id="" class="admin-input w-full">
                </div>
            </div>
            <div class="col-span-6">
                <div class="flex flex-col">
                    Status:
                    <select name="" id="" class="admin-input w-full">
                        <option value="1">NEW and Paid</option>
                        <option value="2">ALL</option>
                    </select>
                </div>
            </div>
            <div class="col-span-12">
                <button type="submit" class="admin-button">Tampilkan</button>
            </div>
        </div>
        <div class="admin-card">
            <div class="col-span-12">
                <table id="example" class="stripe hover"
                    style="width:100%; padding-top: 1em; padding-bottom: 1em;">
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
                            <th>Bank</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>234</td>
                            <td>DELIVERED</td>
                            <td>27-01-2022 12:58</td>
                            <td>Rudi</td>
                            <td>Rudi Sanjaya, Surabaya</td>
                            <td>Rp. 234.000</td>
                            <td>Rp. 0</td>
                            <td>Rp. 12.000</td>
                            <td>Rp. 246.000</td>
                            <td>BCA: 8620.101.070</td>
                            <td>
                                <div class="flex items-center justify-center gap-2">
                                    <a target="blank" href="#" class="admin-button cursor-pointer">
                                        <span class="fa fa-fw fa-eye"></span>
                                    </a>
                                    <a target="blank" href="#" class="admin-button cursor-pointer">
                                        <span class="fa fa-fw fa-edit"></span>
                                    </a>
                                </div>
                            </td>
                        </tr>
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
