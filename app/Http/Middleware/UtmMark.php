<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UtmMark
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
        $utmMarks = $request->only([
            'utm_source',
            'utm_medium',
            'utm_campaign',
            'utm_term',
        ]);

        if(!session('checked_utm') && !empty($utmMarks)) {

            if (empty($utmMarks['utm_source'])) {
                $original_ref = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
                switch ($original_ref) {
                    case 'https://www.google.ru/':
                    case 'https://www.google.com/':
                        $utm_source = 'google';
                        break;
                    default:
                        $utm_source = '';
                }
                $utmMarks['utm_source'] = $utm_source;
            }
            if(empty($utmMarks['utm_campaign'])){
                $original_ref = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
                switch ($original_ref) {
                    case 'https://www.google.com/':
                    case 'https://www.google.ru/':
                        $utmMarks['utm_campaign']  = 'organic';
                        break;
                }
            }
            session(['utm_marks'=>json_encode($utmMarks)]);
            session(['checked_utm' => true]);
        }
        return $next($request);
    }
}
