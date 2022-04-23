@extends('layouts.app')
@section('content')

@include('inc.navbar1')

<div class="container mx-auto xl:px-32 px-3 xl:pt-6 xl:pb-10 pt-3 pb-5">
    <div class="w-full bg-white rounded-md shadow-sm py-2 px-3">
        <p class="text-{{ $color[1] }}-500 text-sm sm:text-base font-encode-sans">
            <a href="#" class="text-gray-400">Cart > </a>
            <a href="#" class="text-gray-400">Receiver ></a>
            <a href="#">Payment</a>
        </p>
        <h1 class="font-concert-one text-3xl text-{{ $color[1] }}-500 xl:text-4xl">
            Payment
        </h1>
    </div>
    <form action="{{ route('user.detailcart.index') }}" method="get">
        <div class="xl:flex xl:justify-between">
            <div class="w-full bg-white rounded-md shadow-sm mt-3 px-3 pt-3 pb-7 xl:px-4 xl:w-5/6">
                <h6 class="font-encode-sans font-bold text-slate-900">Metode Pembayaran</h6>
                <div class="px-5 mt-3">
                    <ul class="space-y-3">
                        @foreach ($payments as $payment)
                            
                        <li class="flex space-x-2">
                            <input type="radio" id="payment{{ $payment->id }}" name="payment" value="{{ $payment->id }}" {{ $loop->iteration == 1 ? 'checked' : '' }}>
                            <label for="payment{{ $payment->id }}">
                                <h6 class="text-sm sm:text-base font-bold text-slate-900">
                                    {{ $payment->info }}
                                </h6>
                                <p class="text-gray-400 font-encode-sans text-sm sm:text-base">
                                    {{ $payment->description }}
                                    {{-- <a href="#">
                                        <i class="fa fa-copy ml-1 text-{{ $color[0] }}-400 border p-1 hover:text-{{ $color[0] }}-500 hover:border-{{ $color[0] }}-500 rounded-md border-{{ $color[0] }}-400"
                                        aria-hidden="true"></i>
                                    </a> --}}
                                </p>
                            </label>
                        </li>

                        @endforeach
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
                            class="border-2 border-{{ $color[2] }}-400 hover:bg-{{ $color[2] }}-400 hover:text-white font-bold font-encode-sans text-{{ $color[2] }}-400 px-8 py-2 rounded-full">
                            Next Step
                        </button>
                    </div>
                    <div class="text-center mt-1">
                        <a href="javascript:history.back()"
                            class="font-encode-sans text-gray-400 text-sm sm:text-base">
                            Back
                        </a>
                    </div>
                </div>
            </div>

            @if ($request->dropship == 'yes')
            <input type="hidden" value="{{ $request->dropship }}" name="dropship">

    <input type="hidden" value="{{ $request->pengirim_name }}" name="pengirim_name">
    <input type="hidden" value="{{ $request->pengirim_address }}" name="pengirim_address">
    <input type="hidden" value="{{ $request->pengirim_hp }}" name="pengirim_hp">
    @endif
    <input type="hidden" value="{{ $request->receiver_name }}" name="receiver_name">
    <input type="hidden" value="{{ $request->address }}" name="address">
    <input type="hidden" value="{{ $request->postcode }}" name="postcode">
    <input type="hidden" value="{{ $request->city }}" name="city">
    <input type="hidden" value="{{ $request->province }}" name="province">
    <input type="hidden" value="{{ $request->delivery }}" name="delivery">
    <input type="hidden" value="{{ $request->phone }}" name="phone">
    <input type="hidden" value="{{ $request->hp }}" name="hp">

            <div class="hidden xl:block">
                <div class="w-full text-center mt-3">
                    <button type="submit"
                        class="w-full inline-block border-2 border-{{ $color[2] }}-400 hover:bg-{{ $color[2] }}-400 hover:text-white bg-white font-bold font-encode-sans text-{{ $color[2] }}-400 px-8 py-2 rounded-full">
                        Next Step
                    </button>
                </div>
                <div class="w-full text-center mt-2">
                    <a href="javascript:history.back()"
                        class="w-full inline-block border-2 border-gray-400 bg-white hover:bg-neutral-100 hover:border-gray-300 hover:text-gray-300 font-bold font-encode-sans text-gray-400 px-8 py-2 rounded-full">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>

@include('inc.footer1')
@endsection
