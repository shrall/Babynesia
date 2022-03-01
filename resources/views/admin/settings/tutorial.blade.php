@extends('layouts.admin')

@section('content')
    <div class="w-full bg-white mb-2 p-4">
        <span class="font-concert-one text-3xl font-bold">Tutorial</span>
    </div>
    <div class="admin-card">
        <div id="maincontent" class="col-span-12">
            <h2>Selamat datang di Administrator Area !</h2>
            <br>
            <p>Disini Anda dapat melakukan perubahan atas data-data yang ditampilkan di website Anda.</p>
            <p>Gunakan navigasi di bagian kiri halaman untuk mengakses fungsi-fungsi yang tersedia.</p>
            <p>&nbsp;</p>
            <p>Bila Anda memiliki pertanyaan atau membutuhkan layanan lainnya, silahkan hubungi customer service BabaWeb di
                <a href="mailto:hello@babaweb.biz">hello@babaweb.biz</a>. <br>
                Kami akan menghubungi Anda secepatnya.</p>
            <p>&nbsp;</p>
            <p>Untuk tampilan terbaik aplikasi ini, gunakan browser Mozilla Firefox. Anda bisa <a
                    href="http://en-us.www.mozilla.com/en-US/firefox/" target="_blank">download gratis</a> Mozilla Firefox.
                Terima kasih. </p>

            <br>
            <br>
            <br>

            <h1 class="font-bold">TUTORIAL PENGGUNAAN APLIKASI</h1>
            <p>Berikut adalah beberapa langkah awal yang harus dilakukan untuk konfigurasi website toko online Anda:</p>
            <p>&nbsp;</p>
            <h3 class="font-bold">PENGATURAN AWAL</h3>
            <ol>
                <li><span style="font-weight: bold">Administrator<br>
                    </span>Kunjungi menu <span style="font-style: italic"><strong>Administrator</strong></span><br>
                    Ubah password untuk Administrator anda. Anda juga dapat membuat administrator baru sebanyak yang
                    dibutuhkan.<br>
                    <br>
                </li>
                <li><span style="font-weight: bold">Konfigurasi Awal</span><br>
                    Kunjungi menu <span style="font-style: italic"><strong>Konfigurasi</strong></span><br>
                    Lengkapi data konfigurasi yang dibutuhkan. <br>
                    <br>
                </li>
                <li><span style="font-weight: bold">Design Website</span><br>
                    Kunjungi menu <span style="font-style: italic"><strong>Layout &amp; Design</strong></span><br>
                    Pilih layout dan design website yang Anda inginkan. Anda dapat menentukan sendiri warna dasar website,
                    bentuk layout serta meng-upload gambar banner/header sendiri. Ukuran gambar header yang disarankan
                    adalah
                    lebar x tinggi = 1000 x 200 pixels. Usahakan besar gambar tidak lebih dari 1 MB, agar website tidak
                    lambat
                    bila diakses oleh pengunjung.<br>
                    <br>
                </li>
                <li><span style="font-weight: bold">Isi Website</span><br>
                    Kunjungi menu <span style="font-style: italic"><strong>Halaman Web</strong></span><br>
                    Seluruh halaman yang ada di website ada dalam daftar di halaman web ini. Lakukan pengisian/perubahan isi
                    halaman website. Anda dapat menambah halaman website lagi selain dari yang sudah disediakan dengan cara
                    mengubah halaman <em>custom pages. </em>Tampilkan halaman tersebut di menu utama.<br>
                    <br>
                </li>
                <li><span style="font-weight: bold">Area Samping Website</span><br>
                    Kunjungi menu <span style="font-style: italic"><strong>Halaman Samping</strong></span><br>
                    Website Anda memiliki area samping (di sebelah kanan atau kiri atau keduanya, tergantung dari layout
                    yang
                    Anda pilih). Anda dapat menentukan isi halaman samping tersebut serta menentukan urutan isi-nya.<br>
                    <br>
                </li>

                <li><span style="font-weight: bold">Produk</span>
                    <br>
                    <br>
                    <ul>
                        <li>Kunjungi menu <strong><span style="font-style: italic">Kategori Produk </span><br>
                            </strong>Anda harus terlebih dulu membuat kategori untuk produk-produk Anda. Kategori dapat
                            dibuat
                            memiliki sub-kategori atau tanpa sub-kategori. <br>
                            <br>
                        </li>
                        <li>
                            Kunjungi menu <strong><span style="font-style: italic">Produsen Produk</span><br>
                            </strong>Selanjutnya perlu ditentukan produsen/merk produk-produk Anda. Minimum diperlukan 1
                            merk.<br>
                            <br>
                        </li>
                        <li>
                            Kunjungi menu <strong><span style="font-style: italic">Produk</span><br>
                            </strong>Setelah membuat kategori dan produsen produk, Anda dapat membuat produk yang hendak
                            Anda
                            jual serta meng-upload gambarny</li>
                    </ul>
                </li>
            </ol>
            <p>&nbsp;</p>
            <p class="font-bold text-fuchsia-500">Website Anda kini telah siap ! </p>
            <p>Anda dapat melengkapi isi website Anda dengan menambahkan gambar-gambar iklan (menu <span
                    style="font-weight: bold; font-style: italic">Iklan Utama</span>) yang akan di tampilkan di halaman
                home.
            </p>
            <p>Juga Anda dapat menawarkan berbagai macam produk yang sedang promo (menu <span
                    style="font-weight: bold; font-style: italic">Produk Promo</span>). </p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <h3 class="font-bold">PENGATURAN LAINNYA </h3>
            <ul>
                <li><a href="#adm">Administrator</a></li>
                <li><a href="#design">Design &amp; Layout</a></li>
                <li><a href="#kat">Produk Kategori &amp; Subkategori</a></li>
                <li><a href="#merk">Merk Produk</a></li>
                <li><a href="#produk">Produk</a></li>
                <li><a href="#penjualan">Penjualan</a></li>
                <li><a href="#content">Isi Website</a></li>
                <li><a href="#email">Email</a></li>
            </ul>
            <p class="font-bold">&nbsp;</p>
            <ul>
                <li><span style="font-weight: bold"><a name="adm"></a>ADMINISTRATOR<br>
                    </span><br>
                    <ol>
                        <li>Cara menambah Admin Baru.
                            <ul>
                                <li>Masuk ke Admin area </li>
                                <li>Pilih menu <em>Administrator</em> </li>
                                <li>Klik tombol <em>Tambah Administrator</em></li>
                                <li>Masukkan <em>User Name</em>, <em>Password, Ulangi Password</em> </li>
                                <li>Klik Ok <br>
                                    <br>
                                </li>
                            </ul>
                        </li>
                        <li>Cara mengganti Password
                            <ul>
                                <li>Masuk ke Admin area </li>
                                <li>Pilih menu <em>Administrator </em></li>
                                <li>Klik tanda&nbsp; <em>Pensil</em> </li>
                                <li>Masukkan <em>Password Baru, Ulangi Password Baru</em></li>
                                <li>Klik Ubah / Ok. <br>
                                    <br>
                                </li>
                            </ul>
                        </li>
                        <li>Cara menghapus Admin
                            <ul>
                                <li>Masuk ke Admin area</li>
                                <li>Pilih menu <em>Administrator </em></li>
                                <li>Klik <em>Tanda Silang ( x ) </em></li>
                                <li>Ok / <em>Hapus <br>
                                        <br>
                                        <br>
                                        <br>
                                    </em></li>
                            </ul>
                        </li>
                    </ol>
                </li>
                <li><strong><a name="design"></a>DESIGN AND LAYOUT </strong>
                    <br>
                    <br>
                    <ol>
                        <li>Cara mengubah Design Warna
                            <ul>
                                <li>Masuk ke Admin Area </li>
                                <li>Pilih menu <em>Layout &amp; Design</em> </li>
                                <li>Klik salah satu warna yang di inginkan </li>
                                <li>Refresh halaman website toko online <br>
                                    <br>
                                </li>
                            </ul>
                        </li>
                        <li>Cara mengubah layout
                            <ul>
                                <li>Masuk Admin Area</li>
                                <li>Pilih Menu <em>Layout &amp; Design</em> </li>
                                <li>Pilih LayOut yang di inginkan. </li>
                                <li>Refresh halaman website toko online <br>
                                    <br>
                                </li>
                            </ul>
                        </li>
                        <li>Cara mengganti gambar header
                            <ul>
                                <li>Masuk Admin Area</li>
                                <li>Pilih Menu <em>Layout &amp; Design</em> </li>
                                <li>Pada <em>Gambar Header</em> klik <em>Brows</em><em>e</em> gambar yang dinginkan</li>
                                <li>Klik <em>Upload Header</em></li>
                                <li>Refresh halaman website toko online <br>
                                    <br>
                                    <br>
                                    <br>
                                </li>
                            </ul>
                        </li>
                    </ol>
                </li>
                <li><strong><a name="kat"></a>PRODUK KATEGORI &amp; SUBKATEGORI</strong><br>
                    <br>
                    <ol>
                        <li>Cara menambah Kategori. <strong> </strong>
                            <ul>
                                <li>Masuk Admin area</li>
                                <li>Pilih menu <em>Kategori Produk</em> </li>
                                <li>Klik tombol <em>Tambah Kategori</em> </li>
                                <li>Masukkan <em>Nama Kategori Produk , Nomor Urut Produk. </em></li>
                                <li>Tekan OK <br>
                                    <br>
                                </li>
                            </ul>
                        </li>
                        <li>Cara mengubah Kategori
                            <ul>
                                <li>Masuk Admin area </li>
                                <li>Pilih menu <em>Kategori Produk </em></li>
                                <li>Klik <em>Tanda Pensil / Ubah</em> </li>
                                <li>Masukkan <em>Nama Kategori Produk baru</em>, <em>Nomor Urut</em> </li>
                                <li><em>Klik Ubah <br>
                                        <br>
                                    </em></li>
                            </ul>
                        </li>
                        <li>Cara menghapus Kategori
                            <ul>
                                <li>Masuk menu Admin </li>
                                <li>Pilih menu <em>Kategori Produk</em> </li>
                                <li>Klik <em>Tanda Silang ( x )</em></li>
                                <li>Klik Hapus / Ok.<br>
                                    <br>
                                </li>
                            </ul>
                        </li>
                        <li>Cara menambah Subkategori
                            <ul>
                                <li>Masuk menu Admin </li>
                                <li>Pilih menu <em>Kategori Produk</em> </li>
                                <li>Klik tombol <em>Subkategori</em> </li>
                                <li>Masuk Pilih <em>Subkategori, Nama Subkategori.</em> </li>
                                <li>Tekan OK <br>
                                    <br>
                                </li>
                            </ul>
                        </li>
                        <li>Cara mengubah Subkategori
                            <ul>
                                <li>Masuk menu Admin </li>
                                <li>Pilih menu <em>Kategori Produk </em></li>
                                <li>Klik <em>Tanda Pensil / Ubah </em></li>
                                <li>Masukkan <em>Nama Kategori, Nomor Urut</em></li>
                                <li>Klik <em>Ubah</em><br>
                                    <br>
                                </li>
                            </ul>
                        </li>
                        <li>Cara menghapus Subkategori
                            <ul>
                                <li>Masuk menu Admin </li>
                                <li>Pilih menu <em>Kategori Produk </em></li>
                                <li>Klik <em>Tanda Silang ( x )</em></li>
                                <li>Klik <em>Hapus / Ok <br>
                                        <br>
                                        <br>
                                        <br>
                                    </em></li>
                            </ul>
                        </li>
                    </ol>
                </li>
                <li><span style="font-weight: bold"><a name="merk"></a>MERK PRODUK<br>
                        <br>
                    </span>
                    <ol>
                        <li>Cara menambah Merk Produk
                            <ul>
                                <li>Masuk menu Admin </li>
                                <li>Pilih menu <em>Produsen Produk</em> </li>
                                <li>Masukkan <em>Nama Produsen, Link, Gambar ( Browsing Gambar ) </em></li>
                                <li>Tekan OK<br>
                                    <br>
                                </li>
                            </ul>
                        </li>
                        <li>Cara mengubah Merk Produk
                            <ul>
                                <li>Masuk menu Admin </li>
                                <li>Pilih menu <em>Produsen Produk</em> </li>
                                <li>Klik <em>Tanda Pensil</em> </li>
                                <li>Masukkan <em>Nama Produsen baru, Link, Gambar ( Browsing Gambar )</em></li>
                                <li>Klik <em>Ubah</em><br>
                                    <br>
                                </li>
                            </ul>
                        </li>
                        <li>Cara menghapus <em>Merk Produk</em>
                            <ul>
                                <li>Masuk menu Admin</li>
                                <li>Pilih menu <em>Produsen Produk</em> </li>
                                <li>Klik <em>Tanda Silang ( x )</em> </li>
                                <li>Klik <em>Hapus / Ok.<br>
                                        <br>
                                        <br>
                                        <br>
                                    </em> </li>
                            </ul>
                        </li>
                    </ol>
                </li>
                <li><span style="font-weight: bold"><a name="produk"></a>PRODUK</span>
                    <br>
                    <br>
                    <ol>
                        <li>Cara menambah Produk
                            <ul>
                                <li>Masuk menu Admin</li>
                                <li>Pilih menu <em>Produk </em></li>
                                <li>Klik tombol <em>Tambah Produk</em> </li>
                                <li>Masukkan <em>Gambar ( Brows ), Tampilkan centang&nbsp; ( Ya ), Nama Produk, Kategori,
                                        Produsen, Keterangan, Harga Jual, Stok Barang, No Urut, Status ( Normal ), Harga
                                        Sale</em>. </li>
                                <li>Ok <br>
                                    <br>
                                </li>
                            </ul>
                        </li>
                        <li>Cara mengubah Produk
                            <ul>
                                <li>Masuk menu Admin </li>
                                <li>Pilih menu <em>Produk </em></li>
                                <li>Klik tombol <em>Tampilkan </em></li>
                                <li>Klik tanda Pensil</li>
                                <li>Masukkan <em>Gambar ( Brows ), Tampilkan ( Ya ), Nama Produk, Kategori, Produsen,
                                        Keterangan, Harga Jual, Stok Barang, No Urut, Status ( Normal ), Harga
                                        Sale</em><em>.
                                    </em></li>
                                <li>Klik <em>Ubah <br>
                                        <br>
                                    </em></li>
                            </ul>
                        </li>

                        <li>Cara menghapus Produk
                            <ul>
                                <li>Masuk menu Admin </li>
                                <li>Pilih menu <em>Produk </em></li>
                                <li>Klik tombol <em>Tampilkan</em></li>
                                <li>Klik <em>tanda Silang ( x )</em> </li>
                                <li>Klik <em>Hapus<br>
                                        <br>
                                    </em></li>
                            </ul>
                        </li>
                        <li>Cara menambah Produk Promo
                            <ul>
                                <li>Masuk menu Admin</li>
                                <li>Pilih menu <em>Produk Promo </em></li>
                                <li>Klik tombol <em>Tambah Produk</em> </li>
                                <li>Masukkan <em>Gambar ( Brows ), Tampilkan ( Ya ), Nama Produk, Kategori, Produsen,
                                        Keterangan, Harga Jual, Stok Barang, No Urut, Status ( Normal ), Harga Sale.</em>
                                </li>
                                <li>Klik <em>Ok</em><br>
                                    <br>
                                </li>
                            </ul>
                        </li>
                        <li><em>Cara </em>mengubah Produk Promo

                            <ul>
                                <li><em>Masuk menu Admin </em></li>
                                <li><em>Pilih menu Produk Promo</em></li>
                                <li>Klik <em>tanda Pensil ( edit )</em> </li>
                                <li>Masukkan <em>Gambar ( Brows ), Tampilkan ( Ya ), Nama Produk, Kategori, Produsen,
                                        Keterangan, Harga Jual, Stok Barang, No Urut, Status ( Normal ), Harga Sale</em>
                                </li>
                                <li>Klik <em>Ubah <br>
                                        <br>
                                    </em></li>
                            </ul>
                        </li>
                        <li>Cara menghapus Produk Promo
                            <ul>
                                <li>Masuk menu Admin</li>
                                <li>Pilih menu <em>Produk Promo</em> </li>
                                <li>Klik <em>tanda Silang ( x )</em> </li>
                                <li>Klik<em> Hapus</em><br>
                                    <br>
                                </li>
                            </ul>
                        </li>
                        <li>Cara melihat stok yang kosong
                            <ul>
                                <li>Masuk menu Admin </li>
                                <li>Pilih menu <em>stok kosong</em><br>
                                    <br>
                                </li>
                            </ul>
                        </li>
                        <li>Produk Pelengkap<br>
                            <strong><br>
                            </strong>Produk bisa memiliki banyak produk pelengkap. Produk pelengkap biasanya produk yang
                            juga
                            dibutuhkan bila membeli produk utama. Contoh: produk Laptop memiliki produk pelengkap Mouse, Tas
                            Laptop, Cairan Pembersih Layar. Produk pelengkap akan ditampilkan dibagian bawah pada saat
                            produk
                            yang bersangkutan ditampilkan. Dengan begitu, diharapkan pengunjung akan membeli juga produk
                            pelengkap.<br>
                            <br>
                            <br>
                            <br>
                        </li>
                    </ol>
                </li>
                <li><span style="font-weight: bold"><a name="penjualan"></a>PENJUALAN</span><br>
                    <br>
                    <ol>
                        <li>Cara melihat penjualan
                            <ul>
                                <li>Masuk menu Admin </li>
                                <li>Pilih menu <em>Penjualan</em><br>
                                    <br>
                                    <br>
                                    <br>
                                </li>
                            </ul>
                        </li>
                    </ol>
                </li>

                <li><strong><a name="content"></a>ISI WEBSITE<br>
                        <br>
                    </strong>
                    <ol>
                        <li>Iklan Utama
                            <ul>
                                <li>Masuk menu Admin </li>
                                <li>Pilih menu <em>Iklan Utama</em> </li>
                                <li>Klik &nbsp;<em>Tanda Pensil</em> pada bagian <em>Status</em> pilih <em>Tampilkan.</em>
                                </li>
                                <li>Klik <em>Ubah</em><br>
                                    <br>
                                </li>
                            </ul>
                        </li>
                        <li>Isi Halaman
                            <ul>
                                <li>Masuk menu Admin </li>
                                <li>Pilih menu <em>Halaman Web</em></li>
                                <li>Klik <em>Tanda Pensil</em> pada <em>About Us, ganti pada bagian isi.</em> </li>
                                <li>Klik <em>Ubah</em><br>
                                    <br>
                                </li>
                            </ul>
                        </li>
                        <li>Artikel
                            <br>
                            <br>
                            <ul>
                                <li>Cara menambah Artikel
                                    <ul>
                                        <li>Masuk menu Admin</li>
                                        <li>Pilih menu <em>Berita / Artikel</em> </li>
                                        <li>Klik tombol <em>Tambah Berita / Artikel</em></li>
                                        <li>Masukkan <em>No Urutan, Sumber, Judul, Isi artikel.</em> </li>
                                        <li>Ok <br>
                                            <br>
                                        </li>
                                    </ul>
                                </li>
                                <li>Cara mengubah Artikel
                                    <ul>
                                        <li>Masuk menu Admin</li>
                                        <li>Pilih menu Berita / Artikel</li>
                                        <li>Klik <em>Tanda Pensil</em> </li>
                                        <li>Masukkan <em>No Urutan, Sumber, Judul, Isi artikel.</em> </li>
                                        <li>Klik <em>Ubah</em><br>
                                            <br>
                                        </li>
                                    </ul>
                                </li>
                                <li>Cara menghapus Artikel
                                    <ul>
                                        <li>Masuk menu Admin</li>
                                        <li>Pilih menu <em>Berita / Artikel</em></li>
                                        <li>Klik <em>Tanda Panah ( x )</em></li>
                                        <li>Klik <em>Hapus <br>
                                                <br>
                                            </em></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>Anggota
                            <br>
                            <br>
                            <ul>
                                <li>Cara melihat daftar anggota baru
                                    <ul>
                                        <li>Masuk menu Admin</li>
                                        <li>Pilih menu <em>Anggota </em></li>
                                        <li>Klik pada <em>klik Tampilkan Semua </em><br>
                                            <br>
                                            &nbsp;
                                        </li>
                                    </ul>
                                </li>
                                <li>Cara menghapus anggota
                                    <ul>
                                        <li>Masuk menu Admin</li>
                                        <li>Pilih menu <em>Anggota </em></li>
                                        <li>Klik <em>Tanda Silang ( x ) </em></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ol>
                </li>
                <li><a name="email"></a><strong>EMAIL</strong><br>
                    <ul>
                        <li>Webmail<br>
                            <ul>
                                <li>Anda dapat mengakses email Anda melalui menu <strong>Webmail</strong>. </li>
                                <li>Lakukan login dengan menggunakan email dan password yang Anda miliki.</li>
                                <li>Pilih salah satu webmail: Horde, RoundCube atau SquirrelMail</li>
                                <li>Pilih bahasa lalu tekan <em>Log in</em></li>
                                <li>Email dapat Anda temukan di menu <em>Mail &gt;&gt; Inbox</em></li>
                            </ul>
                        </li>
                        <li>Kirim email secara masal
                            <ul>
                                <li>Anda dapat mengirim email ke seluruh anggota Anda sekaligus melalui menu <strong>Kirim
                                        Email</strong></li>
                                <li>Tuliskan isi email, lalu tekan <em>KIRIM</em></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
@endsection
