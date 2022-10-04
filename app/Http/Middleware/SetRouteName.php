<?php

namespace App\Http\Middleware;

use App\Services\LaravelLocalizationCustom;
use Closure;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Middleware\LaravelLocalizationMiddlewareBase;

class SetRouteName extends LaravelLocalizationMiddlewareBase
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
        // If the URL of the request is in exceptions.
        if ($this->shouldIgnore($request)) {
            return $next($request);
        }

        $app = app();
        $laravelLocalization = new LaravelLocalizationCustom();
        $routeName = $laravelLocalization->getRouteNameFromAPath($request->getUri());
        $app['laravellocalization']->setRouteName($routeName);

        return $next($request);
    }
}
