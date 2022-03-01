@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white p-4">
        <span class="font-concert-one text-3xl font-bold">Layout & Design</span>
    </div>
    <form action="" method="post">
        @csrf
        <div class="w-full flex flex-col gap-y-4 p-4">
            <div class="admin-card">
                <div class="col-span-12 flex flex-col gap-y-2">
                    <div class="text-xl font-bold">Gambar Header</div>
                    <div class="flex">
                        <img src="{{ asset('svg/images.svg') }}" class="w-vw-50 h-vh-20 bg-gray-300"
                            id="preview-header-image">
                        <input type="file" name="" id="header-image" class="invisible w-2"
                            onchange="loadFile(event, 'header-image')" accept="image/*" required>
                    </div>
                    <div class="flex">
                        <label for="header-image" class="admin-button">Upload Header</label>
                    </div>
                </div>
            </div>
            <div class="admin-card">
                <div class="col-span-12">
                    <div class="text-xl font-bold">Gambar Header</div>
                </div>
                <div class="col-span-6 flex flex-col items-center justify-center gap-2 px-12">
                    <img src="{{ asset('svg/images.svg') }}">
                    <div class="flex items-center gap-2">
                        <input type="radio" name="" id="layout-1">
                        <label for="layout-1">Layout 1</label>
                    </div>
                </div>
                <div class="col-span-6 flex flex-col items-center justify-center gap-2 px-12">
                    <img src="{{ asset('svg/images.svg') }}">
                    <div class="flex items-center gap-2">
                        <input type="radio" name="" id="layout-2">
                        <label for="layout-2">Layout 2</label>
                    </div>
                </div>
            </div>
            <div class="admin-card">
                <div class="col-span-12 flex flex-col gap-2">
                    <div class="text-xl font-bold">Warna</div>
                    <div class="flex items-center gap-2">
                        <input type="radio" name="" id="color-red-400" class="hidden">
                        <label for="color-red-400" id="label-color-red-400" onclick="changeColor('color-red-400');"
                            class="w-4 h-4 bg-red-400 border hover:border-slate-600 cursor-pointer theme-color">
                        </label>
                        <input type="radio" name="" id="color-orange-400" class="hidden">
                        <label for="color-orange-400" id="label-color-orange-400" onclick="changeColor('color-orange-400');"
                            class="w-4 h-4 bg-orange-400 border hover:border-slate-600 cursor-pointer theme-color">
                        </label>
                        <input type="radio" name="" id="color-amber-400" class="hidden">
                        <label for="color-amber-400" id="label-color-amber-400" onclick="changeColor('color-amber-400');"
                            class="w-4 h-4 bg-amber-400 border hover:border-slate-600 cursor-pointer theme-color">
                        </label>
                        <input type="radio" name="" id="color-yellow-400" class="hidden">
                        <label for="color-yellow-400" id="label-color-yellow-400" onclick="changeColor('color-yellow-400');"
                            class="w-4 h-4 bg-yellow-400 border hover:border-slate-600 cursor-pointer theme-color">
                        </label>
                        <input type="radio" name="" id="color-lime-400" class="hidden">
                        <label for="color-lime-400" id="label-color-lime-400" onclick="changeColor('color-lime-400');"
                            class="w-4 h-4 bg-lime-400 border hover:border-slate-600 cursor-pointer theme-color">
                        </label>
                        <input type="radio" name="" id="color-green-400" class="hidden">
                        <label for="color-green-400" id="label-color-green-400" onclick="changeColor('color-green-400');"
                            class="w-4 h-4 bg-green-400 border hover:border-slate-600 cursor-pointer theme-color">
                        </label>
                        <input type="radio" name="" id="color-emerald-400" class="hidden">
                        <label for="color-emerald-400" id="label-color-emerald-400"
                            onclick="changeColor('color-emerald-400');"
                            class="w-4 h-4 bg-emerald-400 border hover:border-slate-600 cursor-pointer theme-color">
                        </label>
                        <input type="radio" name="" id="color-teal-400" class="hidden">
                        <label for="color-teal-400" id="label-color-teal-400" onclick="changeColor('color-teal-400');"
                            class="w-4 h-4 bg-teal-400 border hover:border-slate-600 cursor-pointer theme-color">
                        </label>
                        <input type="radio" name="" id="color-cyan-400" class="hidden">
                        <label for="color-cyan-400" id="label-color-cyan-400" onclick="changeColor('color-cyan-400');"
                            class="w-4 h-4 bg-cyan-400 border hover:border-slate-600 cursor-pointer theme-color">
                        </label>
                        <input type="radio" name="" id="color-sky-400" class="hidden">
                        <label for="color-sky-400" id="label-color-sky-400" onclick="changeColor('color-sky-400');"
                            class="w-4 h-4 bg-sky-400 border hover:border-slate-600 cursor-pointer theme-color">
                        </label>
                        <input type="radio" name="" id="color-blue-400" class="hidden">
                        <label for="color-blue-400" id="label-color-blue-400" onclick="changeColor('color-blue-400');"
                            class="w-4 h-4 bg-blue-400 border hover:border-slate-600 cursor-pointer theme-color">
                        </label>
                        <input type="radio" name="" id="color-indigo-400" class="hidden">
                        <label for="color-indigo-400" id="label-color-indigo-400" onclick="changeColor('color-indigo-400');"
                            class="w-4 h-4 bg-indigo-400 border hover:border-slate-600 cursor-pointer theme-color">
                        </label>
                        <input type="radio" name="" id="color-violet-400" class="hidden">
                        <label for="color-violet-400" id="label-color-violet-400" onclick="changeColor('color-violet-400');"
                            class="w-4 h-4 bg-violet-400 border hover:border-slate-600 cursor-pointer theme-color">
                        </label>
                        <input type="radio" name="" id="color-purple-400" class="hidden">
                        <label for="color-purple-400" id="label-color-purple-400" onclick="changeColor('color-purple-400');"
                            class="w-4 h-4 bg-purple-400 border hover:border-slate-600 cursor-pointer theme-color">
                        </label>
                        <input type="radio" name="" id="color-fuchsia-400" class="hidden">
                        <label for="color-fuchsia-400" id="label-color-fuchsia-400"
                            onclick="changeColor('color-fuchsia-400');"
                            class="w-4 h-4 bg-fuchsia-400 border hover:border-slate-600 cursor-pointer theme-color">
                        </label>
                        <input type="radio" name="" id="color-pink-400" class="hidden">
                        <label for="color-pink-400" id="label-color-pink-400" onclick="changeColor('color-pink-400');"
                            class="w-4 h-4 bg-pink-400 border hover:border-slate-600 cursor-pointer theme-color">
                        </label>
                    </div>
                </div>
            </div>
            <div class="admin-card">
                <div class="col-span-12 text-center">
                    <button type="submit" class="admin-button">Simpan</button>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        function changeColor(id) {
            $('.theme-color').each(function() {
                $(this).removeClass('border-slate-600')
            });
            //@marshall ngefalse semua radio button dengan name yang udah di set
            // $('#with_ranking_rs').prop('checked', false);
            $('#label-' + id).addClass('border-slate-600');
            //ngetrue radio button yang di pilih
        }
    </script>
@endsection
