<?php

use App\Http\Controllers\Admin\AdminController as AdminAdminController;
use App\Http\Controllers\Admin\AdminStatusController as AdminAdminStatusController;
use App\Http\Controllers\Admin\BrandController as AdminBrandController;
use App\Http\Controllers\Admin\CartController as AdminCartController;
use App\Http\Controllers\Admin\CodeController as AdminCodeController;
use App\Http\Controllers\Admin\ComplementaryController as AdminComplementaryController;
use App\Http\Controllers\Admin\CountryController as AdminCountryController;
use App\Http\Controllers\Admin\DeliveryCostController as AdminDeliveryCostController;
use App\Http\Controllers\Admin\DestinationCityController as AdminDestinationCityController;
use App\Http\Controllers\Admin\DetailCartController as AdminDetailCartController;
use App\Http\Controllers\Admin\DetailFakturController as AdminDetailFakturController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\FakturController as AdminFakturController;
use App\Http\Controllers\Admin\FakturStatusController as AdminFakturStatusController;
use App\Http\Controllers\Admin\FaqController as AdminFaqController;
use App\Http\Controllers\Admin\GuestbookController as AdminGuestbookController;
use App\Http\Controllers\Admin\HitcounterController as AdminHitcounterController;
use App\Http\Controllers\Admin\HotdealsAreaController as AdminHotdealsAreaController;
use App\Http\Controllers\Admin\HotdealsController as AdminHotdealsController;
use App\Http\Controllers\Admin\HotdealsVisibleStatusController as AdminHotdealsVisibleStatusController;
use App\Http\Controllers\Admin\ImageBankController as AdminImageBankController;
use App\Http\Controllers\Admin\IndonesiaProvinceController as AdminIndonesiaProvinceController;
use App\Http\Controllers\Admin\KategoriChildController as AdminKategoriChildController;
use App\Http\Controllers\Admin\KategoriController as AdminKategoriController;
use App\Http\Controllers\Admin\KategoriParentController as AdminKategoriParentController;
use App\Http\Controllers\Admin\KlasController as AdminKlasController;
use App\Http\Controllers\Admin\LinkController as AdminLinkController;
use App\Http\Controllers\Admin\LinkLocationController as AdminLinkLocationController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\PaymentArtController as AdminPaymentArtController;
use App\Http\Controllers\Admin\PaymentMethodController as AdminPaymentMethodController;
use App\Http\Controllers\Admin\ProdukController as AdminProdukController;
use App\Http\Controllers\Admin\ProdukDestinationCityController as AdminProdukDestinationCityController;
use App\Http\Controllers\Admin\ProdukEventController as AdminProdukEventController;
use App\Http\Controllers\Admin\ProdukImageController as AdminProdukImageController;
use App\Http\Controllers\Admin\ProdukStatusController as AdminProdukStatusController;
use App\Http\Controllers\Admin\ProdukStockController as AdminProdukStockController;
use App\Http\Controllers\Admin\ProdukStockHistoryController as AdminProdukStockHistoryController;
use App\Http\Controllers\Admin\PromoController as AdminPromoController;
use App\Http\Controllers\Admin\ReceiverController as AdminReceiverController;
use App\Http\Controllers\Admin\SitesAdminController as AdminSitesAdminController;
use App\Http\Controllers\Admin\SitesAdminKategoriController as AdminSitesAdminKategoriController;
use App\Http\Controllers\Admin\SitesAdminStatusController as AdminSitesAdminStatusController;
use App\Http\Controllers\Admin\SitesController as AdminSitesController;
use App\Http\Controllers\Admin\SitesSideareaController as AdminSitesSideareaController;
use App\Http\Controllers\Admin\TechhelpController as AdminTechhelpController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\UserStatusController as AdminUserStatusController;
use App\Http\Controllers\Admin\ValutaController as AdminValutaController;
use App\Http\Controllers\Admin\VisitCounterController as AdminVisitCounterController;
use App\Http\Controllers\Admin\WebconfigController as AdminWebconfigController;
use App\Http\Controllers\Admin\WebDesignController as AdminWebDesignController;
use App\Http\Controllers\Admin\WebImageController as AdminWebImageController;
use App\Http\Controllers\Admin\WebLayoutController as AdminWebLayoutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminStatusController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\ComplementaryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DeliveryCostController;
use App\Http\Controllers\DestinationCityController;
use App\Http\Controllers\DetailCartController;
use App\Http\Controllers\DetailFakturController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FakturController;
use App\Http\Controllers\FakturStatusController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\GuestbookController;
use App\Http\Controllers\HitcounterController;
use App\Http\Controllers\HotdealsAreaController;
use App\Http\Controllers\HotdealsController;
use App\Http\Controllers\HotdealsVisibleStatusController;
use App\Http\Controllers\ImageBankController;
use App\Http\Controllers\IndonesiaProvinceController;
use App\Http\Controllers\KategoriChildController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KategoriParentController;
use App\Http\Controllers\KlasController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\LinkLocationController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentArtController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProdukDestinationCityController;
use App\Http\Controllers\ProdukEventController;
use App\Http\Controllers\ProdukImageController;
use App\Http\Controllers\ProdukStatusController;
use App\Http\Controllers\ProdukStockController;
use App\Http\Controllers\ProdukStockHistoryController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\ReceiverController;
use App\Http\Controllers\SitesAdminController;
use App\Http\Controllers\SitesAdminKategoriController;
use App\Http\Controllers\SitesAdminStatusController;
use App\Http\Controllers\SitesController;
use App\Http\Controllers\SitesSideareaController;
use App\Http\Controllers\TechhelpController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserStatusController;
use App\Http\Controllers\ValutaController;
use App\Http\Controllers\VisitCounterController;
use App\Http\Controllers\WebconfigController;
use App\Http\Controllers\WebDesignController;
use App\Http\Controllers\WebImageController;
use App\Http\Controllers\WebLayoutController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    // 'middleware' => ['user'], !ini biar nanti kalo udah nyambung backend, dia harus login dlu kalo mau make routenya
    // 'prefix' => 'user', !ini biar di urlnya ada /user dulu sebelum /modelnya
    'as' => 'user.'
], function () {
    Route::get('/', [PageController::class, 'landing_page'])->name('landingpage');
    Route::resource('admin', AdminController::class);
    Route::resource('adminstatus', AdminStatusController::class);
    Route::resource('brand', BrandController::class);
    Route::resource('cart', CartController::class);
    Route::resource('code', CodeController::class);
    Route::resource('complementary', ComplementaryController::class);
    Route::resource('country', CountryController::class);
    Route::resource('deliverycost', DeliveryCostController::class);
    Route::resource('destinationcity', DestinationCityController::class);
    Route::resource('detailcart', DetailCartController::class);
    Route::resource('detailfaktur', DetailFakturController::class);
    Route::resource('event', EventController::class);
    Route::resource('faktur', FakturController::class);
    Route::resource('fakturstatus', FakturStatusController::class);
    Route::resource('faq', FaqController::class);
    Route::resource('guestbook', GuestbookController::class);
    Route::resource('hitcounter', HitcounterController::class);
    Route::resource('hotdeals', HotdealsController::class);
    Route::resource('hotdealsarea', HotdealsAreaController::class);
    Route::resource('hotdealsvisiblestatus', HotdealsVisibleStatusController::class);
    Route::resource('imagebank', ImageBankController::class);
    Route::resource('indonesiaprovince', IndonesiaProvinceController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('kategorichild', KategoriChildController::class);
    Route::resource('kategoriparent', KategoriParentController::class);
    Route::resource('klas', KlasController::class);
    Route::resource('link', LinkController::class);
    Route::resource('linklocation', LinkLocationController::class);
    Route::resource('news', NewsController::class);
    Route::resource('paymentart', PaymentArtController::class);
    Route::resource('paymentmethod', PaymentMethodController::class);
    Route::resource('produk', ProdukController::class);
    Route::resource('produkdestinationcity', ProdukDestinationCityController::class);
    Route::resource('produkevent', ProdukEventController::class);
    Route::resource('produkimage', ProdukImageController::class);
    Route::resource('produkstatus', ProdukStatusController::class);
    Route::resource('produkstock', ProdukStockController::class);
    Route::resource('produkstockhistory', ProdukStockHistoryController::class);
    Route::resource('promo', PromoController::class);
    Route::resource('receiver', ReceiverController::class);
    Route::resource('sites', SitesController::class);
    Route::resource('sitesadmin', SitesAdminController::class);
    Route::resource('sitesadminkategori', SitesAdminKategoriController::class);
    Route::resource('sitesadminstatus', SitesAdminStatusController::class);
    Route::resource('sitessidearea', SitesSideareaController::class);
    Route::resource('techhelp', TechhelpController::class);
    Route::resource('user', UserController::class);
    Route::resource('userstatus', UserStatusController::class);
    Route::resource('valuta', ValutaController::class);
    Route::resource('visitcounter', VisitCounterController::class);
    Route::resource('webconfig', WebconfigController::class);
    Route::resource('webdesign', WebDesignController::class);
    Route::resource('webimage', WebImageController::class);
    Route::resource('weblayout', WebLayoutController::class);
});

