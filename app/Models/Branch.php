<?php

namespace App\Models;

use App\Traits\DefaultScope;
use App\Traits\SaveImageAttribute;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Branch extends Model
{
    use CrudTrait, HasTranslations, DefaultScope, SaveImageAttribute;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    const ACTIVE_STATUS_ID = 1;

    protected $table = 'branches';
    protected $guarded = ['id'];
    protected $fillable = ['city', 'address', 'phone', 'sort', 'active', 'lat', 'lng', 'domain_id', 'images', 'weekdays', 'weekends'];
    protected $translatable = ['city', 'address', 'weekdays', 'weekends'];
    protected $casts = ['active' => 'bool', 'images' => 'array'];
    protected $attributes = ['images' => ''];
    public static $images = ['images'];

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function domain(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Domain::class);
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
