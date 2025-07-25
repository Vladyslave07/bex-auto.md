<?php

namespace App\Models;

use App\Contracts\AdminMenuInterface;
use App\Traits\DefaultScope;
use App\Traits\MakesWebp;
use App\Traits\ProductCarsTrait;
use App\Traits\SaveImageAttribute;
use App\Traits\SeoSnippets;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model implements AdminMenuInterface
{
    use ProductCarsTrait, MakesWebp, CrudTrait, HasTranslations, SaveImageAttribute, DefaultScope, Sluggable, SluggableScopeHelpers, SeoSnippets;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'products';
    protected $guarded = ['id'];
    protected $fillable = ['sub_title', 'category_id', 'active', 'sort', 'title', 'slug', 'description', 'images', 'price', 'info', 'status', 'youtube_link', 'meta_title', 'meta_description', 'preview_image'];
    protected $casts = ['images' => 'array'];
    protected $attributes = ['sort' => 500, 'images' => ''];
    protected $translatable = ['title', 'description', 'info', 'meta_title', 'meta_description', 'sub_title', 'sub_title'];
    protected $with = ['properties'];

    public static $images = ['images', 'preview_image'];

    public string $detailRouteName = 'product_detail';
    public string $categoryRouteName = 'category_products';
    public string $propertyPivotTableName = 'product_property';

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public function adminEditPath():string
    {
        return '/' . config('backpack.base.route_prefix') . '/product/' . $this->id . '/edit';
    }

    public function getKeyRouteName(): string
    {
        return 'product';
    }

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
                'unique' => true,
            ],
        ];
    }

    /**
     *
     * @return mixed
     */
    public function getCategoryProperties()
    {
        return Property::query()->active()->where('slug', '!=', Property::PROPERTY_STATUS)->where('for', $this->table)->orderBy('id')->get();
    }

    public function categories()
    {
        return collect($this->category());
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function properties(): BelongsToMany
    {
        return $this->belongsToMany(Property::class, 'product_property')
            ->withTimestamps()->withPivot('value', 'slug')
            ->using(ProductProperty::class);
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
