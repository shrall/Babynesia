@extends('layouts.app')
@section('content')

@include('inc.navbar1')

{{-- THUMBNAIL --}}
<div id="carouselExampleCaptions" class="carousel slide relative" data-bs-ride="carousel">
    <div class="carousel-indicators absolute right-0 bottom-0 left-0 flex justify-center p-0 mb-4">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        {{-- <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
            aria-label="Slide 3"></button> --}}
    </div>
    <div class="carousel-inner relative w-full overflow-hidden">
        {{-- looping goes here --}}
        <div class="carousel-item active relative float-left w-full">
            <img src="{{ asset('images/angel-cute-babies-website-header.jpeg') }}"
                class="block w-full h-vh-50 object-cover" alt="..." />
            {{-- <div class="carousel-caption hidden md:block absolute text-center">
                <h5 class="text-xl">First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
            </div> --}}
        </div>
        {{-- <div class="carousel-item relative float-left w-full">
            <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(22).jpg" class="block w-full h-vh-50 object-cover" alt="..." /> --}}
        {{-- <div class="carousel-caption hidden md:block absolute text-center">
                <h5 class="text-xl">Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
            </div> --}}
        {{-- </div>
        <div class="carousel-item relative float-left w-full">
            <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(23).jpg" class="block w-full h-vh-50 object-cover" alt="..." /> --}}
        {{-- <div class="carousel-caption hidden md:block absolute text-center">
                <h5 class="text-xl">Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
            </div> --}}
        {{-- </div> --}}
    </div>
    {{-- <button
        class="carousel-control-prev absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline left-0"
        type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon inline-block bg-no-repeat" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button
        class="carousel-control-next absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline right-0"
        type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon inline-block bg-no-repeat" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button> --}}
</div>

{{-- {{ CONTENT }} --}}
<div class="container mx-auto xl:px-32 px-3 xl:pt-6 xl:pb-10 pt-3 pb-5">
    <div class="w-full bg-white rounded-md shadow-sm py-5">
        <ul class="flex justify-center space-x-2">
            @foreach ($statmenus as $status)
            <form action="{{ route('landingpage') }}" id="filter{{ $loop->iteration }}"></form>

            <li class="inline-block">
                <input type="hidden" value="{{ $status->status_code }}" name="filterproduct"
                    form="filter{{ $loop->iteration }}">
                <button type="submit" form="filter{{ $loop->iteration }}"
                    class="cursor-pointer font-encode-sans text-gray-400 {{ $filteredproduct == $status->status_code ? 'text-'.$color[1].'-500'.' font-bold'. ' border-'.$color[1].'-500'.' px-1'. ' border-b-4' : '' }} hover:text-{{ $color[1] }}-500">
                    {{ $status->name }} Product
                </button>
            </li>
            @endforeach
        </ul>
        <h1 class="text-center font-concert-one text-4xl mt-3 text-{{ $color[1] }}-500">
            @if(!empty($produks[0]->status->name))
            {{ $produks[0]->status->name }} Product
            @else
            Product Not Found
            @endif
        </h1>
    </div>
    <div class="mt-5 mb-5">
        <div class="grid grid-cols-2 gap-2 sm:grid-cols-4 sm:gap-3 xl:mx-auto">
            @foreach ($produks as $produk)
            <a href="{{ route('produk.show', $produk) }}" class="rounded-lg shadow-sm bg-white">
                <img src="http://www.tokobayifiv.com/images/produk/{{ $produk->image }}"
                    class="aspect-square w-full bg-gray-400 rounded-t-lg object-cover" alt="">
                <div class="p-4 pb-6">
                    <h6 class="font-encode-sans font-bold sm:text-base text-sm text-clip">
                        {{ $hideconfig[0] != 1 ? '['. $produk->kode_produk .']' : '' }} {{ $produk->nama_produk }}
                    </h6>
                    <div class="flex justify-between items-center sm:my-3 my-2">
                        <h2 class="font-concert-one text-slate-900 xl:text-3xl text-xl">
                            Rp.
                            {{ $produk->stat == 'd' ? substr(number_format($produk->harga_sale,2,",","."), 0, -3) : substr(number_format($produk->harga,2,",","."), 0, -3) }}
                        </h2>
                        <div class="flex space-x-2">
                            @if($produk->stat == 'po')
                            <h6
                                class="py-1 px-2 rounded-md bg-amber-400 text-white font-encode-sans font-bold text-sm sm:text-base">
                                PO
                            </h6>
                            @endif
                            @if($hideconfig[1] == 0)
                            @if($produk->countStock($produk) == 0)
                            <h6
                                class="py-1 px-2 rounded-md bg-red-500 text-white font-encode-sans font-bold text-sm sm:text-base">
                                Sold
                            </h6>
                            @endif
                            @endif
                        </div>
                    </div>
                    @if ($produk->stat == 'd')
                    <h6 class="font-encode-sans text-gray-400 sm:text-base text-sm">
                        <del>Rp. {{ substr(number_format($produk->harga,2,",","."), 0, -3) }}</del>
                    </h6>
                    @endif
                </div>
            </a>
            @endforeach
        </div>
    </div>

    {{-- FEATURED PRODUCT --}}
    @if (!empty($featured[0]))
    <div class="w-full bg-white rounded-md shadow-sm py-5">
        <h1 class="text-center font-concert-one text-4xl text-{{ $color[1] }}-500">
            Featured Product
        </h1>
    </div>
    @endif
    <div class="mt-5 mb-5">
        <div class="grid grid-cols-2 gap-2 sm:grid-cols-4 sm:gap-3 mb-7 xl:mx-auto">
            @foreach ($featured as $produk)
            <a href="{{ route('produk.show', $produk) }}" class="rounded-lg shadow-sm bg-white">
                <img src="http://www.tokobayifiv.com/images/produk/{{ $produk->image }}"
                    class="aspect-square w-full bg-gray-400 rounded-t-lg object-cover" alt="">
                <div class="p-4 pb-6">
                    <h6 class="font-encode-sans font-bold sm:text-base text-sm text-clip">
                        {{ $hideconfig[0] != 1 ? '['. $produk->kode_produk .']' : '' }} {{ $produk->nama_produk }}
                    </h6>
                    <div class="flex justify-between items-center sm:my-3 my-2">
                        <h2 class="font-concert-one text-slate-900 xl:text-3xl text-xl">
                            Rp. {{ substr(number_format($produk->harga,2,",","."), 0, -3) }}
                        </h2>
                        <div class="flex space-x-2">
                            @if($produk->stat == 'po')
                            <h6
                                class="py-1 px-2 rounded-md bg-amber-400 text-white font-encode-sans font-bold text-sm sm:text-base">
                                PO
                            </h6>
                            @endif
                            @if($hideconfig[1] == 0)
                            @if($produk->countStock($produk) == 0)
                            <h6
                                class="py-1 px-2 rounded-md bg-red-500 text-white font-encode-sans font-bold text-sm sm:text-base">
                                Sold
                            </h6>
                            @endif
                            @endif
                        </div>
                    </div>
                    @if ($produk->stat == 'd')
                    <h6 class="font-encode-sans text-gray-400 sm:text-base text-sm">
                        Rp. {{ substr(number_format($produk->harga,2,",","."), 0, -3) }}
                    </h6>
                    @endif
                </div>
            </a>
            @endforeach
        </div>
        <div class="flex justify-center">
            <a href="{{ route('list_products') }}"
                class="border-2 hover:bg-{{ $color[2] }}-400 bg-white hover:text-white hover:ring-{{ $color[2] }}-300 hover:ring-2 border-{{ $color[2] }}-400 font-bold font-encode-sans text-{{ $color[2] }}-400 px-4 py-2 rounded-full">
                More Products
            </a>
        </div>

    </div>
</div>

@include('inc.footer1')

@endsection
