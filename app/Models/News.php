<?php

namespace App\Models;

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
use Illuminate\Support\Facades\Cache;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Spatie\Sitemap\Contracts\Sitemapable;

class News extends Model implements Sitemapable
{
    use MakesWebp, CrudTrait, HasTranslations, Sluggable, SluggableScopeHelpers, SaveImageAttribute, SlugOrTitleTrait, DefaultScope, SeoSnippets;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'news';
    protected $guarded = ['id'];
    protected $fillable = ['active', 'sort', 'title', 'slug', 'preview_text', 'detail_text', 'image', 'meta_title', 'meta_description'];
    public static $images = ['image'];
    protected $attributes = ['sort' => 500];
    protected $translatable = ['title', 'preview_text', 'detail_text', 'meta_title', 'meta_description'];
    protected $casts = ['active' => 'bool'];

    const NEWS_LIST_CACHE_TAG = 'news_list_';

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public function toSitemapTag(): \Spatie\Sitemap\Tags\Url|string|array
    {
        $url = app('domain')->getDomainUrl() . route('news_detail', ['article' => $this], false);
        return LaravelLocalization::getLocalizedURL(app()->getLocale(), $url);
    }


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'slug_or_title',
            ],
        ];
    }

    /**
     * @param mixed $value
     * @param null $field
     * @return \Illuminate\Database\Eloquent\Builder|Model|\never|object|null
     */
    public function resolveRouteBinding($value, $field = null)
    {
        $cacheKey = $this->table . '_' . $value;
        return Cache::remember($cacheKey, 86400, function () use ($value) {
            return static::findBySlug($value) ?? abort(404);
        });
    }

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * News list
     *
     * @param $page
     * @return mixed
     */
    public static function newsList($page)
    {
        return Cache::remember(self::NEWS_LIST_CACHE_TAG . $page, 86400, function () {
            return self::query()->active()->orderBy('sort', 'asc')->orderBy('id', 'desc')->paginate(4);
        });
    }

    /**
     * Clear cache news list
     */
    public static function clearCacheNewsList()
    {
        $page = 1;
        $newsList = Cache::has(self::NEWS_LIST_CACHE_TAG . $page);
        while ($newsList) {
            $page += 1;
            $newsList = Cache::has(self::NEWS_LIST_CACHE_TAG . $page);
            if ($newsList) {
                Cache::forget(self::NEWS_LIST_CACHE_TAG . $page);
            }
        }
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
#call_back#
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
        return $this->parseSnippets($this->meta_title ?: config('settings.news_meta_title'));
    }

    public function getDetailTextSnippetAttribute()
    {
        if (preg_match('/\#call_back\#/', $this->detail_text)) {
            return preg_replace('/\#call_back\#/', (new \App\View\Components\NewsCallBack)->render(), $this->detail_text);
        }
        return $this->detail_text;
    }

    public function getSeoMetaDescriptionAttribute()
    {
        return $this->parseSnippets($this->meta_description ?: config('settings.news_meta_description'));
    }

}
