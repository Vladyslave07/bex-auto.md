<?php

namespace App\Models;

use App\Traits\SaveImageAttribute;
use App\Traits\SlugOrTitleTrait;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Menu extends Model
{
    use CrudTrait, HasTranslations, Sluggable, SluggableScopeHelpers, SaveImageAttribute, SlugOrTitleTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    const ACTIVE_STATUS_ID = 1;

    const CATALOG_MENU_SLUG = 'catalog';
    const ABOUT_MENU_SLUG = 'about';

    protected $table = 'menus';
    protected $fillable = ['slug', 'title', 'sort', 'items', 'active', 'image'];
    protected $casts = ['items' => 'array', 'active' => 'bool'];
    public static $images = ['image'];
    protected $translatable = ['title', 'items'];
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

    public static function footerMenu()
    {
        return Cache::remember('footer_menu_items', 86400, function () {
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

    /**
     * returns only active menu item
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('active', self::ACTIVE_STATUS_ID);
    }

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
