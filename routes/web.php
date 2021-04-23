<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoryController;
use App\Models\Customer;
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

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

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
Route::resource('cerita', StoryController::class);

// Profil
Route::get('profil-alamat', [CustomerController::class, 'alamat'])->name('profil-alamat');

// Belanjan (Produk)
Route::resource('belanja', ProductController::class);

// Order
Route::resource('order', OrderController::class);

// Checkout
Route::get('/keranjang/{orderId}', [CheckoutController::class, 'keranjang'])->name('keranjang');
Route::post('data-diri', [CheckoutController::class, 'afterKeranjang'])->name('data-diri');
Route::post('simpan-data-diri', [CheckoutController::class, 'storeDataDiri'])->name('simpan-data-diri');
Route::get('pilih-kurir', [CheckoutController::class, 'pilihKurir'])->name('pilih-kurir');
Route::post('ongkir', [CheckoutController::class, 'storeOngkir'])->name('ongkir');
Route::get('pembayaran', [CheckoutController::class, 'pembayaran'])->name('pembayaran');

// Ongkir API
Route::get('/kota/{id}',[CheckoutController::class, 'get_city']);
Route::get('/kecamatan/{id}',[CheckoutController::class, 'get_kecamatan']);

// Profil
Route::get('profil-pembelian', [CustomerController::class, 'pembelian'])->name('profil-pembelian');
Route::get('profil-informasi-akun', [CustomerController::class, 'informasiAkun'])->name('profil-informasi-akun');
Route::get('profil-alamat', [CustomerController::class, 'alamat'])->name('profil-alamat');


// Auth
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);

