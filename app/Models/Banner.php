<?php

namespace App\Models;

use App\Traits\DefaultScope;
use App\Traits\MakesWebp;
use App\Traits\SaveImageAttribute;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Banner extends Model
{
    use MakesWebp, CrudTrait, HasTranslations, SaveImageAttribute, DefaultScope;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'banners';
    protected $guarded = ['id'];
    protected $fillable = ['active', 'sort', 'title', 'subtitle', 'text', 'image'];
    protected $attributes = ['sort' => 500, 'image' => ''];
    protected $translatable = ['title', 'subtitle', 'text'];
    protected $casts = ['active' => 'bool'];
    public static $images = ['image'];

    const BANNER_CACHE_KEY = 'banner';
    const BANNER_IMAGE_CACHE_KEY = 'popup_image';
    const IMAGE_FOR_POPUP_ID = 2;

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /**
     * Return banner
     *
     * @return mixed
     */
    public static function banner()
    {
        return Cache::remember(self::BANNER_CACHE_KEY, 86400, function () {
            return  self::query()
                ->whereNot('id', self::IMAGE_FOR_POPUP_ID)
                ->orderBy('sort')
                ->orderBy('id', 'desc')
                ->active()->first(['title', 'subtitle', 'text', 'image']);
        });
    }

    /**
     * Returns image for popup
     *
     * @return mixed
     */
    public static function getImageForPopup()
    {
        return Cache::remember(self::BANNER_IMAGE_CACHE_KEY, 86400, function () {
            if ($banner = self::query()->where('id', self::IMAGE_FOR_POPUP_ID)->first()) {
                return $banner->image;
            }
            return '';
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

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
