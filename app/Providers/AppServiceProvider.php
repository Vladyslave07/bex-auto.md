<?php

namespace App\Providers;

use App\Models\Domain;
use Illuminate\Support\Facades\Config;
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
        $currentDomain = request()->getHost();

        // Определить соединение с базой данных на основе домена
        $connection = $this->resolveConnection($currentDomain);

        // Установить выбранное соединение в конфигурации базы данных Laravel
        // То-же самое происходит и в middleware DatabaseMiddleware, но там уже поздно, т.к. в этот момент уже должно быть соединение с корректной БД
        Config::set('database.default', $connection);

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

    private function resolveConnection($domain): string
    {
        // Логика для определения соединения на основе домена
        switch ($domain) {
            case getenv('APP_DOMAIN'):
                return 'mysql';
            case getenv('KZ_APP_DOMAIN'):
                return 'kz_mysql';
            default:
                return 'mysql'; // соединение по умолчанию
        }
    }
}
