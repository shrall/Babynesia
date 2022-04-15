@extends('layouts.app')
@section('title', 'TokoBayiFiv')
@section('content')

@include('inc.navbar1')

<div class="container mx-auto xl:px-32 px-3 xl:pt-6 xl:pb-10 pt-3 pb-5">
    <div class="w-full bg-white rounded-md shadow-sm py-2 px-3">
        <p class="text-{{ $color[1] }}-500 text-sm sm:text-base font-encode-sans">
            <a href="{{ route('user.cart.index') }}" class="text-gray-400">Cart > </a>
            <a href="{{ route('user.receiver.create') }}" class="text-gray-400">Receiver ></a>
            <a href="{{ route('user.paymentart.index') }}" class="text-gray-400">Payment ></a>
            <a href="{{ route('user.detailcart.index') }}">Confirmation</a>
        </p>
        <h1 class="font-concert-one text-3xl text-{{ $color[1] }}-500 xl:text-4xl">
            Confirmation
        </h1>
    </div>
    <div class="w-full bg-white rounded-md shadow-sm mt-3 px-3 pt-3 pb-7 xl:px-4">
        <h6 class="text-slate-900 font-bold font-encode-sans mb-5 text-sm sm:text-base">
            Ordered Products
        </h6>
        @foreach ($carts as $cart)
        <div class="w-full">
            <div class="sm:grid sm:grid-cols-4">
                <div class="flex sm:col-span-3">
                    <div class="w-20 sm:w-28">
                        <img src="http://www.tokobayifiv.com/images/produk/{{ $cart->produk->image }}" alt=""
                            class="aspect-square w-full rounded-md object-cover bg-gray-400">
                    </div>
                    <div class="ml-2 sm:w-vw-30">
                        <h6 class="font-bold font-encode-sans text-base sm:text-lg text-clip text-slate-900">
                            {{ $hideconfig[0] != 1 ? '['. $cart->produk->kode_produk .']' : '' }}
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
                                {{ $cart->produk->stat == 'd' ? substr(number_format($cart->produk->harga_sale,2,",","."), 0, -3) : substr(number_format($cart->produk->harga,2,",","."), 0, -3) }}
                            </p>
                            @if ($cart->produk->stat == 'd')
                            <p class="font-encode-sans text-sm text-gray-400">
                                <del>Rp. {{ substr(number_format($cart->produk->harga,2,",","."), 0, -3) }}</del>
                            </p>
                            @endif
                            @if($cart->produk->stat == 'po')
                            <h6 class="py-1 px-2 text-sm rounded-md bg-amber-400 text-white font-encode-sans font-bold">
                                PO
                            </h6>
                            @endif
                        </div>
                        {{-- <div class="hidden sm:block">
                            <label for="note{{ $cart->no_detail_cart }}"
                        class="font-encode-sans text-gray-400 text-sm sm:text-base">Note:</label>
                    </div>
                    <textarea name="cartnote" form="updatecart" id="note{{ $cart->no_detail_cart }}"
                        class="hidden w-full sm:block font-encode-sans border text-gray-400 rounded-md bg-neutral-100 py-1 px-2 text-sm mt-1">{{ $cart->note }}</textarea>
                    --}}

                </div>
            </div>
            <div class="hidden sm:block border-l-2 border-gray-100 pl-4">
                <p class="font-encode-sans text-sm text-slate-900 sm:text-base">
                    {{ $cart->jumlah }} x
                    Rp.
                    {{ $cart->produk->stat == 'd' ? substr(number_format($cart->produk->harga_sale,2,",","."), 0, -3) : substr(number_format($cart->produk->harga,2,",","."), 0, -3) }}
                </p>
                <div class="mt-4">
                    <p class="font-encode-sans text-sm sm:text-base text-gray-400">
                        Total Harga
                    </p>
                    <h6 class="font-encode-sans font-bold text-slate-900">
                        Rp.
                        {{ $cart->produk->stat == 'd' ? substr(number_format($cart->produk->harga_sale*$cart->jumlah,2,",","."), 0, -3) : substr(number_format($cart->produk->harga*$cart->jumlah,2,",","."), 0, -3) }}
                    </h6>
                </div>
            </div>
        </div>
        <div class="sm:hidden mt-3">
            {{-- <div>
                    <label for="note{{ $cart->no_detail_cart }}1"
            class="font-encode-sans text-gray-400 text-sm sm:text-base">Note:</label>
        </div>
        <textarea name="cartnote1" id="note{{ $cart->no_detail_cart }}1" form="updatecart"
            class="w-full border font-encode-sans text-gray-400 rounded-md bg-neutral-100 py-1 px-2 text-sm mt-1">{{ $cart->note }}</textarea>
        --}}
        <hr class="my-3">
        <div class="mt-3 flex justify-between">
            <p class="font-encode-sans text-sm text-slate-900 sm:text-base">
                {{ $cart->jumlah }} x
                Rp.
                {{ $cart->produk->stat == 'd' ? substr(number_format($cart->produk->harga_sale,2,",","."), 0, -3) : substr(number_format($cart->produk->harga,2,",","."), 0, -3) }}
            </p>
            <div class="">
                <p class="font-encode-sans text-sm sm:text-base text-gray-400">
                    Total Harga
                </p>
                <h6 class="font-encode-sans font-bold text-slate-900">
                    Rp.
                    {{ $cart->produk->stat == 'd' ? substr(number_format($cart->produk->harga_sale*$cart->jumlah,2,",","."), 0, -3) : substr(number_format($cart->produk->harga*$cart->jumlah,2,",","."), 0, -3) }}
                </h6>
            </div>
        </div>
    </div>
