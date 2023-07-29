<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    protected $helpers = [
        // Add your helpers in here
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach (glob(app_path() . '/Helpers/*.php') as $filename) {
            require_once($filename);
        }
    }

    /**
     * Register the application services.
     */
    /* public function register()
    {
        foreach ($this->helpers as $helper) {
            $helper_path = app_path().'/Helpers/'.$helper.'.php';

            if (\File::isFile($helper_path)) {
                require_once $helper_path;
            }
        }
    } */

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
