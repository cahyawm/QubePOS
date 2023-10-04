<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Cart;
use App\Http\Livewire\Checkout;

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\MenuPaketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DiskonController;
use App\Http\Controllers\JenisDiskonController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StokMasukController;
use App\Http\Controllers\StokKeluarController;
use App\Http\Controllers\PajakController;
use App\Http\Controllers\FoodDeliveryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PayController;
use GuzzleHttp\Psr7\Request;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::resource('kategori', KategoriController::class);
Route::resource('produk', ProdukController::class);
Route::resource('paket', MenuPaketController::class);

// Route::resource('customer', CustomerController::class);

// stok masuk routes
Route::resource('stokmasuk', StokMasukController::class);
Route::get('/cetak/{tglawal}/{tglakhir}', [StokMasukController::class, 'cetak_pdf']);

// stok keluar routes
Route::resource('stokkeluar', StokKeluarController::class);
Route::get('cetakkeluar', [StokKeluarController::class, 'cetak_pdf']);

Route::resource('user', UserController::class);

Route::resource('diskon', DiskonController::class);
Route::resource('jenisdiskon', JenisDiskonController::class);

Route::resource('pajak', PajakController::class);

Route::resource('order', OrderController::class);
Route::get('view-detail/{id}', [OrderController::class, 'detailView']);

Route::resource('laporan', ReportController::class);

// food delivery
Route::resource('grabfood', FoodDeliveryController::class);
Route::get('delivery', function () {
    return view('pages/delivery/index', [
        "title" => "delivery"
    ]);
});

Route::get('cobaaja/{id}', [FoodDeliveryController::class, 'getDeliveryPrice']);

//cashier route
Route::resource('pos', PosController::class);

//livewire
Route::group(['middleware' => ['auth']], function () {
    Route::get('/cart', Cart::class);
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/checkout', Checkout::class);
});

Route::get('/payment/{id}', function ($id) {
    return view('pages.cashier.payment', [
        "title" => "pos",
        "id" => $id,
    ]);
});

Route::post('pay', [PayController::class, 'index']);
Route::post('pay/confirm', [PayController::class, 'pay']);

Route::get('tampilpayment', function () {
    return view('pages/cashier/checkout', [
        "title" => "pos"
    ]);
});
