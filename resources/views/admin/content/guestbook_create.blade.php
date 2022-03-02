@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white mb-2 p-4">
        <span class="font-concert-one text-3xl font-bold">Tambah Buku Tamu</span>
    </div>
    <form action="" method="post">
        @csrf
        <div class="admin-card mb-2">
            <div class="col-span-3">Nama</div>
            <div class="col-span-9 flex items-center gap-x-2">:
                <input type="text" name="" id="" class="bg-gray-200">
            </div>
            <div class="col-span-3">E-Mail</div>
            <div class="col-span-9 flex items-center gap-x-2">:
                <input type="email" name="" id="" class="bg-gray-200">
            </div>
            <div class="col-span-3">Kota</div>
            <div class="col-span-9 flex items-center gap-x-2">:
                <input type="text" name="" id="" class="bg-gray-200">
            </div>
            <div class="col-span-3">Tanggal:</div>
            <div class="col-span-9 flex items-center gap-2">
                <select name="day" id="" class="bg-gray-200">
                    @for ($i = 1; $i <= 31; $i++)
                        <option value={{ $i }}>{{ $i }}</option>
                    @endfor
                </select>
                -
                <select name="month" id="" class="bg-gray-200">
                    @for ($i = 1; $i <= 12; $i++)
                        <option value={{ $i }}>{{ $i }}</option>
                    @endfor
                </select>
                -
                <select name="year" id="" class="bg-gray-200">
                    @for ($i = date('Y'); $i <= date('Y', strtotime('+1 year')); $i++)
                        <option value={{ $i }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="col-span-3">Isi</div>
            <div class="col-span-12 flex justify-center items-center gap-x-2">
                <textarea type="text" name="content" id="input-content" class="bg-gray-200"></textarea>
            </div>
            <div class="col-span-12 text-center">
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