Route::group([
    // 'middleware' => ['admin'],
    'prefix' => 'adminpage', 'as' => 'adminpage.'
], function () {
    Route::get('/dashboard', [AdminPageController::class, 'dashboard'])->name('dashboard');
    Route::get('/settings/configuration', [AdminPageController::class, 'configuration'])->name('configuration');
    Route::get('/settings/layoutdesign', [AdminPageController::class, 'layoutdesign'])->name('layoutdesign');
    Route::get('/settings/administrator', [AdminPageController::class, 'administrator'])->name('administrator');
    Route::get('/settings/administrator/create', [AdminPageController::class, 'administrator_create'])->name('administrator.create');
    Route::get('/settings/hitcounter', [AdminPageController::class, 'hitcounter'])->name('hitcounter');
    Route::get('/settings/topvisitor', [AdminPageController::class, 'topvisitor'])->name('topvisitor');
    //@marshall /1nya ini nanti harus dirubah {user} biar ngikutin
    Route::get('/settings/topvisitor/detail/1', [AdminPageController::class, 'topvisitor_detail'])->name('topvisitor.detail');
    Route::get('/settings/sendmail', [AdminPageController::class, 'sendmail'])->name('sendmail');
    Route::get('/settings/tutorial', [AdminPageController::class, 'tutorial'])->name('tutorial');

    Route::get('/content/webpage', [AdminPageController::class, 'webpage'])->name('webpage');
    Route::get('/content/webpage/create', [AdminPageController::class, 'webpage_create'])->name('webpage.create');
    Route::get('/content/sidearea', [AdminPageController::class, 'sidearea'])->name('sidearea');
    Route::get('/content/sidearea/create', [AdminPageController::class, 'sidearea_create'])->name('sidearea.create');
    Route::get('/content/gallery', [AdminPageController::class, 'gallery'])->name('gallery');
    Route::get('/content/gallery/create', [AdminPageController::class, 'gallery_create'])->name('gallery.create');

    Route::get('/shop/sales', [AdminPageController::class, 'sales'])->name('sales');
    Route::get('/shop/profit', [AdminPageController::class, 'profit'])->name('profit');

    Route::get('/produk/search', [AdminProdukController::class, 'index_search'])->name('produk.search.index');
    Route::post('/produk/search', [AdminProdukController::class, 'search'])->name('produk.search');
    Route::post('/produk/add_type', [AdminProdukController::class, 'add_type'])->name('produk.addtype');
    Route::get('/produk/promo', [AdminProdukController::class, 'index_promo'])->name('produk.index.promo');
    Route::get('/produk/restock', [AdminProdukController::class, 'index_restock'])->name('produk.index.restock');
    Route::get('/produk/disabled', [AdminProdukController::class, 'index_disabled'])->name('produk.index.disabled');
    Route::get('/produk/soldout', [AdminProdukController::class, 'index_soldout'])->name('produk.index.soldout');

    Route::post('news/uploadphoto', [AdminNewsController::class, 'upload_photo'])->name('news.uploadphoto');

    Route::get('/faktur/filter', [AdminFakturController::class, 'index_filter'])->name('faktur.filter.index');
    Route::post('/faktur/filter', [AdminFakturController::class, 'filter'])->name('faktur.filter');

    Route::resource('admin', AdminAdminController::class);
    Route::resource('adminstatus', AdminAdminStatusController::class);
    Route::resource('brand', AdminBrandController::class);
    Route::resource('cart', AdminCartController::class);
    Route::resource('code', AdminCodeController::class);
    Route::resource('complementary', AdminComplementaryController::class);
    Route::resource('country', AdminCountryController::class);
    Route::resource('deliverycost', AdminDeliveryCostController::class);
    Route::resource('destinationcity', AdminDestinationCityController::class);
    Route::resource('detailcart', AdminDetailCartController::class);
    Route::resource('detailfaktur', AdminDetailFakturController::class);
    Route::resource('event', AdminEventController::class);
    Route::resource('faktur', AdminFakturController::class);
    Route::resource('fakturstatus', AdminFakturStatusController::class);
    Route::resource('faq', AdminFaqController::class);
    Route::resource('guestbook', AdminGuestbookController::class);
    Route::resource('hitcounter', AdminHitcounterController::class);
    Route::resource('hotdeals', AdminHotdealsController::class)->parameters([
        'hotdeals' => 'hotdeals'
    ]);
    Route::resource('hotdealsarea', AdminHotdealsAreaController::class);
    Route::resource('hotdealsvisiblestatus', AdminHotdealsVisibleStatusController::class);
    Route::resource('imagebank', AdminImageBankController::class);
    Route::resource('indonesiaprovince', AdminIndonesiaProvinceController::class);
    Route::resource('kategori', AdminKategoriController::class);
    Route::resource('kategorichild', AdminKategoriChildController::class)->parameters([
        'kategorichild' => 'kategoriChild'
    ]);
    Route::resource('kategoriparent', AdminKategoriParentController::class);
    Route::resource('klas', AdminKlasController::class);
    Route::resource('link', AdminLinkController::class);
    Route::resource('linklocation', AdminLinkLocationController::class);
    Route::resource('news', AdminNewsController::class);
    Route::resource('paymentart', AdminPaymentArtController::class);
    Route::resource('paymentmethod', AdminPaymentMethodController::class);
    Route::resource('produk', AdminProdukController::class);
    Route::resource('produkdestinationcity', AdminProdukDestinationCityController::class);
    Route::resource('produkevent', AdminProdukEventController::class);
    Route::resource('produkimage', AdminProdukImageController::class);
    Route::resource('produkstatus', AdminProdukStatusController::class);
    Route::resource('produkstock', AdminProdukStockController::class);
    Route::resource('produkstockhistory', AdminProdukStockHistoryController::class);
    Route::resource('promo', AdminPromoController::class);
    Route::resource('receiver', AdminReceiverController::class);
    Route::resource('sites', AdminSitesController::class);
    Route::resource('sitesadmin', AdminSitesAdminController::class);
    Route::resource('sitesadminkategori', AdminSitesAdminKategoriController::class);
    Route::resource('sitesadminstatus', AdminSitesAdminStatusController::class);
    Route::resource('sitessidearea', AdminSitesSideareaController::class);
    Route::resource('techhelp', AdminTechhelpController::class);
    Route::resource('user', AdminUserController::class);
    Route::resource('userstatus', AdminUserStatusController::class);
    Route::resource('valuta', AdminValutaController::class);
    Route::resource('visitcounter', AdminVisitCounterController::class);
    Route::resource('webconfig', AdminWebconfigController::class);
    Route::resource('webdesign', AdminWebDesignController::class);
    Route::resource('webimage', AdminWebImageController::class);
    Route::resource('weblayout', AdminWebLayoutController::class);
});
