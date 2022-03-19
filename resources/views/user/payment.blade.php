@extends('layouts.app')
@section('title', 'TokoBayiFiv')
@section('content')

@include('inc.navbar1')

<div class="container mx-auto xl:px-32 px-3 xl:pt-6 xl:pb-10 pt-3 pb-5">
    <div class="w-full bg-white rounded-md shadow-sm py-2 px-3">
        <p class="text-{{ $color[1] }}-500 text-sm sm:text-base font-encode-sans">
            <a href="{{ route('user.cart.index') }}" class="text-gray-400">Cart > </a>
            <a href="{{ route('user.receiver.create') }}" class="text-gray-400">Receiver ></a>
            <a href="{{ route('user.paymentart.index') }}">Payment</a>
        </p>
        <h1 class="font-concert-one text-3xl text-{{ $color[1] }}-500 xl:text-4xl">
            Payment
        </h1>
    </div>
    <form action="{{ route('user.detailcart.index') }}" method="get">
        <div class="xl:flex xl:justify-between">
            <div class="w-full bg-white rounded-md shadow-sm mt-3 px-3 pt-3 pb-7 xl:px-4 xl:w-5/6">
                <h6 class="font-encode-sans font-bold text-slate-900">Metode Pembayaran</h6>
                <div class="px-7 mt-3">
                    <ul class="list-disc">
                        <li>
                            <div>
                                <h6 class="text-sm sm:text-base font-bold text-slate-900">
                                    Mandiri
                                </h6>
                                <p class="text-gray-400 font-encode-sans text-sm sm:text-base">
                                    142.000.7984.502
                                    <a href="#">
                                        <i class="fa fa-copy ml-1 text-{{ $color[0] }}-400 border p-1 hover:text-{{ $color[0] }}-500 hover:border-{{ $color[0] }}-500 rounded-md border-{{ $color[0] }}-400"
                                        aria-hidden="true"></i>
                                    </a>
                                </p>
                            </div>
                        </li>
                        <li class="mt-3">
                            <div>
                                <h6 class="text-sm sm:text-base font-bold text-slate-900">
                                    BCA
                                </h6>
                                <p class="text-gray-400 font-encode-sans text-sm sm:text-base">
                                    8620.101.070
                                    <a href="#">
                                        <i class="fa fa-copy ml-1 text-{{ $color[0] }}-400 border p-1 hover:text-{{ $color[0] }}-500 hover:border-{{ $color[0] }}-500 rounded-md border-{{ $color[0] }}-400"
                                        aria-hidden="true"></i>
                                    </a>
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <h6 class="mt-4 font-encode-sans font-bold text-red-500">Penting!</h6>
                <p class="px-7 mt-2 text-clip font-encode-sans text-sm sm:text-base text-gray-400">
                    Sertakan nomor pesanan (invoice number) sebagai berita pada saat Anda melakukan transfer.
                    Nomor Pesanan akan anda terima melalui email kemudian.
                </p>
                <div class="xl:hidden mt-7">
                    <div class="text-center">
                        <button type="submit"
                            class="border-2 border-{{ $color[2] }}-400 font-bold font-encode-sans text-{{ $color[2] }}-400 px-8 py-2 rounded-full">
                            Next Step
                        </button>
                    </div>
                    <div class="text-center mt-1">
                        <a href="{{ route('user.receiver.create') }}"
                            class="font-encode-sans text-gray-400 text-sm sm:text-base">
                            Back
                        </a>
                    </div>
                </div>
            </div>
            <div class="hidden xl:block">
                <div class="w-full text-center mt-3">
                    <button type="submit"
                        class="w-full inline-block border-2 border-{{ $color[2] }}-400 bg-white font-bold font-encode-sans text-{{ $color[2] }}-400 px-8 py-2 rounded-full">
                        Next Step
                    </button>
                </div>
                <div class="w-full text-center mt-2">
                    <a href="{{ route('user.receiver.create') }}"
                        class="w-full inline-block border-2 border-gray-400 bg-white font-bold font-encode-sans text-gray-400 px-8 py-2 rounded-full">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>

@include('inc.footer1')
@endsection