</div>
<hr class="my-3">
@endforeach
<div class="flex justify-between sm:grid sm:grid-cols-4">
    <div class="sm:col-span-3">
        &nbsp;
    </div>
    <div class="sm:pl-4">
        <p class="font-encode-sans text-gray-400 text-sm sm:text-base">
            Subtotal
        </p>
        <h6 class="text-slate-900 font-encode-sans font-bold">
            Rp. {{ substr(number_format($total,2,",","."), 0, -3) }}
        </h6>
    </div>
</div>

</div>
<div class="w-full bg-white rounded-md shadow-sm mt-3 px-3 pt-3 pb-7 xl:px-4">
    <h6 class="text-slate-900 font-bold font-encode-sans text-sm sm:text-base">
        Catatan Tambahan
    </h6>
    <div class="mt-3 p-2 rounded-lg border bg-neutral-100 text-sm sm:text-base font-encode-sans text-slate-900">
        {{ !empty($request->note) ? $request->note : 'tidak ada catatan tambahan.' }}
    </div>
</div>
<div class="w-full bg-white rounded-md shadow-sm mt-3 px-3 pt-3 pb-7 xl:px-4">
    <h6 class="text-slate-900 font-bold font-encode-sans text-sm sm:text-base">
        Delivery Cost
    </h6>
    <div class="mt-3 px-7">
        <p class="font-encode-sans text-gray-400 text-sm sm:text-base">
            Biaya ongkos kirim akan di informasikan melalui email. <br>
            Perhitungan ongkos kirim:
        </p>
        <div class="ml-5 flex">
            <ul class="text-gray-400 list-disc text-sm sm:text-base">
                <li>
                    Dari
                </li>
                <li>
                    Tujuan
                </li>
                <li>
                    Berat
                </li>
                <li>
                    Ekspedisi
                </li>
                <li>
                    Ongkos kirim
                </li>
            </ul>
            <ul class="ml-5">
                <li>:</li>
                <li>:</li>
                <li>:</li>
                <li>:</li>
                <li>:</li>
            </ul>
            <ul class="font-encode-sans text-slate-900 text-sm sm:text-base ml-2">
                <li>Gudang</li>
                <li>{{ $city }}</li>
                <li>+- {{ $berat }} kg</li>
                <li>{{ $request->delivery }}</li>
                @if ($deliveryCost == -1)
                <li>Ongkos kirim akan diinformasikan terpisah</li>
                @else
                <li>Rp. {{ substr(number_format($deliveryCost,2,",","."), 0, -3) }}</li>
                @endif
            </ul>
        </div>
    </div>
