<?php

namespace App\Providers;

use App\Http\Files\IUpload;
use App\Http\Files\NominaFileUpload;
use Illuminate\Support\ServiceProvider;

class FileServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton(IUpload::class, function ($app) {
            return new NominaFileUpload();
        });
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
