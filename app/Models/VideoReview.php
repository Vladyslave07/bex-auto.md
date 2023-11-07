<?php

namespace App\Models;

use App\Helper\General;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class VideoReview extends Model
{
    use CrudTrait;

    const LAST_THREE_REVIEWS_CACHE_KEY = 'last_three_reviews';
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'video_reviews';
    protected $fillable = ['active', 'sort', 'title', 'video'];


    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public static function getLastThreeVideo()
    {
        return Cache::remember(General::cacheKey(self::LAST_THREE_REVIEWS_CACHE_KEY), 86400, function () {
            return self::where('active', true)->orderBy('sort', 'asc')->orderBy('created_at', 'desc')->limit(3)->get();
        });
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