</div>
<div class="sm:grid sm:grid-cols-2 sm:gap-3">
    <div class="w-full bg-white rounded-md shadow-sm mt-3 px-3 pt-3 pb-7 xl:px-4">
        <h6 class="font-encode-sans font-bold text-slate-900 text-sm sm:text-base">Receiver</h6>
        <div class="px-7 mt-3 flex">
            <ul class="font-encode-sans text-gray-400 text-sm sm:text-base">
                <li>Name</li>
                <li>Address</li>
                <li>City</li>
                <li>Province</li>
                <li>Phone</li>
                <li>Handphone</li>
            </ul>
            <ul class="ml-7 font-encode-sans text-gray-400 text-sm sm:text-base">
                <li>:</li>
                <li>:</li>
                <li>:</li>
                <li>:</li>
                <li>:</li>
                <li>:</li>
            </ul>
            <ul class="ml-2 font-encode-sans text-slate-900 text-sm sm:text-base">
                <li>{{ $request->receiver_name }}</li>
                <li>{{ $request->address }}</li>
                <li>{{ $city }}</li>
                <li>{{ $province }}</li>
                <li>{{ $request->phone }}</li>
                <li>{{ $request->hp }}</li>
            </ul>
        </div>
    </div>
    <div class="w-full bg-white rounded-md shadow-sm mt-3 px-3 pt-3 pb-7 xl:px-4">
        <h6 class="font-encode-sans font-bold text-slate-900 text-sm sm:text-base">Payment</h6>
        <div class="px-7 mt-3">
            <ul class="list-disc space-y-2">
                <li>
                    <div>
                        <h6 class="text-sm sm:text-base font-bold text-slate-900">
                            {{ $payment->info }}
                        </h6>
                        <p class="text-gray-400 font-encode-sans text-sm sm:text-base">
                            {{ $payment->description }}
                            {{-- <i class="fa fa-copy ml-1 text-{{ $color[0] }}-400 border p-1 rounded-md
                            border-{{ $color[0] }}-400"
                            aria-hidden="true"></i> --}}
                        </p>
                    </div>
                </li>
            </ul>
        </div>
        <h6 class="font-bold mt-4 font-encode-sans text-red-500 text-sm sm:text-base">
            Penting!
        </h6>
        <p class="ml-3 mt-3 font-encode-sans text-gray-400 text-sm sm:text-base">
            Sertakan nomor pesanan (invoice number) sebagai berita pada saat Anda melakukan transfer.
            Nomor Pesanan akan anda terima melalui email kemudian.
        </p>
    </div>
</div>

<div class="w-full bg-white rounded-md shadow-sm mt-3 px-3 py-3 xl:px-4">
    <h6 class="font-encode-sans font-bold text-slate-900 text-sm sm:text-base">Rincian Pembayaran</h6>
    <table class="table-auto w-full mb-5 mt-3">
        <thead class="bg-{{ $color[0] }}-300 font-encode-sans font-bold text-white">
            <tr class="">
                <th class="py-3 text-left ml-3">&nbsp;&nbsp;&nbsp;Keterangan</th>
                <th class="py-3 text-left">Harga</th>
            </tr>
        </thead>
        <tbody class="font-encode-sans text-slate-900">
            <tr class="even:bg-neutral-100">
                <td class="py-3 ml-3">&nbsp;&nbsp;&nbsp;Subtotal Produk</td>
                <td class="py-3">Rp. {{ substr(number_format($total,2,",","."), 0, -3) }}</td>
            </tr>
            <tr class="even:bg-neutral-100">
                <td class="py-3 ml-3">&nbsp;&nbsp;&nbsp;Ongkos kirim</td>
                <td class="py-3">Rp. {{ substr(number_format($deliveryCost,2,",","."), 0, -3) }}</td>
            </tr>
        </tbody>
        <tfoot class="bg-{{ $color[0] }}-300 font-bold font-encode-sans text-white">
            <tr>
                <td class="py-3 text-left">&nbsp;&nbsp;&nbsp;Total</td>
                <td class="py-3">Rp. {{ substr(number_format($total + $deliveryCost,2,",","."), 0, -3) }}</td>
            </tr>
        </tfoot>
    </table>
