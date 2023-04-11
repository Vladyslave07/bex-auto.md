<?php

namespace App\Models;

use App\Helper\General;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Domain extends Model
{
    use CrudTrait, HasTranslations;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'domains';
    protected $guarded = ['id'];
    protected $fillable = ['gtm', 'slug', 'title', 'reviews_id', 'phone_mask', 'placeholder', 'lat', 'lng', 'phone', 'country'];
    protected $translatable = ['country'];

    const DEFAULT_DOMAIN = 6;
    const DEFAULT_SLUG_DOMAIN = 'uk';
    const KAZACHSTAN_DOMAIN = 5;
    const PHONE_MASK_CACHE_KEY = 'phone_mask';
    const PHONE_PLACEHOLDER_CACHE_KEY = 'placeholder';
    const PHONE_CACHE_KEY = 'phone';
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

    public static function defaultDomain()
    {
        return self::domainBySlug(self::DEFAULT_SLUG_DOMAIN);
    }

    public static function googleTagManager()
    {
        return self::currentDomain()?->gtm ?? '';
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
            return self::query()->where('slug', $slug)->first() ??
                self::query()->where('id', self::DEFAULT_DOMAIN)->first();
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
     * @return mixed
     */
    public static function phoneForCurrDomain()
    {
        return Cache::remember( General::cacheKey(self::PHONE_CACHE_KEY), now()->addMonth(), function () {
            // todo: Вынести установку домена глобально
            $domainSlug = trim(preg_replace('/(.*)\/\//', '', str_replace(env('APP_DOMAIN'), '', request()->root())), '.') ?: 'uk';

            return self::query()->where('slug', $domainSlug)->first()?->phone;
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

    /**
     * menu relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function menus(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'domain_menu');
    }

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
