<?php

namespace App\Providers;

use App\Services\Admin\MenuService;
use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('admin-menu', function ($app) {
            return new MenuService();
        });
    }
}
