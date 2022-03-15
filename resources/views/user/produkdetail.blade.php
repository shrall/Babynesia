@extends('layouts.app')
@section('title', 'TokoBayiFiv')
@section('content')

@include('inc.navbar1')

<div class="container mx-auto xl:px-32 px-3 xl:pt-6 xl:pb-10 pt-3 pb-5">
    <div class="w-full bg-white rounded-md shadow-sm py-3 px-3 xl:hidden">
        <h1 class="font-concert-one text-3xl text-sky-500 xl:text-4xl">
            [{{ $produk->kode_alias }}] {{ $produk->nama_produk }}
        </h1>
        {{-- <p class="text-gray-400 text-sm sm:text-base font-encode-sans">
            Product description goes here
        </p> --}}
    </div>
    <div class="xl:grid xl:grid-cols-2 xl:gap-3">
        <div class="mt-3">
            <div class="mb-3">
                <img src="{{ $produk->image }}" alt="" id="productimg" class="aspect-square bg-gray-400 w-full rounded-lg object-cover">
            </div>
            <div class="flex items-center flex-wrap">
                @foreach ($produk->images as $image)
                <a href="#n" onclick="switchImg('{{ $image->imageurl }}')">
                    
                <img src="{{ $image->imageurl }}" alt=""
                    class="aspect-square w-1/4 bg-gray-400 rounded-lg object-cover mr-3">
                    
                </a>
                @endforeach
            </div>
        </div>
        <div class="mt-3 px-3 pt-3 pb-8 bg-white rounded-lg h-fit shadow-sm">
            <div class="hidden xl:block">
                <h1 class="font-concert-one text-sky-500 xl:text-4xl">
                    {{ $produk->nama_produk }}
                </h1>
                {{-- <p class="text-gray-400 font-encode-sans">
                    Product description goes here
                </p> --}}
            </div>
            <div class="flex xl:mt-6">
                <p class="text-sm sm:text-base text-gray-400 font-encode-sans leading-7">
                    Category <br>
                    Brand/Produsen <br>
                    Berat
                </p>
                <p class="text-sm sm:text-base text-gray-400 font-encode-sans ml-5 leading-7">
                    : <br>
                    : <br>
                    :
                </p>
                <p class="font-bold sm:text-base font-encode-sans text-slate-900 text-sm ml-2 leading-7">
                    {{ $produk->category->nama_kategori }} <br>
                    {{ $produk->brand->nama_brand }} <br>
                    {{ $produk->weight }} gram
                </p>
            </div>
            <form action="{{ route('user.detailcart.store') }}" method="post">
                @csrf
                @if (!empty($stocks[0]))
                <div class="mt-3 xl:mt-6 relative border-2 border-blue-400 rounded-lg">
                    <select name="ukuran" id=""
                        class="appearance-none bg-white w-full font-bold py-2 px-3 font-encode-sans text-blue-400">
                        @foreach ($stocks as $stock)
                        @if (!empty($stock->size))
                        <option value="{{ $stock->id }}">{{ $stock->size }} -
                            {{ $stock->color }}</option>
                        @else
                        <option value="{{ $stock->id }}">{{ $stock->color }}</option>
                        @endif
                        @endforeach
                    </select>
                    <i class="fa fa-chevron-down absolute text-blue-400 right-2 top-1/2 -translate-y-1/2 m-auto"
                        aria-hidden="true"></i>
                </div>
                @endif

                <div class="mt-4 xl:mt-7 flex items-center justify-between">
                    <h6 class="font-encode-sans text-slate-900 font-bold text-sm sm:text-base">
                        Jumlah
                    </h6>
                    <div class="flex items-center">
                        <button type="button" onclick="decrement()" id="buttonminus">
                            <i class="fa fa-chevron-left text-md p-1 bg-blue-300 focus:bg-pink-600 rounded-md text-white"
                                aria-hidden="true"></i>
                        </button>
                        <input type="number" name="jumlah" value="1" id="numbersize" readonly
                            class="appearance-none font-encode-sans w-9 text-center font-bold text-slate-900 text-sm sm:text-base px-2 py-1 border-2 rounded-lg border-blue-400 mx-2">
                        <button type="button" onclick="increment()" id="buttonplus">
                            <i class="fa fa-chevron-right text-md p-1 bg-blue-300 focus:bg-pink-600 rounded-md text-white"
                                aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
                <div class="my-4 xl:my-7">
                    <h1 class="text-3xl font-concert-one text-slate-900">
                        Rp. {{ $produk->stat == 'd' ? substr(number_format($produk->harga_sale,2,",","."), 0, -3) : substr(number_format($produk->harga,2,",","."), 0, -3) }}
                    </h1>
                    @if ($produk->stat == 'd')
                    <p class="font-encode-sans text-sm sm:text-base text-gray-400"> <del> Rp. {{ substr(number_format($produk->harga,2,",","."), 0, -3) }} </del></p>
                    @endif
                </div>
                @if ($produk->stock != 0)
                @if (Auth::check())
                <a href="#" role="button" id="open-modal"
                    class="bg-sky-500 hover:bg-sky-600 focus:ring-sky-300 rounded-full py-3 w-full inline-block text-center text-sm sm:text-base text-white font-encode-sans font-bold">
                    Add to Cart
                </a>

                @else
                <a href="{{ route('login') }}"
                    class="bg-sky-500 hover:bg-sky-600 focus:ring-sky-300 rounded-full py-3 w-full inline-block text-center text-sm sm:text-base text-white font-encode-sans font-bold">
                    Add to Cart
                </a>

                @endif
                @else
                <button disabled
                    class="bg-neutral-100 rounded-full py-3 w-full inline-block text-center text-sm sm:text-base text-gray-400 font-encode-sans font-bold">
                    Add to Cart
                </button>

                @endif

                {{-- modal --}}
                <div class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full"
                    id="my-modal-bg">
                </div>

                <div class="left-1/2 transform -translate-x-1/2 ease-out fixed hidden top-20 mx-auto py-5 px-7 border w-96 shadow-lg rounded-md bg-white"
                    id="my-modal">
                    <div class="flex justify-between">
                        <h1 class="text-3xl font-concert-one text-sky-500">
                            Add to Cart
                        </h1>
                        <a href="#" type="button" class="appearance-none" id="close-modal">
                            <i class="fa fa-times text-3xl text-red-500" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="mt-4">
                        <div>
                            <label for="catatan" class="text-sm font-encode-sans text-slate-900">Catatan Tambahan
                                (size/color/etc)</label>
                        </div>
                        <textarea name="note" id="catatan" cols="20"
                            class="bg-neutral-100 border appearance-none w-full rounded-lg p-1 text-slate-900 font-encode-sans"></textarea>
                    </div>

                    <input type="hidden" value="{{ $produk->kode_produk }}" name="kode_produk">

                    <button type="submit"
                        class="mt-5 bg-sky-500 hover:bg-sky-600 focus:ring-sky-300 rounded-full py-3 w-full inline-block text-center text-sm sm:text-base text-white font-encode-sans font-bold">
                        Add to Cart
                    </button>

                </div>
                {{-- modal end --}}
            </form>
        </div>
    </div>

    {{-- more product --}}
    <div class="mt-5 bg-white rounded-md px-3 py-5 shadow-sm">
        <h1 class="font-concert-one text-3xl text-sky-500 xl:text-4xl">
            More Product
        </h1>
    </div>
    <div class="mt-5 mb-5">
        <div class="grid grid-cols-2 gap-2 sm:grid-cols-4 sm:gap-3 xl:mx-auto">
            @foreach ($others as $produk)
            <a href="{{ route('user.produk.show', $produk) }}" class="rounded-lg shadow-sm bg-white">
                <img src="{{ $produk->image }}" class="aspect-square w-full bg-gray-400 rounded-t-lg object-cover"
                    alt="">
                <div class="p-4 pb-5">
                    <h6 class="font-encode-sans font-bold sm:text-base text-sm text-clip">
                        {{ $produk->nama_produk }}
                    </h6>
                    <div class="flex justify-between items-center sm:my-3 my-2">
                        <h2 class="font-concert-one text-gray-400 xl:text-2xl text-xl">
                            Rp. {{ substr(number_format($produk->harga,2,",","."), 0, -3) }}
                        </h2>
                        @if ($produk->stock <= 0) <h6
                            class="py-1 px-2 rounded-md bg-red-500 text-white font-encode-sans font-bold text-sm sm:text-base">
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
</div>

