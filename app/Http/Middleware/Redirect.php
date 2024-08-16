<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Redirect
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
        $uri = $request->path();
        if (preg_match('/\.(jpg|jpeg|png|gif|css|js|pdf|doc|docx|xls|xlsx)$/i', $uri)) {
            return $next($request);
        }
        if ($uri !== strtolower($uri)) {
            $lowercaseUri = strtolower($uri);
            $newUrl = url($lowercaseUri);
            return redirect($newUrl, 301);
        }

        $urlWithoutLocale = LaravelLocalization::getNonLocalizedURL();
        $redirect = \App\Models\Redirect::query()->where('url_from', $urlWithoutLocale)->first(['url_to', 'quantity', 'type']);
        if ($redirect) {
            $url = LaravelLocalization::getLocalizedUrl(null, $redirect->url_to);
            return redirect($url, $redirect->type);
        }
        return $next($request);
    }
}
