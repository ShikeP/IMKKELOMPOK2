<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('partials.cart_panel', function ($view) {
            $cartItems = [];
            $total = 0;
            if (Auth::check()) {
                $cartItems = Cart::with('food')->where('user_id', Auth::id())->get();
                $total = $cartItems->sum(function($item) {
                    return $item->food->price * $item->quantity;
                });
            }
            $view->with(compact('cartItems', 'total'));
        });
    }
}
