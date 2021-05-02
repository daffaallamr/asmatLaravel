<?php

namespace App\Providers;

use App\Models\Order;
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
        $keranjang = Order::where('customer_id', Auth::id())->where('is_checkout', 0)->first();
        
        if ($keranjang == null) {
            $isiKeranjang = 0;
        } else {
            $isiKeranjang = $keranjang->orderDetails->sum();
        }

        View::composer('layouts.navbar', function ($view) use($isiKeranjang) {
            $view->with('isiKeranjang', $isiKeranjang);
        });
    }
}
