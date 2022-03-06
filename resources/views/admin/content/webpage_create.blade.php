@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white mb-2 p-4">
        <span class="font-overpass text-3xl font-bold">Tambah Halaman Samping</span>
    </div>
    <form action="" method="post">
        @csrf
        <div class="admin-card mb-2">
            <div class="col-span-3">Nama</div>
            <div class="col-span-9 flex items-center gap-x-2">:
                <input type="text" name="" id="" class="admin-input">
            </div>
            <div class="col-span-3">Urutan</div>
            <div class="col-span-9 flex items-center gap-x-2">:
                <input type="number" name="" id="" class="admin-input">
            </div>
            <div class="col-span-3">Tampilkan di</div>
            <div class="col-span-9 gap-x-2">:
                <select name="" id="" class="admin-input">
                    <option value="1">Halaman A</option>
                    <option value="2">Halaman B</option>
                </select>
            </div>
            <div class="col-span-3">Buka di Window Baru</div>
            <div class="col-span-9 flex items-center gap-x-2">:
                <div class="flex items-center gap-2">
                    <input type="radio" name="" id="radio-3">
                    <label for="radio-3">Ya</label>
                </div>
                <div class="flex items-center gap-2">
                    <input type="radio" name="" id="radio-4">
                    <label for="radio-4">Tidak</label>
                </div>
            </div>
            <div class="col-span-3">Isi</div>
            <div class="col-span-12 flex justify-center items-center gap-x-2">
                <textarea type="text" name="content" id="input-content" class="admin-input"></textarea>
            </div>
            <div class="col-span-12">
                <button type="submit" class="admin-button">Simpan</button>
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
