<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RajaOngkirController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('midtrans/notification', [CheckoutController::class, 'notification']);

// Raja Ongkir API
// Route::get('asmatLaravel/province',[RajaOngkirController::class, 'get_province']);
Route::get('asmatLaravel/nama-provinsi/{id}',[RajaOngkirController::class, 'get_province_name']);
Route::get('asmatLaravel/nama-kota/{id_kota}',[RajaOngkirController::class, 'get_city_name']);
Route::get('asmatLaravel/nama-kecamatan/{id_kecamatan}',[RajaOngkirController::class, 'get_kecamatan_name']);

Route::get('asmatLaravel/kota/{id}',[RajaOngkirController::class, 'get_city']);
Route::get('asmatLaravel/kecamatan/{id}',[RajaOngkirController::class, 'get_kecamatan']);

Route::get('asmatLaravel/statusPaket/{resi}/{ekspedisi}',[RajaOngkirController::class, 'statusPaket']);

// Route::get('kirimEmail',[CustomerController::class, 'kirimEmail']);

// Route::get('ongkir/{desti}/{weight}/{courier}',[RajaOngkirController::class, 'ongkir']);