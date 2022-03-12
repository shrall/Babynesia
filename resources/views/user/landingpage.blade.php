@extends('layouts.app')
@section('title', 'TokoBayiFiv')
@section('content')

@include('inc.navbar1')

<div class="container mx-auto xl:px-32 px-3 xl:pt-6 xl:pb-10 pt-3 pb-5">
    <div class="w-full bg-white rounded-md shadow-sm py-5">
        <div class="flex justify-center">
            <ul>
                <li class="inline-block">
                    <input type="radio" onclick="showcontent()" id="newproduct" name="tes" value="tes" class="peer" hidden checked>
                    <label for="newproduct" class="cursor-pointer font-encode-sans text-gray-400 peer-checked:text-sky-500 peer-checked:font-bold hover:text-sky-500 peer-checked:border-b-4 peer-checked:border-sky-500 peer-checked:px-1">
                        New Product
                    </label>
                </li>
                <li class="ml-4 inline-block">
                    <input type="radio" onclick="showcontent()" id="hotdeals" name="tes" value="tes" class="peer" hidden>
                    <label for="hotdeals" class="cursor-pointer font-encode-sans text-gray-400 peer-checked:text-sky-500 peer-checked:font-bold hover:text-sky-500 peer-checked:border-b-4 peer-checked:border-sky-500 peer-checked:px-1">
                        Hot Deals
                    </label>
                </li>
                <li class="ml-4 inline-block">
                    <input type="radio" onclick="showcontent()" id="restock" name="tes" value="tes" class="peer" hidden>
                    <label for="restock" class="cursor-pointer font-encode-sans text-gray-400 peer-checked:text-sky-500 peer-checked:font-bold hover:text-sky-500 peer-checked:border-b-4 peer-checked:border-sky-500 peer-checked:px-1">
                        Restock
                    </label>
                </li>
            </ul>
        </div>
        <h1 class="text-center font-concert-one text-4xl mt-3 text-sky-500">
            Our Newest Product
        </h1>
    </div>
    <div class="mt-5 mb-5">
        <div id="divnew">
            <div class="grid grid-cols-2 gap-2 sm:grid-cols-3 sm:gap-3 xl:w-4/5 xl:mx-auto">
                @foreach ($newproduct as $produk)
                <a href="{{ route('user.produk.show', $produk) }}" class="rounded-lg shadow-sm bg-white">
                    <img src="{{ $produk->image }}" class="aspect-square w-full bg-gray-400 rounded-t-lg object-cover" alt="">
                    <div class="p-4 pb-6">
                        <h6 class="font-encode-sans font-bold sm:text-base text-sm text-clip">
                            {{ $produk->nama_produk }}
                        </h6>
                        <div class="flex justify-between items-center sm:my-3 my-2">
                            @if ($produk->stock <= 0)
                            <h2 class="font-concert-one text-gray-400 xl:text-3xl text-xl">
                                Rp. {{ substr(number_format($produk->harga,2,",","."), 0, -3) }}
                            </h2>
                            <h6 class="py-1 px-2 rounded-md bg-red-500 text-white font-encode-sans font-bold text-sm sm:text-base">
                                Sold
                            </h6>
                            @else
                            <h2 class="font-concert-one text-slate-900 xl:text-3xl text-xl">
                                Rp. {{ substr(number_format($produk->harga,2,",","."), 0, -3) }}
                            </h2>
                            @endif
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
        </div>

        <div id="divhot">
            <div class="grid grid-cols-2 gap-2 sm:grid-cols-3 sm:gap-3 xl:w-4/5 xl:mx-auto">
                @foreach ($hotdeals as $produk)
                <a href="{{ route('user.produk.show', $produk) }}" class="rounded-lg shadow-sm bg-white">
                    <img src="{{ $produk->image }}" class="aspect-square w-full bg-gray-400 rounded-t-lg object-cover" alt="">
                    <div class="p-4 pb-6">
                        <h6 class="font-encode-sans font-bold sm:text-base text-sm text-clip">
                            {{ $produk->nama_produk }}
                        </h6>
                        <div class="flex justify-between items-center sm:my-3 my-2">
                            @if ($produk->stock <= 0)
                            <h2 class="font-concert-one text-gray-400 xl:text-3xl text-xl">
                                Rp. {{ substr(number_format($produk->harga,2,",","."), 0, -3) }}
                            </h2>
                            <h6 class="py-1 px-2 rounded-md bg-red-500 text-white font-encode-sans font-bold text-sm sm:text-base">
                                Sold
                            </h6>
                            @else
                            <h2 class="font-concert-one text-slate-900 xl:text-3xl text-xl">
                                Rp. {{ substr(number_format($produk->harga_sale,2,",","."), 0, -3) }}
                            </h2>
                            @endif
                        </div>
                        <h6 class="font-encode-sans text-gray-400 sm:text-base text-sm">
                            <del>Rp. {{ substr(number_format($produk->harga,2,",","."), 0, -3) }}</del>
                        </h6>
                    </div>
                </a> 
                @endforeach
            </div>
        </div>

        <div id="divrestock">
            <div class="grid grid-cols-2 gap-2 sm:grid-cols-3 sm:gap-3 xl:w-4/5 xl:mx-auto">
                @foreach ($restock as $produk)
                <a href="{{ route('user.produk.show', $produk) }}" class="rounded-lg shadow-sm bg-white">
                    <img src="{{ $produk->image }}" class="aspect-square w-full bg-gray-400 rounded-t-lg object-cover" alt="">
                    <div class="p-4 pb-6">
                        <h6 class="font-encode-sans font-bold sm:text-base text-sm text-clip">
                            {{ $produk->nama_produk }}
                        </h6>
                        <div class="flex justify-between items-center sm:my-3 my-2">
                            @if ($produk->stock <= 0)
                            <h2 class="font-concert-one text-gray-400 xl:text-3xl text-xl">
                                Rp. {{ substr(number_format($produk->harga,2,",","."), 0, -3) }}
                            </h2>
                            <h6 class="py-1 px-2 rounded-md bg-red-500 text-white font-encode-sans font-bold text-sm sm:text-base">
                                Sold
                            </h6>
                            @else
                            <h2 class="font-concert-one text-slate-900 xl:text-3xl text-xl">
                                Rp. {{ substr(number_format($produk->harga,2,",","."), 0, -3) }}
                            </h2>
                            @endif
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
        </div>
    </div>

    {{-- FEATURED PRODUCT --}}
    @if (!empty($featured[0]))
    <div class="w-full bg-white rounded-md shadow-sm py-5">
        <h1 class="text-center font-concert-one text-4xl text-sky-500">
            Featured Product
        </h1>
    </div>
    @endif
    <div class="mt-5 mb-5">
        <div class="grid grid-cols-2 gap-2 sm:grid-cols-3 sm:gap-3 mb-7 xl:w-5/6 xl:mx-auto">
            @foreach ($featured as $produk)
                <a href="{{ route('user.produk.show', $produk) }}" class="rounded-lg shadow-sm bg-white">
                    <img src="{{ $produk->image }}" class="aspect-square w-full bg-gray-400 rounded-t-lg object-cover" alt="">
                    <div class="p-4 pb-6">
                        <h6 class="font-encode-sans font-bold sm:text-base text-sm text-clip">
                            {{ $produk->nama_produk }}
                        </h6>
                        <div class="flex justify-between items-center sm:my-3 my-2">
                            @if ($produk->stock <= 0)
                            <h2 class="font-concert-one text-gray-400 xl:text-3xl text-xl">
                                Rp. {{ substr(number_format($produk->harga,2,",","."), 0, -3) }}
                            </h2>
                            <h6 class="py-1 px-2 rounded-md bg-red-500 text-white font-encode-sans font-bold text-sm sm:text-base">
                                Sold
                            </h6>
                            @else
                            <h2 class="font-concert-one text-slate-900 xl:text-3xl text-xl">
                                Rp. {{ substr(number_format($produk->harga,2,",","."), 0, -3) }}
                            </h2>
                            @endif
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
            <a href="{{ route('user.list_products') }}" class="border-2 hover:bg-pink-400 hover:text-white hover:ring-pink-300 hover:ring-2 border-pink-400 font-bold font-encode-sans text-pink-400 px-4 py-2 rounded-full">
                More Products
            </a>
        </div>
        
    </div>
</div>

<script>
    let newproduct = document.getElementById("newproduct");
    let hotdeals = document.getElementById("hotdeals");
    let restock = document.getElementById("restock");

    let divnew = document.getElementById("divnew");
    let divhot = document.getElementById("divhot");
    let divrestock = document.getElementById("divrestock");

    if(newproduct.checked) {
        divnew.style.display = "block";
        divhot.style.display = "none";
        divrestock.style.display = "none";
    }

    function showcontent() {
        if(newproduct.checked) {
            divnew.style.display = "block";
            divhot.style.display = "none";
            divrestock.style.display = "none";
        }
        else if(hotdeals.checked) {
            divhot.style.display = "block";
            divnew.style.display = "none";
            divrestock.style.display = "none";
        }
        else if (restock.checked) {
            divnew.style.display = "none";
            divhot.style.display = "none";
            divrestock.style.display = "block";
        }
    }
</script>

@include('inc.footer1')

@endsection
