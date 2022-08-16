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
        return Cache::remember($slug . '_seo_text', 86400, function () use ($slug) {
            return self::query()->where('slug', $slug)->active()->first(['title', 'text']);
        });
    }

    /**
     * @return mixed
     */
    public static function mainText()
    {
        return Cache::remember( 'main_seo_text', 86400, function () {
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
