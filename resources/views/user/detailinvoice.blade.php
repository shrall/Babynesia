@extends('layouts.app')
@section('title', 'TokoBayiFiv')
@section('content')

@include('inc.navbar1')

<div class="container mx-auto xl:px-40 px-3 xl:pt-6 xl:pb-10 pt-3 pb-5">
    <div class="w-full bg-white rounded-md shadow-sm py-3 px-3 flex justify-between">
        <h1 class="font-concert-one text-3xl text-sky-500 xl:text-4xl">
            Invoice
        </h1>
        <a href="{{ route('user.faktur.showfaktur', $faktur) }}" target="_blank" class="py-2 px-4 rounded-full bg-sky-500 hover:bg-sky-600 text-white font-bold font-encode-sans">
            <i class="fa fa-print mr-1" aria-hidden="true"></i>
            Print
        </a>
    </div>
    
    <div class="w-full bg-white rounded-md shadow-sm mt-3 px-8 pt-7 pb-10">
        <div class="flex justify-between items-center">
            <h1 class="font-concert-one text-4xl text-sky-500">{{ $faktur->sender_name }}</h1>
            <h2 class="font-concert-one text-3xl text-pink-400">Invoice</h2>
        </div>
        <div class="mt-4 grid grid-cols-3 sm:grid-cols-4">
            <div class="col-span-2 flex">
                <ul class="font-encode-sans text-gray-400">
                    <li>Name</li>
                    <li>Email</li>
                    <li>Phone</li>
                </ul>
                <ul class="ml-7 font-encode-sans text-gray-400">
                    <li>:</li>
                    <li>:</li>
                    <li>:</li>
                </ul>
                <ul class="ml-2 font-encode-sans text-slate-900">
                    <li>{{ Auth::user()->name }}</li>
                    <li>{{ Auth::user()->email }}</li>
                    <li>{{ Auth::user()->telp }}</li>
                </ul>
            </div>
            <div class="text-center hidden sm:block">
                <p class="font-encode-sans">Invoice No.</p>
                <h6 class="font-encode-sans font-bold text-slate-900">{{ $faktur->no_faktur }}</h6>
            </div>
            <div class="text-right">
                <p class="font-encode-sans sm:hidden">Invoice No.</p>
                <h6 class="font-encode-sans font-bold text-slate-900 sm:hidden">{{ $faktur->no_faktur }}</h6>

                <p class="font-encode-sans mt-2 sm:mt-0">Date</p>
                <h6 class="font-encode-sans font-bold text-slate-900">{{ $faktur->tanggal }}</h6>
            </div>
        </div>
        <div class="my-6">
            <table class="table-auto w-full">
                <thead class="bg-blue-300 font-encode-sans font-bold text-white">
                    <tr class="">
                        <th class="py-3">Quantity</th>
                        <th class="py-3 text-left">Product</th>
                        <th class="py-3 text-left">Note</th>
                        <th class="py-3 text-left">Price</th>
                        <th class="py-3 text-left">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="font-encode-sans text-slate-900">
                    @foreach ($faktur->items as $item)
                        
                    <tr class="even:bg-neutral-100">
                        <td class="text-center py-3">{{ $item->jumlah }}</td>
                        <td class="py-3 text-clip">{{ $item->product->nama_produk }}</td>
                        <td class="py-3 text-left">{{ $item->note }}</td>
                        <td class="py-3">Rp. {{ substr(number_format($item->harga_satuan,2,",","."), 0, -3) }}</td>
                        <td class="py-3">Rp. {{ substr(number_format($item->subtotal,2,",","."), 0, -3) }}</td>
                    </tr>

                    @endforeach
                </tbody>
                <tfoot class="bg-blue-300 font-bold font-encode-sans text-white">
                    <tr>
                        <td colspan="3" class="py-3">&nbsp;</td>
                        <td class="py-3 text-left">Subtotal</td>
                        <td class="py-3">Rp. {{ substr(number_format($faktur->total_pembayaran,2,",","."), 0, -3) }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="py-3">&nbsp;</td>
                        <td class="py-3 text-left">Ongkos kirim ({{ $faktur->deliveryExpedition }})</td>
                        <td class="py-3">Rp. {{ substr(number_format($faktur->deliverycost,2,",","."), 0, -3) }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="py-3">&nbsp;</td>
                        <td class="py-3 text-left">Total</td>
                        <td class="py-3">Rp. {{ substr(number_format($faktur->total_pembayaran+$faktur->deliverycost,2,",","."), 0, -3) }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="flex justify-between">
            <div>
                <h6 class="font-encode-sans font-bold text-slate-900">
                    Receiver
                </h6>
                <div class="flex">
                    <ul class="font-encode-sans text-gray-400">
                        <li>Name</li>
                        <li>Address</li>
                        <li>City</li>
                        <li>Province</li>
                        <li>Phone</li>
                        <li>Handphone</li>
                    </ul>
                    <ul class="ml-7 font-encode-sans text-gray-400">
                        <li>:</li>
                        <li>:</li>
                        <li>:</li>
                        <li>:</li>
                        <li>:</li>
                        <li>:</li>
                    </ul>
                    <ul class="ml-2 font-encode-sans text-gray-400">
                        <li>{{ $faktur->receiver->receiver_name }}</li>
                        <li>{{ $faktur->receiver->address }}</li>
                        <li>{{ $faktur->receiver->city }}</li>
                        <li>{{ $faktur->receiver->province }}</li>
                        <li>{{ $faktur->receiver->phone }}</li>
                        <li>{{ $faktur->receiver->hp }}</li>
                    </ul>
                </div>
            </div>
            <div class="text-right">
                <h6 class="font-encode-sans font-bold text-slate-900">
                    Payment
                </h6>
                <div class="mt-2">
                    <h6 class="font-encode-sans font-bold text-slate-900">
                        BCA
                    </h6>
                    <p class="font-encode-sans text-gray-400">
                        8620.101.070
                    </p>
                </div>
                <div class="mt-2">
                    <h6 class="font-encode-sans font-bold text-slate-900">
                        Mandiri
                    </h6>
                    <p class="font-encode-sans text-gray-400">
                        142.000.7984.502
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full text-center mt-3">
        <a href="{{ route('user.user.index') }}"
            class="inline-block border-2 border-pink-400 bg-white font-bold font-encode-sans text-pink-400 px-8 py-2 rounded-full">
            Kembali
        </a>
    </div>
</div>

@include('inc.footer1')
@endsection