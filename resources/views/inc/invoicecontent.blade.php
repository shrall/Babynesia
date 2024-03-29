@if (config('services.app.type') == 1)

<div class="w-full bg-white rounded-md shadow-sm mt-3 px-8 pt-7 pb-10">
    <div class="flex justify-between items-center">
        <h1 class="font-concert-one text-4xl text-{{ $color[1] }}-500">{{ config('app.name') }}</h1>
        <h2 class="font-encode-sans text-lg text-white font-bold px-3 py-2 rounded-lg"
            style="background-color: {{ $faktur->fakturstatus->color }}">{{ $faktur->fakturstatus->status }}</h2>
    </div>
    @if (!empty($faktur->sender_name))
        <div class="text-red-500 mt-4 text-lg font-bold">
            Dropship
        </div>
    @endif
    <div class="mt-4 grid grid-cols-3 sm:grid-cols-4">
        <div class="col-span-2 flex">
            <ul class="font-encode-sans text-gray-400">
                <li>{{ !empty($faktur->sender_name) ? 'Sender Name' : 'Name' }}</li>
                @if (!empty($faktur->sender_name))
                    <li>Sender Address</li>
                @endif
                <li>Email</li>
                <li>{{ !empty($faktur->sender_name) ? 'No Hp Pengirim' : 'Phone' }}</li>
            </ul>
            <ul class="ml-7 font-encode-sans text-gray-400">
                <li>:</li>
                @if (!empty($faktur->sender_name))
                    <li>:</li>
                @endif
                <li>:</li>
                <li>:</li>
            </ul>
            <ul class="ml-2 font-encode-sans text-slate-900">
                <li>{{ !empty($faktur->sender_name) ? $faktur->sender_name : Auth::user()->name }}</li>
                @if (!empty($faktur->sender_name))
                    <li>{{ $faktur->sender_address }}</li>
                @endif
                <li>{{ Auth::user()->email }}</li>
                <li>{{ !empty($faktur->sender_phone) ? $faktur->sender_phone : Auth::user()->telp }}</li>
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
            <thead class="bg-{{ $color[0] }}-300 font-encode-sans font-bold text-white">
                <tr class="">
                    <th class="py-3">Quantity</th>
                    <th class="py-3 text-left">Product</th>
                    <th class="py-3 text-left">Keterangan</th>
                    <th class="py-3 text-left">Price</th>
                    <th class="py-3 text-left">Subtotal</th>
                </tr>
            </thead>
            <tbody class="font-encode-sans text-slate-900">
                @foreach ($faktur->items as $item)
                    <tr class="even:bg-neutral-100">
                        <td class="text-center py-3">{{ $item->jumlah }}</td>
                        <td class="py-3 text-clip">
                            {{ $hideconfig[0] != 1 ? '[' . $item->product->kode_produk . ']' : '' }}
                            {{ $item->product->nama_produk }} {{ $item->product->stat == 'po' ? '(PO)' : '' }}
                        </td>
                        <td class="py-3 text-left">

                            @if (!empty($item->productstock->size))
                                @if (!empty($item->productstock->color))
                                    {{ $item->productstock->size }} - {{ $item->productstock->color }}
                                @else
                                    {{ $item->productstock->size }}
                                @endif
                            @else
                                @if (!empty($item->productstock->color))
                                    {{ $item->productstock->color }}
                                @endif
                            @endif

                        </td>
                        <td class="py-3">Rp.
                            {{ substr(number_format($item->harga_satuan, 2, ',', '.'), 0, -3) }}
                            @if ($item->product->stat == 'd')
                                <del class="text-sm text-gray-400 font-encode-sans">Rp.
                                    {{ substr(number_format($item->product->harga, 2, ',', '.'), 0, -3) }}</del>
                            @endif
                        </td>
                        <td class="py-3">Rp. {{ substr(number_format($item->subtotal, 2, ',', '.'), 0, -3) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot class="bg-{{ $color[0] }}-300 font-encode-sans text-white">
                <tr>
                    <td colspan="3" class="py-3">&nbsp;</td>
                    <td class="py-3 text-left">Subtotal</td>
                    <td class="py-3">Rp.
                        {{ substr(number_format($subtotal, 2, ',', '.'), 0, -3) }}</td>
                </tr>

                <tr>
                    <td colspan="3" class="py-3">&nbsp;</td>
                    <td class="py-3 text-left">Ongkos kirim ({{ $faktur->deliveryExpedition }})</td>
                    <td class="py-3">Rp.
                        {{ substr(number_format($faktur->deliverycost, 2, ',', '.'), 0, -3) }}</td>
                </tr>
                @if ($faktur->voucher != null)

                <tr>
                    <td colspan="3" class="py-3">&nbsp;</td>
                    <td class="py-3 text-left">Potongan Voucher ({{ $faktur->voucher->vouchertype_id == 1 ? $faktur->voucher->amount."%" : "Rp. ".substr(number_format($faktur->voucher->amount, 2, ',', '.'), 0, -3) }})</td>
                    <td class="py-3">- Rp.
                        {{ substr(number_format($faktur->discount, 2, ',', '.'), 0, -3) }}</td>
                </tr>

                @endif
                <tr>
                    <td colspan="3" class="py-3">&nbsp;</td>
                    <td class="py-3 font-bold text-left">Total</td>
                    <td class="py-3 font-bold">Rp.
                        {{ substr(number_format($faktur->total_pembayaran + intval(substr($faktur->no_faktur, -3)), 2, ',', '.'), 0, -3) }}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="flex justify-between">
        <div>
            <h6 class="font-encode-sans font-bold text-slate-900">
                Catatan
            </h6>
            <div class="flex text-gray-400 font-encode-sans">
                {{$faktur->note ?? '-'}}
            </div>
            <h6 class="mt-2 font-encode-sans font-bold text-slate-900">
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
                    <li>{{ ($faktur->receiver->receiver_name ?? "") }}</li>
                    <li>{{ ($faktur->receiver->address ?? "") }}</li>
                    <li>{{ ($faktur->receiver->city ?? "") }} - {{($faktur->receiver->postcode ?? "")}}</li>
                    <li>{{ $faktur->receiver->province }}</li>
                    <li>{{ ($faktur->receiver->phone ?? "") }}</li>
                    <li>{{ ($faktur->receiver->hp ?? "") }}</li>
                </ul>
            </div>
            @if ($faktur->sender_name)
            <h6 class="mt-2 font-encode-sans font-bold text-slate-900">
                Dropship
            </h6>
            <div class="flex">
                    <ul class="font-encode-sans text-gray-400">
                        <li>Name</li>
                        <li>Address</li>
                        <li>Phone</li>
                    </ul>
                    <ul class="ml-7 font-encode-sans text-gray-400">
                        <li>:</li>
                        <li>:</li>
                        <li>:</li>
                    </ul>
                    <ul class="ml-2 font-encode-sans text-gray-400">
                        <li>{{ $faktur->sender_name }}</li>
                        <li>{{ $faktur->sender_address }}</li>
                        <li>{{ $faktur->sender_phone }}</li>
                    </ul>
            </div>
            @endif
        </div>
        <div class="text-right relative pb-32">
            <h6 class="font-encode-sans font-bold text-slate-900">
                Payment
            </h6>

            @foreach ($payments as $payment)
            <div class="mt-2">
                <h6 class="font-encode-sans font-bold text-slate-900">
                    {{ $payment->info }}
                </h6>
                <p class="font-encode-sans text-gray-400">
                    {{ $payment->description }}
                </p>
            </div>
            @endforeach
            <div class="mt-2">
                <h6 class="font-encode-sans font-bold text-slate-900">
                    Q-Ris
                </h6>
                <div class="flex justify-end">
                    <img src="{{ asset('images/payment/qrpayment.jpeg') }}" width="300" alt="">
                </div>
            </div>

            <a href="{{ route('user.faktur.showfaktur', $faktur) }}" target="_blank"
                class="absolute right-0 bottom-0 py-2 px-4 rounded-full bg-{{ $color[1] }}-500 hover:bg-{{ $color[1] }}-600 text-white font-bold font-encode-sans">
                <i class="fa fa-print mr-1" aria-hidden="true"></i>
                Print Invoice
            </a>
        </div>
    </div>
</div>

@else

<div class="w-full bg-white rounded-md shadow-sm mt-3 px-8 pt-7 pb-10">
    <div class="flex justify-between items-center">
        <h1 class="font-concert-one text-4xl text-{{ $color[1] }}-600">{{ config('app.name') }}</h1>
        <h2 class="font-encode-sans text-lg text-white font-bold px-3 py-2"
            style="background-color: {{ $faktur->fakturstatus->color }}">{{ $faktur->fakturstatus->status }}</h2>
    </div>
    @if (!empty($faktur->sender_name))
        <div class="text-red-500 mt-4 text-lg font-bold">
            Dropship
        </div>
    @endif
    <div class="mt-4 grid grid-cols-3 sm:grid-cols-4">
        <div class="col-span-2 flex">
            <ul class="font-encode-sans text-gray-400">
                <li>{{ !empty($faktur->sender_name) ? 'Sender Name' : 'Name' }}</li>
                @if (!empty($faktur->sender_name))
                    <li>Sender Address</li>
                @endif
                <li>Email</li>
                <li>{{ !empty($faktur->sender_name) ? 'No Hp Pengirim' : 'Phone' }}</li>
            </ul>
            <ul class="ml-7 font-encode-sans text-gray-400">
                <li>:</li>
                @if (!empty($faktur->sender_name))
                    <li>:</li>
                @endif
                <li>:</li>
                <li>:</li>
            </ul>
            <ul class="ml-2 font-encode-sans text-slate-900">
                <li>{{ !empty($faktur->sender_name) ? $faktur->sender_name : Auth::user()->name }}</li>
                @if (!empty($faktur->sender_name))
                    <li>{{ $faktur->sender_address }}</li>
                @endif
                <li>{{ Auth::user()->email }}</li>
                <li>{{ !empty($faktur->sender_phone) ? $faktur->sender_phone : Auth::user()->telp }}</li>
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
            <thead class="bg-neutral-100 font-encode-sans font-bold text-slate-900">
                <tr class="">
                    <th class="py-3">Quantity</th>
                    <th class="py-3 text-left">Product</th>
                    <th class="py-3 text-left">Keterangan</th>
                    <th class="py-3 text-left">Price</th>
                    <th class="py-3 text-left">Subtotal</th>
                </tr>
            </thead>
            <tbody class="font-encode-sans text-slate-900">
                @foreach ($faktur->items as $item)
                    <tr class="border-b">
                        <td class="text-center py-3">{{ $item->jumlah }}</td>
                        <td class="py-3 text-clip">
                            {{ $hideconfig[0] != 1 ? '[' . $item->product->kode_produk . ']' : '' }}
                            {{ $item->product->nama_produk }} {{ $item->product->stat == 'po' ? '(PO)' : '' }}
                        </td>
                        <td class="py-3 text-left">

                            @if (!empty($item->productstock->size))
                                @if (!empty($item->productstock->color))
                                    {{ $item->productstock->size }} - {{ $item->productstock->color }}
                                @else
                                    {{ $item->productstock->size }}
                                @endif
                            @else
                                @if (!empty($item->productstock->color))
                                    {{ $item->productstock->color }}
                                @endif
                            @endif

                        </td>
                        <td class="py-3">Rp.
                            {{ substr(number_format($item->harga_satuan, 2, ',', '.'), 0, -3) }}
                            @if ($item->product->stat == 'd')
                                <del class="text-sm text-gray-400 font-encode-sans">Rp.
                                    {{ substr(number_format($item->product->harga, 2, ',', '.'), 0, -3) }}</del>
                            @endif
                        </td>
                        <td class="py-3">Rp. {{ substr(number_format($item->subtotal, 2, ',', '.'), 0, -3) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot class="bg-neutral-100 font-encode-sans text-slate-900">
                <tr>
                    <td colspan="3" class="py-3">&nbsp;</td>
                    <td class="py-3 text-left">Subtotal</td>
                    <td class="py-3">Rp.
                        {{ substr(number_format($subtotal, 2, ',', '.'), 0, -3) }}</td>
                </tr>

                <tr>
                    <td colspan="3" class="py-3">&nbsp;</td>
                    <td class="py-3 text-left">Ongkos kirim ({{ $faktur->deliveryExpedition }})</td>
                    <td class="py-3">Rp.
                        {{ substr(number_format($faktur->deliverycost, 2, ',', '.'), 0, -3) }}</td>
                </tr>
                @if ($faktur->voucher != null)

                <tr>
                    <td colspan="3" class="py-3">&nbsp;</td>
                    <td class="py-3 text-left">Potongan Voucher ({{ $faktur->voucher->vouchertype_id == 1 ? $faktur->voucher->amount."%" : "Rp. ".substr(number_format($faktur->voucher->amount, 2, ',', '.'), 0, -3) }})</td>
                    <td class="py-3">- Rp.
                        {{ substr(number_format($faktur->discount, 2, ',', '.'), 0, -3) }}</td>
                </tr>

                @endif
                <tr>
                    <td colspan="3" class="py-3">&nbsp;</td>
                    <td class="py-3 font-bold text-left">Total</td>
                    <td class="py-3 font-bold">Rp.
                        {{ substr(number_format($faktur->total_pembayaran + intval(substr($faktur->no_faktur, -3)), 2, ',', '.'), 0, -3) }}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="flex justify-between">
        <div>
            <h6 class="font-encode-sans font-bold text-slate-900">
                Catatan
            </h6>
            <div class="flex text-gray-400 font-encode-sans">
                {{$faktur->note ?? '-'}}
            </div>
            <h6 class="mt-2 font-encode-sans font-bold text-slate-900">
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
                    <li>{{ ($faktur->receiver->receiver_name ?? "") }}</li>
                    <li>{{ ($faktur->receiver->address ?? "") }}</li>
                    <li>{{ ($faktur->receiver->city ?? "") }} - {{($faktur->receiver->postcode ?? "")}}</li>
                    <li>{{ $faktur->receiver->province }}</li>
                    <li>{{ ($faktur->receiver->phone ?? "") }}</li>
                    <li>{{ ($faktur->receiver->hp ?? "") }}</li>
                </ul>
            </div>
            @if ($faktur->sender_name)
            <h6 class="mt-2 font-encode-sans font-bold text-slate-900">
                Dropship
            </h6>
            <div class="flex">
                    <ul class="font-encode-sans text-gray-400">
                        <li>Name</li>
                        <li>Address</li>
                        <li>Phone</li>
                    </ul>
                    <ul class="ml-7 font-encode-sans text-gray-400">
                        <li>:</li>
                        <li>:</li>
                        <li>:</li>
                    </ul>
                    <ul class="ml-2 font-encode-sans text-gray-400">
                        <li>{{ $faktur->sender_name }}</li>
                        <li>{{ $faktur->sender_address }}</li>
                        <li>{{ $faktur->sender_phone }}</li>
                    </ul>
            </div>
            @endif
        </div>
        <div class="text-right relative pb-32">
            <h6 class="font-encode-sans font-bold text-slate-900">
                Payment
            </h6>

            @foreach ($payments as $payment)
            <div class="mt-2">
                <h6 class="font-encode-sans font-bold text-slate-900">
                    {{ $payment->info }}
                </h6>
                <p class="font-encode-sans text-gray-400">
                    {{ $payment->description }}
                </p>
            </div>
            @endforeach
            <div class="mt-2">
                <h6 class="font-encode-sans font-bold text-slate-900">
                    Q-Ris
                </h6>
                <div class="flex justify-end">
                    <img src="{{ asset('images/payment/qrpayment.jpeg') }}" width="300" alt="">
                </div>
            </div>

            <a href="{{ route('user.faktur.showfaktur', $faktur) }}" target="_blank"
                class="absolute right-0 bottom-0 py-2 px-4 rounded-full bg-{{ $color[2] }}-400 hover:bg-{{ $color[2] }}-500 text-white font-bold font-encode-sans">
                <i class="fa fa-print mr-1" aria-hidden="true"></i>
                Print Invoice
            </a>
        </div>
    </div>
</div>


@endif
