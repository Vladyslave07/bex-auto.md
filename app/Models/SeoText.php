<?php

namespace App\Models;

use App\Helper\General;
use App\Traits\DefaultScope;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Cache;

class SeoText extends Model
{
    use CrudTrait, HasTranslations, DefaultScope;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    const MAIN_PAGE_SEO_TEXT_SLUG = 'main';
    const ABOUT_SEO_TEXT_SLUG = 'about_seo_text';
    const PRIVACY_SEO_TEXT_SLUG = 'privacy';

    protected $table = 'seo_texts';
    protected $guarded = ['id'];
    protected $fillable = ['active', 'sort', 'title', 'text', 'slug', 'main'];
    protected $translatable = ['title', 'text'];
    protected $attributes = ['sort' => 500];
    protected $casts = ['main' => 'boolean'];

    const MAIN_SEO_TEXT_CACHE_KEY = 'main_seo_text';

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /**
     * @param string $slug
     * @return mixed
     */
    public static function seoTextBySlug(string $slug)
    {
        return Cache::remember((new SeoText)->getTable() . '_' . $slug, 86400, function () use ($slug) {
            return self::query()->where('slug', $slug)->active()->first(['title', 'text']);
        });
    }

    /**
     * @return mixed
     */
    public static function mainText()
    {
        return Cache::remember(General::cacheKey(self::MAIN_SEO_TEXT_CACHE_KEY), 86400, function () {
            return self::query()->where('main', 1)->active()->first(['title', 'text']);
        });
    }

    /**
     * About seo text
     *
     * @return mixed
     */
    public static function aboutSeoText()
    {
        return self::seoTextBySlug(self::ABOUT_SEO_TEXT_SLUG);
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
