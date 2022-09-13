<?php

namespace App\Models;

use App\Traits\DefaultScope;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Branch extends Model
{
    use CrudTrait, HasTranslations, DefaultScope;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    const ACTIVE_STATUS_ID = 1;

    protected $table = 'branches';
    protected $guarded = ['id'];
    protected $fillable = ['city', 'address', 'phone', 'sort', 'active', 'lat', 'lng'];
    protected $translatable = ['city', 'address'];
    protected $casts = ['active' => 'bool'];

    const BRANCHES_ITEMS_CACHE_KEY = 'branches_items';

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /**
     * Get active branches
     *
     * @return mixed
     */
    public static function branches()
    {
        return Cache::remember(self::BRANCHES_ITEMS_CACHE_KEY, 86400, function () {
            return  self::query()->orderBy('sort')->active()->get(['city', 'address', 'phone', 'lat', 'lng']);
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
