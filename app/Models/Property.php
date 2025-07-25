<?php

namespace App\Models;

use App\Traits\DefaultScope;
use App\Traits\SaveImageAttribute;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use CrudTrait, HasTranslations, Sluggable, SaveImageAttribute, SluggableScopeHelpers, DefaultScope;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'properties';
    protected $fillable = ['for', 'active', 'sort', 'title', 'slug', 'field_type', 'filter_type', 'options', 'relation', 'step', 'prefix', 'show', 'show_product', 'image'];
    protected $casts = [
        'active' => 'boolean',
        'show' => 'boolean',
        'show_product' => 'boolean',
    ];
    protected $translatable = ['title', 'name', 'options', 'prefix'];
    protected $attributes = ['sort' => 500];
    public static $images = ['image'];

    const FUEL_PROPERTY_SLUG = 'fuel';
    const FUEL_ELECTRIC_OPTION_SLUG = 'electro';
    const FUEL_MILEAGE_OPTION_SLUG = 'mileage';
    const PROPERTY_BRAND_SLUG = 'brand';
    const PROPERTY_CARCASE_TYPE_SLUG = 'carcase-type';
    const PROPERTY_STATE_SLUG = 'state';
    const PROPERTY_COUNTRY_SLUG = 'country';
    const PROPERTY_TYPE_SLUG = 'type';
    const PROPERTY_POWER_RESERVE = 'power-reserve';
    const PROPERTY_STATUS = 'status';

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

    // The slug is created automatically from the "title" field if no slug exists.
    public function getSlugOrTitleAttribute()
    {
        if ($this->slug != '') {
            return $this->slug;
        }

        return $this->title;
    }

    /**
     * Default options which set in property
     *
     * @return array
     */
    public function getOptions(): array
    {
        return $this->prepareOptions($this->options);
    }

    public static function prepareOptions($options): array
    {
        $return = [];
        if ($options && !is_array($options)) {
            $options = json_decode($options, true);
        }
        if (json_last_error() === JSON_ERROR_NONE && $options) {
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
            $items = $relation::query()->orderBy('title')->get(['title', 'slug']);
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

    /**
     * Get property slug
     *
     * @return mixed
     */
    public function getSlug()
    {
        if ($this->pivot->value) {
            $this->pivot->value;
        }

        return $this->pivot->slug;
    }


    /**
     * return id property by slug
     *
     * @param $slug
     * @return \Illuminate\Database\Eloquent\HigherOrderBuilderProxy|mixed
     */
    public static function getBySlug($slug)
    {
        return self::query()->where('slug', $slug)->first();
    }

    /**
     * @param $slug
     * @param $option
     * @return string
     */
    public static function addOptionToProperty($slug, $option)
    {
        $property = self::query()->where('slug', $slug)->first();
        $options = json_decode($property->options, true) ?: [];
        $optionSlug = SlugService::createSlug(Property::class, 'slug', $option, ['unique' => false]);
        $optionSlug = $optionSlug ?: $option;
        $options = array_merge($options, [['name' => $option, 'value' => $optionSlug]]);
        $property->update(['options' => $options]);

        return $optionSlug;
    }

    public static function getStatuses()
    {
        return self::query()->where('slug', self::PROPERTY_STATUS)->first();
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
