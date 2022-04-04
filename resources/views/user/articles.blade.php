@extends('layouts.app')
@section('title', 'TokoBayiFiv')
@section('content')

@include('inc.navbar1')

<div class="container mx-auto xl:px-32 px-3 xl:pt-6 xl:pb-10 pt-3 pb-5">
    <div class="w-full bg-white rounded-md shadow-sm py-2 px-3">
        <h1 class="font-concert-one text-3xl text-{{ $color[1] }}-500 xl:text-4xl">
            Articles
        </h1>
    </div>
    <div class="mt-3 sm:grid sm:grid-cols-3 sm:space-x-3">
        <div class="col-span-2 w-full h-fit bg-white rounded-md shadow-sm pt-8 pb-10 px-8 space-y-5 xl:grid xl:grid-cols-2 xl:gap-4 xl:space-y-0">
            <a href="{{ route('article.detail') }}" class="block">
                <img src="https://images.unsplash.com/5/unsplash-kitsune-4.jpg?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjEyMDd9&s=50827fd8476bfdffe6e04bc9ae0b8c02" alt="" 
                    class="w-full object-cover rounded-lg">
                <h6 class="font-encode-sans mt-2 text-clip text-slate-900 font-bold text-lg">
                    Ini Judul Artikel yang sangat begitu
                </h6>
                <p class="text-gray-400 mt-1 font-encode-sans text-sm sm:text-base">
                    22/08/2016
                </p>
            </a> 
            <a href="" class="block">
                <img src="https://images.unsplash.com/5/unsplash-kitsune-4.jpg?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjEyMDd9&s=50827fd8476bfdffe6e04bc9ae0b8c02" alt="" 
                    class="w-full object-cover rounded-lg">
                <h6 class="font-encode-sans mt-2 text-clip text-slate-900 font-bold text-lg">
                    Ini Judul Artikel yang sangat begitu
                </h6>
                <p class="text-gray-400 mt-1 font-encode-sans text-sm sm:text-base">
                    22/08/2016
                </p>
            </a> 
            <a href="" class="block">
                <img src="https://images.unsplash.com/5/unsplash-kitsune-4.jpg?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjEyMDd9&s=50827fd8476bfdffe6e04bc9ae0b8c02" alt="" 
                    class="w-full object-cover rounded-lg">
                <h6 class="font-encode-sans mt-2 text-clip text-slate-900 font-bold text-lg">
                    Ini Judul Artikel yang sangat begitu
                </h6>
                <p class="text-gray-400 mt-1 font-encode-sans text-sm sm:text-base">
                    22/08/2016
                </p>
            </a> 
    
            {{-- <div class="mt-5 text-center">
                <a href=""
                    class="border-2 border-{{ $color[2] }}-400 font-bold font-encode-sans hover:bg-{{ $color[2] }}-400 hover:text-white text-{{ $color[2] }}-400 px-8 py-2 rounded-full">
                    View More
                </a>
            </div> --}}
        </div>
        <div class="w-full h-fit bg-white rounded-md shadow-sm pt-4 mt-3 sm:mt-0 pb-7 px-3">
            <h6 class="font-encode-sans mt-2 text-clip font-bold text-slate-900 text-base">
                Popular post
            </h6>
            <div class="mt-5 space-y-5 px-4">
                <a href="" class="flex items-center">
                    <img src="https://images.unsplash.com/5/unsplash-kitsune-4.jpg?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjEyMDd9&s=50827fd8476bfdffe6e04bc9ae0b8c02" alt="" 
                        class="w-24 aspect-square object-cover rounded-md">
                    <div class="ml-2">
                        <h6 class="font-encode-sans text-clip text-slate-900 text-base">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident!
                        </h6>
                    </div>
                </a>
                <a href="" class="flex items-center">
                    <img src="https://images.unsplash.com/5/unsplash-kitsune-4.jpg?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjEyMDd9&s=50827fd8476bfdffe6e04bc9ae0b8c02" alt="" 
                        class="w-24 aspect-square object-cover rounded-md">
                    <div class="ml-2">
                        <h6 class="font-encode-sans text-clip text-slate-900 text-base">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident!
                        </h6>
                    </div>
                </a>
                <a href="" class="flex items-center">
                    <img src="https://images.unsplash.com/5/unsplash-kitsune-4.jpg?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjEyMDd9&s=50827fd8476bfdffe6e04bc9ae0b8c02" alt="" 
                        class="w-24 aspect-square object-cover rounded-md">
                    <div class="ml-2">
                        <h6 class="font-encode-sans text-clip text-slate-900 text-base">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident!
                        </h6>
                    </div>
                </a>
                <a href="" class="flex items-center">
                    <img src="https://images.unsplash.com/5/unsplash-kitsune-4.jpg?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjEyMDd9&s=50827fd8476bfdffe6e04bc9ae0b8c02" alt="" 
                        class="w-24 aspect-square object-cover rounded-md">
                    <div class="ml-2">
                        <h6 class="font-encode-sans text-clip text-slate-900 text-base">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident!
                        </h6>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

@include('inc.footer1')

@endsection
