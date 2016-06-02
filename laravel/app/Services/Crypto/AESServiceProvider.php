<?php

namespace App\Services\Crypto;

use Illuminate\Support\ServiceProvider;

class AESServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Bind a singleton instance of the payments class
        $this->app->singleton('AES', function(){
            return new AES;
        });

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
