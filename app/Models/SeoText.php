<?php

namespace App\Models;

use App\Traits\DefaultScope;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
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
        return Cache::remember( self::MAIN_SEO_TEXT_CACHE_KEY, 86400, function () {
            return self::query()->where('main', 1)->active()->first(['title', 'text']);
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
