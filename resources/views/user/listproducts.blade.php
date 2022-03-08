@extends('layouts.app')
@section('title', 'TokoBayiFiv')
@section('content')

@include('inc.navbar1')

<div class="container mx-auto xl:px-32 px-3 xl:pt-6 xl:pb-10 pt-3 pb-5 xl:grid xl:grid-cols-4 gap-4 xl:auto-cols-min">
    <div class="hidden xl:block">
        <div class="bg-blue-400 rounded-t-lg px-4 py-3">
            <h6 class="font-encode-sans text-white text-sm font-bold">
                Filter
            </h6>
        </div>
        <div class="bg-white rounded-b-lg shadow-sm px-3 py-3">
            <h2 class="font-concert-one text-slate-900 text-2xl">Type</h2>
            <ul class="mt-3">
                <li class="my-1">
                    <a href="" class="text-gray-400 text-sm font-bold font-encode-sans">
                        New Product
                    </a>
                </li>
                <li class="my-1">
                    <a href="" class="text-gray-400 text-sm font-bold font-encode-sans">
                        Hotdeals
                    </a>
                </li>
                <li class="my-1">
                    <a href="" class="text-gray-400 text-sm font-bold font-encode-sans">
                        Restock
                    </a>
                </li>
                <li class="my-1">
                    <a href="" class="text-gray-400 text-sm font-bold font-encode-sans">
                        Featured
                    </a>
                </li>
            </ul>
            <h2 class="font-concert-one text-slate-900 text-2xl mt-5">Kategori</h2>
            <ul class="mt-3">
                @foreach ($allkategoris as $kategori)
                <li class="my-1 group">
                    <form action="{{ route('user.list_products') }}" method="get">
                        <input type="hidden" value="{{ $kategori->no_kategori }}" name="filter">
                        @if ($filter == $kategori->no_kategori)
                        <button type="submit" class="text-left appearance-none text-sky-500 text-sm font-bold font-encode-sans peer">
                            {{ $kategori->nama_kategori }}
                        </button>
                        @else
                        <button type="submit" class="appearance-none text-left text-gray-400 text-sm font-bold font-encode-sans peer hover:text-sky-500">
                            {{ $kategori->nama_kategori }}
                        </button>
                        @endif
                    </form>
                    @foreach ($subkategoris as $sub)
                    @if ($sub->kategori_id == $kategori->no_kategori)
                    <form action="{{ route('user.list_products') }}" method="">
                        <input type="hidden" name="subfilter" value="{{ $sub->child_id }}">
                        <input type="hidden" name="filter" value="{{ $kategori->no_kategori }}">
                        <ul class="hidden ml-2 text-gray-400 pt-1 group-hover:block space-y-1">
                            @if ($subfilter == $sub->child_id)
                            <li class="appearance-none text-sky-500 block whitespace-no-wrap">
                                <submit type="submit" class="text-left">{{ $sub->child_name }}</submit>
                            </li>
                            @else
                            <li class="appearance-none hover:text-sky-500 text-gray-400 block whitespace-no-wrap">
                                <button type="submit" class="text-left">{{ $sub->child_name }}</button>
                            </li>
                            @endif
                        </ul>
                    </form>
                    @endif
                    @endforeach
                </li>
                @endforeach
                
            </ul>
        </div>
    
    </div>
    <div class="col-span-3">
        <div class="bg-white rounded-md px-3 py-5 flex justify-between items-center shadow-sm">
            @if (!empty($keyword))
            <h1 class="font-concert-one text-3xl text-sky-500 xl:text-4xl">
                "{{ $keyword }}"
            </h1>
            @elseif (!empty($subfilter))
            <h1 class="font-concert-one text-3xl text-sky-500 xl:text-4xl">
                {{ $produks[0]->category->subcategories[0]->child_name }}
            </h1>
            @elseif (!empty($filter))
            <h1 class="font-concert-one text-3xl text-sky-500 xl:text-4xl">
                {{ $produks[0]->category->nama_kategori }}
            </h1>
            @else
            <h1 class="font-concert-one text-3xl text-sky-500 xl:text-4xl">
                List Product
            </h1>
            @endif
            <a href="" class="rounded-full px-4 py-2 bg-sky-500 text-white text-sm font-bold xl:hidden font-encode-sans">
                Filter
            </a>
        </div>
        <div class="mt-5 mb-5">
            <div class="grid grid-cols-2 gap-2 sm:grid-cols-3 sm:gap-3 xl:mx-auto">

            @foreach ($produks as $produk)
                <a href="{{ route('user.produk.show', $produk) }}" class="rounded-lg shadow-sm bg-white">
                    <img src="{{ $produk->image }}" class="aspect-square w-full bg-gray-400 rounded-t-lg object-cover" alt="">
                    <div class="p-4 pb-5">
                        <h6 class="font-encode-sans font-bold sm:text-base text-sm text-clip">
                            {{ $produk->nama_produk }}
                        </h6>
                        <div class="flex justify-between items-center sm:my-3 my-2">
                            <h2 class="font-concert-one text-gray-400 xl:text-2xl text-xl">
                                Rp. {{ substr(number_format($produk->harga,2,",","."), 0, -3) }}
                            </h2>
                            @if ($produk->stock <= 0)
                            <h6 class="py-1 px-2 rounded-md bg-red-500 text-white font-encode-sans font-bold text-sm sm:text-base">
                                Sold
                            </h6>
                            @endif
                        </div>
                        @if ($produk->promo != null)
                        <h6 class="font-encode-sans text-gray-400 sm:text-base text-sm">
                            R̶p̶.̶ ̶3̶0̶.̶0̶0̶0
                        </h6>
                        @endif
                    </div>
                </a>
            @endforeach
            </div>
        </div>
        {{ $produks->links('vendor.pagination.custom-1') }}
        {{-- <div class="bg-white rounded-md px-3 py-3 flex justify-center items-center shadow-sm">
            <a href="">
                <i class="fa fa-chevron-left mx-2" aria-hidden="true"></i>
            </a>
            <a href="" class="p-2 bg-blue-400 text-sm font-bold font-encode-sans mx-2 rounded-md text-white">1</a>
            <a href="" class="text-sm xl:text-base mx-2 sm:mx-3">2</a>
            <a href="" class="text-sm xl:text-base mx-2 sm:mx-3">3</a>
            <a href="" class="text-sm xl:text-base mx-2 sm:mx-3">4</a>
            <a href="" class="text-sm xl:text-base mx-2 sm:mx-3">5</a>
            <a href="" class="text-sm xl:text-base mx-2 sm:mx-3">...</a>
            <a href="" class="text-sm xl:text-base mx-2 sm:mx-3">32</a>
            <a href="">
                <i class="fa fa-chevron-right mx-2" aria-hidden="true"></i> 
            </a>
        </div> --}}
    </div>
</div>

@include('inc.footer1')

@endsection