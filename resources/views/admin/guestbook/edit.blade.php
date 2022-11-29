@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white mb-2 p-4">
        <span class="font-overpass text-3xl font-bold">Tambah Buku Tamu</span>
    </div>
    <form action="{{ route('adminpage.guestbook.update', $guestbook->guestbook_id) }}" method="post">
        @csrf
        @method('patch')
        <div class="admin-card mb-2">
            <div class="col-span-3">Nama</div>
            <div class="col-span-9 flex items-center gap-x-2">
                <input type="text" name="name" id="name" class="admin-input" required value="{{ $guestbook->name }}">
            </div>
            <div class="col-span-3">E-Mail</div>
            <div class="col-span-9 flex items-center gap-x-2">
                <input type="email" name="email" id="email" class="admin-input" required
                    value="{{ $guestbook->email }}">
            </div>
            <div class="col-span-3">Kota</div>
            <div class="col-span-9 flex items-center gap-x-2">
                <input type="text" name="city" id="city" class="admin-input" required
                    value="{{ $guestbook->location }}">
            </div>
            <div class="col-span-3">Tanggal:</div>
            <div class="col-span-9 flex items-center gap-2">
                <input type="date" name="date" id="date" class="admin-input" required value="{{ date('Y-m-d', strtotime($guestbook->datum)) }}">
            </div>
            <div class="col-span-3">Status:</div>
            <div class="col-span-9 flex items-center">
                <div class="flex items-center gap-2">
                    <div class="flex items-center gap-2">
                        <input type="radio" name="status" value=0 {{ $guestbook->accepted == 0 ? 'checked' : '' }}
                            id="radio-1">
                        <label for="radio-1">Off</label>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="radio" name="status" value=1 {{ $guestbook->accepted == 1 ? 'checked' : '' }}
                            id="radio-2">
                        <label for="radio-2">On</label>
                    </div>
                </div>
            </div>
            <div class="col-span-3">Isi</div>
            <div class="col-span-12 flex justify-center items-center gap-x-2">
                <textarea type="text" name="content" id="input-content" class="admin-input">{{ $guestbook->message }}</textarea>
            </div>
            <div class="col-span-12">
                <button type="submit" class="admin-button">Simpan</button>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script src="{{ asset('public/js/ckeditor.js') }}"></script>
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
