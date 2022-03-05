@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white mb-2 p-4">
        <span class="font-overpass text-3xl font-bold">Kirim E-Mail</span>
    </div>
    <form action="" method="post">
        @csrf
        <div class="admin-card mb-2">
            <div class="col-span-12">
                <div class="text-xl font-bold">Pilih penerima email</div>
            </div>
            <div class="col-span-12">
                <div class="flex items-center gap-2">
                    <input type="radio" name="" id="radio-1">
                    <label for="radio-1">Seluruh Anggota</label>
                </div>
            </div>
            <div class="col-span-12">
                <div class="flex items-center gap-2">
                    <input type="radio" name="" id="radio-2">
                    <label for="radio-2">Selain Anggota:</label>
                    <select class="bg-gray-400" id="user-list" name="user[]" multiple="multiple">
                        <option value="a">user1@gmail.com</option>
                        <option value="s">user2@gmail.com</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="admin-card">
            <div class="col-span-12">
                <div class="text-xl font-bold">Isi E-Mail</div>
            </div>
            <div class="col-span-3">Judul</div>
            <div class="col-span-9 flex items-center gap-x-2">:
                <input type="text" name="" id="" class="admin-input">
            </div>
            <div class="col-span-3">Isi E-Mail</div>
            <div class="col-span-12 flex justify-center items-center gap-x-2">
                <textarea type="text" name="content" id="input-content" class="admin-input"></textarea>
            </div>
            <div class="col-span-12">
                <button type="submit" class="admin-button">Kirim</button>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#user-list').select2({
                // dropdownParent: $('#create-survey-modal'),
                placeholder: 'Pilih user..'
            });
        });
    </script>

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
