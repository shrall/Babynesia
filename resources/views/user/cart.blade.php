@extends('layouts.app')
@section('title', 'TokoBayiFiv')
@section('content')

@include('inc.navbar1')

<div class="container mx-auto xl:px-32 px-3 xl:pt-6 xl:pb-10 pt-3 pb-5">
    <form action="{{ route('user.detailcart.customdestroy') }}" method="post" id="customdestroy">@csrf</form>
    @csrf
    <div class="w-full bg-white rounded-md shadow-sm py-2 px-3">
        <p class="text-sky-500 text-sm sm:text-base font-encode-sans">
            Cart
        </p>
        <div class="flex justify-between items-center">

            <h1 class="font-concert-one text-3xl text-sky-500 xl:text-4xl">
                Cart
            </h1>
            @if (!empty($carts[0]))
            <button type="submit" form="customdestroy"
                class="py-2 px-3 rounded-full border-red-500 border-2 text-red-500 text-sm sm:text-base hover:bg-red-500 hover:text-white text-center font-bold font-encode-sans">
                <i class="fa fa-times" aria-hidden="true"></i>
                Delete
            </button>
            @endif
        </div>
    </div>

    @if (empty($carts[0]))
        <div class="w-full bg-white rounded-md shadow-sm mt-3 px-3 pt-3 h-vh-50 pb-5 flex justify-center items-center">
            <p class="font-encode-sans text-gray-400 text-sm sm:text-base">
                Tidak ada data cart
            </p>
        </div>
    @endif
    @foreach ($carts as $cart)

    <div class="w-full bg-white rounded-md shadow-sm mt-3 px-3 pt-3 pb-5">
        <div class="mb-2">
            <input type="checkbox" id="select{{ $cart->no_detail_cart }}" name="select[]" class="cursor-pointer"
                form="customdestroy" value="{{ $cart->no_detail_cart }}">
            <label for="select{{ $cart->no_detail_cart }}"
                class="font-encode-sans text-gray-400 text-sm sm:text-base ml-1 cursor-pointer">Select Cart</label>
        </div>
        <form action="{{ route('user.detailcart.update', $cart) }}" method="post" id="updatecart"
            enctype="multipart/form-data">@csrf
            @method('PATCH')</form>
        <input type="hidden" name="idcart" value="{{ $cart->no_detail_cart }}" id="idcart" form="updatecart">
        <div class="sm:flex sm:justify-between">
            <div class="flex">
                <div class="w-20 sm:w-44">
                    <img src="http://www.tokobayifiv.com/images/produk/{{ $cart->produk->image }}" alt=""
                        class="aspect-square w-full rounded-md object-cover bg-gray-400">
                </div>
                <div class="ml-2 sm:w-vw-30">
                    <h6 class="font-bold font-encode-sans text-base text-clip text-slate-900">
                        [{{ $cart->produk->kode_alias }}] {{ $cart->produk->nama_produk }}
                    </h6>
                    <p class="font-encode-sans text-sm text-gray-400 sm:text-base">
                        <input type="number" form="updatecart" value="{{ $cart->jumlah }}" name="jumlah"
                            class="bg-neutral-100 border font-encode-sans w-7 text-center rounded-sm"
                            id="inputnumber{{ $cart->jumlah }}"> barang x 
                        Rp. {{ $cart->produk->stat == 'd' ? substr(number_format($cart->produk->harga_sale,2,",","."), 0, -3) : substr(number_format($cart->produk->harga,2,",","."), 0, -3) }}
                    </p>
                    @if (!empty($cart->produkstock->size))
                    @if (!empty($cart->produkstock->color))
                    <h6
                        class="py-1 sm:py-2 sm:mt-3 mt-2 px-3 inline-block text-sm sm:text-base font-bold rounded-lg bg-blue-300 text-white font-encode-sans">
                        {{ $cart->produkstock->size }} - {{ $cart->produkstock->color }}
                    </h6>
                    @else
                    <h6
                        class="py-1 sm:py-2 sm:mt-3 mt-2 px-3 inline-block text-sm sm:text-base font-bold rounded-lg bg-blue-300 text-white font-encode-sans">
                        {{ $cart->produkstock->size }}
                    </h6>
                    @endif
                    @else
                    @if (!empty($cart->produkstock->color))
                    <h6
                        class="py-1 sm:py-2 sm:mt-3 mt-2 px-3 inline-block text-sm sm:text-base font-bold rounded-lg bg-blue-300 text-white font-encode-sans">
                        {{ $cart->produkstock->color }}
                    </h6>
                    @endif
                    @endif

                    <div class="hidden sm:block">
                        <label for="note{{ $cart->no_detail_cart }}"
                            class="font-encode-sans text-gray-400 text-sm sm:text-base">Note:</label>
                    </div>
                    <textarea name="cartnote" form="updatecart" id="note{{ $cart->no_detail_cart }}"
                        class="hidden w-full sm:block font-encode-sans border text-gray-400 rounded-md bg-neutral-100 py-1 px-2 text-sm mt-1">{{ $cart->note }}</textarea>

                </div>
            </div>
            <div class="hidden sm:block border-l-2 border-gray-100 pl-4 w-40">
                <div>
                    <p class="font-encode-sans text-sm sm:text-base text-gray-400">
                        Total Harga
                    </p>
                    <h6 class="font-encode-sans font-bold text-slate-900">
                        Rp. {{ $cart->produk->stat == 'd' ? substr(number_format($cart->produk->harga_sale*$cart->jumlah,2,",","."), 0, -3) : substr(number_format($cart->produk->harga*$cart->jumlah,2,",","."), 0, -3) }}
                    </h6>
                </div>
                <button type="submit" form="updatecart" class="appearance-none hover:text-pink-400 text-slate-900 mt-4 xl:mt-8 flex items-center">
                    <i class="fas fa-edit text-pink-400 text-2xl" aria-hidden="true"></i>
                    <p class="ml-1 font-encode-sans font-bold">Edit</p>
                </button>
            </div>
        </div>
        <div class="sm:hidden mt-3">
            <div>
                <label for="note{{ $cart->no_detail_cart }}1"
                    class="font-encode-sans text-gray-400 text-sm sm:text-base">Note:</label>
            </div>
            <textarea name="cartnote1" id="note{{ $cart->no_detail_cart }}1" form="updatecart"
                class="w-full border font-encode-sans text-gray-400 rounded-md bg-neutral-100 py-1 px-2 text-sm mt-1">{{ $cart->note }}</textarea>
            <hr class="my-3">
            <div class="mt-3 flex justify-between items-center">
                <div>
                    <p class="font-encode-sans text-sm sm:text-base text-gray-400">
                        Total Harga
                    </p>
                    <h6 class="font-encode-sans font-bold text-slate-900">
                        Rp. {{ $cart->produk->stat == 'd' ? substr(number_format($cart->produk->harga_sale*$cart->jumlah,2,",","."), 0, -3) : substr(number_format($cart->produk->harga*$cart->jumlah,2,",","."), 0, -3) }}
                    </h6>
                </div>
                <button type="submit" form="updatecart" class="appearance-none hover:text-pink-400 text-slate-900 mt-4 xl:mt-8 flex items-center">
                    <i class="fas fa-edit  text-pink-400 text-2xl" aria-hidden="true"></i>
                    <p class="ml-1 font-encode-sans text-sm font-bold">Edit</p>
                </button>
            </div>
        </div>
    </div>
    @endforeach
    @if (!empty($carts[0]))
    <form action="{{ route('user.receiver.create') }}" method="get">
        @csrf
        <div class="xl:flex xl:items-center">
            <div class="w-full bg-white rounded-md shadow-sm mt-3 px-3 py-5 xl:w-8/10">

                <div>
                    <label for="catatan-tambahan"
                        class="font-encode-sans font-bold text-slate-900 text-sm sm:text-base">
                        Catatan Tambahan
                    </label>
                </div>
                <textarea name="note" id="catatan-tambahan"
                    class="mt-2 py-1 px-2 appearance-none bg-neutral-100 border-2 rounded-lg w-full"></textarea>
                <div class="xl:hidden">
                    <div class="text-center mt-2">
                        <button type="submit"
                            class="border-2 border-pink-400 hover:bg-pink-400 hover:text-white font-bold font-encode-sans text-pink-400 px-8 py-2 rounded-full">
                            Next Step
                        </button>
                    </div>
                    <div class="text-center mt-1">
                        <a href="{{ route('user.list_products') }}"
                            class="font-encode-sans text-gray-400 text-sm sm:text-base">
                            Continue Shopping
                        </a>
                    </div>
                </div>

            </div>
            <div class="ml-3 hidden xl:block">
                <div class="text-center mt-2">
                    <button type="submit"
                        class="w-full border-2 border-pink-400 bg-white hover:bg-pink-400 hover:text-white font-bold font-encode-sans text-pink-400 px-8 py-2 rounded-full">
                        Next Step
                    </button>
                </div>
                <div class="text-center mt-4">
                    <a href="{{ route('user.list_products') }}"
                        class="w-full border-2 border-gray-400 hover:bg-neutral-100 hover:border-gray-300 hover:text-gray-300 bg-white font-bold font-encode-sans text-gray-400 px-4 py-2 rounded-full">
                        Continue Shopping
                    </a>
                </div>
            </div>
        </div>
    </form>
    @endif
