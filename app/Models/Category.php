<?php

namespace App\Models;

use App\Traits\DefaultScope;
use App\Traits\SaveImageAttribute;
use App\Traits\SeoSnippets;
use App\Traits\SlugOrTitleTrait;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Category extends Model
{
    use CrudTrait, HasTranslations, DefaultScope, SeoSnippets, SaveImageAttribute, Sluggable, SluggableScopeHelpers, SlugOrTitleTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'categories';
    protected $guarded = ['id'];
    protected $fillable = ['title', 'active', 'slug', 'sort', 'show_in_slider', 'seo_text_id', 'meta_title', 'meta_description', 'image', 'sub_title', 'sub_title_text', 'h1'];
    protected $translatable = ['title', 'meta_title', 'meta_description', 'sub_title', 'sub_title_text', 'h1'];
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
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'slug_or_title',
            ],
        ];
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


    public function getSeoMetaTitleAttribute()
    {
        $title = $this->meta_title ?: config('settings.category_meta_title_default');
        return $this->parseSnippets($title);
    }

    public function getSeoMetaDescriptionAttribute()
    {
        return $this->parseSnippets($this->meta_description ?: config('settings.category_meta_description_default'));
    }
}
