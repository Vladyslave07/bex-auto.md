<?php

namespace App\Models;

use App\Traits\DefaultScope;
use App\Traits\SaveImageAttribute;
use App\Traits\SlugOrTitleTrait;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Menu extends Model
{
    use CrudTrait, HasTranslations, Sluggable, SluggableScopeHelpers, SaveImageAttribute, SlugOrTitleTrait, DefaultScope;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    const ACTIVE_STATUS_ID = 1;

    const CATALOG_MENU_SLUG = 'avto';
    const ABOUT_MENU_SLUG = 'about';
    const REVIEWS_MENU_ITEM_SLUG = 'reviews';
    const ABOUT_MENU_ITEM_SLUG = 'about';

    protected $table = 'menus';
    protected $fillable = ['slug', 'title', 'sort', 'items', 'active', 'image', 'show_link'];
    protected $casts = ['items' => 'array', 'active' => 'bool', 'show_link' => 'bool'];
    public static $images = ['image'];
    protected $translatable = ['title', 'items'];
    protected $attributes = ['sort' => 500, 'image' => ''];

    const FOOTER_MENU_CACHE_KEY = 'footer_menu_items';
    const MAIN_MENU_CACHE_KEY = 'main_menu_items';

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

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
     * returned header menu items
     *
     * @return mixed
     */
    public static function menuItems()
    {
        return Cache::remember(self::MAIN_MENU_CACHE_KEY, 86400, function () {
            return self::query()->orderBy('sort')->active()->get(['slug', 'title', 'items', 'image', 'show_link']);
        });
    }

    /**
     * Return locales menu url
     *
     * @param $category
     * @param $link
     * @return string
     */
    public static function localeMenuLinks($category, $link)
    {
        $locale = app()->getLocale();
        if (LaravelLocalization::getCurrentLocale() === LaravelLocalization::getDefaultLocale()) {
            $locale = false;
        }

        // todo: delete it when reviews page is create
        if ($link === self::REVIEWS_MENU_ITEM_SLUG) {
            return LaravelLocalization::localizeURL('/#reviews', $locale);
        }

        if ($category === self::ABOUT_MENU_ITEM_SLUG) {
            return LaravelLocalization::localizeURL($link, $locale);
        }

        return LaravelLocalization::localizeURL(sprintf('/%s/%s', $category, $link), $locale);
    }

    /**
     * Return locales menu url
     *
     * @param $category
     * @param $link
     * @return string
     */
    public static function localeMenuLink($link)
    {
        $locale = app()->getLocale();
        if (LaravelLocalization::getCurrentLocale() === LaravelLocalization::getDefaultLocale()) {
            $locale = false;
        }

        return LaravelLocalization::localizeURL($link, $locale);
    }

    public static function footerMenu()
    {
        return Cache::remember(self::FOOTER_MENU_CACHE_KEY, 86400, function () {
            $collectionMenu = self::query()
                ->active()
                ->whereIn('slug', [self::CATALOG_MENU_SLUG, self::ABOUT_MENU_SLUG])
                ->get(['slug', 'title', 'items']);

            return [
                'about' => $collectionMenu->where('slug', self::ABOUT_MENU_SLUG)->first(),
                'catalog' => $collectionMenu->where('slug', self::CATALOG_MENU_SLUG)->first(),
            ];
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

    /**
     * return children menus and convert json to array
     *
     * @return array|mixed
     */
    public function getChildrenAttribute()
    {
        return json_decode($this->items, true) ?? [];
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

}
