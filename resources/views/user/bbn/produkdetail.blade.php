@extends('layouts.app')
@section('content')

    @include('inc.navbar2')

    <div class="container mx-auto xl:px-32 px-3 xl:pt-6 xl:pb-10 pt-3 pb-5">
        @if (session('alert'))
            <div class="w-full bg-white mb-3 rounded-md shadow-sm py-2 px-3">
                <p class="font-encode-sans text-red-500 text-center">
                    {{ session('alert') }}
                </p>
            </div>
        @endif

        <div class="w-full bg-white rounded-md shadow-sm py-3 px-3 xl:hidden">
            <h1 class="font-concert-one text-3xl text-{{ $color[1] }}-600 xl:text-4xl">
                {{ $hideconfig[0] != 1 ? '[' . $produk->kode_produk . ']' : '' }} {{ $produk->nama_produk }}
            </h1>
        </div>
        <div class="xl:grid xl:grid-cols-2 xl:gap-3">
            <div class="mt-3">
                <div class="mb-3">
                    <img src="{{ $produk->app_type == 1 ? 'https://tokobayifiv.com/public/uploads/' . $produk->image : 'https://babynesia.com/public/uploads/' . $produk->image }}" alt="" id="productimg"
                        class="aspect-square bg-gray-400 w-full object-cover">
                </div>
                <div class="flex items-center gap-3 flex-wrap">
                    @foreach ($produk->images as $image)
                        <a href="#n" class="w-1/4" onclick="switchImg('{{ $produk->app_type == 1 ? 'https://tokobayifiv.com/public/uploads/' . $image->imageurl : 'https://babynesia.com/public/uploads/' . $image->imageurl }}')">
                            <img src="{{ $produk->app_type == 1 ? 'https://tokobayifiv.com/public/uploads/' . $image->imageurl : 'https://babynesia.com/public/uploads/' . $image->imageurl }}" alt=""
                                class="aspect-square bg-gray-400 w-full object-cover mr-3">
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="mt-3 px-3 pt-3 pb-8 bg-white rounded-lg h-fit shadow-sm">
                <div class="hidden xl:block">
                    <h1 class="font-concert-one text-{{ $color[1] }}-500 xl:text-4xl">
                        {{ $hideconfig[0] != 1 ? '[' . $produk->kode_produk . ']' : '' }} {{ $produk->nama_produk }}
                    </h1>
                    <div class="text-gray-400 text-sm sm:text-base font-encode-sans">
                        {!! $produk->ket !!}
                    </div>
                </div>
                <div class="text-gray-400 xl:hidden text-sm sm:text-base font-encode-sans">
                    {{-- @dd($produk->ket) --}}
                    {!! $produk->ket !!}
                </div>
                <div class="flex xl:mt-6 mt-3">
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
                        {{ !empty($produk->brand->nama_brand) ? $produk->brand->nama_brand : 'A/N' }} <br>
                        {{ $produk->weight }} gram
                    </p>
                </div>
                <form action="{{ route('user.detailcart.store') }}" method="post">
                    @csrf
                    @if ($produk->countStock($produk) != 0)
                        {{-- <div class="mt-3 xl:mt-6 relative border-2 border-{{ $color[0] }}-400 rounded-lg">
                            <select name="ukuran" id=""
                                class="appearance-none cursor-pointer bg-white w-full font-bold py-2 px-3 font-encode-sans text-{{ $color[0] }}-400">
                                @foreach ($stocks as $stock)
                                    @if (!empty($stock->size))
                                        <option value="{{ $stock->id }}">{{ $stock->size }} -
                                            {{ $stock->color }}</option>
                                    @else
                                        <option value="{{ $stock->id }}">{{ $stock->color }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <i class="fa fa-chevron-down absolute text-{{ $color[0] }}-400 right-2 top-1/2 -translate-y-1/2 m-auto"
                                aria-hidden="true"></i>
                        </div> --}}
                        <div class="mt-3 xl:mt-6">
                            <h6 class="font-encode-sans text-slate-900 font-bold text-sm sm:text-base">

                            </h6>
                            @foreach ($stocks as $stock)
                            <div>
                            @if (!empty($stock->size))
                                <input type="radio" name="ukuran" id="ukuran{{ $stock->id }}" value="{{ $stock->id }}" {{ $loop->iteration == 1 ? 'checked' : '' }}>
                                <label for="ukuran{{ $stock->id }}" class="ml-2 cursor-pointer font-encode-sans text-gray-400">{{ $stock->size }} - {{ $stock->color }}</label>
                            @else
                                <input type="radio" name="ukuran" id="ukuran{{ $stock->id }}" value="{{ $stock->id }}" {{ $loop->iteration == 1 ? 'checked' : '' }}>
                                <label for="ukuran{{ $stock->id }}" class="ml-2 cursor-pointer font-encode-sans text-gray-400">{{ $stock->color }}</label>
                            @endif
                        </div>
                        @endforeach
                        </div>

                    @endif

                    <div class="mt-4 xl:mt-7 flex items-center justify-between">
                        <h6 class="font-encode-sans text-slate-900 font-bold text-sm sm:text-base">
                            Jumlah
                        </h6>
                        <div class="flex items-center">
                            <button type="button" onclick="decrement()" id="buttonminus">
                                <i class="bx bx-chevron-left text-2xl p-1 text-slate-900"
                                    aria-hidden="true"></i>
                            </button>
                            <input type="number" name="jumlah" value="1" id="numbersize" readonly
                                class="appearance-none font-encode-sans w-6 text-center font-bold text-slate-900 bg-neutral-50 text-sm sm:text-base px-1 py-1 border-b-2 border-{{ $color[0] }}-400 mx-1">
                            <button type="button" onclick="increment()" id="buttonplus">
                                <i class="bx bx-chevron-right text-2xl p-1 text-slate-900"
                                    aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                    <div class="my-4 xl:my-7">
                        <div class="flex justify-between">
                            <h1
                                class="text-3xl font-concert-one {{ $produk->countStock($produk) != 0 ? 'text-slate-900' : 'text-gray-400' }}">
                                Rp.
                                {{ $produk->stat == 'd' ? substr(number_format($produk->harga_sale, 2, ',', '.'), 0, -3) : substr(number_format($produk->harga, 2, ',', '.'), 0, -3) }}
                            </h1>
                            @if ($produk->stat == 'po')
                                <h6
                                    class="py-1 px-2 rounded-md bg-amber-400 text-white font-encode-sans font-bold text-sm sm:text-base">
                                    PO
                                </h6>
                            @endif
                        </div>

                        @if ($produk->stat == 'd')
                            <p class="font-encode-sans text-sm sm:text-base text-gray-400"> <del> Rp.
                                    {{ substr(number_format($produk->harga, 2, ',', '.'), 0, -3) }} </del></p>
                        @endif
                    </div>
                    <input type="hidden" value="{{ $produk->kode_produk }}" name="kode_produk">

                    @if ($produk->countStock($produk) != 0)
                        {{-- @if (Auth::check()) --}}
                        <button type="submit"
                            class="bg-{{ $color[2] }}-400 hover:bg-{{ $color[2] }}-500 focus:ring-{{ $color[2] }}-400 rounded-full py-3 w-full inline-block text-center text-sm sm:text-base text-white font-encode-sans font-bold">
                            Add to Cart
                        </button>

                        {{-- @else
                <a href="{{ route('login') }}"
                class="bg-{{ $color[1] }}-500 hover:bg-{{ $color[1] }}-600 focus:ring-{{ $color[1] }}-300 rounded-full
                py-3 w-full inline-block text-center text-sm sm:text-base text-white font-encode-sans font-bold">
                Add to Cart
                </a>

                @endif --}}
                    @else
                        <button disabled
                            class="bg-neutral-100 rounded-full py-3 w-full inline-block text-center text-sm sm:text-base text-gray-400 font-encode-sans font-bold">
                            Add to Cart
                        </button>
                    @endif

                    {{-- modal --}}
                    {{-- <div class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full"
                    id="my-modal-bg">
                </div>

                <div class="left-1/2 transform -translate-x-1/2 ease-out fixed hidden top-20 mx-auto py-5 px-7 border w-96 shadow-lg rounded-md bg-white"
                    id="my-modal">
                    <div class="flex justify-between">
                        <h1 class="text-3xl font-concert-one text-{{ $color[1] }}-500">
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

        <button type="submit"
            class="mt-5 bg-{{ $color[1] }}-500 hover:bg-{{ $color[1] }}-600 focus:ring-{{ $color[1] }}-300 rounded-full py-3 w-full inline-block text-center text-sm sm:text-base text-white font-encode-sans font-bold">
            Add to Cart
        </button>

    </div> --}}
                    {{-- modal end --}}
                </form>
            </div>
        </div>

        {{-- more product --}}
        {{-- @if (!empty($produk->complement))
            <div class="mt-5 bg-white rounded-md px-3 py-5 shadow-sm">
                <h1 class="font-concert-one text-3xl text-{{ $color[1] }}-500 xl:text-4xl">
                    Product Suggestions
                </h1>
            </div>
            <div class="mt-5 mb-5">
                <div class="grid grid-cols-2 gap-2 sm:grid-cols-4 sm:gap-3 xl:mx-auto">
                    <a href="{{ route('produk.show', $produk->complement) }}" class="rounded-lg shadow-sm bg-white">
                        <img src="{{ asset('uploads/') . '/' . $produk->complementary->image }}"
                            class="aspect-square w-full bg-gray-400 rounded-t-lg object-cover" alt="">
                        <div class="p-4 pb-5">
                            <h6 class="font-encode-sans font-bold sm:text-base text-sm text-clip">
                                {{ $hideconfig[0] != 1 ? '[' . $produk->complementary->kode_produk . ']' : '' }}
                                {{ $produk->complementary->nama_produk }}
                            </h6>
                            <div class="flex justify-between items-center sm:my-3 my-2">

                                <h2
                                    class="font-concert-one {{ $produk->complementary->countStock($produk->complementary) != 0 ? 'text-slate-900' : 'text-gray-400' }} xl:text-3xl text-xl">
                                    Rp.
                                    {{ $produk->complementary->stat == 'd' ? substr(number_format($produk->complementary->harga_sale, 2, ',', '.'), 0, -3) : substr(number_format($produk->complementary->harga, 2, ',', '.'), 0, -3) }}
                                </h2>

                                <div class="flex space-x-2">
                                    @if ($produk->stat == 'po')
                                        <h6
                                            class="py-1 px-2 rounded-md bg-amber-400 text-white font-encode-sans font-bold text-sm sm:text-base">
                                            PO
                                        </h6>
                                    @endif
                                    @if ($hideconfig[1] == 1)
                                        @if ($produk->countStock($produk) == 0)
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
                                    <del>Rp.
                                        {{ substr(number_format($produk->complementary->harga, 2, ',', '.'), 0, -3) }}</del>
                                </h6>
                            @endif
                        </div>
                    </a> --}}

                    {{-- manual loop --}}
                    {{-- @if (!empty($produk->complementary->complementary))
                        <a href="{{ route('produk.show', $produk->complementary->complementary) }}"
                            class="rounded-lg shadow-sm bg-white">
                            <img src="{{ asset('uploads/') . '/' . $produk->complementary->complementary->image }}"
                                class="aspect-square w-full bg-gray-400 rounded-t-lg object-cover" alt="">
                            <div class="p-4 pb-5">
                                <h6 class="font-encode-sans font-bold sm:text-base text-sm text-clip">
                                    {{ $hideconfig[0] != 1 ? '[' . $produk->complementary->kode_produk . ']' : '' }}
                                    {{ $produk->complementary->complementary->nama_produk }}
                                </h6>
                                <div class="flex justify-between items-center sm:my-3 my-2">

                                    <h2
                                        class="font-concert-one {{ $produk->complementary->complementary->countStock($produk->complementary->complementary) != 0 ? 'text-slate-900' : 'text-gray-400' }} xl:text-3xl text-xl">
                                        Rp.
                                        {{ $produk->complementary->complementary->stat == 'd' ? substr(number_format($produk->complementary->complementary->harga_sale, 2, ',', '.'), 0, -3) : substr(number_format($produk->complementary->complementary->harga, 2, ',', '.'), 0, -3) }}
                                    </h2>
                                    <div class="flex space-x-2">
                                        @if ($produk->stat == 'po')
                                            <h6
                                                class="py-1 px-2 rounded-md bg-amber-400 text-white font-encode-sans font-bold text-sm sm:text-base">
                                                PO
                                            </h6>
                                        @endif
                                        @if ($hideconfig[1] == 1)
                                            @if ($produk->countStock($produk) == 0)
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
                                        <del>Rp.
                                            {{ substr(number_format($produk->complementary->complementary->harga, 2, ',', '.'), 0, -3) }}</del>
                                    </h6>
                                @endif
                            </div>
                        </a>
                    @endif --}}

                    {{-- @if (!empty($produk->complementary->complementary->complementary))
                        <a href="{{ route('produk.show', $produk->complementary->complementary->complementary) }}"
                            class="rounded-lg shadow-sm bg-white">
                            <img src="{{ asset('uploads/') . '/' . $produk->complementary->complementary->complementary->image }}"
                                class="aspect-square w-full bg-gray-400 rounded-t-lg object-cover" alt="">
                            <div class="p-4 pb-5">
                                <h6 class="font-encode-sans font-bold sm:text-base text-sm text-clip">
                                    {{ $hideconfig[0] != 1 ? '[' . $produk->complementary->kode_produk . ']' : '' }}
                                    {{ $produk->complementary->complementary->complementary->nama_produk }}
                                </h6>
                                <div class="flex justify-between items-center sm:my-3 my-2">

                                    <h2
                                        class="font-concert-one {{ $produk->complementary->complementary->complementary->countStock($produk->complementary->complementary->complementary) != 0 ? 'text-slate-900' : 'text-gray-400' }} xl:text-3xl text-xl">
                                        Rp.
                                        {{ $produk->complementary->complementary->complementary->stat == 'd' ? substr(number_format($produk->complementary->complementary->complementary->harga_sale, 2, ',', '.'), 0, -3) : substr(number_format($produk->complementary->complementary->complementary->harga, 2, ',', '.'), 0, -3) }}
                                    </h2>
                                    <div class="flex space-x-2">
                                        @if ($produk->stat == 'po')
                                            <h6
                                                class="py-1 px-2 rounded-md bg-amber-400 text-white font-encode-sans font-bold text-sm sm:text-base">
                                                PO
                                            </h6>
                                        @endif
                                        @if ($hideconfig[1] == 1)
                                            @if ($produk->countStock($produk) == 0)
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
                                        <del>Rp.
                                            {{ substr(number_format($produk->complementary->complementary->complementary->harga, 2, ',', '.'), 0, -3) }}</del>
                                    </h6>
                                @endif
                            </div>
                        </a>
                    @endif --}}

                    {{-- @if (!empty($produk->complementary->complementary->complementary->complementary))
                        <a href="{{ route('produk.show', $produk->complementary->complementary->complementary->complementary) }}"
                            class="rounded-lg shadow-sm bg-white">
                            <img src="{{ asset('uploads/') . '/' . $produk->complementary->complementary->complementary->complementary->image }}"
                                class="aspect-square w-full bg-gray-400 rounded-t-lg object-cover" alt="">
                            <div class="p-4 pb-5">
                                <h6 class="font-encode-sans font-bold sm:text-base text-sm text-clip">
                                    {{ $hideconfig[0] != 1 ? '[' . $produk->complementary->kode_produk . ']' : '' }}
                                    {{ $produk->complementary->complementary->complementary->complementary->nama_produk }}
                                </h6>
                                <div class="flex justify-between items-center sm:my-3 my-2">

                                    <h2
                                        class="font-concert-one {{ $produk->complementary->complementary->complementary->complementary->countStock($produk->complementary->complementary->complementary->complementary) != 0 ? 'text-slate-900' : 'text-gray-400' }} xl:text-3xl text-xl">
                                        Rp.
                                        {{ $produk->complementary->complementary->complementary->complementary->stat == 'd' ? substr(number_format($produk->complementary->complementary->complementary->complementary->harga_sale, 2, ',', '.'), 0, -3) : substr(number_format($produk->complementary->complementary->complementary->complementary->harga, 2, ',', '.'), 0, -3) }}
                                    </h2>
                                    <div class="flex space-x-2">
                                        @if ($produk->stat == 'po')
                                            <h6
                                                class="py-1 px-2 rounded-md bg-amber-400 text-white font-encode-sans font-bold text-sm sm:text-base">
                                                PO
                                            </h6>
                                        @endif
                                        @if ($hideconfig[1] == 1)
                                            @if ($produk->countStock($produk) == 0)
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
                                        <del>Rp.
                                            {{ substr(number_format($produk->complementary->complementary->complementary->complementary->harga, 2, ',', '.'), 0, -3) }}</del>
                                    </h6>
                                @endif
                            </div>
                        </a>
                    @endif --}}
                {{-- </div>
            </div>
        @endif --}}
    </div>

    <script>
        // let modal = document.getElementById("my-modal");
        // let modalbg = document.getElementById("my-modal-bg");
        // let btn = document.getElementById("open-modal");
        // let button = document.getElementById("close-modal");

        // // We want the modal to open when the Open button is clicked
        // btn.onclick = function () {
        //     modal.style.display = "block";
        //     modalbg.style.display = "block";

        //     // Get the current page scroll position
        //     scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        //     scrollLeft = window.pageXOffset || document.documentElement.scrollLeft,

        //         // if any scroll is attempted, set this to the previous value
        //         window.onscroll = function () {
        //             window.scrollTo(scrollLeft, scrollTop);
        //         };
        // }
        // // We want the modal to close when the OK button is clicked
        // button.onclick = function () {
        //     modal.style.display = "none";
        //     modalbg.style.display = "none";
        //     window.onscroll = function () {};
        // }

        // window.onclick = function (event) {
        //     if (event.target == modalbg) {
        //         modal.style.display = "none";
        //         modalbg.style.display = "none";
        //         window.onscroll = function () {};
        //     }
        // }

        //+ - button
        function increment() {
            document.getElementById('numbersize').stepUp();
        }

        function decrement() {
            if (document.getElementById('numbersize').value <= 1) {} else {
                document.getElementById('numbersize').stepDown();
            }

        }

        function switchImg(i) {
            document.images["productimg"].src = i;
        }
    </script>

    @include('inc.footer2')

@endsection
