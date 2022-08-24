@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white p-4 flex items-center justify-between mb-2">
        <div class="flex flex-col gap-1">
            <span class="font-overpass text-3xl font-bold">Produk - {{ $produk->nama_produk }}</span>
        </div>
    </div>
    <div class="grid grid-cols-2 gap-x-8 gap-y-2">
        <div class="admin-card items-center justify-center">
            <div class="col-span-12">
                <img src="{{ asset('uploads/') . '/' . $produk->image }}" alt="" srcset="">
            </div>
            <div class="col-span-12">
                <div class="flex items-center justify-center gap-2">
                    <a href="{{ route('adminpage.produk.index') }}" class="admin-action-button-info cursor-pointer">
                        <span class="fa fa-fw fa-arrow-left"></span>
                    </a>
                    <a target="blank" href="{{ route('adminpage.produk.edit', $produk->kode_produk) }}"
                        class="admin-action-button-warning cursor-pointer">
                        <span class="fa fa-fw fa-edit"></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="admin-card">
            <div class="col-span-3">Kode</div>
            <div class="col-span-9">{{ $produk->kode_produk }}</div>
            <div class="col-span-3">Kode Alias</div>
            <div class="col-span-9">{{ $produk->kode_alias }}</div>
            <div class="col-span-3">Nama</div>
            <div class="col-span-9">{{ $produk->nama_produk }}</div>
            <div class="col-span-3">Status</div>
            <div class="col-span-9">{{ $produk->disable == 1 ? 'Aktif' : 'Tidak Aktif' }}</div>
            <div class="col-span-3">Kategori</div>
            <div class="col-span-9"> {{ $produk->category->nama_kategori ?? '-' }}</div>
            <div class="col-span-3">Subkategori</div>
            <div class="col-span-9"> {{ $produk->subcategory->child_name ?? '-' }}</div>
            <div class="col-span-3">Merk</div>
            <div class="col-span-9"> {{ $produk->brand->nama_brand ?? '-' }}</div>
            <div class="col-span-3 place-self-start">Keterangan</div>
            <div class="col-span-9" id="keterangan"></div>
            <div class="col-span-3">Berat</div>
            <div class="col-span-9">{{ $produk->weight }} gram</div>
            {{-- <div class="col-span-3">No. Urut</div>
            <div class="col-span-9"> {{ $produk->sort_nr }}</div> --}}
            <hr class="col-span-12">
            @if (Auth::user()->user_status_id != 6 && Auth::user()->user_status_id != 7)
                @php
                    function getDiscPercent($normalPrice, $HPP)
                    {
                        $percent = (($normalPrice - $HPP) / $normalPrice) * 100;
                        $percent = round($percent);
                        return $percent;
                    }
                @endphp
                <div class="col-span-3">HPP</div>
                @if ($produk->harga != 0)
                    <div class="col-span-9">
                        {{ AppHelper::rp(intval($produk->harga_pokok)) . ' (' . getDiscPercent(intval($produk->harga), intval($produk->harga_pokok)) . '%)' }}
                    </div>
                @else
                    <div class="col-span-9">
                        {{ AppHelper::rp(intval($produk->harga_pokok)) . ' (0%)' }}
                    </div>
                @endif
            @endif
            <div class="col-span-3">Harga Web</div>
            @if ($produk->harga != 0)
                <div class="col-span-9"> {{ AppHelper::rp(intval($produk->harga)) }}</div>
            @else
                <div class="col-span-9">-</div>
            @endif
            {{-- <div class="col-span-3">Harga Toko</div>
            <div class="col-span-9"> {{ AppHelper::rp(intval($produk->harga_toko)) }}</div> --}}
            {{-- <div class="col-span-3">Harga Grosir</div>
            <div class="col-span-9"> {{ AppHelper::rp(intval($produk->harga_grosir)) }}</div> --}}
            <hr class="col-span-12">
            <div class="col-span-12 font-bold">Status</div>
            <div class="col-span-3">Status</div>
            <div class="col-span-9">{{ $produk->status->name }}
            </div>
            <div class="col-span-3">Harga Promo</div>
            <div class="col-span-9">{{ AppHelper::rp(intval($produk->harga_sale)) }}</div>
        </div>
        <div class="admin-card col-span-2">
            <div class="grid grid-cols-12 gap-y-1 col-span-12">
                <div class="bg-slate-800 text-white flex p-4 col-span-2">Kode Stok</div>
                <div class="bg-slate-800 text-white flex p-4 col-span-2">Type</div>
                <div class="bg-slate-800 text-white flex p-4 col-span-2">Ukuran</div>
                <div class="bg-slate-800 text-white flex p-4 col-span-2">Warna</div>
                <div class="bg-slate-800 text-white flex p-4 col-span-2">Stok Sisa</div>
                <div class="bg-slate-800 text-white flex p-4 col-span-2">Stok Dipesan</div>
            </div>
            <div class="grid grid-cols-12 gap-2 justify-items-center col-span-12" id="product-stock-field">
                @foreach ($produk->stocks as $key => $stok)
                    <input type="text" name="stock_code[{{ $loop->iteration }}]" value="{{ $stok->id }}" readonly
                        class="admin-input-full col-span-2 stock-input-{{ $loop->iteration }}">
                    @if (Auth::user()->user_status_id != 6 && Auth::user()->user_status_id != 7)
                        {{-- ini tampil kalau bukan staff --}}
                        <input type="text" name="stock_type[{{ $loop->iteration }}]" value="{{ $stok->type }}"
                            readonly class="admin-input-full col-span-2 stock-input-{{ $loop->iteration }}">
                        <input type="text" name="stock_size[{{ $loop->iteration }}]" value="{{ $stok->size }}"
                            readonly class="admin-input-full col-span-2 stock-input-{{ $loop->iteration }}">
                        <input type="text" name="stock_color[{{ $loop->iteration }}]" value="{{ $stok->color }}"
                            readonly class="admin-input-full col-span-2 stock-input-{{ $loop->iteration }}">
                        <input type="text" name="stock_left[{{ $loop->iteration }}]" value="{{ $stok->product_stock }}"
                            readonly class="admin-input-full col-span-2 stock-input-{{ $loop->iteration }}">
                    @else
                        {{-- ini tampil kalau staff --}}
                        <input type="text" name="stock_type[{{ $loop->iteration }}]" value="{{ $stok->type }}"
                            readonly class="admin-input-full col-span-2 stock-input-{{ $loop->iteration }}">
                        <input type="text" name="stock_size[{{ $loop->iteration }}]" value="{{ $stok->size }}"
                            readonly class="admin-input-full col-span-2 stock-input-{{ $loop->iteration }}">
                        <input type="text" name="stock_color[{{ $loop->iteration }}]" value="{{ $stok->color }}"
                            readonly class="admin-input-full col-span-2 stock-input-{{ $loop->iteration }}">
                        <input type="text" name="stock_left[{{ $loop->iteration }}]" value="{{ $stok->product_stock }}"
                            readonly class="admin-input-full col-span-2 stock-input-{{ $loop->iteration }}" readonly>
                    @endif
                    @php
                        $orderedstock = 0;
                    @endphp
                    @foreach ($stok->fakturs as $detfaktur)
                        @if ($detfaktur->faktur->status != 3 && $detfaktur->faktur->status != 5)
                            @php
                                $orderedstock += $detfaktur->jumlah;
                            @endphp
                        @endif
                    @endforeach
                    <input type="text" name="stock_ordered[{{ $loop->iteration }}]" value="{{ $orderedstock }}"
                        readonly class="admin-input-full col-span-2 stock-input-{{ $loop->iteration }}">
                @endforeach
            </div>
        </div>
        <div class="admin-card col-span-2">
            <div class="col-span-12">
                <div class="text-xl font-bold">Riwayat Stok produk</div>
            </div>
            <div class="col-span-12">
                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tanggal</th>
                            <th>Admin</th>
                            <th>Invoice</th>
                            <th>Keterangan</th>
                            <th>Jumlah</th>
                            <th>Stok</th>
                        </tr>
                    </thead>
                    @php
                        $stock = 0;
                    @endphp
                    <tbody>
                        @foreach ($produk->stockhistory as $history)
                            @php
                                $stock += $history->amount;
                            @endphp
                            <tr>
                                <td>{{ $history->id }}</td>
                                <td>{{ $history->trxdate }}</td>
                                <td>{{ $history->admin }}</td>
                                @if ($history->faktur_id != 0)
                                    <td><a class="underline text-blue-400" target="popup"
                                            href="{{ route('adminpage.faktur.show', $history->faktur_id) }}"
                                            onclick="window.open('{{ route('adminpage.faktur.show', $history->faktur_id) }}','name','width=700,height=550')">{{ $history->faktur_id }}</a>
                                    </td>
                                @else
                                    <td>-</td>
                                @endif
                                <td>{{ $history->notes }}</td>
                                <td>{{ $history->amount }}</td>
                                <td>{{ $stock }}</td>
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
        function htmlToText(html) {
            var temp = document.createElement('div');
            temp.innerHTML = html;
            return temp.textContent; // Or return temp.innerText if you need to return only visible text. It's slower.
        }
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                scrollX: true,
                "order": [
                    [0, "desc"]
                ]
            });
            $('#keterangan').html(htmlToText(@json($produk->ket)))
        });
    </script>
@endsection
