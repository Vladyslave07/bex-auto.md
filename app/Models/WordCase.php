<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class WordCase extends Model
{
    use CrudTrait, HasTranslations;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'word_cases';
    protected $guarded = ['id'];
    protected $fillable = ['slug', 'i', 'r', 'd', 'v', 't', 'i_m', 'r_m', 'd_m', 'v_m', 't_m'];
    protected $translatable = ['i', 'r', 'd', 'v', 't', 'i_m', 'r_m', 'd_m', 'v_m', 't_m'];


    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public static function getSnippetReplacements($slug)
    {
        // todo: cache
        $wordCase = self::query()->where('slug', $slug)->first();
        if ($wordCase) {
            $replacements = [];
            $replacements['i'] = $wordCase->i;
            $replacements['r'] = $wordCase->r;
            $replacements['d'] = $wordCase->d;
            $replacements['v'] = $wordCase->v;
            $replacements['t'] = $wordCase->t;
            $replacements['i_m'] = $wordCase->i_m;
            $replacements['r_m'] = $wordCase->r_m;
            $replacements['d_m'] = $wordCase->d_m;
            $replacements['v_m'] = $wordCase->v_m;
            $replacements['t_m'] = $wordCase->t_m;
            return $replacements;
        }

        return [];
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
