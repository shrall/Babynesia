@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white p-4">
        <span class="font-overpass text-3xl font-bold">Layout & Design</span>
    </div>
    <form action="{{ route('adminpage.webconfig.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="type" value="design">
        <div class="w-full flex flex-col gap-y-4 p-4">
            <div class="admin-card">
                <div class="col-span-12 flex flex-col gap-y-2">
                    <div class="text-xl font-bold">Gambar Header</div>
                    <div class="flex">
                        <img @if ( array_values($webconfigs->where("name", "header_image")->toArray())[0]["content"] == null) src="{{ asset('svg/images.svg') }}"
                            @else src="{{ asset('uploads/' .  array_values($webconfigs->where("name", "header_image")->toArray())[0]["content"]) }}" @endif
                            class="w-vw-50 h-vh-20 bg-gray-300" id="preview-header-image">
                        <input type="file" name="header" id="header-image" class="invisible w-2"
                            onchange="loadFile(event, 'header-image')" accept="image/*">
                    </div>
                    <div class="flex">
                        <label for="header-image" class="admin-button">Upload Header</label>
                    </div>
                </div>
            </div>
            <div class="admin-card">
                <div class="col-span-12 flex flex-col gap-y-2">
                    <div class="text-xl font-bold">Gambar Background</div>
                    <div class="flex">
                        <img @if ( array_values($webconfigs->where("name", "bg_img")->toArray())[0]["content"] == null) src="{{ asset('svg/images.svg') }}"
                            @else src="{{ asset('uploads/' .  array_values($webconfigs->where("name", "bg_img")->toArray())[0]["content"]) }}" @endif
                            class="w-vw-50 h-vh-20 bg-gray-300" id="preview-bg-image">
                        <input type="file" name="bg" id="bg-image" class="invisible w-2"
                            onchange="loadFile(event, 'bg-image')" accept="image/*">
                    </div>
                    <div class="flex">
                        <label for="bg-image" class="admin-button">Upload Header</label>
                    </div>
                </div>
            </div>
            {{-- <div class="admin-card">
                <div class="col-span-12">
                    <div class="text-xl font-bold">Layout Halaman</div>
                </div>
                <div class="col-span-6 flex flex-col items-center justify-center gap-2 px-12">
                    <img src="{{ asset('svg/images.svg') }}">
                    <div class="flex items-center gap-2">
                        <input type="radio" name="web_layout" value="1" id="layout-1"
                            {{  array_values($webconfigs->where("name", "web_layout")->toArray())[0]["content"] == '1' ? 'checked' : '' }}>
                        <label for="layout-1">Layout 1</label>
                    </div>
                </div>
                <div class="col-span-6 flex flex-col items-center justify-center gap-2 px-12">
                    <img src="{{ asset('svg/images.svg') }}">
                    <div class="flex items-center gap-2">
                        <input type="radio" name="web_layout" value="2" id="layout-2"
                            {{  array_values($webconfigs->where("name", "web_layout")->toArray())[0]["content"] == '2' ? 'checked' : '' }}>
                        <label for="layout-2">Layout 2</label>
                    </div>
                </div>
            </div> --}}
            <div class="admin-card">
                <div class="col-span-12 flex flex-col gap-2">
                    <div class="text-xl font-bold">Warna Background</div>
                    <div class="flex items-center gap-2">
                        <input type="radio" name="bg_color" id="bg-color-red-400" class="hidden" value="red"
                            {{  array_values($webconfigs->where("name", "bg_color")->toArray())[0]["content"] == 'red' ? 'checked' : '' }}>
                        <label for="bg-color-red-400" id="label-bg-color-red-400"
                            onclick="changeColor('bg-color-red-400', 'bg_color');"
                            class="w-4 h-4 bg-red-400 border hover:border-slate-600 cursor-pointer bg_color {{  array_values($webconfigs->where("name", "bg_color")->toArray())[0]["content"] == 'red' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="bg_color" id="bg-color-orange-400" class="hidden" value="orange"
                            {{  array_values($webconfigs->where("name", "bg_color")->toArray())[0]["content"] == 'orange' ? 'checked' : '' }}>
                        <label for="bg-color-orange-400" id="label-bg-color-orange-400"
                            onclick="changeColor('bg-color-orange-400', 'bg_color');"
                            class="w-4 h-4 bg-orange-400 border hover:border-slate-600 cursor-pointer bg_color {{  array_values($webconfigs->where("name", "bg_color")->toArray())[0]["content"] == 'orange' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="bg_color" id="bg-color-amber-400" class="hidden" value="amber"
                            {{  array_values($webconfigs->where("name", "bg_color")->toArray())[0]["content"] == 'amber' ? 'checked' : '' }}>
                        <label for="bg-color-amber-400" id="label-bg-color-amber-400"
                            onclick="changeColor('bg-color-amber-400', 'bg_color');"
                            class="w-4 h-4 bg-amber-400 border hover:border-slate-600 cursor-pointer bg_color {{  array_values($webconfigs->where("name", "bg_color")->toArray())[0]["content"] == 'amber' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="bg_color" id="bg-color-yellow-400" class="hidden" value="yellow"
                            {{  array_values($webconfigs->where("name", "bg_color")->toArray())[0]["content"] == 'yellow' ? 'checked' : '' }}>
                        <label for="bg-color-yellow-400" id="label-bg-color-yellow-400"
                            onclick="changeColor('bg-color-yellow-400', 'bg_color');"
                            class="w-4 h-4 bg-yellow-400 border hover:border-slate-600 cursor-pointer bg_color {{  array_values($webconfigs->where("name", "bg_color")->toArray())[0]["content"] == 'yellow' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="bg_color" id="bg-color-lime-400" class="hidden" value="lime"
                            {{  array_values($webconfigs->where("name", "bg_color")->toArray())[0]["content"] == 'lime' ? 'checked' : '' }}>
                        <label for="bg-color-lime-400" id="label-bg-color-lime-400"
                            onclick="changeColor('bg-color-lime-400', 'bg_color');"
                            class="w-4 h-4 bg-lime-400 border hover:border-slate-600 cursor-pointer bg_color {{  array_values($webconfigs->where("name", "bg_color")->toArray())[0]["content"] == 'lime' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="bg_color" id="bg-color-green-400" class="hidden" value="green"
                            {{  array_values($webconfigs->where("name", "bg_color")->toArray())[0]["content"] == 'green' ? 'checked' : '' }}>
                        <label for="bg-color-green-400" id="label-bg-color-green-400"
                            onclick="changeColor('bg-color-green-400', 'bg_color');"
                            class="w-4 h-4 bg-green-400 border hover:border-slate-600 cursor-pointer bg_color {{  array_values($webconfigs->where("name", "bg_color")->toArray())[0]["content"] == 'green' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="bg_color" id="bg-color-emerald-400" class="hidden" value="emerald"
                            {{  array_values($webconfigs->where("name", "bg_color")->toArray())[0]["content"] == 'emerald' ? 'checked' : '' }}>
                        <label for="bg-color-emerald-400" id="label-bg-color-emerald-400"
                            onclick="changeColor('bg-color-emerald-400', 'bg_color');"
                            class="w-4 h-4 bg-emerald-400 border hover:border-slate-600 cursor-pointer bg_color {{  array_values($webconfigs->where("name", "bg_color")->toArray())[0]["content"] == 'emerald' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="bg_color" id="bg-color-teal-400" class="hidden" value="teal"
                            {{  array_values($webconfigs->where("name", "bg_color")->toArray())[0]["content"] == 'teal' ? 'checked' : '' }}>
                        <label for="bg-color-teal-400" id="label-bg-color-teal-400"
                            onclick="changeColor('bg-color-teal-400', 'bg_color');"
                            class="w-4 h-4 bg-teal-400 border hover:border-slate-600 cursor-pointer bg_color {{  array_values($webconfigs->where("name", "bg_color")->toArray())[0]["content"] == 'teal' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="bg_color" id="bg-color-cyan-400" class="hidden" value="cyan"
                            {{  array_values($webconfigs->where("name", "bg_color")->toArray())[0]["content"] == 'cyan' ? 'checked' : '' }}>
                        <label for="bg-color-cyan-400" id="label-bg-color-cyan-400"
                            onclick="changeColor('bg-color-cyan-400', 'bg_color');"
                            class="w-4 h-4 bg-cyan-400 border hover:border-slate-600 cursor-pointer bg_color {{  array_values($webconfigs->where("name", "bg_color")->toArray())[0]["content"] == 'cyan' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="bg_color" id="bg-color-sky-400" class="hidden" value="sky"
                            {{  array_values($webconfigs->where("name", "bg_color")->toArray())[0]["content"] == 'for="bg-color-sky-400" id=' ? 'checked' : '' }}>
                        <label for="bg-color-sky-400" id="label-bg-color-sky-400"
                            onclick="changeColor('bg-color-sky-400', 'bg_color');"
                            class="w-4 h-4 bg-sky-400 border hover:border-slate-600 cursor-pointer bg_color {{  array_values($webconfigs->where("name", "bg_color")->toArray())[0]["content"] == 'sky' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="bg_color" id="bg-color-blue-400" class="hidden" value="blue"
                            {{  array_values($webconfigs->where("name", "bg_color")->toArray())[0]["content"] == 'blue' ? 'checked' : '' }}>
                        <label for="bg-color-blue-400" id="label-bg-color-blue-400"
                            onclick="changeColor('bg-color-blue-400', 'bg_color');"
                            class="w-4 h-4 bg-blue-400 border hover:border-slate-600 cursor-pointer bg_color {{  array_values($webconfigs->where("name", "bg_color")->toArray())[0]["content"] == 'blue' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="bg_color" id="bg-color-indigo-400" class="hidden" value="indigo"
                            {{  array_values($webconfigs->where("name", "bg_color")->toArray())[0]["content"] == 'indigo' ? 'checked' : '' }}>
                        <label for="bg-color-indigo-400" id="label-bg-color-indigo-400"
                            onclick="changeColor('bg-color-indigo-400', 'bg_color');"
                            class="w-4 h-4 bg-indigo-400 border hover:border-slate-600 cursor-pointer bg_color {{  array_values($webconfigs->where("name", "bg_color")->toArray())[0]["content"] == 'indigo' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="bg_color" id="bg-color-violet-400" class="hidden" value="violet"
                            {{  array_values($webconfigs->where("name", "bg_color")->toArray())[0]["content"] == 'violet' ? 'checked' : '' }}>
                        <label for="bg-color-violet-400" id="label-bg-color-violet-400"
                            onclick="changeColor('bg-color-violet-400', 'bg_color');"
                            class="w-4 h-4 bg-violet-400 border hover:border-slate-600 cursor-pointer bg_color {{  array_values($webconfigs->where("name", "bg_color")->toArray())[0]["content"] == 'violet' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="bg_color" id="bg-color-purple-400" class="hidden" value="purple"
                            {{  array_values($webconfigs->where("name", "bg_color")->toArray())[0]["content"] == 'purple' ? 'checked' : '' }}>
                        <label for="bg-color-purple-400" id="label-bg-color-purple-400"
                            onclick="changeColor('bg-color-purple-400', 'bg_color');"
                            class="w-4 h-4 bg-purple-400 border hover:border-slate-600 cursor-pointer bg_color {{  array_values($webconfigs->where("name", "bg_color")->toArray())[0]["content"] == 'purple' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="bg_color" id="bg-color-fuchsia-400" class="hidden" value="fuchsia"
                            {{  array_values($webconfigs->where("name", "bg_color")->toArray())[0]["content"] == 'fuchsia' ? 'checked' : '' }}>
                        <label for="bg-color-fuchsia-400" id="label-bg-color-fuchsia-400"
                            onclick="changeColor('bg-color-fuchsia-400', 'bg_color');"
                            class="w-4 h-4 bg-fuchsia-400 border hover:border-slate-600 cursor-pointer bg_color {{  array_values($webconfigs->where("name", "bg_color")->toArray())[0]["content"] == 'fuchsia' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="bg_color" id="bg-color-pink-400" class="hidden" value="pink"
                            {{  array_values($webconfigs->where("name", "bg_color")->toArray())[0]["content"] == 'pink' ? 'checked' : '' }}>
                        <label for="bg-color-pink-400" id="label-bg-color-pink-400"
                            onclick="changeColor('bg-color-pink-400', 'bg_color');"
                            class="w-4 h-4 bg-pink-400 border hover:border-slate-600 cursor-pointer bg_color {{  array_values($webconfigs->where("name", "bg_color")->toArray())[0]["content"] == 'pink' ? 'border-slate-600' : '' }}">
                        </label>
                    </div>
                </div>
                <div class="col-span-12 flex flex-col gap-2">
                    <div class="text-xl font-bold">Warna Teks</div>
                    <div class="flex items-center gap-2">
                        <input type="radio" name="text_color" id="text-color-red-400" class="hidden" value="red"
                            {{  array_values($webconfigs->where("name", "text_color")->toArray())[0]["content"] == 'red' ? 'checked' : '' }}>
                        <label for="text-color-red-400" id="label-text-color-red-400"
                            onclick="changeColor('text-color-red-400', 'text_color');"
                            class="w-4 h-4 bg-red-400 border hover:border-slate-600 cursor-pointer text_color {{  array_values($webconfigs->where("name", "text_color")->toArray())[0]["content"] == 'red' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="text_color" id="text-color-orange-400" class="hidden"
                            {{  array_values($webconfigs->where("name", "text_color")->toArray())[0]["content"] == 'orange' ? 'checked' : '' }} value="orange">
                        <label for="text-color-orange-400" id="label-text-color-orange-400"
                            onclick="changeColor('text-color-orange-400', 'text_color');"
                            class="w-4 h-4 bg-orange-400 border hover:border-slate-600 cursor-pointer text_color {{  array_values($webconfigs->where("name", "text_color")->toArray())[0]["content"] == 'orange' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="text_color" id="text-color-amber-400" class="hidden"
                            {{  array_values($webconfigs->where("name", "text_color")->toArray())[0]["content"] == 'amber' ? 'checked' : '' }} value="amber">
                        <label for="text-color-amber-400" id="label-text-color-amber-400"
                            onclick="changeColor('text-color-amber-400', 'text_color');"
                            class="w-4 h-4 bg-amber-400 border hover:border-slate-600 cursor-pointer text_color {{  array_values($webconfigs->where("name", "text_color")->toArray())[0]["content"] == 'amber' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="text_color" id="text-color-yellow-400" class="hidden"
                            {{  array_values($webconfigs->where("name", "text_color")->toArray())[0]["content"] == 'yellow' ? 'checked' : '' }} value="yellow">
                        <label for="text-color-yellow-400" id="label-text-color-yellow-400"
                            onclick="changeColor('text-color-yellow-400', 'text_color');"
                            class="w-4 h-4 bg-yellow-400 border hover:border-slate-600 cursor-pointer text_color {{  array_values($webconfigs->where("name", "text_color")->toArray())[0]["content"] == 'yellow' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="text_color" id="text-color-lime-400" class="hidden" value="lime"
                            {{  array_values($webconfigs->where("name", "text_color")->toArray())[0]["content"] == 'lime' ? 'checked' : '' }}>
                        <label for="text-color-lime-400" id="label-text-color-lime-400"
                            onclick="changeColor('text-color-lime-400', 'text_color');"
                            class="w-4 h-4 bg-lime-400 border hover:border-slate-600 cursor-pointer text_color {{  array_values($webconfigs->where("name", "text_color")->toArray())[0]["content"] == 'lime' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="text_color" id="text-color-green-400" class="hidden"
                            {{  array_values($webconfigs->where("name", "text_color")->toArray())[0]["content"] == 'green' ? 'checked' : '' }} value="green">
                        <label for="text-color-green-400" id="label-text-color-green-400"
                            onclick="changeColor('text-color-green-400', 'text_color');"
                            class="w-4 h-4 bg-green-400 border hover:border-slate-600 cursor-pointer text_color {{  array_values($webconfigs->where("name", "text_color")->toArray())[0]["content"] == 'green' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="text_color" id="text-color-emerald-400" class="hidden"
                            {{  array_values($webconfigs->where("name", "text_color")->toArray())[0]["content"] == 'emerald' ? 'checked' : '' }} value="emerald">
                        <label for="text-color-emerald-400" id="label-text-color-emerald-400"
                            onclick="changeColor('text-color-emerald-400', 'text_color');"
                            class="w-4 h-4 bg-emerald-400 border hover:border-slate-600 cursor-pointer text_color {{  array_values($webconfigs->where("name", "text_color")->toArray())[0]["content"] == 'emerald' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="text_color" id="text-color-teal-400" class="hidden" value="teal"
                            {{  array_values($webconfigs->where("name", "text_color")->toArray())[0]["content"] == 'teal' ? 'checked' : '' }}>
                        <label for="text-color-teal-400" id="label-text-color-teal-400"
                            onclick="changeColor('text-color-teal-400', 'text_color');"
                            class="w-4 h-4 bg-teal-400 border hover:border-slate-600 cursor-pointer text_color {{  array_values($webconfigs->where("name", "text_color")->toArray())[0]["content"] == 'teal' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="text_color" id="text-color-cyan-400" class="hidden" value="cyan"
                            {{  array_values($webconfigs->where("name", "text_color")->toArray())[0]["content"] == 'cyan' ? 'checked' : '' }}>
                        <label for="text-color-cyan-400" id="label-text-color-cyan-400"
                            onclick="changeColor('text-color-cyan-400', 'text_color');"
                            class="w-4 h-4 bg-cyan-400 border hover:border-slate-600 cursor-pointer text_color {{  array_values($webconfigs->where("name", "text_color")->toArray())[0]["content"] == 'cyan' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="text_color" id="text-color-sky-400" class="hidden" value="sky"
                            {{  array_values($webconfigs->where("name", "text_color")->toArray())[0]["content"] == 'for="bg-color-sky-400" id=' ? 'checked' : '' }}>
                        <label for="text-color-sky-400" id="label-text-color-sky-400"
                            onclick="changeColor('text-color-sky-400', 'text_color');"
                            class="w-4 h-4 bg-sky-400 border hover:border-slate-600 cursor-pointer text_color {{  array_values($webconfigs->where("name", "text_color")->toArray())[0]["content"] == 'sky' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="text_color" id="text-color-blue-400" class="hidden" value="blue"
                            {{  array_values($webconfigs->where("name", "text_color")->toArray())[0]["content"] == 'blue' ? 'checked' : '' }}>
                        <label for="text-color-blue-400" id="label-text-color-blue-400"
                            onclick="changeColor('text-color-blue-400', 'text_color');"
                            class="w-4 h-4 bg-blue-400 border hover:border-slate-600 cursor-pointer text_color {{  array_values($webconfigs->where("name", "text_color")->toArray())[0]["content"] == 'blue' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="text_color" id="text-color-indigo-400" class="hidden"
                            {{  array_values($webconfigs->where("name", "text_color")->toArray())[0]["content"] == 'indigo' ? 'checked' : '' }} value="indigo">
                        <label for="text-color-indigo-400" id="label-text-color-indigo-400"
                            onclick="changeColor('text-color-indigo-400', 'text_color');"
                            class="w-4 h-4 bg-indigo-400 border hover:border-slate-600 cursor-pointer text_color {{  array_values($webconfigs->where("name", "text_color")->toArray())[0]["content"] == 'indigo' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="text_color" id="text-color-violet-400" class="hidden"
                            {{  array_values($webconfigs->where("name", "text_color")->toArray())[0]["content"] == 'violet' ? 'checked' : '' }} value="violet">
                        <label for="text-color-violet-400" id="label-text-color-violet-400"
                            onclick="changeColor('text-color-violet-400', 'text_color');"
                            class="w-4 h-4 bg-violet-400 border hover:border-slate-600 cursor-pointer text_color {{  array_values($webconfigs->where("name", "text_color")->toArray())[0]["content"] == 'violet' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="text_color" id="text-color-purple-400" class="hidden"
                            {{  array_values($webconfigs->where("name", "text_color")->toArray())[0]["content"] == 'purple' ? 'checked' : '' }} value="purple">
                        <label for="text-color-purple-400" id="label-text-color-purple-400"
                            onclick="changeColor('text-color-purple-400', 'text_color');"
                            class="w-4 h-4 bg-purple-400 border hover:border-slate-600 cursor-pointer text_color {{  array_values($webconfigs->where("name", "text_color")->toArray())[0]["content"] == 'purple' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="text_color" id="text-color-fuchsia-400" class="hidden"
                            {{  array_values($webconfigs->where("name", "text_color")->toArray())[0]["content"] == 'fuchsia' ? 'checked' : '' }} value="fuchsia">
                        <label for="text-color-fuchsia-400" id="label-text-color-fuchsia-400"
                            onclick="changeColor('text-color-fuchsia-400', 'text_color');"
                            class="w-4 h-4 bg-fuchsia-400 border hover:border-slate-600 cursor-pointer text_color {{  array_values($webconfigs->where("name", "text_color")->toArray())[0]["content"] == 'fuchsia' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="text_color" id="text-color-pink-400" class="hidden" value="pink"
                            {{  array_values($webconfigs->where("name", "text_color")->toArray())[0]["content"] == 'pink' ? 'checked' : '' }}>
                        <label for="text-color-pink-400" id="label-text-color-pink-400"
                            onclick="changeColor('text-color-pink-400', 'text_color');"
                            class="w-4 h-4 bg-pink-400 border hover:border-slate-600 cursor-pointer text_color {{  array_values($webconfigs->where("name", "text_color")->toArray())[0]["content"] == 'pink' ? 'border-slate-600' : '' }}">
                        </label>
                    </div>
                </div>
                <div class="col-span-12 flex flex-col gap-2">
                    <div class="text-xl font-bold">Warna Button</div>
                    <div class="flex items-center gap-2">
                        <input type="radio" name="button_color" id="button-color-red-400" class="hidden" value="red"
                            {{  array_values($webconfigs->where("name", "button_color")->toArray())[0]["content"] == 'red' ? 'checked' : '' }}>
                        <label for="button-color-red-400" id="label-button-color-red-400"
                            onclick="changeColor('button-color-red-400', 'button_color');"
                            class="w-4 h-4 bg-red-400 border hover:border-slate-600 cursor-pointer button_color {{  array_values($webconfigs->where("name", "button_color")->toArray())[0]["content"] == 'red' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="button_color" id="button-color-orange-400" class="hidden"
                            value="orange" {{  array_values($webconfigs->where("name", "button_color")->toArray())[0]["content"] == 'orange' ? 'checked' : '' }}>
                        <label for="button-color-orange-400" id="label-button-color-orange-400"
                            onclick="changeColor('button-color-orange-400', 'button_color');"
                            class="w-4 h-4 bg-orange-400 border hover:border-slate-600 cursor-pointer button_color {{  array_values($webconfigs->where("name", "button_color")->toArray())[0]["content"] == 'orange' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="button_color" id="button-color-amber-400" class="hidden"
                            value="amber" {{  array_values($webconfigs->where("name", "button_color")->toArray())[0]["content"] == 'amber' ? 'checked' : '' }}>
                        <label for="button-color-amber-400" id="label-button-color-amber-400"
                            onclick="changeColor('button-color-amber-400', 'button_color');"
                            class="w-4 h-4 bg-amber-400 border hover:border-slate-600 cursor-pointer button_color {{  array_values($webconfigs->where("name", "button_color")->toArray())[0]["content"] == 'amber' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="button_color" id="button-color-yellow-400" class="hidden"
                            value="yellow" {{  array_values($webconfigs->where("name", "button_color")->toArray())[0]["content"] == 'yellow' ? 'checked' : '' }}>
                        <label for="button-color-yellow-400" id="label-button-color-yellow-400"
                            onclick="changeColor('button-color-yellow-400', 'button_color');"
                            class="w-4 h-4 bg-yellow-400 border hover:border-slate-600 cursor-pointer button_color {{  array_values($webconfigs->where("name", "button_color")->toArray())[0]["content"] == 'yellow' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="button_color" id="button-color-lime-400" class="hidden"
                            value="lime" {{  array_values($webconfigs->where("name", "button_color")->toArray())[0]["content"] == 'lime' ? 'checked' : '' }}>
                        <label for="button-color-lime-400" id="label-button-color-lime-400"
                            onclick="changeColor('button-color-lime-400', 'button_color');"
                            class="w-4 h-4 bg-lime-400 border hover:border-slate-600 cursor-pointer button_color {{  array_values($webconfigs->where("name", "button_color")->toArray())[0]["content"] == 'lime' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="button_color" id="button-color-green-400" class="hidden"
                            value="green" {{  array_values($webconfigs->where("name", "button_color")->toArray())[0]["content"] == 'green' ? 'checked' : '' }}>
                        <label for="button-color-green-400" id="label-button-color-green-400"
                            onclick="changeColor('button-color-green-400', 'button_color');"
                            class="w-4 h-4 bg-green-400 border hover:border-slate-600 cursor-pointer button_color {{  array_values($webconfigs->where("name", "button_color")->toArray())[0]["content"] == 'green' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="button_color" id="button-color-emerald-400" class="hidden"
                            value="emerald" {{  array_values($webconfigs->where("name", "button_color")->toArray())[0]["content"] == 'emerald' ? 'checked' : '' }}>
                        <label for="button-color-emerald-400" id="label-button-color-emerald-400"
                            onclick="changeColor('button-color-emerald-400', 'button_color');"
                            class="w-4 h-4 bg-emerald-400 border hover:border-slate-600 cursor-pointer button_color {{  array_values($webconfigs->where("name", "button_color")->toArray())[0]["content"] == 'emerald' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="button_color" id="button-color-teal-400" class="hidden"
                            value="teal" {{  array_values($webconfigs->where("name", "button_color")->toArray())[0]["content"] == 'teal' ? 'checked' : '' }}>
                        <label for="button-color-teal-400" id="label-button-color-teal-400"
                            onclick="changeColor('button-color-teal-400', 'button_color');"
                            class="w-4 h-4 bg-teal-400 border hover:border-slate-600 cursor-pointer button_color {{  array_values($webconfigs->where("name", "button_color")->toArray())[0]["content"] == 'teal' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="button_color" id="button-color-cyan-400" class="hidden"
                            value="cyan" {{  array_values($webconfigs->where("name", "button_color")->toArray())[0]["content"] == 'cyan' ? 'checked' : '' }}>
                        <label for="button-color-cyan-400" id="label-button-color-cyan-400"
                            onclick="changeColor('button-color-cyan-400', 'button_color');"
                            class="w-4 h-4 bg-cyan-400 border hover:border-slate-600 cursor-pointer button_color {{  array_values($webconfigs->where("name", "button_color")->toArray())[0]["content"] == 'cyan' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="button_color" id="button-color-sky-400" class="hidden"
                            value="sky" {{  array_values($webconfigs->where("name", "button_color")->toArray())[0]["content"] == 'for="bg-color-sky-400" id=' ? 'checked' : '' }}>
                        <label for="button-color-sky-400" id="label-button-color-sky-400"
                            onclick="changeColor('button-color-sky-400', 'button_color');"
                            class="w-4 h-4 bg-sky-400 border hover:border-slate-600 cursor-pointer button_color {{  array_values($webconfigs->where("name", "button_color")->toArray())[0]["content"] == 'sky' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="button_color" id="button-color-blue-400" class="hidden"
                            value="blue" {{  array_values($webconfigs->where("name", "button_color")->toArray())[0]["content"] == 'blue' ? 'checked' : '' }}>
                        <label for="button-color-blue-400" id="label-button-color-blue-400"
                            onclick="changeColor('button-color-blue-400', 'button_color');"
                            class="w-4 h-4 bg-blue-400 border hover:border-slate-600 cursor-pointer button_color {{  array_values($webconfigs->where("name", "button_color")->toArray())[0]["content"] == 'blue' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="button_color" id="button-color-indigo-400" class="hidden"
                            value="indigo" {{  array_values($webconfigs->where("name", "button_color")->toArray())[0]["content"] == 'indigo' ? 'checked' : '' }}>
                        <label for="button-color-indigo-400" id="label-button-color-indigo-400"
                            onclick="changeColor('button-color-indigo-400', 'button_color');"
                            class="w-4 h-4 bg-indigo-400 border hover:border-slate-600 cursor-pointer button_color {{  array_values($webconfigs->where("name", "button_color")->toArray())[0]["content"] == 'indigo' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="button_color" id="button-color-violet-400" class="hidden"
                            value="violet" {{  array_values($webconfigs->where("name", "button_color")->toArray())[0]["content"] == 'violet' ? 'checked' : '' }}>
                        <label for="button-color-violet-400" id="label-button-color-violet-400"
                            onclick="changeColor('button-color-violet-400', 'button_color');"
                            class="w-4 h-4 bg-violet-400 border hover:border-slate-600 cursor-pointer button_color {{  array_values($webconfigs->where("name", "button_color")->toArray())[0]["content"] == 'violet' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="button_color" id="button-color-purple-400" class="hidden"
                            value="purple" {{  array_values($webconfigs->where("name", "button_color")->toArray())[0]["content"] == 'purple' ? 'checked' : '' }}>
                        <label for="button-color-purple-400" id="label-button-color-purple-400"
                            onclick="changeColor('button-color-purple-400', 'button_color');"
                            class="w-4 h-4 bg-purple-400 border hover:border-slate-600 cursor-pointer button_color {{  array_values($webconfigs->where("name", "button_color")->toArray())[0]["content"] == 'purple' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="button_color" id="button-color-fuchsia-400" class="hidden"
                            value="fuchsia" {{  array_values($webconfigs->where("name", "button_color")->toArray())[0]["content"] == 'fuchsia' ? 'checked' : '' }}>
                        <label for="button-color-fuchsia-400" id="label-button-color-fuchsia-400"
                            onclick="changeColor('button-color-fuchsia-400', 'button_color');"
                            class="w-4 h-4 bg-fuchsia-400 border hover:border-slate-600 cursor-pointer button_color {{  array_values($webconfigs->where("name", "button_color")->toArray())[0]["content"] == 'fuchsia' ? 'border-slate-600' : '' }}">
                        </label>
                        <input type="radio" name="button_color" id="button-color-pink-400" class="hidden"
                            value="pink" {{  array_values($webconfigs->where("name", "button_color")->toArray())[0]["content"] == 'pink' ? 'checked' : '' }}>
                        <label for="button-color-pink-400" id="label-button-color-pink-400"
                            onclick="changeColor('button-color-pink-400', 'button_color');"
                            class="w-4 h-4 bg-pink-400 border hover:border-slate-600 cursor-pointer button_color {{  array_values($webconfigs->where("name", "button_color")->toArray())[0]["content"] == 'pink' ? 'border-slate-600' : '' }}">
                        </label>
                    </div>
                </div>
            </div>
            <div class="admin-card">
                <div class="col-span-12">
                    <button type="submit" class="admin-button">Simpan</button>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        function changeColor(id, name) {
            $('.' + name).each(function() {
                $(this).removeClass('border-slate-600')
            });
            $('#label-' + id).addClass('border-slate-600');
        }
    </script>
@endsection