</div>

<form action="{{ route('user.faktur.store') }}" method="post">
    @csrf
    @if ($request->dropship == 'yes')
    <input type="hidden" value="{{ $request->pengirim_name }}" name="pengirim_name">
    <input type="hidden" value="{{ $request->pengirim_address }}" name="pengirim_address">
    <input type="hidden" value="{{ $request->pengirim_hp }}" name="pengirim_hp">
    @endif
    <input type="hidden" value="{{ $request->receiver_name }}" name="receiver_name">
    <input type="hidden" value="{{ $request->address }}" name="address">
    <input type="hidden" value="{{ $request->postcode }}" name="postcode">
    <input type="hidden" value="{{ $city }}" name="city">
    <input type="hidden" value="{{ $province }}" name="province">
    <input type="hidden" value="{{ $request->delivery }}" name="delivery">
    <input type="hidden" value="{{ $request->phone }}" name="phone">
    <input type="hidden" value="{{ $request->hp }}" name="hp">
    <input type="hidden" value="{{ $payment->name }}" name="payment">
    {{-- <input type="hidden" value="{{ $request->note }}" name="note"> --}}
    <input type="hidden" value="{{ $total }}" name="total">
    <input type="hidden" value="{{ $berat }}" name="berat">
    <input type="hidden" value="{{ $jumlahCart }}" name="jumlahCart">
    <input type="hidden" value="{{ $deliveryCost }}" name="deliveryCost">
    <input type="hidden" value="{{ base64_encode(serialize($carts)) }}" name="carts">


    <div class="xl:flex xl:justify-between">
        <div class="w-full bg-white rounded-md shadow-sm mt-3 px-3 py-3 xl:px-4 xl:w-5/6">
            <div>
                <input type="checkbox" id="persetujuan" name="setuju" class="cursor-pointer" value="setuju">
                <label for="persetujuan" class="font-encode-sans text-red-500 text-sm sm:text-base cursor-pointer">
                    I certify that I have read, understand, and agree to the terms and conditions
                </label>
            </div>
            <div class="xl:hidden mt-7">
                <div class="text-center">
                    <button type="submit" id="finish" disabled
                        class="border-2 border-{{ $color[2] }}-400 hover:bg-{{ $color[2] }}-400 hover:text-white disabled:border-gray-300 disabled:text-gray-300 disabled:bg-neutral-100 bg-white font-bold font-encode-sans text-{{ $color[2] }}-400 px-8 py-2 rounded-full">
                        Finish
                    </button>
                </div>
                <div class="text-center mt-1">
                    <a href="javascript:history.back()"
                        class="font-encode-sans text-gray-400 hover:text-gray-300 text-sm sm:text-base">
                        Back
                    </a>
                </div>
            </div>
        </div>
        <div class="hidden xl:block">
            <div class="w-full text-center mt-3">
                <button type="submit" id="finish1" disabled
                    class="w-full inline-block border-2 border-{{ $color[2] }}-400 hover:bg-{{ $color[2] }}-400 hover:text-white disabled:border-gray-300 disabled:text-gray-300 disabled:bg-neutral-100 bg-white font-bold font-encode-sans text-{{ $color[2] }}-400 px-8 py-2 rounded-full">
                    Finish
                </button>
            </div>
            <div class="w-full text-center mt-2">
                <a href="javascript:history.back()"
                    class="w-full inline-block border-2 border-gray-400 hover:bg-neutral-100 hover:border-gray-300 hover:text-gray-300 bg-white font-bold font-encode-sans text-gray-400 px-8 py-2 rounded-full">
                    Back
                </a>
            </div>
        </div>
    </div>
</form>
</div>

<script>
    let setuju = document.getElementById('persetujuan');
    let finish = document.getElementById('finish');
    let finish1 = document.getElementById('finish1');

    setuju.onchange = function () {
        finish.disabled = !this.checked;
        finish1.disabled = !this.checked;
    }

</script>

@include('inc.footer1')
@endsection
