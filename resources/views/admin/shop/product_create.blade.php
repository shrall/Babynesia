@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white mb-2 p-4">
        <span class="font-overpass text-3xl font-bold">Tambah Product</span>
    </div>
    <form action="" method="post">
        @csrf
        <div class="grid grid-cols-2 gap-x-8 gap-y-2">
            <div class="admin-card">
                <div class="col-span-3">Kode Alias</div>
                <div class="col-span-9 flex items-center gap-x-2">:
                    <input type="text" name="" id="" class="admin-input">
                </div>
                <div class="col-span-3">Status</div>
                <div class="col-span-9 flex items-center gap-x-2">:
                    <div class="flex items-center gap-2">
                        <input type="radio" name="type" checked id="radio-1">
                        <label for="radio-1">Aktif</label>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="radio" name="type" id="radio-2">
                        <label for="radio-2">Tidak Aktif</label>
                    </div>
                </div>
                <div class="col-span-3">Nama Produk</div>
                <div class="col-span-9 flex items-center gap-x-2">:
                    <input type="text" name="" id="" class="admin-input">
                </div>
                <div class="col-span-3">Kode Alias</div>
                <div class="col-span-9 flex items-center gap-x-2">:
                    <input type="text" name="" id="" class="admin-input">
                </div>
                <div class="col-span-3">Kategori</div>
                <div class="col-span-9 flex gap-x-2">:
                    <select name="" id="" class="admin-input">
                        <option value="1">A</option>
                        <option value="2">B</option>
                    </select>
                </div>
                <div class="col-span-3">Merk</div>
                <div class="col-span-9 flex gap-x-2">:
                    <select name="" id="" class="admin-input">
                        <option value="1">A</option>
                        <option value="2">B</option>
                    </select>
                </div>
                <div class="col-span-3">Berat</div>
                <div class="col-span-9 flex items-center gap-x-2">:
                    <input type="number" name="" id="" class="admin-input">
                    gram
                </div>
                <div class="col-span-3">No Urut</div>
                <div class="col-span-9 flex items-center gap-x-2">:
                    <input type="number" name="" id="" class="admin-input">
                </div>
                <div class="col-span-3">HPP</div>
                <div class="col-span-9 flex items-center gap-x-2">:
                    <input type="number" name="" id="" class="admin-input">rupiah
                </div>
                <div class="col-span-3">Harga Web</div>
                <div class="col-span-9 flex items-center gap-x-2">:
                    <input type="number" name="" id="" class="admin-input">rupiah
                </div>
                <div class="col-span-3">Harga Toko</div>
                <div class="col-span-9 flex items-center gap-x-2">:
                    <input type="number" name="" id="" class="admin-input">rupiah
                </div>
                <div class="col-span-12 text-xs">*Bila 0, tidak ditampilkan</div>
                <div class="col-span-3">Harga Grosir</div>
                <div class="col-span-9 flex items-center gap-x-2">:
                    <input type="number" name="" id="" class="admin-input">rupiah
                </div>
                <div class="col-span-12 text-xs">*Bila 0, tidak ditampilkan</div>
                <div class="col-span-3">Diskon 1</div>
                <div class="col-span-9 flex items-center gap-x-2">:
                    <input type="number" name="" id="" class="admin-input">%
                </div>
                <div class="col-span-3">Diskon 2</div>
                <div class="col-span-9 flex items-center gap-x-2">:
                    <input type="number" name="" id="" class="admin-input">%
                </div>
                <div class="col-span-3">Diskon 3</div>
                <div class="col-span-9 flex items-center gap-x-2">:
                    <input type="number" name="" id="" class="admin-input">%
                </div>

            </div>
            <div class="admin-card">
                <div class="col-span-3">Gambar 1</div>
                <div class="col-span-9">
                    <input type="file" name="" id="1-image" class="" onchange="loadFile(event, '1-image')"
                        accept="image/*" required>
                </div>
                <div class="col-span-3">Gambar 2</div>
                <div class="col-span-9">
                    <input type="file" name="" id="2-image" class="" onchange="loadFile(event, '2-image')"
                        accept="image/*" required>
                </div>
                <div class="col-span-3">Gambar 3</div>
                <div class="col-span-9">
                    <input type="file" name="" id="3-image" class="" onchange="loadFile(event, '3-image')"
                        accept="image/*" required>
                </div>
                <div class="col-span-3">Gambar 4</div>
                <div class="col-span-9">
                    <input type="file" name="" id="4-image" class="" onchange="loadFile(event, '4-image')"
                        accept="image/*" required>
                </div>
                <div class="col-span-3">Gambar 5</div>
                <div class="col-span-9">
                    <input type="file" name="" id="5-image" class="" onchange="loadFile(event, '5-image')"
                        accept="image/*" required>
                </div>
                <div class="col-span-3">Featured Product</div>
                <div class="col-span-9 flex items-center gap-x-2">:
                    <div class="flex items-center gap-2">
                        <input type="radio" name="type" checked id="radio-3">
                        <label for="radio-3">Normal</label>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="radio" name="type" id="radio-4">
                        <label for="radio-4">Featured</label>
                    </div>
                </div>
                <div class="col-span-3">Status Promo</div>
                <div class="col-span-12 grid grid-cols-3 items-center gap-x-2">
                    <div class="flex items-center gap-2">
                        <input type="radio" name="type" checked id="radio-5">
                        <label for="radio-5">Ready Stock</label>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="radio" name="type" id="radio-6">
                        <label for="radio-6">Restock Ready</label>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="radio" name="type" id="radio-7">
                        <label for="radio-7">Promo</label>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="radio" name="type" id="radio-8">
                        <label for="radio-8">Grosir Ready Stock</label>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="radio" name="type" id="radio-9">
                        <label for="radio-9">Grosir PO</label>
                    </div>
                </div>
                <div class="col-span-3">Harga Promo</div>
                <div class="col-span-9 flex items-center gap-x-2">:
                    <input type="number" name="" id="" class="admin-input">rupiah
                </div>
                <div class="col-span-12 text-xs">*Bila 0, tidak ditampilkan</div>
                <div class="col-span-3">Grosir PO Ready Tanggal</div>
                <div class="col-span-9 flex items-center gap-x-2">:
                    <input type="text" name="" id="" class="admin-input">
                </div>
            </div>
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
@endsection
