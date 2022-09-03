<?php

namespace App\Models;

use App\Traits\DefaultScope;
use App\Traits\SaveImageAttribute;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Car extends Model
{
    use CrudTrait, HasTranslations, SaveImageAttribute, DefaultScope, Sluggable, SluggableScopeHelpers;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    const IN_STOCK_STATUS = 'in_stock';
    const EXPECTED_STATUS = 'expect';
    const ON_ORDER_STATUS = 'on_order';

    protected $table = 'cars';
    protected $guarded = ['id'];
    protected $fillable = ['active', 'sort', 'title', 'slug', 'description', 'images', 'price', 'info', 'status', 'category_id', 'year', 'pin', 'youtube_link'];
    public static $images = ['images'];
    protected $translatable = ['title', 'description', 'info'];
    protected $attributes = ['sort' => 500, 'images' => ''];
    protected $casts = ['images' => 'array'];
    protected $with = ['properties'];


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
     * Returns cars which in stock
     *
     * @param $categories
     * @return mixed
     */
    public static function carsInStock($categories)
    {
        $categories = array_column($categories->toArray(), 'id');

        return Cache::remember('cars_in_stock_category' . implode('_', $categories), 86400, function () use ($categories) {
            $carsInStock = self::query()
                ->orderBy('id')
                ->where('status', self::IN_STOCK_STATUS)
                ->active()
                ->whereHas('categories', function ($query) use ($categories){
                    return $query->whereIn('category_id', $categories)->orderBy('category_id');
                })
                ->take(11)
                ->get();

            $cars = [];
            foreach ($carsInStock as $item) {
                foreach ($item->categories as $category) {
                    if (in_array($category->id, $categories)) {
                        $cars[$category->id][] = $item;
                    }
                }
            }
            return $cars;
        });
    }

    /**
     * Returns expected cars
     *
     * @return mixed
     */
    public static function expectedCars()
    {
        return Cache::remember('expected_cars_slider', 86400, function () {
            return self::query()
                ->orderBy('id')
                ->where('status', self::EXPECTED_STATUS)
                ->active()
                ->take(11)
                ->get();
        });
    }

    /**
     *
     * @return mixed
     */
    public function getCategoryProperties()
    {
        return Property::query()->active()->orderBy('id')->get();
    }

    public function category()
    {
        return $this->categories;
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * categories relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'car_category');
    }

    public function properties(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(\App\Models\Property::class, 'car_property')
            ->withTimestamps()->withPivot('value', 'slug')
            ->using(\App\Models\CarProperty::class);
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /**
     * Filter apply
     *
     * @param Builder $query
     * @param $filterQuery
     * @return Builder
     */
    public function scopeFiltered(Builder $query, $filterQuery = null): Builder
    {
        if (!$filterQuery) {
            return $query;
        }
        return (new \App\filters\CarFilter($query, $filterQuery))->apply();
    }

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

    public function getPriceFormatAttribute()
    {
        return '$' . number_format($this->price, 0, '.', ' ');
    }
}
