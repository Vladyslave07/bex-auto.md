<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CarModel extends Model
{
    use CrudTrait, HasTranslations, Sluggable, SluggableScopeHelpers;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'car_models';
    protected $guarded = ['id'];
    protected $fillable = ['active', 'sort', 'title', 'slug', 'brand_id'];
    protected $attributes = ['sort' => 500];
    protected $translatable = ['title'];

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
            ],
        ];
    }

    /**
     * @param $title
     * @return \Illuminate\Database\Eloquent\Builder|Model|object|null
     */
    public static function getModelByTitle($title)
    {
        return self::query()->whereRaw("UPPER(JSON_UNQUOTE(JSON_EXTRACT(`title`, '$.ru'))) LIKE '%" . strtoupper($title)."%'")->first();
    }

    /**
     * @param $title
     * @param $brandId
     * @return CarModel|false
     */
    public static function createModel($title, $brandId)
    {
        if (!$title || !$brandId) {
            return false;
        }

        $title = Str::ucfirst(Str::lower($title));
        $slug = SlugService::createSlug(CarModel::class, 'slug', $title, ['unique' => true]);

        return self::create([
            'active' => 1,
            'title' => $title,
            'slug' => $slug,
            'brand_id' => $brandId,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Brand::class);
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
