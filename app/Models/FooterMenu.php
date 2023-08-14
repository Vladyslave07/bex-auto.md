<?php

namespace App\Models;

use App\Helper\General;
use App\Traits\DefaultScope;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class FooterMenu extends Model
{
    use CrudTrait;
    use HasFactory;
    use DefaultScope;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    const FOOTER_MENU_CACHE_KEY = 'footer_menu';

    protected $table = 'footer_menus';
    protected $fillable = ['active', 'slug', 'title', 'column', 'sort'];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public static function footerMenu()
    {
        return Cache::remember(General::cacheKey(self::FOOTER_MENU_CACHE_KEY), 86400, function () {
            return self::query()->orderBy('sort')->active()->get(['slug', 'title', 'column']);
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
