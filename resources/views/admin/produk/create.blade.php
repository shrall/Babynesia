@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white mb-2 p-4">
        <span class="font-overpass text-3xl font-bold">Tambah Produk</span>
    </div>
    <form action="{{ route('adminpage.produk.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-2 gap-x-8 gap-y-2">
            <div class="admin-card">
                <div class="col-span-3">Kode Alias</div>
                <div class="col-span-9 flex items-center gap-x-2">
                    <input type="text" name="alias_code" id="alias_code" class="admin-input">
                </div>
                <div class="col-span-3">Status</div>
                <div class="col-span-9 flex items-center gap-x-2">
                    <div class="flex items-center gap-2">
                        <input type="radio" name="status" value="0" checked id="radio-1">
                        <label for="radio-1">Aktif</label>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="radio" name="status" value="1" id="radio-2">
                        <label for="radio-2">Tidak Aktif</label>
                    </div>
                </div>
                <div class="col-span-3">Nama Produk</div>
                <div class="col-span-9 flex items-center gap-x-2">
                    <input type="text" name="name" id="name" class="admin-input" required>
                </div>
                <div class="col-span-3">Kategori</div>
                <div class="col-span-9 flex gap-x-2">
                    <select name="category" id="category" class="admin-input">
                        @foreach ($categories as $kategori)
                            <option value="{{ $kategori->no_kategori }}">{{ $kategori->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-3">Merk</div>
                <div class="col-span-9 flex gap-x-2">
                    <select name="brand" id="brand" class="admin-input">
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->no_brand }}">{{ $brand->nama_brand }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-3">Berat</div>
                <div class="col-span-9 flex items-center gap-x-2">
                    <input type="number" name="weight" id="weight" class="admin-input">
                    gram
                </div>
                <div class="col-span-3">No Urut</div>
                <div class="col-span-9 flex items-center gap-x-2">
                    <input type="number" name="order" id="order" class="admin-input">
                </div>
                <div class="col-span-3">HPP</div>
                <div class="col-span-9 flex items-center gap-x-2">
                    <input type="number" name="hpp" id="hpp" class="admin-input">rupiah
                </div>
                <div class="col-span-3">Harga Web</div>
                <div class="col-span-9 flex items-center gap-x-2">
                    <input type="number" name="harga" id="harga" class="admin-input"
                        placeholder="*Bila 0, tidak ditampilkan">rupiah
                </div>
                <div class="col-span-3">Harga Toko</div>
                <div class="col-span-9 flex items-center gap-x-2">
                    <input type="number" name="harga_toko" id="harga_toko" class="admin-input"
                        placeholder="*Bila 0, tidak ditampilkan">rupiah
                </div>
                {{-- <div class="col-span-3">Harga Grosir</div>
                <div class="col-span-9 flex items-center gap-x-2">
                    <input type="number" name="harga_grosir" id="harga_grosir" class="admin-input" required>rupiah
                </div> --}}
                <div class="col-span-3">Diskon 1</div>
                <div class="col-span-9 flex items-center gap-x-2">
                    <input type="number" name="disc1" id="disc1" class="admin-input">%
                </div>
                <div class="col-span-3">Diskon 2</div>
                <div class="col-span-9 flex items-center gap-x-2">
                    <input type="number" name="disc2" id="disc2" class="admin-input">%
                </div>
                <div class="col-span-3">Diskon 3</div>
                <div class="col-span-9 flex items-center gap-x-2">
                    <input type="number" name="disc3" id="disc3" class="admin-input">%
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
                    <div class="flex items-center gap-2">
                        <input type="file" name="image[0]" id="1-image" class=""
                            onchange="loadFile(event, '1-image')" accept="image/*" required>
                        <input type="radio" name="image_primary" value="0" id="" checked>
                        Gambar Utama
                    </div>
                </div>
                <div class="col-span-3">Gambar 2</div>
                <div class="col-span-9">
                    <div class="flex items-center gap-2">
                        <input type="file" name="image[1]" id="2-image" class=""
                            onchange="loadFile(event, '2-image')" accept="image/*">
                        <input type="radio" name="image_primary" value="1" id="">
                        Gambar Utama
                    </div>
                </div>
                <div class="col-span-3">Gambar 3</div>
                <div class="col-span-9">
                    <div class="flex items-center gap-2">
                        <input type="file" name="image[2]" id="3-image" class=""
                            onchange="loadFile(event, '3-image')" accept="image/*">
                        <input type="radio" name="image_primary" value="2" id="">
                        Gambar Utama
                    </div>
                </div>
                <div class="col-span-3">Gambar 4</div>
                <div class="col-span-9">
                    <div class="flex items-center gap-2">
                        <input type="file" name="image[3]" id="4-image" class=""
                            onchange="loadFile(event, '4-image')" accept="image/*">
                        <input type="radio" name="image_primary" value="3" id="">
                        Gambar Utama
                    </div>
                </div>
                <div class="col-span-3">Gambar 5</div>
                <div class="col-span-9">
                    <div class="flex items-center gap-2">
                        <input type="file" name="image[4]" id="5-image" class=""
                            onchange="loadFile(event, '5-image')" accept="image/*">
                        <input type="radio" name="image_primary" value="4" id="">
                        Gambar Utama
                    </div>
                </div>
                {{-- <div class="col-span-3">Featured Product</div>
                <div class="col-span-9 flex items-center gap-x-2">
                    <div class="flex items-center gap-2">
                        <input type="radio" name="featured" value="0" checked id="radio-3">
                        <label for="radio-3">Normal</label>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="radio" name="featured" value="1" id="radio-4">
                        <label for="radio-4">Featured</label>
                    </div>
                </div> --}}
                <div class="col-span-3">Status Promo</div>
                <div class="col-span-12 grid grid-cols-3 items-center gap-x-2">
                    @foreach ($produkstatuses as $produkstatus)
                        <div class="flex items-center gap-2">
                            <input type="radio" name="stat" {{ $loop->iteration == 1 ? 'checked' : '' }}
                                value="{{ $produkstatus->status_code }}">
                            <label for="radio-5">{{ $produkstatus->name }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="col-span-3">Harga Promo</div>
                <div class="col-span-9 flex items-center gap-x-2">
                    <input type="number" name="harga_sale" id="harga_sale" class="admin-input"
                        placeholder="*Bila 0, tidak ditampilkan">rupiah
                </div>
                <div class="col-span-3">Produk Pelengkap</div>
                <div class="col-span-9 flex gap-x-2">
                    <select name="complement" id="complement" class="admin-input">
                        @foreach ($products as $product)
                            <option value="{{ $product->kode_produk }}">[{{ $product->kode_produk }}] -
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
                </div>
                <div class="col-span-12 flex mx-auto" onclick="addType();">
                    <div class="admin-button"><span class="fa fa-fw fa-plus"></span>Tambah Jenis Produk</div>
                </div>
            </div>
            <input type="hidden" name="product_types" id="product-types">
            <div class="admin-card col-span-2">
                <div class="col-span-3">Isi</div>
                <div class="col-span-12 flex justify-center items-center gap-x-2">
                    <textarea type="text" name="content" id="input-content" class="admin-input"></textarea>
                </div>
                <div class="col-span-12">
                    <button type="submit" class="admin-button">Simpan</button>
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
        var types = []
        var typescounter = 0


        function changeType(index, order) {
            types[order][index] = $('#stock_' + index + order).val();
            $('#product-types').val(typescounter);
        }

        function addType() {
            types.push(['', '', '', '', '', '']);
            typescounter++;
            refresh_type();
        }

        function deleteType(index) {
            types.splice(index, 1);
            typescounter--;
            refresh_type();
        }

        function refresh_type() {
            $('#product-types').val(typescounter);
            $.post(url + "/adminpage/produk/add_type", {
                    _token: CSRF_TOKEN,
                    types: types
                })
                .done(function(data) {
                    $('#product-stock-field').html(data);
                })
                .fail(function(error) {
                    console.log(error);
                });
        }
    </script>
@endsection
