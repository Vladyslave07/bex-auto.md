<?php

namespace App\Models;

use App\Traits\DefaultScope;
use App\Traits\SaveImageAttribute;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Banner extends Model
{
    use CrudTrait, HasTranslations, SaveImageAttribute, DefaultScope;

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
                ->orderBy('sort')
                ->orderBy('id', 'desc')
                ->active()->first(['title', 'subtitle', 'text', 'image']);
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
