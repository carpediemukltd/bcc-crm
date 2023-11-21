<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrap();
        // //defaultStringLength changed to 191 to support mysql below 5.7
        Schema::defaultStringLength(191);



        // Paginator::defaultView('custom-pagination');
        // Paginator::defaultSimpleView('simple-pagination');
    }
}
