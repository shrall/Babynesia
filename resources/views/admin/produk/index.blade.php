@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white p-4 flex items-center justify-between">
        <div class="flex flex-col gap-1">
            <span class="font-overpass text-3xl font-bold">Daftar Produk {{ $tipeproduk ?? '' }}</span>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('adminpage.produk.create') }}" class="admin-button">Tambah Produk</a>
        </div>
    </div>
    <div class="w-full flex flex-col gap-y-4 p-4">
        @if ($tipeproduk == ' ')
            <form action="{{ route('adminpage.produk.search') }}" method="post">
                @csrf
                <div class="admin-card">
                    <div class="col-span-12">
                        <div class="text-xl font-bold">Silahkan pilih kategori dan produsen dari produk yang ingin anda
                            tampilkan.
                        </div>
                    </div>
                    <div class="col-span-7">
                        <div class="flex flex-col">
                            Cari:
                            <input type="text" name="search" id="search" class="admin-input w-full">
                        </div>
                    </div>
                    <div class="col-span-6">
                        <div class="flex flex-col">
                            Kategori:
                            <select name="category" id="category" class="admin-input w-full">
                                <option value="no">-</option>
                                @foreach ($categories as $kategori)
                                    <option value="{{ $kategori->no_kategori }}">{{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-span-6">
                        <div class="flex flex-col">
                            Merk:
                            <select name="brand" id="brand" class="admin-input w-full">
                                <option value="no">-</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->no_brand }}">{{ $brand->nama_brand }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-span-6">
                        <div class="flex flex-col">
                            Status:
                            <select name="status" id="status" class="admin-input w-full">
                                <option value="0">Aktif</option>
                                <option value="1">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-span-6">
                        <div class="flex flex-col">
                            Syarat:
                            <select name="rule" id="rule" class="admin-input w-full">
                                <option value="1">-</option>
                                <option value="2">Tidak ada gambar</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-span-12">
                        <button type="submit" class="admin-button">Tampilkan</button>
                    </div>
                </div>
            </form>
        @endif
        <div class="admin-card">
            <div class="col-span-12">
                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em; padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th>Kode / Kode Alias</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Merk</th>
                            @if (Auth::user()->user_status_id != 6 && Auth::user()->user_status_id != 7)
                                <th>HPP</th>
                            @endif
                            <th>Harga</th>
                            <th>Promo</th>
                            <th>Stok Sisa</th>
                            <th>Stok Dipesan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $produk)
                            <tr>
                                <td>{{ $produk->kode_produk }}<br><span
                                        class="text-gray-400">{{ $produk->kode_alias }}</span></td>
                                <td>
                                    <img src="{{ asset('uploads/') . '/' . $produk->image }}" class="h-24">
                                </td>
                                <td class="text-center">
                                    <div class="flex flex-col items-center gap-1">
                                        {{ $produk->nama_produk ?? '-' }}
                                        <span
                                            class="fa fa-fw fa-circle {{ $produk->disable == 1 ? 'text-red-500' : 'text-green-500' }}"></span>
                                    </div>
                                </td>
                                <td>{{ $produk->category->nama_kategori ?? '-' }}</td>
                                <td>{{ $produk->brand->nama_brand ?? '-' }}</td>
                                @if (Auth::user()->user_status_id != 6 && Auth::user()->user_status_id != 7)
                                    <td>{{ AppHelper::rp(intval($produk->harga_pokok)) }}</td>
                                @endif
                                <td>{{ AppHelper::rp(intval($produk->harga)) }}</td>
                                <td>{{ AppHelper::rp(intval($produk->harga_sale)) }}</td>
                                @php
                                    $stock = 0;
                                @endphp
                                @foreach ($produk->stocks as $prodstok)
                                    @php
                                        $stock += $prodstok->product_stock;
                                    @endphp
                                @endforeach
                                <td>{{ $stock }}</td>
                                <td id="ordered-stock-{{$produk->kode_produk}}">
                                    <span class="fa fa-fw fa-circle-notch animate-spin"></span>
                                </td>
                                <td>
                                    <div class="flex items-center justify-center gap-2">
                                        <a target="blank" href="{{ route('adminpage.produk.show', $produk->kode_produk) }}"
                                            class="admin-action-button-info cursor-pointer">
                                            <span class="fa fa-fw fa-eye"></span>
                                        </a>
                                        <a target="blank" href="{{ route('adminpage.produk.edit', $produk->kode_produk) }}"
                                            class="admin-action-button-warning cursor-pointer">
                                            <span class="fa fa-fw fa-edit"></span>
                                        </a>
                                        <a onclick="openModal('delete-{{ $produk->kode_produk }}')"
                                            class="admin-action-button-danger cursor-pointer">
                                            <span class="fa fa-fw fa-times"></span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ $products->links() }}
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
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var hostname = "{{ request()->getHost() }}"
        var url = ""
        if (hostname.includes('www')) {
            url = "https://" + hostname
        } else {
            url = "{{ config('app.url') }}"
        }

        var products = @json($products);
        products.data.forEach(element => {
            $.post(url + "/adminpage/produk/getorderedstock", {
                    _token: CSRF_TOKEN,
                    id: element.kode_produk
                })
                .done(function(data) {
                    $(`#ordered-stock-${element.kode_produk}`).html(data);
                })
                .fail(function(error) {
                    console.log(error);
                });
        });
    </script>
@endsection

@section('modals')
    @foreach ($products as $produk)
        <div class="fixed w-screen h-screen hidden items-center justify-center modal z-50 text-black"
            id="delete-{{ $produk->kode_produk }}-modal">
            <div class="bg-black opacity-50 w-screen h-screen absolute background-modal" onclick="closeModal();"></div>
            <div class="rounded-lg bg-white px-8 pt-8 pb-6 absolute flex flex-col gap-y-4 w-128">
                <span class="fa fa-fw fa-times text-xl hover:text-red-600 absolute top-4 right-4 cursor-pointer"
                    onclick="closeModal();"></span>
                <div class="flex items-center justify-center px-8 py-4">
                    <div class="flex flex-col gap-y-2 text-center">
                        <span>Apakah kamu yakin ingin menghapus data dengan nama {{ $produk->nama_produk }}?</span>
                    </div>
                </div>
                <div class="admin-action-button-danger w-full cursor-pointer"
                    onclick="event.preventDefault(); document.getElementById('delete-produk-form-{{ $produk->kode_produk }}').submit();">
                    Hapus
                    <span class=" fa fa-fw fa-trash-alt ml-2"></span>
                </div>
                <form action="{{ route('adminpage.produk.destroy', $produk->kode_produk) }}"
                    id="delete-produk-form-{{ $produk->kode_produk }}" method="post">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                </form>
            </div>
        </div>
    @endforeach
@endsection
