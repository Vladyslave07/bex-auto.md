<?php

namespace App\Http\Middleware;

use App\Models\Domain;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class SetDefaultLocale
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
        $domain = app('domain')->getDomain();
        $locale = $request->cookie('locale', false);

        if (empty($locale) && $domain?->slug === Domain::DEFAULT_SLUG_DOMAIN && app('laravellocalization')->checkLocaleInSupportedLocales($locale)) {
            $redirection = app('laravellocalization')->getLocalizedURL(Domain::DEFAULT_SLUG_DOMAIN);
            $redirectResponse = new RedirectResponse($redirection, 302, ['Vary' => 'Accept-Language']);

            return $redirectResponse->withCookie(cookie()->forever('locale', Domain::DEFAULT_SLUG_DOMAIN));
        }

        return $next($request);
    }
}
