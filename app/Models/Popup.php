<?php

namespace App\Models;

use App\Helper\General;
use App\Traits\DefaultScope;
use App\Traits\SaveImageAttribute;
use App\Traits\SlugOrTitleTrait;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Cache;

class Popup extends Model
{
    use CrudTrait, SaveImageAttribute, DefaultScope, HasTranslations, Sluggable, SluggableScopeHelpers, SlugOrTitleTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    const POPUP_SLUG_KEY = 'popup_';
    const MAIN_POPUP_KEY = 'main_popup';

    protected $table = 'popups';
    protected $guarded = ['id'];
    protected $fillable = ['active', 'sort', 'title', 'slug', 'image', 'main'];
    public static $images = ['image'];
    protected $translatable = ['image'];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    protected static function boot()
    {
        parent::boot();

        static::saving(function() {
            Cache::forget(General::cacheKey(self::MAIN_POPUP_KEY));
        });
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'slug_or_title',
                'unique' => true,
            ],
        ];
    }

    public static function getPopupByCategory(Category $category)
    {
        return Cache::remember(General::cacheKey(self::POPUP_SLUG_KEY . $category->slug), 86400, function () use ($category) {
            return self::query()->active()->whereHas('categories', function ($query) use ($category) {
                return $query->where('category_id', $category->id);
            })->first();
        });
    }

    public static function getMainPopup()
    {
        return Cache::remember(General::cacheKey(self::MAIN_POPUP_KEY), 86400, function () {
            return self::query()->active()->where('main', 1)->first();
        });
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_popup');
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
}
