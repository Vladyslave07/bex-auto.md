<?php

namespace App\Models;

use App\Traits\MakesWebp;
use App\Traits\SaveImageAttribute;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use MakesWebp, CrudTrait, HasTranslations, SaveImageAttribute, Sluggable, SluggableScopeHelpers;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    public static $images = ['images'];
    protected $table = 'equipments';
    protected $fillable = ['active', 'slug', 'title', 'price', 'color', 'images', 'characteristic'];
    protected $translatable = ['title', 'characteristic'];
    protected $casts = ['images' => 'array', 'characteristic' => 'json', 'color' => 'array'];


    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'slug_or_title',
                'unique' => true,
            ],
        ];
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

    public function getSlugOrTitleAttribute()
    {
        if ($this->slug != '') {
            return $this->slug;
        }

        return $this->title;
    }

    public function getPreparedCharacteristicAttribute()
    {
        if ($this->characteristic) {
            return json_decode($this->characteristic)[0];
        }
        return null;
    }

    public function getPriceFormatAttribute()
    {
        return '$' . number_format($this->price, 0, '.', ' ');
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
