<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReviewResource;
use App\Models\Domain;
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
        // todo: Вынести установку домена глобально
        $domainSlug = trim(preg_replace('/(.*)\/\//', '', str_replace(env('APP_DOMAIN'), '', request()->root())), '.') ?: 'uk';
        $domain = Domain::domainBySlug($domainSlug);

        return new ReviewResource(Review::query()->active()->where('domain_id', $domain->id)->paginate(100));
    }
}
