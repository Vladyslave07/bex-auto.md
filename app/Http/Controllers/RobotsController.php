<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReviewResource;
use App\Models\Domain;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RobotsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $path = public_path('uploads/robots.txt');
        if (app('domain')->getDomain()?->slug == Domain::KAZACHSTAN_SLUG_DOMAIN) {
            $path = public_path('uploads/kz_robots.txt');
        }
        if (File::exists($path)) {
            $robotsTxt = file_get_contents($path);
            return response($robotsTxt, 200)->header('Content-Type', 'text/plain');
        }
        abort(404);
    }
}
