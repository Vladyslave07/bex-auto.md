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
    protected $translatable = ['title', 'subtitle', 'text', 'image'];
    protected $casts = ['active' => 'bool'];
    public static $images = ['image'];

    const BANNER_CACHE_KEY = 'banner';
    const BANNER_IMAGE_CACHE_KEY = 'popup_image';
    const IMAGE_FOR_POPUP_ID_KZ = 2;
    const IMAGE_FOR_POPUP_ID_UK = 3;

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
                ->whereNotIn('id', [self::IMAGE_FOR_POPUP_ID_KZ, self::IMAGE_FOR_POPUP_ID_UK])
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
        $domain = Domain::currentDomain();
        return Cache::remember(self::BANNER_IMAGE_CACHE_KEY . '_' . $domain->slug . '_' . app()->getLocale(), 86400, function () use($domain) {
            $id = $domain->id == Domain::DEFAULT_DOMAIN ? self::IMAGE_FOR_POPUP_ID_UK : self::IMAGE_FOR_POPUP_ID_KZ;
            if ($banner = self::query()->where('id', $id)->first()) {
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
