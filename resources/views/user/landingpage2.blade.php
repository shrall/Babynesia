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
            <img src="{{ asset('public/uploads/'.$head_img["content"]) }}"
                class="block w-full xl:h-vh-50 sm:h-vh-40 h-vh-25 object-cover bg-gray-400" alt="..." />
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
<div class="container mx-auto xl:px-20 px-3 xl:pt-6 xl:pb-10 pt-3 pb-5">
    <div>
        <div class="mb-6 flex flex-wrap gap-3 justify-center">
            @foreach ($hotdeals as $hd)
                <img src="{{ asset('public/uploads/' . $hd->image) }}" class="w-100 h-vh-40 object-cover" alt="">
            @endforeach
        </div>
    </div>
    
    <div class="xl:grid xl:grid-cols-4 gap-4 xl:auto-cols-min">
        <div class="hidden xl:block">
            <div class="bg-{{ $color[0] }}-300 rounded-t-lg px-4 py-3">
                <h6 class="font-encode-sans text-white text-sm font-bold">
                    Our Products
                </h6>
            </div>
            <div class="bg-white rounded-b-lg shadow-sm px-3 py-3">
                <ul class="mt-3">
                    @foreach ($statmenus as $status)
                    <li class="my-1">
                        <form action="{{ route('list_products') }}">
                            <input type="hidden" value="{{ $status->status_code }}" name="filterproduct">
                            <input type="hidden" name="pagehighlight" value="{{ $status->name }}"">
                            <button type="submit"
                                class="text-sm font-bold hover:text-{{ $color[1] }}-500 {{ $filteredproduct == $status->status_code ? 'text-'.$color[1].'-500' : 'text-slate-900' }} font-encode-sans">
                                {{ $status->name }} Product
                            </button>
                        </form>
                    </li>
                    @endforeach
                    {{-- <li class="my-1">
                        <form action="{{ route('list_products') }}">
                            <input type="hidden" value="featured" name="filterproduct">
                            <button type="submit"
                                class="{{ $filteredproduct == 'featured' ? 'text-'.$color[1].'-500' : 'text-slate-900' }} text-sm font-bold hover:text-{{ $color[1] }}-500 font-encode-sans">
                                Featured Product
                            </button>
                        </form>
                    </li> --}}
                </ul>
                <hr class="my-3">
                <h2 class="font-concert-one text-slate-900 text-2xl">Our Products</h2>
                <ul class="mt-3">
                    @foreach ($allkategoris as $kategori)
                    <li class="my-1 group">
                        <form action="{{ route('list_products') }}" method="get">
                            <input type="hidden" value="{{ $kategori->no_kategori }}" name="filter">
                            <button type="submit" {{ !empty($kategori->subcategories[0]) ? 'disabled' : '' }}
                                class="text-left appearance-none {{ $filter == $kategori->no_kategori ? 'text-'.$color[1].'-500' : 'text-gray-400' }} hover:text-{{ $color[1] }}-500 text-sm font-bold font-encode-sans peer">
                                {{ $kategori->nama_kategori }}
                            </button>
                        </form>
                        @foreach ($subkategoris as $sub)
                        @if ($sub->kategori_id == $kategori->no_kategori)
                        <form action="{{ route('list_products') }}" method="">
                            <input type="hidden" name="subfilter" value="{{ $sub->child_id }}">
                            <input type="hidden" name="filter" value="{{ $kategori->no_kategori }}">
                            <ul class="hidden ml-2 text-gray-400 pt-1 group-hover:block space-y-1">
                                <li
                                    class="appearance-none {{ $subfilter == $sub->child_id ? 'text-'.$color[1].'-500' : 'text-gray-400' }} hover:text-{{ $color[1] }}-500  block whitespace-no-wrap">
                                    <button type="submit" class="text-left">{{ $sub->child_name }}</button>
                                </li>
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
                <h1 class="font-concert-one text-3xl text-{{ $color[1] }}-500 xl:text-4xl">
                    "{{ $keyword }}"
                </h1>
                @elseif (!empty($filteredproduct))
                <h1 class="font-concert-one text-3xl text-{{ $color[1] }}-500 xl:text-4xl">
                    @if($filteredproduct != 'featured' && !empty($produks[0]->status->name))
                    {{ $produks[0]->status->name == 'Promo' ? "SALE !!" : $produks[0]->status->name." Product" }}
                    @elseif ($filteredproduct == 'featured')
                    Featured Product
                    @else
                    Product Not Found
                    @endif
                </h1>
                @elseif (!empty($subfilter))
                <h1 class="font-concert-one text-3xl text-{{ $color[1] }}-500 xl:text-4xl">
                    {{ $subsname }}
                </h1>
                @elseif (!empty($filter) && !empty($produks[0]->category->nama_kategori))
                <h1 class="font-concert-one text-3xl text-{{ $color[1] }}-500 xl:text-4xl">
                    {{ $produks[0]->category->nama_kategori }}
                </h1>
                @else
                <h1 class="font-concert-one text-3xl text-{{ $color[1] }}-500 xl:text-4xl">
                    Product Not Found
                </h1>
                @endif
                <input type="checkbox" name="bottomclick" id="bottomclick" hidden>
                <label for="bottomclick"
                    class="rounded-full px-4 py-2 bg-{{ $color[1] }}-500 cursor-pointer hover:bg-{{ $color[1] }}-600 text-white text-sm font-bold xl:hidden font-encode-sans">
                    Filter
                </label>
            </div>
            <div class="mt-5 mb-5">
                <div class="grid grid-cols-2 gap-2 sm:grid-cols-4 sm:gap-3 xl:mx-auto">
    
                    @foreach ($produks as $produk)
                    <a href="{{ route('produk.show', $produk) }}" class="rounded-lg shadow-sm bg-white">
                        <img src="{{ asset('public/uploads/') . '/' . $produk->image }}"
                            class="aspect-square w-full bg-gray-400 rounded-t-lg object-cover" alt="">
                        <div class="p-3 pb-5">
                            <h6 class="font-encode-sans font-bold sm:text-base text-sm text-clip">
                                {{ $produk->disable }} {{ $hideconfig[0] != 1 ? '['. $produk->kode_produk .']' : '' }} {{ $produk->nama_produk }}
                            </h6>
                            <div class="flex justify-between items-center sm:my-3 my-2">
    
                                <h2 class="font-concert-one {{ $produk->countStock($produk) != 0 ? 'text-slate-900' : 'text-gray-400' }} xl:text-2xl text-xl">
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
                                    @if($hideconfig[1] == 1)
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
            {{ $produks->onEachSide(1)->links('vendor.pagination.custom-1', compact('color')) }}
            {{-- <div class="bg-white rounded-md px-3 py-3 flex justify-center items-center shadow-sm">
                <a href="">
                    <i class="fa fa-chevron-left mx-2" aria-hidden="true"></i>
                </a>
                <a href="" class="p-2 bg-{{ $color[0] }}-300 text-sm font-bold font-encode-sans mx-2 rounded-md
            text-white">1</a>
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
</div>


<div class="bgmenulist xl:hidden fixed bg-slate-900 h-screen opacity-20 w-full -bottom-full" style="z-index: 5001">
    <label for="bottomclick" class="inline-block w-full h-full"></label>
</div>
<div class="transition-all duration-300 bottomfilterlist xl:hidden w-full fixed -bottom-full -translate-x-1/2 left-1/2" style="z-index: 5002">
    <div class="bg-{{ $color[0] }}-300 px-3 py-3 w-full rounded-t-lg">
        <h6 class="font-encode-sans text-white font-bold">
            Filter
        </h6>
    </div>
    <div class="bg-white px-3 w-full py-4 overflow-y-auto max-h-72">
        <ul>
            @foreach ($statmenus as $status)
                <li class="my-1">
                    <form action="{{ route('list_products') }}">
                        <input type="hidden" value="{{ $status->status_code }}" name="filterproduct">
                        <input type="hidden" name="pagehighlight" value="{{ $status->name }}">
                        <button type="submit"
                            class="text-sm font-bold hover:text-{{ $color[1] }}-500 {{ $filteredproduct == $status->status_code ? 'text-'.$color[1].'-500' : 'text-slate-900' }} font-encode-sans">
                            {{ $status->name }} Product
                        </button>
                    </form>
                </li>
                @endforeach
            <li class="my-1">
                <form action="{{ route('list_products') }}">
                    <input type="hidden" value="featured" name="filterproduct">
                    <button type="submit"
                        class="{{ $filteredproduct == 'featured' ? 'text-'.$color[1].'-500' : 'text-slate-900' }} text-sm font-bold hover:text-{{ $color[1] }}-500 font-encode-sans">
                        Featured Product
                    </button>
                </form>
            </li>
        </ul>

        <hr class="my-3">
        <input hidden type="checkbox" class="peer" name="typebottom" id="typebottom">
        <label for="typebottom" class="flex cursor-pointer justify-between items-center">
            <h2 class="font-concert-one text-2xl text-slate-900">
                Our Products
            </h2>
            <i class="text-slate-900 text-xl fa fa-chevron-down"></i>
        </label>
        <div class="mt-3 ml-4 peer-checked:block hidden">
            <ul class="font-encode-sans text-slate-900 text-sm md:text-base">
                @foreach ($allkategoris as $kategori)
                <li class="my-1">
                    <form action="{{ route('list_products') }}" method="get">
                        <input type="hidden" value="{{ $kategori->no_kategori }}" name="filter">
                        <button type="submit"
                            class="{{ $filter == $kategori->no_kategori ? 'text-'.$color[1].'-500' : 'text-gray-400' }} font-bold hover:text-{{ $color[1] }}-500 font-encode-sans"
                            {{ !empty($kategori->subcategories[0]) ? 'disabled' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </button>
                    </form>
                    @foreach ($subkategoris as $sub)
                    @if ($sub->kategori_id == $kategori->no_kategori)
                    <form action="{{ route('list_products') }}" method="">
                        <input type="hidden" name="subfilter" value="{{ $sub->child_id }}">
                        <input type="hidden" name="filter" value="{{ $kategori->no_kategori }}">
                        <ul
                            class="ml-2 {{ $subfilter == $sub->child_id ? 'text-'.$color[1].'-500' : 'text-gray-400' }} pt-1 space-y-1 hover:text-{{ $color[1] }}-500">
                            <li class="appearance-none block whitespace-no-wrap">
                                <button type="submit" class="text-left">{{ $sub->child_name }}</button>
                            </li>
                        </ul>
                    </form>
                    @endif
                    @endforeach
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

<script>
    const bottomclick = document.querySelector('#bottomclick');
    const bottomlist = document.querySelector('.bottomfilterlist');
    const bgmenulist = document.querySelector('.bgmenulist');

    bottomclick.addEventListener('click', function () {
        if (bottomclick.checked) {
            bottomlist.classList.remove('-bottom-full');
            bottomlist.classList.add('bottom-0');
            bgmenulist.classList.remove('-bottom-full');
            bgmenulist.classList.add('bottom-0');
        } else {
            bottomlist.classList.remove('bottom-0');
            bottomlist.classList.add('-bottom-full');
            bgmenulist.classList.remove('bottom-0');
            bgmenulist.classList.add('-bottom-full');
        }
    });

</script>

@include('inc.footer1')

@endsection
