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

        $order = Order::where('is_checkout', 0)->with('customer')->with('orderDetails')->get();
        
        // dd($order);
        // $isiKeranjang = 0;

        // foreach ($order->orderDetails as $detail) {
        //     $isiKeranjang++;
        // }

        view()->composer(
            'layouts.navbar',
            function ($view) use($order) {
                $view->with('order', $order);
            }
        );
    }
}
