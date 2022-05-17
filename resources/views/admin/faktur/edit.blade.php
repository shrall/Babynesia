@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white p-4 flex items-center justify-between">
        <div class="flex flex-col gap-1">
            <span class="font-overpass text-3xl font-bold">Nota Penjualan - {{ $faktur->no_faktur }}</span>
        </div>
    </div>
    <form action="{{ route('adminpage.faktur.update', $faktur->no_faktur) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="w-full flex flex-col gap-y-4 p-4">
            <div class="admin-card">
                <div class="col-span-3 place-self-start">Status</div>
                @if ($faktur->status != 3 && $faktur->status != 5)
                    <div class="col-span-9">
                        <div class="flex flex-col gap-1">
                            @foreach ($fakturstatuses as $fs)
                                @if (Auth::user()->user_status_id != 6 && Auth::user()->user_status_id != 7)
                                    {{-- muncul kalau admin --}}
                                    <div class="flex items-center gap-2">
                                        <input type="radio" name="faktur_status" value="{{ $fs->id }}"
                                            {{ $fs->id == $faktur->status ? 'checked' : '' }}
                                            id="radio-fs-{{ $fs->id }}">
                                        <label for="radio-fs-{{ $fs->id }}"
                                            style="color: {{ $fs->color }};">{{ $fs->status }}</label>
                                    </div>
                                @else
                                    {{-- muncul kalau staff --}}
                                    @if ($faktur->status == 1 && $fs->id != 2 && $fs->id != 3)
                                        <div class="flex items-center gap-2">
                                            <input type="radio" name="faktur_status" value="{{ $fs->id }}"
                                                {{ $fs->id == $faktur->status ? 'checked' : '' }}
                                                id="radio-fs-{{ $fs->id }}">
                                            <label for="radio-fs-{{ $fs->id }}"
                                                style="color: {{ $fs->color }};">{{ $fs->status }}</label>
                                        </div>
                                    @elseif ($faktur->status == 2 && $fs->id != 1)
                                        <div class="flex items-center gap-2">
                                            <input type="radio" name="faktur_status" value="{{ $fs->id }}"
                                                {{ $fs->id == $faktur->status ? 'checked' : '' }}
                                                id="radio-fs-{{ $fs->id }}">
                                            <label for="radio-fs-{{ $fs->id }}"
                                                style="color: {{ $fs->color }};">{{ $fs->status }}</label>
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-span-9" style="color: {{ $faktur->fakturstatus->color }};">
                        {{ $faktur->fakturstatus->status }}
                    </div>
                @endif
                <div class="col-span-3 place-self-start">Pesanan</div>
                <div class="col-span-9">
                    <table class="admin-table">
                        <tr>
                            <th>Qty</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Subtotal</th>
                        </tr>
                        @foreach ($faktur->items as $item)
                            <tr>
                                <td>{{ $item->jumlah }}</td>
                                @if ($item->product)
                                    <td>
                                        <img src="{{ asset('uploads/' . $item->product->image) }}"
                                            class="h-vh-10 mx-auto">
                                    </td>
                                    <td> [{{ $item->kode_produk . '-' . $item->kode_produk_stock }}]
                                        {{ $item->product->nama_produk }}</td>
                                @else
                                    <td><img src="{{ asset('svg/images.svg') }}" class="h-vh-10 mx-auto"></td>
                                    <td> [{{ $item->kode_produk . '-' . $item->kode_produk_stock }}]</td>
                                @endif
                                <td>{{ AppHelper::rp($item->harga_satuan ?? 0) }}</td>
                                <td>{{ AppHelper::rp($item->subtotal ?? 0) }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="4" class="text-right font-bold">Subtotal</td>
                            <td>{{ AppHelper::rp($faktur->total_profit ?? 0) }}</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right">Ongkos Kirim</td>
                            <td>{{ AppHelper::rp($faktur->deliverycost ?? 0) }}</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right">Diskon</td>
                            <td>{{ '- ' . AppHelper::rp($faktur->discount ?? 0) }}</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right font-bold">Total</td>
                            <td>{{ AppHelper::rp($faktur->total_pembayaran ?? 0) }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-span-3">Total Berat</div>
                <div class="col-span-9">{{ $faktur->total_weight ?? 0 }} gram</div>
                <div class="col-span-3 place-self-start">Pembeli</div>
                <div class="col-span-9">
                    <div class="flex flex-col">
                        <span class="font-bold">{{ $faktur->user->name }}</span>
                        <span>{{ $faktur->user->alamat }}</span>
                        <span>{{ $faktur->user->kota }}</span>
                        <span>{{ $faktur->user->propinsi ?? ' ' }} - {{ $faktur->user->country->name ?? ' ' }}</span>
                        <span>{{ $faktur->user->telp . '/' . $faktur->user->hp }}</span>
                        <span>{{ $faktur->user->email }}</span>
                    </div>
                </div>
                <div class="col-span-3 place-self-start">Penerima</div>
                <div class="col-span-9">
                    <div class="flex flex-col">
                        <span class="font-bold">{{ $faktur->receiver->receiver_name }}</span>
                        <span>{{ $faktur->receiver->address }}</span>
                        <span>{{ $faktur->receiver->city }} - {{$faktur->receiver->postcode}}</span>
                        <span>{{ $faktur->receiver->phone . '/' . $faktur->receiver->hp }}</span>
                    </div>
                </div>
                <div class="col-span-3 place-self-start">Dropship</div>
                <div class="col-span-9">
                    <div class="flex flex-col">
                        @if ($faktur->sender_name)
                            <span class="font-bold">{{ $faktur->sender_name }}</span>
                            <span>{{ $faktur->sender_address }}</span>
                            <span>{{ $faktur->sender_phone }}</span>
                        @else
                            <span>-</span>
                        @endif
                    </div>
                </div>
                <div class="col-span-3">Pembayaran</div>
                <div class="col-span-9">{{ $faktur->payment->description }}</div>
                <div class="col-span-3">Kurir</div>
                <div class="col-span-9">{{ $faktur->deliveryExpedition ?? '-' }}</div>
                <div class="col-span-3">Nomor Resi</div>
                <div class="col-span-9">
                    <input type="text" name="no_resi" id="no_resi" class="admin-input"
                        value="{{ $faktur->deliveryResi }}">
                </div>
                <div class="col-span-3 place-self-start text-red-500">Catatan Admin</div>
                <div class="col-span-9">
                    <textarea type="text" name="admin_note" id="input-content"
                        class="admin-input">{{ $faktur->admin_note ?? null }}</textarea>
                </div>
                <div class="col-span-12">
                    <button type="submit" class="admin-button">Simpan</button>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                scrollX: true,
            });
        });
    </script>
    <script src="{{ asset('js/ckeditor.js') }}"></script>
    <script>
        ClassicEditor.create(document.querySelector('#input-content'), {
                mediaEmbed: {
                    previewsInData: true
                },
                removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle',
                    'ImageToolbar', 'ImageUpload', 'MediaEmbed', 'Table'
                ],
            }).then(editor => {})
            .catch(error => {
                console.error(error);
                console.error(error.stack);
            });
        ClassicEditor.editorConfig = function(config) {
            // misc options
            config.height = '350px';
        };
    </script>
@endsection
