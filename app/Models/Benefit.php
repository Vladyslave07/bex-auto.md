<?php

namespace App\Models;

use App\Traits\DefaultScope;
use App\Traits\SaveImageAttribute;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Benefit extends Model
{
    use CrudTrait, HasTranslations, DefaultScope, SaveImageAttribute;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'benefits';
    protected $guarded = ['id'];
    protected $fillable = ['active', 'sort', 'title', 'image'];
    protected $attributes = ['sort' => 500];
    protected $casts = ['active' => 'boolean'];
    protected $translatable = ['title'];
    public static $images = ['image'];

    const ALL_BENEFITS_CACHE_KEY = 'all_benefits';

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /**
     * @return mixed
     */
    public static function allBenefits()
    {
        return Cache::remember(self::ALL_BENEFITS_CACHE_KEY, 86400, function () {
            return self::query()->active()->orderBy('sort', 'desc')->get(['title', 'image']);
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
