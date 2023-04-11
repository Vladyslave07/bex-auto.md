<?php

namespace App\Providers;

use App\Services\DomainService;
use Illuminate\Support\ServiceProvider;

class DomainProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('domain', function ($app) {
            return new DomainService();
        });
    }
}
