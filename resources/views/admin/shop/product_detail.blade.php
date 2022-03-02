@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white p-4 flex items-center justify-between mb-2">
        <div class="flex flex-col gap-1">
            <span class="font-concert-one text-3xl font-bold">Produk - Nama Produknya</span>
        </div>
    </div>
    <div class="grid grid-cols-2 gap-x-8">
        <div class="admin-card items-center justify-center">
            <div class="col-span-12">
                <img src="{{ asset('svg/images.svg') }}" alt="" srcset="">
            </div>
            <div class="col-span-12">
                <div class="flex items-center justify-center gap-2">
                    <a href="{{route('adminpage.product')}}" class="admin-button cursor-pointer">
                        <span class="fa fa-fw fa-arrow-left"></span>
                    </a>
                    <a target="blank" href="#" class="admin-button cursor-pointer">
                        <span class="fa fa-fw fa-edit"></span>
                    </a>
                    <a onclick="event.preventDefault(); document.getElementById('delete-product-form').submit();"
                        class="admin-button cursor-pointer">
                        <span class="fa fa-fw fa-times"></span>
                    </a>
                    <form action="#" id="delete-product-form" method="post">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                    </form>
                </div>
            </div>
        </div>
        <div class="admin-card">
            <div class="col-span-3">Kode</div>
            <div class="col-span-9">: 1131</div>
            <div class="col-span-3">Web ID</div>
            <div class="col-span-9">: 1131</div>
            <div class="col-span-3">Kode Alias</div>
            <div class="col-span-9">: 1131</div>
            <div class="col-span-3">Nama</div>
            <div class="col-span-9">: Tas Ransel</div>
            <div class="col-span-3">Status</div>
            <div class="col-span-9">: Active</div>
            <div class="col-span-3">Kategori</div>
            <div class="col-span-9">: tes123</div>
            <div class="col-span-3">Merk</div>
            <div class="col-span-9">: 1131</div>
            <div class="col-span-3">Keterangan</div>
            <div class="col-span-9">: 1131</div>
            <div class="col-span-3">Ketersediaan</div>
            <div class="col-span-9">: Promo</div>
            <div class="col-span-3">Berat</div>
            <div class="col-span-9">: 13 gram</div>
            <div class="col-span-3">No. Urut</div>
            <div class="col-span-9">: 13</div>
            <hr class="col-span-12">
            <div class="col-span-3">HPP</div>
            <div class="col-span-9">: Rp. (0%)</div>
            <div class="col-span-3">Harga Web</div>
            <div class="col-span-9">: Rp. 0</div>
            <div class="col-span-3">Harga Toko</div>
            <div class="col-span-9">: Rp. 0</div>
            <div class="col-span-3">Harga Grosir</div>
            <hr class="col-span-12">
            <div class="col-span-12 font-bold">Status</div>
            <div class="col-span-3">Status</div>
            <div class="col-span-9">: Promo</div>
            <div class="col-span-3">Harga Promo</div>
            <div class="col-span-9">: Rp. 0</div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                    responsive: true
                })
                .columns.adjust();
        });
    </script>
@endsection
