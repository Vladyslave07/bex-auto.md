<?php

namespace App\Models;

use App\Helper\General;
use App\Traits\SaveImageAttribute;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    use HasFactory, CrudTrait, HasTranslations, SaveImageAttribute;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'settings';
    protected $fillable = ['value', 'image', 'key', 'name', 'active', 'field'];
    protected $translatable = ['value'];
    public static $images = ['image'];

    const SETTING_CACHE_KEY = 'setting';

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public static function get(string $key)
    {
        return Cache::remember(General::cacheKey(self::SETTING_CACHE_KEY . '_' . $key), 86400, function () use ($key) {
            return self::query()->where('key', $key)->first(['value'])?->value;
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