<script>
    let modal = document.getElementById("my-modal");
    let modalbg = document.getElementById("my-modal-bg");
    let btn = document.getElementById("open-modal");
    let button = document.getElementById("close-modal");

    // We want the modal to open when the Open button is clicked
    btn.onclick = function () {
        modal.style.display = "block";
        modalbg.style.display = "block";

        // Get the current page scroll position
        scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        scrollLeft = window.pageXOffset || document.documentElement.scrollLeft,

            // if any scroll is attempted, set this to the previous value
            window.onscroll = function () {
                window.scrollTo(scrollLeft, scrollTop);
            };
    }
    // We want the modal to close when the OK button is clicked
    button.onclick = function () {
        modal.style.display = "none";
        modalbg.style.display = "none";
        window.onscroll = function () {};
    }

    window.onclick = function (event) {
        if (event.target == modalbg) {
            modal.style.display = "none";
            modalbg.style.display = "none";
            window.onscroll = function () {};
        }
    }

    //+ - button
    function increment() {
        document.getElementById('numbersize').stepUp();
    }

    function decrement() {
        if (document.getElementById('numbersize').value <= 1) {} else {
            document.getElementById('numbersize').stepDown();
        }

    }

    function switchImg(i){
        document.images["productimg"].src = i;
    }

</script>

@include('inc.footer1')

@endsection
