<?php

namespace App\Models;

use App\Helper\General;
use App\Traits\DefaultScope;
use App\Traits\SlugOrTitleTrait;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class Brand extends Model
{
    use CrudTrait, HasTranslations, DefaultScope, Sluggable, SluggableScopeHelpers, SlugOrTitleTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'brands';
    protected $fillable = ['active', 'sort', 'title', 'slug', 'show_in_block', 'is_search'];
    protected $translatable = ['title'];
    protected $attributes = ['sort' => 500];

    const INDEX_BRANDS_CACHE_KEY = 'index_brands';
    const SEARCH_TIPS_CACHE_KEY = 'search_tips';

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
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
     * @return mixed
     */
    public static function brands()
    {
        return Cache::remember(General::cacheKey(self::INDEX_BRANDS_CACHE_KEY), 86400, function () {
            return self::query()->orderByRaw("JSON_UNQUOTE(JSON_EXTRACT(brands.title, '$.ru')) ASC")
                ->join('categories', 'brands.slug', '=', 'categories.slug')
                ->where('show_in_block', 1)
                ->where('brands.active', 1)->get(['brands.slug', 'brands.title']);
        });
    }

    /**
     * @return mixed
     */
    public static function searchTips()
    {
        return Cache::remember(General::cacheKey(self::SEARCH_TIPS_CACHE_KEY), 86400, function () {
            return self::query()->where('is_search', 1)->active()->get(['slug', 'title']);
        });
    }

    /**
     * @param $title
     * @return \Illuminate\Database\Eloquent\Builder|Model|object|null
     */
    public static function getBrandByTitle($title)
    {
        return self::query()->whereRaw("UPPER(JSON_UNQUOTE(JSON_EXTRACT(`title`, '$.ru'))) LIKE '%" . strtoupper($title) . "%'")->first();
    }

    /**
     * @param $title
     * @return \Illuminate\Database\Eloquent\Builder|Model|object|null
     */
    public static function getBySlug($slug)
    {
        return self::query()->where('slug', $slug)->first();
    }

    public static function createBrand($title)
    {
        if (!$title) {
            return false;
        }

        $title = Str::ucfirst(Str::lower($title));
        $slug = SlugService::createSlug(Brand::class, 'slug', $title, ['unique' => true]);

        return self::create([
            'active' => 1,
            'title' => $title,
            'slug' => $slug,
        ]);
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
