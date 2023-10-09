<?php

namespace App\Models;

use App\Contracts\AdminMenuInterface;
use App\Traits\DefaultScope;
use App\Traits\MakesWebp;
use App\Traits\SaveImageAttribute;
use App\Traits\SeoSnippets;
use App\Traits\SlugOrTitleTrait;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Spatie\Sitemap\Contracts\Sitemapable;

class Service extends Model implements Sitemapable, AdminMenuInterface
{
    use MakesWebp, CrudTrait, HasTranslations, DefaultScope, SeoSnippets, SaveImageAttribute, Sluggable, SluggableScopeHelpers, SlugOrTitleTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'services';
    protected $fillable = ['active', 'sort', 'image', 'sub_title', 'sub_title_text', 'title', 'slug', 'form_slug', 'youtube_link', 'faq_id', 'seo_text_id', 'text', 'meta_title', 'meta_description'];
    protected $translatable = ['title', 'text', 'sub_title', 'sub_title_text', 'meta_title', 'meta_description'];
    protected $attributes = ['sort' => 500];
    protected $casts = ['active' => 'boolean'];
    protected $with = ['faqs', 'seo_text'];
    public static $images = ['image'];
    public static $imageSize = ['width' => 826, 'height' => 614];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public function adminEditPath():string
    {
        return '/' . config('backpack.base.route_prefix') . '/service/' . $this->id . '/edit';
    }

    public function toSitemapTag(): \Spatie\Sitemap\Tags\Url|string|array
    {
        $url = app('domain')->getDomainUrl() . route('service', ['service' => $this], false);
        return LaravelLocalization::getLocalizedURL(app()->getLocale(), $url);
    }

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
    public function seo_text(): \Illuminate\Database\Eloquent\Relations\BelongsTo
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
        return $this->belongsToMany(Faq::class, 'service_faq');
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


    public function getSeoMetaTitleAttribute()
    {
        return $this->parseSnippets($this->meta_title ?: Setting::get('service_meta_title_default'));
    }

    public function getSeoMetaDescriptionAttribute()
    {
        return $this->parseSnippets($this->meta_description ?: Setting::get('service_meta_description_default'));
    }
}
