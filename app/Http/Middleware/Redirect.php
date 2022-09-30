<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

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
        $redirect = \App\Models\Redirect::query()->where('url_from', $request->getUri())->first(['url_to', 'quantity', 'type']);
        if ($redirect) {
            $redirect->increment('quantity', 1);
            return redirect($redirect->url_to, $redirect->type);
        }
        return $next($request);
    }
}
