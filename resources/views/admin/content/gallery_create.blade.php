@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white mb-2 p-4">
        <span class="font-overpass text-3xl font-bold">Tambah Galeri</span>
    </div>
    <form action="" method="post">
        @csrf
        <div class="admin-card mb-2">
            <div class="col-span-3">Nama</div>
            <div class="col-span-9 flex items-center gap-x-2">:
                <input type="text" name="" id="" class="admin-input">
            </div>
            <div class="col-span-3">Gambar</div>
            <div class="col-span-9 flex flex-col gap-2">
                <div class="flex gap-2">
                    : <img src="{{ asset('svg/images.svg') }}" class="px-4 h-vh-20 bg-gray-300" id="preview-gallery-image">
                    <input type="file" name="" id="gallery-image" class="invisible w-2"
                        onchange="loadFile(event, 'gallery-image')" accept="image/*" required>
                </div>
                <div class="flex mx-2">
                    <label for="gallery-image" class="admin-button">Upload Gambar</label>
                </div>
            </div>
            <div class="col-span-12 flex flex-col gap-y-2">
                <div class="flex">
                </div>
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
