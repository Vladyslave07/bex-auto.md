<?php

namespace App\Models;

use App\Traits\DefaultScope;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Faq extends Model
{
    use CrudTrait, HasTranslations, DefaultScope;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'faqs';
    protected $guarded = ['id'];
    protected $fillable = ['active', 'sort', 'question', 'answer'];
    protected $translatable = ['question', 'answer'];
    protected $attributes = ['sort' => 500];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * @return mixed
     */
    public static function faqs()
    {
        return Cache::remember('index_faqs', 86400, function () {
            return self::query()->orderBy('sort')->active()->get(['question', 'answer']);
        });
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
