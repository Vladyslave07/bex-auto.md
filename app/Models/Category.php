<?php

namespace App\Models;

use App\Traits\DefaultScope;
use App\Traits\SaveImageAttribute;
use App\Traits\SeoSnippets;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Mcamara\LaravelLocalization\Interfaces\LocalizedUrlRoutable;

class Category extends Model implements LocalizedUrlRoutable
{
    use CrudTrait, HasTranslations, DefaultScope, SeoSnippets, SaveImageAttribute;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'categories';
    protected $guarded = ['id'];
    protected $fillable = ['title', 'active', 'slug', 'sort', 'show_in_slider', 'seo_text_id', 'meta_title', 'meta_description', 'image', 'sub_title', 'sub_title_text', 'h1'];
    protected $translatable = ['title', 'slug', 'meta_title', 'meta_description', 'sub_title', 'sub_title_text', 'h1'];
    protected $attributes = ['sort' => 500];
    public static $images = ['image'];

    const CATEGORIES_IN_SLIDER_CACHE_KEY = 'categories_show_in_slider';
    const SEO_TEXT_CACHE_KEY = 'seo_text';

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /**
     * Returns localized slug from model
     *
     * @param $locale
     * @return mixed
     */
    public function getLocalizedRouteKey($locale)
    {
        return json_decode($this->original['slug'])->$locale;
    }

    /**
     * @param mixed $value
     * @param null $field
     * @return \Illuminate\Database\Eloquent\Builder|Model|\never|object|null
     */
    public function resolveRouteBinding($value, $field = null)
    {
        $cacheKey = $value . '_' . app()->getLocale();
        return Cache::remember($this->getTable() . '_' . $cacheKey, 86400, function () use ($value) {
            return static::findByLocalizedSlug($value)->first() ?? abort(404);
        });
    }

    /**
     * @param $slug
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function findByLocalizedSlug($slug)
    {
        return static::query()->where($this->getRouteKeyName() . '->' . app()->getLocale(), $slug);
    }

    /**
     * @param $slug
     * @return \Illuminate\Database\Eloquent\Builder|Model|object|null
     */
    public function findBySlug($slug)
    {
        return static::findByLocalizedSlug($slug)->first();
    }

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * category which selected for show in slider
     *
     */
    public static function selectedCategory()
    {
        return Cache::remember(self::CATEGORIES_IN_SLIDER_CACHE_KEY, 86400, function () {
            return self::query()->where('show_in_slider', true)->get(['id', 'title', 'slug']);
        });
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * seo text
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function text(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(SeoText::class, 'seo_text_id');
    }

    /**
     * categories relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function faqs(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Faq::class, 'category_faq');
    }

    /**
     * categories relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function cars(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Car::class, 'car_category');
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

    public function getSeoTextAttribute()
    {
        return Cache::remember( $this->seo_text_id . '_' . self::SEO_TEXT_CACHE_KEY, 86400, function () {
            return SeoText::query()->find($this->seo_text_id, ['title', 'text']);
        });

    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
    public function sluggable(): array
    {
        // TODO: Implement sluggable() method.
    }

    public function getSeoMetaTitleAttribute()
    {
        return $this->parseSnippets($this->meta_title ?: config('settings.category_meta_title_default'));
    }

    public function getSeoMetaDescriptionAttribute()
    {
        return $this->parseSnippets($this->meta_description ?: config('settings.category_meta_description_default'));
    }
}
