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

    protected $table = 'menus';
    protected $fillable = ['slug', 'title', 'sort', 'items', 'active', 'image'];
    protected $casts = ['items' => 'array', 'active' => 'bool'];
    public static $images = ['image'];
    protected $translatable = ['title', 'items', 'slug'];
    protected $attributes = ['sort' => 500, 'image' => ''];

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
        return Cache::remember('main_menu_items', 86400, function () {
            return  self::query()->orderBy('sort')->active()->get(['slug', 'title', 'items', 'image']);
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

        return LaravelLocalization::localizeURL(sprintf('/%s/%s', $category, $link), $locale);
    }

    public static function footerMenu()
    {
        return Cache::remember('footer_menu_items', 86400, function () {
            $collectionMenu = self::query()
                ->active()
                ->whereIn('slug->ru', [self::CATALOG_MENU_SLUG, self::ABOUT_MENU_SLUG])
                ->get(['slug', 'title', 'items']);

            return [
                'about' => $collectionMenu->where('slug->ru', self::ABOUT_MENU_SLUG)->first(),
                'catalog' => $collectionMenu->where('slug->ru', self::CATALOG_MENU_SLUG)->first(),
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
