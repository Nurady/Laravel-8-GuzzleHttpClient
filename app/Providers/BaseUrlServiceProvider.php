<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BaseUrlServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        require_once app_path(). '/Helpers/BaseUrl.php';
    }

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
