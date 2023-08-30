<?php

namespace App\Models;

use App\Helper\General;
use App\Traits\DefaultScope;
use App\Traits\MakesWebp;
use App\Traits\SaveImageAttribute;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Employee extends Model
{
    use CrudTrait, DefaultScope, SaveImageAttribute, MakesWebp;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    const EMPLOYEES_CACHE_KEY = 'employees';

    protected $table = 'employees';
    protected $guarded = ['id'];
    protected $fillable = ['active', 'sort', 'name', 'image', 'phone', 'email'];
    public static $images = ['image'];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public static function employees()
    {
        return Cache::remember(General::cacheKey(self::EMPLOYEES_CACHE_KEY), 86400, function () {
            return self::query()->active()->orderBy('sort')->take(5)->get();
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
