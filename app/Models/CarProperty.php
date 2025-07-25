<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Str;

class CarProperty extends Pivot
{
    use HasFactory, Sluggable, SluggableScopeHelpers;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'car_property';
    protected $primaryKey = 'id';
    protected $fillable = ['car_id', 'property_id', 'value', 'slug'];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'value_or_slug',
                'onUpdate' => true,
                'unique' => false,
            ],
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function property(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Property::class, 'property_id');
    }

    public function car(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Car::class, 'car_id');
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

    public function getValueOrSlugAttribute()
    {
        if ($this->slug != '') {
            return $this->slug;
        }

        return $this->value;
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    public function setValueAttribute($value)
    {
        $newSlug = Str::slug($value);
        $slug = $this->slug;
        if ($this->slug !== $newSlug) {
            $slug = $newSlug;
        }
        $this->attributes['value'] = $value;
        $this->attributes['slug'] = $slug;
    }

    public function setSlugAttribute($value)
    {
        $model = CarModel::getBySlug($value);
        $brand = Brand::getBySlug($value);
        if (strlen($value) > 0 && ($model || $brand)) {
            $entity = $brand ?? $model;
            $this->attributes['value'] = $entity->title;
        }
        $this->attributes['slug'] = $value;
    }
}
