<?php

use App\Http\Controllers\AdminAdressMainController;
use App\Http\Controllers\AdminAdressSecondController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminPaymentSuccessController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\AdminStoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RajaOngkirController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\SuperAdminController;
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

// Auth routes
// Auth::routes();

// Home
Route::get('/', [HomeController::class, 'index'])->name('home-customer');

// Web publik Route Customer middleware
Route::group(['middleware' => 'auth:customer'], function () {

    // Profil
    Route::get('profil-alamat', [CustomerController::class, 'alamat'])->name('profilAlamat');
    Route::post('store-alamat', [CustomerController::class, 'storeAlamat'])->name('storeAlamat');
    Route::post('sunting-alamat', [CustomerController::class, 'suntingAlamat'])->name('suntingAlamat');
    Route::delete('hapus-alamat-utama', [CustomerController::class, 'hapusAlamatUtama'])->name('hapusAlamatUtama');
    Route::delete('hapus-alamat-cadangan', [CustomerController::class, 'hapusAlamatCadangan'])->name('hapusAlamatCadangan');
    Route::put('jadikan-alamat-utama', [CustomerController::class, 'jadikanAlamatUtama'])->name('jadikanAlamatUtama');
    
    Route::get('profil-pembelian', [CustomerController::class, 'pembelian'])->name('profilPembelian');

    Route::get('profil-informasi-akun', [CustomerController::class, 'informasiAkun'])->name('profilInformasiAkun');
    Route::put('ubah-password', [CustomerController::class, 'ubahPassword'])->name('ubahPassword');

    // Checkout
    Route::post('store-order', [CheckoutController::class, 'storeOrder'])->name('storeOrder');
    Route::get('keranjang', [CheckoutController::class, 'keranjang'])->name('keranjang');
    Route::post('simpan-keranjang', [CheckoutController::class, 'simpanKeranjang'])->name('simpanKeranjang');
    
    Route::post('proses-keranjang-selanjutnya', [CheckoutController::class, 'setelahKeranjang'])->name('prosesKeranjangSelanjutnya');

    Route::get('form-data-diri', [CheckoutController::class, 'formDataDiri'])->name('formDataDiri');
    Route::post('store-data-diri', [CheckoutController::class, 'storeDataDiri'])->name('storeDataDiri');
    
    Route::get('pilih-kurir', [CheckoutController::class, 'pilihKurir'])->name('pilih-kurir');
    Route::post('ongkir', [CheckoutController::class, 'storeOngkir'])->name('ongkir');
    Route::get('pembayaran', [CheckoutController::class, 'pembayaran'])->name('pembayaran');

    // Raja Ongkir API
    Route::get('asmatLaravel/nama-provinsi/{id}',[RajaOngkirController::class, 'get_province_name']);
    Route::get('asmatLaravel/nama-kota/{id_kota}/{id_provinsi}',[RajaOngkirController::class, 'get_city_name']);
    Route::get('asmatLaravel/nama-kecamatan/{id_kecamatan}/{id_kota}',[RajaOngkirController::class, 'get_kecamatan_name']);

    Route::get('asmatLaravel/kota/{id}',[RajaOngkirController::class, 'get_city']);
    Route::get('asmatLaravel/kecamatan/{id}',[RajaOngkirController::class, 'get_kecamatan']);

    // Route::get('tryEmail', [CheckoutController::class, 'tryEmail']);
});


// Customer Auth
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login-customer');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register-customer');
Route::post('register', [AuthController::class, 'register']);

Route::get('logout', [AuthController::class,'logout'])->name('logout-customer');


// Tentang Kami
Route::get('tentang-kami', function() {
    return view('info.tentangKami');
})->name('tentang-kami');

// Detail Pengiriman
Route::get('detail-pengiriman', function() {
    return view('info.detailPengiriman');
})->name('detail-pengiriman');

// FAQ
Route::get('FAQ', function() {
    return view('info.faq');
})->name('FAQ');

// Cerita Controller
Route::resource('cerita', StoryController::class)->only(['index', 'show']);

// Belanjan (Produk)
Route::resource('belanja', ProductController::class)->only(['index', 'show']);



// -----------------------------------------------------------------------------


// Web Admin Route
Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/admin', [AdminHomeController::class, 'index'])->name('admin.home');

    Route::resource('adminCustomer', AdminCustomerController::class)->only([
        'index', 'create', 'store', 'edit', 'update', 'destroy'
    ]);
    Route::resource('adminAddressMain', AdminAdressMainController::class)->only([
        'index', 'edit', 'update', 'destroy'
    ]);
    Route::resource('adminAddressSecond', AdminAdressSecondController::class)->only([
        'index', 'edit', 'update', 'destroy'
    ]);
    Route::resource('adminProduct', AdminProductController::class)->only([
        'index', 'create', 'store', 'edit', 'update', 'destroy'
    ]);
    Route::resource('adminStory', AdminStoryController::class)->only([
        'index', 'create', 'store', 'edit', 'update', 'destroy'
    ]);
    Route::resource('superAdmin', SuperAdminController::class)->only([
        'index', 'create', 'store', 'edit', 'update', 'destroy'
    ]);
    Route::resource('adminPaymentSuccess', AdminPaymentSuccessController::class)->only([
        'index', 'update', 'destroy'
    ]);
    Route::get('adminIsPending', [AdminOrderController::class, 'isPending']);
    Route::get('adminDelivered', [AdminOrderController::class, 'delivered']);
    
    // Route::get('/logout/admin', [AdminLoginController::class, 'logoutAdmin'])->name('adminLogout');
});

// Admin login
Route::get('login/admin', [AdminLoginController::class, 'showAdminLoginForm'])->name('login-admin');
Route::post('login/admin', [AdminLoginController::class, 'adminLogin']);

// Route::get('register/admin', [AdminRegisterController::class, 'showAdminRegisterForm'])->name('register-admin');
// Route::post('register/admin', [AdminRegisterController::class, 'createAdmin']);

Route::get('logout/admin', [AdminLoginController::class,'logout'])->name('logout-admin');


// ---------------------------------------------------------------------


