<?php

namespace App\Providers;

use App\Models\Order;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::defaultView('vendor.pagination.custom-pagination');

        // $user = Auth::guard('customer')->check();
        // $keranjang = Order::where('customer_id', Auth('customer')->id())->where('is_checkout', 0)->first();
        // dd($user);
        
        // if ($keranjang->isEmpty()) {
        //     // belum ada keranjang
        //     $isiKeranjang = 'Yaps';
        // } elseif ($keranjang->orderDetails->isEmpty()) {
        //     // ada keranjang tapi isinya kosong
        //     $isiKeranjang = 'ASD';
        // } else {
        //     // keranjangnya berisi
        //     $isiKeranjang = $keranjang->orderDetails->sum();
        // }

        // View::composer('layouts.navbar', function ($view) use($isiKeranjang) {
        //     $view->with('isiKeranjang', $isiKeranjang);
        // });
    }
}
