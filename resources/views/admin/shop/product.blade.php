@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white p-4 flex items-center justify-between">
        <div class="flex flex-col gap-1">
            <span class="font-concert-one text-3xl font-bold">Daftar Produk</span>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('adminpage.product.create') }}" class="admin-button">Tambah Produk</a>
        </div>
    </div>
    <div class="w-full flex flex-col gap-y-4 p-4">
        <div class="admin-card">
            <div class="col-span-12">
                <div class="text-xl font-bold">Silahkan pilih kategori dan produsen dari produk yang ingin anda tampilkan.
                </div>
            </div>
            <div class="col-span-7">
                <div class="flex flex-col">
                    Cari:
                    <input type="text" name="" id="" class="bg-gray-200 w-full">
                </div>
            </div>
            <div class="col-span-6">
                <div class="flex flex-col">
                    Kategori:
                    <select name="" id="" class="bg-gray-200 w-full">
                        <option value="1">ABC</option>
                        <option value="2">QWE</option>
                    </select>
                </div>
            </div>
            <div class="col-span-6">
                <div class="flex flex-col">
                    Merk:
                    <select name="" id="" class="bg-gray-200 w-full">
                        <option value="1">ABC</option>
                        <option value="2">QWE</option>
                    </select>
                </div>
            </div>
            <div class="col-span-6">
                <div class="flex flex-col">
                    Urutkan:
                    <select name="" id="" class="bg-gray-200 w-full">
                        <option value="1">ABC</option>
                        <option value="2">QWE</option>
                    </select>
                </div>
            </div>
            <div class="col-span-6">
                <div class="flex flex-col">
                    Syarat:
                    <select name="" id="" class="bg-gray-200 w-full">
                        <option value="1">ABC</option>
                        <option value="2">QWE</option>
                    </select>
                </div>
            </div>
            <div class="col-span-12">
                <button type="submit" class="admin-button">Tampilkan</button>
            </div>
        </div>
        <div class="admin-card">
            <div class="col-span-12">
                <table id="example" class="stripe hover text-center"
                    style="width:100%; padding-top: 1em; padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>ID</th>
                            <th>Kode Alias</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Merk</th>
                            <th>HPP</th>
                            <th>Harga</th>
                            <th>Promo</th>
                            <th>Stok Sisa</th>
                            <th>Stok Dipesan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>234</td>
                            <td>1</td>
                            <td>234</td>
                            <td><img src="{{ asset('svg/images.svg') }}" class="h-24"></td>
                            <td>Girl</td>
                            <td>Kategori</td>
                            <td>Merk</td>
                            <td>Rp.</td>
                            <td>Rp. 234.000</td>
                            <td>Rp. 12.000</td>
                            <td>1</td>
                            <td>1</td>
                            <td><span class="fa fa-fw fa-circle text-red-500"></span></td>
                            <td>
                                <div class="flex items-center justify-center gap-2">
                                    <a target="blank" href="#" class="admin-button cursor-pointer">
                                        <span class="fa fa-fw fa-edit"></span>
                                    </a>
                                    <a onclick="event.preventDefault(); document.getElementById('delete-brand-form').submit();"
                                        class="admin-button cursor-pointer">
                                        <span class="fa fa-fw fa-times"></span>
                                    </a>
                                    <form action="#" id="delete-brand-form" method="post">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                    </form>
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
