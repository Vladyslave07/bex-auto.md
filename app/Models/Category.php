<?php

namespace App\Models;

use App\Traits\DefaultScope;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Mcamara\LaravelLocalization\Interfaces\LocalizedUrlRoutable;

class Category extends Model
{
    use CrudTrait, HasTranslations, DefaultScope;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'categories';
    protected $guarded = ['id'];
    protected $fillable = ['title', 'active', 'slug', 'sort', 'show_in_slider', 'seo_text_id'];
    protected $translatable = ['title', 'slug'];
    protected $attributes = ['sort' => 500];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /**
     * @param mixed $value
     * @param null $field
     * @return \Illuminate\Database\Eloquent\Builder|Model|\never|object|null
     */
    public function resolveRouteBinding($value, $field = null)
    {
        $cacheKey = $value . '_' . app()->getLocale();
        return Cache::remember($cacheKey, 86400, function () use ($value) {
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
        return Cache::remember('categories_show_in_slider', 86400, function () {
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
        return Cache::remember( $this->seo_text_id . '_seo_text', 86400, function () {
            return SeoText::query()->find($this->seo_text_id, ['title', 'text']);
        });

    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
