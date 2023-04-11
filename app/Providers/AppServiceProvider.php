<?php

namespace App\Providers;

use App\Models\Domain;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

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
        Str::macro('phoneNumber', function ($string) {
            return preg_replace('/[^0-9]/', '', $string);
        });

        if (!app()->runningInConsole()) {
            $domain = Domain::currentDomain();
        } else {
            $domain = Domain::defaultDomain();
        }
        app('domain')->setDomain($domain);
    }
}
