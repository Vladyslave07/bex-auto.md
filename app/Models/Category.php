<?php

namespace App\Models;

use App\Contracts\AdminMenuInterface;
use App\Helper\General;
use App\Traits\DefaultScope;
use App\Traits\MakesWebp;
use App\Traits\SaveImageAttribute;
use App\Traits\SeoSnippets;
use App\Traits\SlugOrTitleTrait;
use Artesaos\SEOTools\Facades\SEOTools;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Support\Facades\Cache;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Spatie\Sitemap\Contracts\Sitemapable;

class Category extends Model implements Sitemapable, AdminMenuInterface
{
    use MakesWebp, CrudTrait, HasTranslations, DefaultScope, SeoSnippets, SaveImageAttribute, Sluggable, SluggableScopeHelpers, SlugOrTitleTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'categories';
    protected $guarded = ['id'];
    protected $fillable = ['title', 'active', 'slug', 'sort', 'show_in_slider', 'seo_text_id', 'meta_title', 'meta_description', 'image', 'sub_title', 'sub_title_text', 'h1', 'add_to_feed'];
//    protected $translatable = ['title', 'meta_title', 'meta_description', 'sub_title', 'sub_title_text', 'h1'];
    protected $translatable = ['title', 'sub_title', 'sub_title_text',];
    protected $attributes = ['sort' => 500];

    public static $images = ['image'];
    public static $imageSize = ['width' => 826, 'height' => 614];

    const CATEGORIES_IN_SLIDER_CACHE_KEY = 'categories_show_in_slider';
    const SEO_TEXT_CACHE_KEY = 'seo_text';
    const INDEX_CATEGORY_SLUG = 'avto';

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public function adminEditPath():string
    {
        return '/' . config('backpack.base.route_prefix') . '/category/' . $this->id . '/edit';
    }

    public function toSitemapTag(): \Spatie\Sitemap\Tags\Url|string|array
    {
        $url = app('domain')->getDomainUrl() . route('category', ['category' => $this], false);
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

    /**
     * category which selected for show in slider
     *
     */
    public static function selectedCategory()
    {
        return Cache::remember(General::cacheKey(self::CATEGORIES_IN_SLIDER_CACHE_KEY), 86400, function () {
            return self::query()->where('show_in_slider', true)
                ->orderBy('sort')->get(['id', 'title', 'slug']);
        });
    }

    /**
     * Get cars or products if cars not exists for current category
     *
     */
    public function carsOrProducts()
    {
        $items = $this->cars()->active();
        if ($items->count() >= 1) {
            return $items;
        }

        return $this->products()->active();
    }

    /**
     * @return Category
     */
    public static function indexCategory(): Category
    {
        return Cache::remember(General::cacheKey(self::INDEX_CATEGORY_SLUG), 86400, function () {
            return self::query()->where('slug', self::INDEX_CATEGORY_SLUG)->first();
        });
    }

    public function setSeo()
    {
        SEOTools::setTitle($this->seo_meta_title);
        SEOTools::setDescription($this->seo_meta_description);
        SEOTools::opengraph()->addImage(asset(\App\Helper\ImageHelper::logoPath()));
        SEOTools::opengraph()->addProperty('locale', General::getOgLocale());
        SEOTools::opengraph()->addProperty('url', request()->url());
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * seo text
     *
     * @return BelongsTo
     */
    public function text(): BelongsTo
    {
        return $this->belongsTo(SeoText::class, 'seo_text_id');
    }

    /**
     * categories relationship
     *
     * @return BelongsToMany
     */
    public function faqs(): BelongsToMany
    {
        return $this->belongsToMany(Faq::class, 'category_faq');
    }

    /**
     * categories relationship
     *
     * @return BelongsToMany
     */
    public function cars(): BelongsToMany
    {
        return $this->belongsToMany(Car::class, 'car_category');
    }

    public function products(): hasMany
    {
        return $this->hasMany(Product::class, 'category_id');
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

    public function getDomainH1Attribute()
    {
        if (strlen($this->h1) <= 0) {
            return __('category.default_h1', ['title' => $this->title, 'country' =>  app('domain')->getDomain()->country]);
        }
        return $this->parseSnippets($this->h1);
    }

    public function getDomainSubTitleAttribute()
    {
        if (strlen($this->sub_title) <= 0) {
            return '';
        }
        return $this->parseSnippets($this->sub_title);
    }

    public function getDomainSubTitleTextAttribute()
    {
        if (strlen($this->sub_title_text) <= 0) {
            return '';
        }
        return $this->parseSnippets($this->sub_title_text);
    }

    public function getCountryAttribute()
    {
        return Domain::currentDomain()?->country;
    }

    public function getSeoMetaTitleAttribute()
    {
        $title = $this->domain_meta_title ?: Setting::get('category_meta_title_default');
        return $this->parseSnippets($title);
    }

    public function getSeoMetaDescriptionAttribute()
    {
        return $this->parseSnippets($this->domain_meta_description ?: Setting::get('category_meta_description_default'));
    }

    public function getSeoTextAttribute()
    {
        return Cache::remember($this->seo_text_id . '_' . self::SEO_TEXT_CACHE_KEY, 86400, function () {
            return SeoText::query()->find($this->seo_text_id, ['title', 'text']);
        });
    }


    public function getDomainMetaTitleAttribute()
    {
        $key = Domain::currentDomain()->slug;
        $titleArray = json_decode($this->meta_title, true) ?? [];
        return key_exists($key, $titleArray) ? $titleArray[$key] : '';
    }

    public function getDomainMetaDescriptionAttribute()
    {
        $key = Domain::currentDomain()->slug;
        $descriptionArray = json_decode($this->meta_description, true) ?? [];
        return key_exists($key, $descriptionArray) ? $descriptionArray[$key] : '';
    }

    public function getDomainSeoTextIdAttribute()
    {
        $key = Domain::currentDomain()->slug;
        $seoTextIdArray = json_decode($this->seo_text_id, true) ?? [];

        if (is_array($seoTextIdArray)) {
            return key_exists($key, $seoTextIdArray) ? $seoTextIdArray[$key] : '';
        }
        return $this->seo_text_id;
    }

    public function getIsIndexAttribute(): bool
    {
        return $this->slug === self::INDEX_CATEGORY_SLUG;
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    public function setMetaTitleAttribute($value)
    {
        if (strlen($this->meta_title) > 0) {
            $titleArray = json_decode($this->meta_title, true);
            $titleArray[Domain::currentDomain()->slug] = $value;
            $this->attributes['meta_title'] = json_encode($titleArray);
        } else {
            $this->attributes['meta_title'] = json_encode([Domain::currentDomain()->slug => $value]);
        }
    }

    public function setMetaDescriptionAttribute($value)
    {
        if (strlen($this->meta_description) > 0) {
            $descriptionArray = json_decode($this->meta_description, true);
            $descriptionArray[Domain::currentDomain()->slug] = $value;
            $this->attributes['meta_description'] = json_encode($descriptionArray);
        } else {
            $this->attributes['meta_description'] = json_encode([Domain::currentDomain()->slug => $value]);
        }
    }

}
