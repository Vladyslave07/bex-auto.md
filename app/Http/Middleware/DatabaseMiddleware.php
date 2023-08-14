<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class DatabaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $currentDomain = $request->getHost();

        // Определить соединение с базой данных на основе домена
        $connection = $this->resolveConnection($currentDomain);

        // Установить выбранное соединение в конфигурации базы данных Laravel
        Config::set('database.default', $connection);

        return $next($request);
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
