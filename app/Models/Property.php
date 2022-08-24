<?php

namespace App\Models;

use App\Traits\DefaultScope;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use CrudTrait, HasTranslations, Sluggable, SluggableScopeHelpers, DefaultScope;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'properties';
    protected $fillable = ['active', 'sort', 'title', 'slug', 'field_type', 'filter_type', 'options', 'relation'];
    protected $casts = [
        'status' => 'boolean',
        'options' => 'array'
    ];
    protected $translatable = ['name', 'options'];
    protected $attributes = ['sort' => 500];


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
                'source' => 'slug_or_title',
            ],
        ];
    }

    /**
     * Default options which set in property
     *
     * @return array
     */
    public function getOptions()
    {
        $return = [];
        $options = $this->options;
        if (!is_array($this->options)) {
            $options = json_decode($this->options, true);
        }
        if (json_last_error() === JSON_ERROR_NONE) {
            array_walk($options, function ($a) use (&$return) {
                $return[$a['value']] = $a['name'];
            });
        }
        return $return;
    }

    /**
     * Relation values
     *
     * @param $relation
     * @return array
     */
    public function getRelationOption($relation)
    {
        $options = $this->getOptions();
        if (empty($options)) {
            $relation = "App\Models\\" . $relation;
            $items = $relation::query()->get(['title', 'slug']);
            $options = [];
            foreach ($items as $item) {
                $options[$item->slug] = $item->title;
            }
        }
        return $options;
    }

    /**
     * Get property value
     *
     * @return mixed
     */
    public function getValue()
    {
        if (!$this->pivot->value) {
            return false;
        }

        if ($options = $this->getOptions()) {
            return $options[$this->pivot->value] ?? '';
        }
        return $this->pivot->value;
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function cars(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(\App\Models\Car::class, 'car_property')
            ->withTimestamps()->withPivot('value', 'slug')
            ->using(\App\Models\CarProperty::class);
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

    /**
     * Creating automatically slug
     *
     * @return mixed
     */
    public function getSlugOrNameAttribute()
    {
        if ($this->slug != '') {
            return $this->slug;
        }

        return $this->title;
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
