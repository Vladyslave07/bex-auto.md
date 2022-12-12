<?php

namespace App\Models;

use App\Helper\General;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Domain extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'domains';
    protected $guarded = ['id'];
    protected $fillable = ['slug', 'title', 'reviews_id', 'phone_mask', 'placeholder', 'lat', 'lng'];

    const DEFAULT_DOMAIN = 6;
    const PHONE_MASK_CACHE_KEY = 'phone_mask';
    const PHONE_PLACEHOLDER_CACHE_KEY = 'placeholder';
    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public static function currentDomain()
    {
        // todo: Вынести установку домена глобально
        $domainSlug = trim(preg_replace('/(.*)\/\//', '', str_replace(env('APP_DOMAIN'), '', request()->root())), '.') ?: 'uk';
        return self::domainBySlug($domainSlug);
    }

    /**
     * Returns domains with reviews id
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function domainsWithReviews()
    {
        return self::query()->whereNotNull('reviews_id')->get();
    }

    /**
     * @param string $slug
     * @return mixed
     */
    public static function domainBySlug(string $slug)
    {
        return Cache::remember( $slug . '_domain', now()->addMonth(), function () use ($slug) {
            return self::query()->where('slug', $slug)->first();
        });
    }

    /**
     * @return mixed
     */
    public static function phoneMaskForCurrDomain()
    {
        return Cache::remember( General::cacheKey(self::PHONE_MASK_CACHE_KEY), now()->addMonth(), function () {
            // todo: Вынести установку домена глобально
            $domainSlug = trim(preg_replace('/(.*)\/\//', '', str_replace(env('APP_DOMAIN'), '', request()->root())), '.') ?: 'uk';

            return self::query()->where('slug', $domainSlug)->first()?->phone_mask;
        });
    }

    /**
     * @return mixed
     */
    public static function phonePlaceholderForCurrDomain()
    {
        return Cache::remember( General::cacheKey(self::PHONE_PLACEHOLDER_CACHE_KEY), now()->addMonth(), function () {
            // todo: Вынести установку домена глобально
            $domainSlug = trim(preg_replace('/(.*)\/\//', '', str_replace(env('APP_DOMAIN'), '', request()->root())), '.') ?: 'uk';

            return self::query()->where('slug', $domainSlug)->first()?->placeholder;
        });
    }

    /**
     * List of domains
     *
     * @return mixed
     */
    public static function list()
    {
        return Cache::remember('domain_list', now()->addMonth(), function () {
            return self::query()->get();
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
