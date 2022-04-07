@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white mb-2 p-4">
        <span class="font-overpass text-3xl font-bold">Edit Produk</span>
    </div>
    <form action="{{ route('adminpage.produk.update', $produk->kode_produk) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="grid grid-cols-2 gap-x-8 gap-y-2">
            <div class="admin-card">
                <div class="col-span-3">Kode Alias</div>
                <div class="col-span-9 flex items-center gap-x-2">
                    <input type="text" name="alias_code" id="alias_code" class="admin-input"
                        value="{{ $produk->kode_alias }}">
                </div>
                <div class="col-span-3">Status</div>
                <div class="col-span-9 flex items-center gap-x-2">
                    <div class="flex items-center gap-2">
                        <input type="radio" name="status" value="0" {{ $produk->disable == '0' ? 'checked' : '' }}
                            id="radio-1">
                        <label for="radio-1">Aktif</label>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="radio" name="status" value="1" {{ $produk->disable == '1' ? 'checked' : '' }}
                            id="radio-2">
                        <label for="radio-2">Tidak Aktif</label>
                    </div>
                </div>
                <div class="col-span-3">Nama Produk</div>
                <div class="col-span-9 flex items-center gap-x-2">
                    <input type="text" name="name" id="name" class="admin-input" value="{{ $produk->nama_produk }}"
                        required>
                </div>
                <div class="col-span-3">Kategori</div>
                <div class="col-span-9 flex gap-x-2">
                    <select name="category" id="category" class="admin-input">
                        @foreach ($categories as $kategori)
                            <option {{ $produk->kategory == $kategori->no_kategori ? 'selected' : '' }}
                                value="{{ $kategori->no_kategori }}">{{ $kategori->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-3">Merk</div>
                <div class="col-span-9 flex gap-x-2">
                    <select name="brand" id="brand" class="admin-input">
                        @foreach ($brands as $brand)
                            <option {{ $produk->brand_produk == $brand->no_brand ? 'selected' : '' }}
                                value="{{ $brand->no_brand }}">{{ $brand->nama_brand }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-3">Berat</div>
                <div class="col-span-9 flex items-center gap-x-2">
                    <input type="number" name="weight" id="weight" class="admin-input" value="{{ $produk->weight }}">
                    gram
                </div>
                <div class="col-span-3">No Urut</div>
                <div class="col-span-9 flex items-center gap-x-2">
                    <input type="number" name="order" id="order" class="admin-input" value="{{ $produk->sort_nr }}">
                </div>
                @if (Auth::user()->user_status_id != 6 && Auth::user()->user_status_id != 7)
                    <div class="col-span-3">HPP</div>
                    <div class="col-span-9 flex items-center gap-x-2">
                        <input type="number" name="hpp" id="hpp" class="admin-input" value="{{ $produk->hpp }}">rupiah
                    </div>
                @endif
                <div class="col-span-3">Harga Web</div>
                <div class="col-span-9 flex items-center gap-x-2">
                    <input type="number" name="harga" id="harga" class="admin-input" value="{{ $produk->harga }}"
                        placeholder="*Bila 0, tidak ditampilkan">rupiah
                </div>
                <div class="col-span-3">Harga Toko</div>
                <div class="col-span-9 flex items-center gap-x-2">
                    <input type="number" name="harga_toko" id="harga_toko" class="admin-input"
                        value="{{ $produk->harga_toko }}" placeholder="*Bila 0, tidak ditampilkan">rupiah
                </div>
                <div class="col-span-3">Harga Grosir</div>
                <div class="col-span-9 flex items-center gap-x-2">
                    <input type="number" name="harga_grosir" id="harga_grosir" class="admin-input"
                        value="{{ $produk->harga_grosir }}" required>rupiah
                </div>
                <div class="col-span-3">Diskon 1</div>
                <div class="col-span-9 flex items-center gap-x-2">
                    <input type="number" name="disc1" id="disc1" class="admin-input" value="{{ $produk->disc1 }}">%
                </div>
                <div class="col-span-3">Diskon 2</div>
                <div class="col-span-9 flex items-center gap-x-2">
                    <input type="number" name="disc2" id="disc2" class="admin-input" value="{{ $produk->disc2 }}">%
                </div>
                <div class="col-span-3">Diskon 3</div>
                <div class="col-span-9 flex items-center gap-x-2">
                    <input type="number" name="disc3" id="disc3" class="admin-input" value="{{ $produk->disc3 }}">%
                </div>

            </div>
            <div class="admin-card">
                @if (session('image'))
                    <div class="rounded-lg col-span-12 bg-red-400 text-white p-4 mb-4">
                        <span class="fa fa-fw fa-info-circle ml-2"></span>
                        {{ session('image') }}
                    </div>
                @endif
                <div class="col-span-3">Gambar 1</div>
                <div class="col-span-9">
                    @if ($produk->image)
                        <div class="flex items-center gap-2">
                            <img src="{{ 'http://www.tokobayifiv.com/images/produk/' }}{{ $produk->image ?? '#' }}"
                                class="w-12 h-12 object-cover">
                            <input type="checkbox" name="deleteimg[0]">
                            Hapus Gambar
                            <input type="radio" name="image_primary" value="0" checked id="">
                            Gambar Utama
                        </div>
                    @else
                        <div class="flex items-center gap-2">
                            <input type="file" name="image[0]" id="0-image" class="" accept="image/*">
                            <input type="radio" name="image_primary" value="0" id="">
                            Gambar Utama
                        </div>
                    @endif
                </div>
                <div class="col-span-3">Gambar 2</div>
                <div class="col-span-9">
                    @if ($produk->images->count() == 2)
                        <div class="flex items-center gap-2">
                            <img src="{{ 'http://www.tokobayifiv.com/images/produk/' }}{{ $produk->images[1] ?? '#' }}"
                                class="w-12 h-12 object-cover">
                            <input type="checkbox" name="deleteimg[1]">
                            Hapus Gambar
                            <input type="radio" name="image_primary" value="1" checked id="">
                            Gambar Utama
                        </div>
                    @else
                        <div class="flex items-center gap-2">
                            <input type="file" name="image[1]" id="1-image" class="" accept="image/*">
                            <input type="radio" name="image_primary" value="1" id="">
                            Gambar Utama
                        </div>
                    @endif
                </div>
                <div class="col-span-3">Gambar 3</div>
                <div class="col-span-9">
                    @if ($produk->images->count() == 3)
                        <div class="flex items-center gap-2">
                            <img src="{{ 'http://www.tokobayifiv.com/images/produk/' }}{{ $produk->images[1] ?? '#' }}"
                                class="w-12 h-12 object-cover">
                            <input type="checkbox" name="deleteimg[2]">
                            Hapus Gambar
                            <input type="radio" name="image_primary" value="2" checked id="">
                            Gambar Utama
                        </div>
                    @else
                        <div class="flex items-center gap-2">
                            <input type="file" name="image[2]" id="2-image" class="" accept="image/*">
                            <input type="radio" name="image_primary" value="2" id="">
                            Gambar Utama
                        </div>
                    @endif
                </div>
                <div class="col-span-3">Gambar 4</div>
                <div class="col-span-9">
                    @if ($produk->images->count() == 4)
                        <div class="flex items-center gap-2">
                            <img src="{{ 'http://www.tokobayifiv.com/images/produk/' }}{{ $produk->images[1] ?? '#' }}"
                                class="w-12 h-12 object-cover">
                            <input type="checkbox" name="deleteimg[3]">
                            Hapus Gambar
                            <input type="radio" name="image_primary" value="3" checked id="">
                            Gambar Utama
                        </div>
                    @else
                        <div class="flex items-center gap-2">
                            <input type="file" name="image[3]" id="3-image" class="" accept="image/*">
                            <input type="radio" name="image_primary" value="3" id="">
                            Gambar Utama
                        </div>
                    @endif
                </div>
                <div class="col-span-3">Gambar 5</div>
                <div class="col-span-9">
                    @if ($produk->images->count() == 5)
                        <div class="flex items-center gap-2">
                            <img src="{{ 'http://www.tokobayifiv.com/images/produk/' }}{{ $produk->images[1] ?? '#' }}"
                                class="w-12 h-12 object-cover">
                            <input type="checkbox" name="deleteimg[4]">
                            Hapus Gambar
                            <input type="radio" name="image_primary" value="4" checked id="">
                            Gambar Utama
                        </div>
                    @else
                        <div class="flex items-center gap-2">
                            <input type="file" name="image[4]" id="4-image" class="" accept="image/*">
                            <input type="radio" name="image_primary" value="4" id="">
                            Gambar Utama
                        </div>
                    @endif
                </div>
                <div class="col-span-3">Featured Product</div>
                <div class="col-span-9 flex items-center gap-x-2">
                    <div class="flex items-center gap-2">
                        <input type="radio" name="featured" value="0" {{ $produk->featured == '0' ? 'checked' : '' }}
                            id="radio-3">
                        <label for="radio-3">Normal</label>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="radio" name="featured" value="1" {{ $produk->featured == '1' ? 'checked' : '' }}
                            id="radio-4">
                        <label for="radio-4">Featured</label>
                    </div>
                </div>
                <div class="col-span-3">Status Promo</div>
                <div class="col-span-12 grid grid-cols-3 items-center gap-x-2">
                    @foreach ($produkstatuses as $produkstatus)
                        <div class="flex items-center gap-2">
                            <input type="radio" name="stat"
                                {{ $produk->stat == $produkstatus->status_code ? 'checked' : '' }}
                                value="{{ $produkstatus->status_code }}">
                            <label for="radio-5">{{ $produkstatus->name }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="col-span-3">Harga Promo</div>
                <div class="col-span-9 flex items-center gap-x-2">
                    <input type="number" name="harga_sale" id="harga_sale" class="admin-input"
                        value="{{ $produk->harga_sale }}" placeholder="*Bila 0, tidak ditampilkan">rupiah
                </div>
                <div class="col-span-3">Produk Pelengkap</div>
                <div class="col-span-9 flex gap-x-2">
                    <select name="complement" id="complement" class="admin-input">
                        @foreach ($products as $product)
                            <option {{ $produk->complement == $product->kode_produk ? 'selected' : '' }}
                                value="{{ $product->kode_produk }}">[{{ $product->kode_produk }}] -
                                {{ $product->nama_produk }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="admin-card col-span-2">
                <div class="grid grid-cols-12 gap-y-1 col-span-12">
                    <div class="bg-slate-800 text-white flex p-4 col-span-2">Kode Stok</div>
                    <div class="bg-slate-800 text-white flex p-4 col-span-2">Type</div>
                    <div class="bg-slate-800 text-white flex p-4 col-span-2">Ukuran</div>
                    <div class="bg-slate-800 text-white flex p-4 col-span-2">Warna</div>
                    <div class="bg-slate-800 text-white flex p-4 col-span-1">Stok Sisa</div>
                    <div class="bg-slate-800 text-white flex p-4 col-span-1">Stok Dipesan</div>
                    <div class="bg-slate-800 text-white flex p-4 col-span-2">Action</div>
                </div>
                <div class="grid grid-cols-12 gap-2 justify-items-center col-span-12" id="product-stock-field">
                    @foreach ($produk->stocks as $key => $stok)
                        <input type="text" name="stock_code[{{ $loop->iteration }}]" value="{{ $stok->id }}"
                            readonly class="admin-input-full col-span-2 stock-input-{{ $loop->iteration }}">
                        @if (Auth::user()->user_status_id != 6 && Auth::user()->user_status_id != 7)
                        {{-- ini tampil kalau bukan staff --}}
                            <input type="text" name="stock_type[{{ $loop->iteration }}]" value="{{ $stok->type }}"
                                class="admin-input-full col-span-2 stock-input-{{ $loop->iteration }}">
                            <input type="text" name="stock_size[{{ $loop->iteration }}]" value="{{ $stok->size }}"
                                class="admin-input-full col-span-2 stock-input-{{ $loop->iteration }}">
                            <input type="text" name="stock_color[{{ $loop->iteration }}]" value="{{ $stok->color }}"
                                class="admin-input-full col-span-2 stock-input-{{ $loop->iteration }}">
                            <input type="text" name="stock_left[{{ $loop->iteration }}]"
                                value="{{ $stok->product_stock }}"
                                class="admin-input-full col-span-1 stock-input-{{ $loop->iteration }}">
                        @else
                        {{-- ini tampil kalau staff --}}
                            <input type="text" name="stock_type[{{ $loop->iteration }}]" value="{{ $stok->type }}"
                                class="admin-input-full col-span-2 stock-input-{{ $loop->iteration }}" readonly>
                            <input type="text" name="stock_size[{{ $loop->iteration }}]" value="{{ $stok->size }}"
                                class="admin-input-full col-span-2 stock-input-{{ $loop->iteration }}" readonly>
                            <input type="text" name="stock_color[{{ $loop->iteration }}]" value="{{ $stok->color }}"
                                class="admin-input-full col-span-2 stock-input-{{ $loop->iteration }}" readonly>
                            <input type="text" name="stock_left[{{ $loop->iteration }}]"
                                value="{{ $stok->product_stock }}"
                                class="admin-input-full col-span-1 stock-input-{{ $loop->iteration }}" readonly>
                        @endif
                        @php
                            $orderedstock = 0;
                        @endphp
                        @foreach ($stok->fakturs as $faktur)
                            @php
                                $orderedstock += $faktur->jumlah;
                            @endphp
                        @endforeach
                        <input type="text" name="stock_ordered[{{ $loop->iteration }}]" value="{{ $orderedstock }}"
                            readonly class="admin-input-full col-span-1 stock-input-{{ $loop->iteration }}">

                        @if (Auth::user()->user_status_id != 6 && Auth::user()->user_status_id != 7)
                        <a onclick="deleteType({{ $loop->iteration }});"
                            class="admin-action-button-danger cursor-pointer col-span-2 stock-input-{{ $loop->iteration }}">
                            <span class="fa fa-fw fa-trash-alt"></span>
                        </a>
                        @endif
                    @endforeach
                </div>
                <div class="col-span-12 flex mx-auto" onclick="addType();">
                    <div class="admin-button"><span class="fa fa-fw fa-plus"></span>Tambah Jenis Produk</div>
                </div>
            </div>
            <input type="hidden" name="product_types" id="product-types" value="{{ $produk->stocks->count() }}">
            <div class="admin-card col-span-2">
                <div class="col-span-3">Isi</div>
                <div class="col-span-12 flex justify-center items-center gap-x-2">
                    <textarea type="text" name="content" id="input-content" class="admin-input">{{ $produk->ket }}</textarea>
                </div>
                <div class="col-span-12">
                    <div class="flex items-center gap-x-2">
                        <button type="submit" class="admin-button">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script src="{{ asset('js/ckeditor.js') }}"></script>
    <script>
        ClassicEditor.create(document.querySelector('#input-content'), {
                mediaEmbed: {
                    previewsInData: true
                },
                removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle',
                    'ImageToolbar', 'ImageUpload', 'MediaEmbed', 'Table'
                ],
            }).then(editor => {})
            .catch(error => {
                console.error(error);
                console.error(error.stack);
            });
        ClassicEditor.editorConfig = function(config) {
            // misc options
            config.height = '350px';
        };
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
        var prodstok = @json($produk->stocks->count());

        function addType() {
            prodstok++;
            refresh_type();
        }

        function deleteType(order) {
            $('.stock-input-' + order).remove();
        }

        function refresh_type() {
            $.post(url + "/adminpage/produk/add_type", {
                    _token: CSRF_TOKEN,
                    prodstok: prodstok
                })
                .done(function(data) {
                    $('#product-stock-field').append(data);
                })
                .fail(function(error) {
                    console.log(error);
                });
        }
    </script>
@endsection
