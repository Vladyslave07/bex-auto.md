<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReviewResource;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return ReviewResource
     */
    public function __invoke(Request $request)
    {
        return new ReviewResource(Review::query()->active()->paginate(100));
    }
}
