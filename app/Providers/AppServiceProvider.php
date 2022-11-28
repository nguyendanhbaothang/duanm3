<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();

        view()->composer('*', function ($view)
        {
            $cart = session('cart', []);
            $view->with('cart', $cart );
        });

        // $v_categories = Category::all();
        // View::share('v_categories', $v_categories);
    }
}
