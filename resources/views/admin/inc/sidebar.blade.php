<div class="col-span-2 bg-slate-900 text-slate-300 flex flex-col gap-y-2 p-4">
    <div class="flex items-center gap-x-2"><span class="fa fa-fw fa-list"></span>Konten Web</div>
    <div class="flex flex-col pl-8">
        <a href="{{ route('adminpage.hotdeals.index') }}" class="hover:text-white">Iklan Utama</a>
        <a href="{{ route('adminpage.webpage') }}" class="hover:text-white">Halaman Web</a>
        {{-- <a href="{{ route('adminpage.sidearea') }}" class="hover:text-white">Halaman Samping</a> --}}
        <a href="{{ route('adminpage.news.index') }}" class="hover:text-white">Berita / Artikel</a>
        <a href="{{ route('adminpage.guestbook.index') }}" class="hover:text-white">Buku Tamu</a>
        <a href="{{ route('adminpage.gallery') }}" class="hover:text-white">Galeri Gambar</a>
    </div>
    <div class="flex items-center gap-x-2"><span class="fa fa-fw fa-shopping-cart"></span>Toko</div>
    <div class="flex flex-col pl-8">
        <a href="{{ route('adminpage.user.index') }}" class="hover:text-white">Daftar Member</a>
        <a href="{{ route('adminpage.kategori.index') }}" class="hover:text-white">Kategori Produk</a>
        <a href="{{ route('adminpage.brand.index') }}" class="hover:text-white">Merk Produk</a>
        <a href="{{ route('adminpage.produk.index') }}" class="hover:text-white">Produk</a>
        <a href="{{ route('adminpage.produk.index.promo') }}" class="hover:text-white">Produk Promo</a>
        <a href="{{ route('adminpage.produk.index.restock') }}" class="hover:text-white">Produk Restock</a>
        <a href="{{ route('adminpage.produk.index.soldout') }}" class="hover:text-white">Produk Sold Out</a>
        <a href="{{ route('adminpage.produk.index.disabled') }}" class="hover:text-white">Produk Non-Aktif</a>
        {{-- <a href="#" class="hover:text-white">Produk Pelengkap</a> --}}
        {{-- <a href="#" class="hover:text-white">Kupon Diskon</a> --}}
        <a href="{{ route('adminpage.faktur.index') }}" class="hover:text-white">Laporan Penjualan</a>
        <a href="{{ route('adminpage.profit') }}" class="hover:text-white">Laporan Keuntungan</a>
    </div>
    <div class="flex items-center gap-x-2"><span class="fa fa-fw fa-gear"></span>Pengaturan & Laporan</div>
    <div class="flex flex-col pl-8">
        <a href="{{ route('adminpage.configuration') }}" class="hover:text-white">Konfigurasi</a>
        <a href="{{ route('adminpage.layoutdesign') }}" class="hover:text-white">Layout & Design</a>
        <a href="{{ route('adminpage.administrator') }}" class="hover:text-white">Administrator</a>
        <a href="{{ route('adminpage.hitcounter') }}" class="hover:text-white">Hit Counter</a>
        <a href="{{ route('adminpage.visitcounter.index') }}" class="hover:text-white">Top Visitor</a>
        <a href="{{ route('adminpage.sendmail') }}" class="hover:text-white">Send Mail</a>
        {{-- <a href="#" class="hover:text-white">Webmail</a> --}}
        <a href="{{ route('adminpage.tutorial') }}" class="hover:text-white">Tutorial</a>
    </div>
</div>