</div>
{{-- 
<!-- Main modal -->
@foreach ($carts as $cart)
    
<div id="modal-edit-{{ $cart->no_detail_cart }}" aria-hidden="true"
class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center h-modal
md:h-full md:inset-0">
<div class="relative px-4 w-full max-w-2xl h-full md:h-auto">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow">
        <!-- Modal header -->
        <div class="p-5 rounded-t border-b">
            <div class="flex justify-between items-start">
                <h3 class="text-3xl sm:text-4xl font-concert-one text-sky-500">
                    Edit Cart #{{ $loop->iteration }}
                </h3>
                <button type="button" class="appearance-none"
                    data-modal-toggle="modal-edit-{{ $cart->no_detail_cart }}">
                    <i class="appearance-none fa fa-times text-3xl text-red-500" aria-hidden="true"></i>
                </button>
            </div>
            <p class="font-encode-sans text-slate-900 text-sm sm:text-base">
                {{ $cart->produk->nama_produk }}
            </p>
        </div>
        <!-- Modal body -->
        <div class="p-6 space-y-4">
            <form action="{{ route('user.detailcart.update', $cart) }}" method="post">
                @csrf
                <input type="hidden" name="_method" value="PATCH">
                <div>
                    <div>
                        <label for="jumlah{{ $cart->no_detail_cart }}"
                            class="text-sm font-encode-sans text-slate-900">Jumlah</label>
                    </div>
                    <input name="jumlah" id="jumlah{{ $cart->no_detail_cart }}" type="number"
                        value="{{ $cart->jumlah }}" required
                        class="border-sky-500 border appearance-none w-full rounded-lg p-1 text-slate-900 font-encode-sans">
                </div>
                <div class="mt-3">
                    <div>
                        <label for="note{{ $cart->no_detail_cart }}"
                            class="text-sm font-encode-sans text-slate-900">Catatan
                            (size/color/etc)</label>
                    </div>
                    <textarea name="note" id="note{{ $cart->no_detail_cart }}" cols="20" required
                        class="border-sky-500 border appearance-none w-full rounded-lg p-1 text-slate-900 font-encode-sans">{{ $cart->note }}</textarea>
                    <button type="submit"
                        class="mt-5 bg-sky-500 hover:bg-sky-600 focus:ring-sky-300 rounded-full py-3 w-full inline-block text-center text-sm sm:text-base text-white font-encode-sans font-bold">
                        Edit
                    </button>
                </div>
            </form>
        </div>
        <!-- Modal footer -->
    </div>
</div>
</div>

@endforeach --}}

@include('inc.footer1')

@endsection
