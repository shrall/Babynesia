@extends('layouts.app')
@section('content')

    @include('inc.navbar1')

    <div class="container mx-auto xl:px-32 px-3 xl:pt-6 xl:pb-10 pt-3 pb-5">
        @if (session('alert'))
            <div class="w-full bg-white rounded-md shadow-sm py-2 px-3">
                <p class="font-encode-sans text-red-500 text-center">
                    {{ session('alert') }}
                </p>
            </div>
        @endif
        <form action="{{ route('user.detailcart.customdestroy') }}" method="post" id="customdestroy">@csrf</form>
        @csrf
        <div class="w-full bg-white rounded-md shadow-sm py-2 px-3">
            <p class="text-{{ $color[1] }}-500 text-sm sm:text-base font-encode-sans">
                Cart
            </p>
            <div class="flex justify-between items-center">

                <h1 class="font-concert-one text-3xl text-{{ $color[1] }}-500 xl:text-4xl">
                    Cart
                </h1>
                @if (!empty($carts[0]))
                    <button type="submit" form="customdestroy"
                        class="py-1 px-2 rounded-full border-red-500 border-2 text-red-500 text-sm hover:bg-red-500 hover:text-white text-center font-bold font-encode-sans">
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
                <form action="{{ route('user.detailcart.update', $cart) }}" method="post"
                    id="updatecart{{ $cart->no_detail_cart }}" enctype="multipart/form-data">@csrf
                    @method('PATCH')</form>
                <input type="hidden" name="idcart" value="{{ $cart->no_detail_cart }}" id="idcart"
                    form="updatecart{{ $cart->no_detail_cart }}">
                <div class="sm:grid sm:grid-cols-4">
                    <div class="flex sm:col-span-3">
                        <div class="w-20 sm:w-28">
                            <img src="{{ asset('uploads/') . '/' . $cart->produk->image }}" alt=""
                                class="aspect-square w-full rounded-md object-cover bg-gray-400">
                        </div>
                        <div class="ml-2 sm:w-vw-30">
                            <h6 class="font-bold font-encode-sans text-base sm:text-lg text-clip text-slate-900">
                                {{ $hideconfig[0] != 1 ? '[' . $cart->produk->kode_produk . ']' : '' }}
                                {{ $cart->produk->nama_produk }}
                            </h6>
                            @if (!empty($cart->produkstock->size))
                                @if (!empty($cart->produkstock->color))
                                    <h6 class="font-encode-sans text-sm sm:text-base text-gray-400">
                                        {{ $cart->produkstock->size }} - {{ $cart->produkstock->color }}
                                    </h6>
                                @else
                                    <h6 class="font-encode-sans text-sm sm:text-base text-gray-400">
                                        {{ $cart->produkstock->size }}
                                    </h6>
                                @endif
                            @else
                                @if (!empty($cart->produkstock->color))
                                    <h6 class="font-encode-sans text-sm sm:text-base text-gray-400">
                                        {{ $cart->produkstock->color }}
                                    </h6>
                                @endif
                            @endif

                            <div>
                                <p class="font-encode-sans text-sm text-slate-900 sm:text-base">
                                    Rp.
                                    {{ $cart->produk->stat == 'd'? substr(number_format($cart->produk->harga_sale, 2, ',', '.'), 0, -3): substr(number_format($cart->produk->harga, 2, ',', '.'), 0, -3) }}
                                </p>
                                @if ($cart->produk->stat == 'd')
                                    <p class="font-encode-sans text-sm text-gray-400">
                                        <del>Rp. {{ substr(number_format($cart->produk->harga, 2, ',', '.'), 0, -3) }}</del>
                                    </p>
                                @endif
                                @if ($cart->produk->stat == 'po')
                                    <h6
                                        class="py-1 px-2 text-sm rounded-md bg-amber-400 text-white font-encode-sans font-bold">
                                        PO
                                    </h6>
                                @endif
                            </div>

                        </div>
                    </div>
                    <div class="hidden sm:block border-l-2 border-gray-100 pl-4">
                        <div class="flex items-center">
                            <p class="font-encode-sans text-sm text-slate-900 sm:text-base">
                                <input type="number" form="updatecart{{ $cart->no_detail_cart }}"
                                    value="{{ $cart->jumlah }}" name="jumlah1"
                                    class="bg-neutral-100 border font-encode-sans w-7 text-center rounded-sm"
                                    id="inputnumber{{ $cart->jumlah }}"> x
                                Rp.
                                {{ $cart->produk->stat == 'd'? substr(number_format($cart->produk->harga_sale, 2, ',', '.'), 0, -3): substr(number_format($cart->produk->harga, 2, ',', '.'), 0, -3) }}
                            </p>
                            <button type="submit" form="updatecart{{ $cart->no_detail_cart }}"
                                class="ml-2 bg-{{ $color[1] }}-500 hover:bg-{{ $color[1] }}-600 focus:ring-{{ $color[1] }}-300 rounded-full py-1 px-2 text-center text-sm sm:text-base text-white font-encode-sans font-bold">
                                <p class="font-encode-sans font-bold text-white text-sm">Edit</p>
                            </button>
                        </div>
                        <div class="mt-4">
                            <p class="font-encode-sans text-sm sm:text-base text-gray-400">
                                Total Harga
                            </p>
                            <h6 class="font-encode-sans font-bold text-slate-900">
                                Rp.
                                {{ $cart->produk->stat == 'd'? substr(number_format($cart->produk->harga_sale * $cart->jumlah, 2, ',', '.'), 0, -3): substr(number_format($cart->produk->harga * $cart->jumlah, 2, ',', '.'), 0, -3) }}
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="sm:hidden mt-3">
                    <hr class="my-3">
                    <div class="mt-3 flex justify-between">
                        <div class="flex items-center">
                            <p class="font-encode-sans text-sm text-slate-900 sm:text-base">
                                <input type="number" form="updatecart{{ $cart->no_detail_cart }}"
                                    value="{{ $cart->jumlah }}" name="jumlah"
                                    class="bg-neutral-100 border font-encode-sans w-7 text-center rounded-sm"
                                    id="inputnumber{{ $cart->jumlah }}"> x
                                Rp.
                                {{ $cart->produk->stat == 'd'? substr(number_format($cart->produk->harga_sale, 2, ',', '.'), 0, -3): substr(number_format($cart->produk->harga, 2, ',', '.'), 0, -3) }}
                            </p>
                            <button type="submit" form="updatecart{{ $cart->no_detail_cart }}"
                                class="ml-2 bg-{{ $color[1] }}-500 hover:bg-{{ $color[1] }}-600 focus:ring-{{ $color[1] }}-300 rounded-full py-1 px-2 text-center text-sm sm:text-base text-white font-encode-sans font-bold">
                                <p class="font-encode-sans font-bold text-white text-sm">Edit</p>
                            </button>
                        </div>
                        <div class="">
                            <p class="font-encode-sans text-sm sm:text-base text-gray-400">
                                Total Harga
                            </p>
                            <h6 class="font-encode-sans font-bold text-slate-900">
                                Rp.
                                {{ $cart->produk->stat == 'd'? substr(number_format($cart->produk->harga_sale * $cart->jumlah, 2, ',', '.'), 0, -3): substr(number_format($cart->produk->harga * $cart->jumlah, 2, ',', '.'), 0, -3) }}
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @if (!empty($carts[0]))
        <form action="{{ route('user.cart.index') }}" method="get" id="checkVoucher">@csrf</form>
        <div class="w-full bg-white rounded-md shadow-sm mt-3 px-3 py-5">
            <div>
                <label for="voucher"
                    class="font-encode-sans font-bold text-slate-900 text-sm sm:text-base">
                    Kode Voucher (Opsional)
                </label>
            </div>
            <div>
                <input id="voucher" form="checkVoucher" type="text" value="{{ $voucher != null ? $voucher->code : null }}"
                class="appearance-none border p-1 mt-2 rounded-md bg-neutral-100" name="voucher">
    
                <button type="submit" form="checkVoucher"
                    class="ml-2 bg-{{ $color[1] }}-500 hover:bg-{{ $color[1] }}-600 focus:ring-{{ $color[1] }}-300 rounded-full py-1 px-2 text-center text-sm sm:text-base text-white font-encode-sans font-bold">
                    <p class="font-encode-sans font-bold text-white text-sm">Check</p>
                </button>    
            </div>
            @if ($textVoucher != "")
                <p class="font-encode-sans {{ $textVoucher == "Voucher berhasil digunakan" ? 'text-green-500' : 'text-red-500' }} text-sm sm:text-base">{{ $textVoucher }}</p>
            @endif
        </div>
        <div class="w-full bg-white rounded-md shadow-sm mt-3 px-3 py-5">
            <div class="font-encode-sans font-bold text-slate-900 text-sm sm:text-base">
                Harga
            </div>
            @if ($voucher != null)
            <div class="flex justify-between mt-2">
                <h2 class="font-encode-sans text-slate-900 text-sm sm:text-base">
                    Subtotal
                </h2>
                <p class="font-encode-sans text-sm sm:text-base text-slate-900">
                    Rp. {{ substr(number_format($total, 2, ',', '.'), 0, -3) }}
                </p>
            </div>
            <div class="flex justify-between mt-1">
                <h2 class="font-encode-sans text-slate-900 text-sm sm:text-base">
                    Potongan Voucher ({{ $voucher->vouchertype_id == 1 ? $voucher->amount."%" : "Rp. ".substr(number_format($voucher->amount, 2, ',', '.'), 0, -3) }})
                </h2>
                <p class="font-encode-sans text-sm sm:text-base text-slate-900">
                    Rp. {{ substr(number_format($voucher->vouchertype_id == 1 ? $total*($voucher->amount/100) : $voucher->amount, 2, ',', '.'), 0, -3) }}
                </p>
            </div>
            <div class="flex justify-between mt-1">
                <h2 class="font-encode-sans text-slate-900 text-sm sm:text-base">
                    Total
                </h2>
                <p class="font-encode-sans text-sm sm:text-base font-bold text-slate-900">
                    Rp. {{ substr(number_format($voucher->vouchertype_id == 1 ? $total - ($total*($voucher->amount/100)) : $total - $voucher->amount, 2, ',', '.'), 0, -3) }}
                </p>
            </div>
            @else
            <div class="flex justify-between mt-1">
                <h2 class="font-encode-sans text-slate-900 text-sm sm:text-base">
                    Total
                </h2>
                <p class="font-encode-sans text-sm sm:text-base font-bold text-slate-900">
                    Rp. {{ substr(number_format($total, 2, ',', '.'), 0, -3) }}
                </p>
            </div>
            @endif
        </div>
            <form action="{{ route('user.receiver.create') }}" method="get">
                @csrf
                <div class="xl:flex xl:items-start">
                    <div class="w-full bg-white rounded-md shadow-sm mt-3 px-3 py-5 xl:w-8/10">
                        <div>
                            <label for="catatan-tambahan"
                                class="font-encode-sans font-bold text-slate-900 text-sm sm:text-base">
                                Catatan Tambahan
                            </label>
                        </div>
                        <textarea name="note" id="catatan-tambahan"
                            class="mt-2 py-1 px-2 appearance-none bg-neutral-100 border-2 rounded-lg w-full"></textarea>
                        <input type="hidden" value="{{ $voucher != null ? $voucher->id : null }}" name="voucher">
                        <div class="xl:hidden">
                            <div class="text-center mt-2">
                                <button type="submit"
                                    class="border-2 border-{{ $color[2] }}-400 hover:bg-{{ $color[2] }}-400 hover:text-white font-bold font-encode-sans text-{{ $color[2] }}-400 px-8 py-2 rounded-full">
                                    Next Step
                                </button>
                            </div>
                            <div class="text-center mt-1">
                                <a href="{{ route('list_products') }}"
                                    class="font-encode-sans text-gray-400 text-sm sm:text-base">
                                    Continue Shopping
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="ml-3 hidden xl:block">
                        <div class="text-center mt-2">
                            <button type="submit"
                                class="w-full border-2 border-{{ $color[2] }}-400 bg-white hover:bg-{{ $color[2] }}-400 hover:text-white font-bold font-encode-sans text-{{ $color[2] }}-400 px-8 py-2 rounded-full">
                                Next Step
                            </button>
                        </div>
                        <div class="text-center mt-4">
                            <a href="{{ route('list_products') }}"
                                class="w-full border-2 border-gray-400 hover:bg-neutral-100 hover:border-gray-300 hover:text-gray-300 bg-white font-bold font-encode-sans text-gray-400 px-4 py-2 rounded-full">
                                Continue Shopping
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        @endif
    </div>

    @include('inc.footer1')

@endsection
