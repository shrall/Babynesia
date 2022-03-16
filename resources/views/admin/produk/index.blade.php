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
                            {{-- @foreach ($categories as $kategori)
                                @if ($kategori->subcategories->count() == 0)
                                    <option value="{{ $kategori->no_kategori }}">
                                        {{ $kategori->nama_kategori }}</option>
                                @else
                                    @foreach ($kategori->subcategories as $kategorichild)
                                        <option value="{{ $kategorichild->child_id }}">
                                            {{ $kategorichild->category->nama_kategori }} -
                                            {{ $kategorichild->child_name }}
                                        </option>
                                    @endforeach
                                @endif
                            @endforeach --}}
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
                            <th>HPP</th>
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
                                {{-- @marshall image ini belum --}}
                                <td>
                                    <img src="{{ 'http://www.tokobayifiv.com/images/produk/' }}{{ $produk->image ?? '#' }}"
                                        class="h-24">
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
                                <td>{{ AppHelper::rp(intval($produk->harga_pokok)) }}</td>
                                <td>{{ AppHelper::rp(intval($produk->harga)) }}</td>
                                <td>{{ AppHelper::rp(intval($produk->harga_sale)) }}</td>
                                @php
                                    $stock = 0;
                                @endphp
                                @foreach ($produk->stockhistory as $history)
                                    @php
                                        $stock += $history->amount;
                                    @endphp
                                @endforeach
                                <td>{{ $stock }}</td>
                                @php
                                    $orderedstock = 0;
                                @endphp
                                @foreach ($produk->carts as $cart)
                                    @php
                                        $orderedstock += $cart->jumlah;
                                    @endphp
                                @endforeach
                                <td>{{ $orderedstock }}</td>
                                <td>
                                    <div class="flex items-center justify-center gap-2">
                                        <a target="blank"
                                            href="{{ route('adminpage.produk.show', $produk->kode_produk) }}"
                                            class="admin-action-button-info cursor-pointer">
                                            <span class="fa fa-fw fa-eye"></span>
                                        </a>
                                        <a target="blank"
                                            href="{{ route('adminpage.produk.edit', $produk->kode_produk) }}"
                                            class="admin-action-button-warning cursor-pointer">
                                            <span class="fa fa-fw fa-edit"></span>
                                        </a>
                                        <a onclick="event.preventDefault(); document.getElementById('delete-produk-form').submit();"
                                            class="admin-action-button-danger cursor-pointer">
                                            <span class="fa fa-fw fa-times"></span>
                                        </a>
                                        <form action="{{ route('adminpage.produk.destroy', $produk->kode_produk) }}"
                                            id="delete-produk-form" method="post">
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
@endsection
