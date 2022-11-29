@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white mb-2 p-4">
        <span class="font-overpass text-3xl font-bold">Edit Berita/Artikel</span>
    </div>
    <form action="{{ route('adminpage.news.update', $news->no) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="admin-card mb-2">
            <div class="col-span-3">Judul</div>
            <div class="col-span-9 flex items-center gap-x-2">
                <input type="text" name="title" id="title" class="admin-input" required value="{{ $news->judul }}">
            </div>
            <div class="col-span-3">Urutan</div>
            <div class="col-span-9 flex items-center gap-x-2">
                <input type="number" name="order" id="order" class="admin-input" required value="{{ $news->urutan }}">
            </div>
            <div class="col-span-3">Sumber</div>
            <div class="col-span-9 flex items-center gap-x-2">
                <input type="text" name="source" id="source" class="admin-input" required value="{{ $news->sumber }}">
            </div>
            <div class="col-span-3">Isi</div>
            <div class="col-span-12 flex justify-center items-center gap-x-2">
                <textarea type="text" name="content" id="input-content" class="admin-input">{{ $news->isi }}</textarea>
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
                simpleUpload: {
                    uploadUrl: {
                        url: "{{ route('adminpage.news.uploadphoto') }}"
                    }
                },
                mediaEmbed: {
                    previewsInData: true
                },
                removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'MediaEmbed', 'Table'
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
