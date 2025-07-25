<?php

namespace App\Models;

use App\Contracts\AdminMenuInterface;
use App\Helper\General;
use App\Http\Controllers\CatalogController;
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
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use phpDocumentor\Reflection\Types\Integer;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class Car extends Model implements AdminMenuInterface, Sitemapable
{
    use ProductCarsTrait, MakesWebp, CrudTrait, HasTranslations, SaveImageAttribute, DefaultScope, Sluggable, SluggableScopeHelpers, SeoSnippets;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */
    const DEFAULT_TEMPLATE_NAME = 'card';
    const FULL_TEMPLATE_NAME = 'full-card';
    const IN_STOCK_STATUS = 'in_stock';
    const EXPECTED_STATUS = 'expect';
    const ON_ORDER_STATUS = 'on_order';
    const COPRAT_STATUS = 'on_order_usa';
    const ENCAR_STATUS = 'on_order_korea';
    const SOLD_STATUS = 'sold';

    protected $table = 'cars';
    protected $guarded = ['id'];
    protected $fillable = ['show_price_from', 'show_credit_btn', 'equipment', 'benefits', 'sub_title', 'full_template', 'active', 'sort', 'title', 'slug', 'description', 'images', 'price', 'info', 'status', 'category_id', 'year', 'pin', 'youtube_link', 'meta_title', 'meta_description', 'lot_id', 'vin', 'preview_image', 'color', 'commission_car', 'status_sort', 'feed_image', 'price_prefix_id'];
    public static $images = ['images', 'preview_image', 'feed_image'];
    protected $translatable = ['title', 'description', 'info', 'meta_title', 'meta_description', 'sub_title', 'sub_title', 'benefits', 'equipment'];
    protected $attributes = ['sort' => 500, 'images' => ''];
    protected $casts = ['images' => 'array', 'color' => 'array'];
    protected $with = ['properties', 'equipments', 'pricePrefix'];

    public string $detailRouteName = 'car_detail';
    public string $categoryRouteName = 'category';
    public string $propertyPivotTableName = 'car_property';

    const POPULAR_CARS_CACHE_KEY = 'popular_cars';
    const EXPECTED_CARS_CACHE_KEY = 'expected_cars_slider';
    const CARS_IN_STOCK_CATEGORY = 'cars_in_stock_category';

    const KZ_DOMAIN_ID = 5;

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public function toSitemapTag(): \Spatie\Sitemap\Tags\Url|string|array
    {
        $url = app('domain')->getDomainUrl() . route('car_detail', ['car' => $this], false);
        $createdUrl = Url::create(LaravelLocalization::getLocalizedURL(app()->getLocale(), $url));
        if (!empty($this->images)) {
            foreach ($this->images as $image) {
                $createdUrl->addImage(Storage::disk('public')->url($image));
            }
        }
        return $createdUrl;
    }

    public function adminEditPath():string
    {
        return '/' . config('backpack.base.route_prefix') . '/car/' . $this->id . '/edit';
    }

    public function getKeyRouteName(): string
    {
        return 'car';
    }

    public function cardTemplate()
    {
        return $this->full_template ? self::FULL_TEMPLATE_NAME : self::DEFAULT_TEMPLATE_NAME;
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
     * Returns cars which in stock
     *
     * @param $categories
     * @return mixed
     */
    public static function carsInStock($categories)
    {
        $categories = array_column($categories->toArray(), 'id');

        return Cache::remember(General::cacheKey(self::CARS_IN_STOCK_CATEGORY) . implode('_', $categories), 86400, function () use ($categories) {
            $carsInStock = self::query()
                ->with(['categories'])
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
     * Returns cars for search page
     *
     * @param string $q
     * @return mixed
     */
    public static function carsSearch(string $q = '')
    {
        return self::search($q)->defaultOrder()->active()->paginate(CatalogController::COUNT_CARS_ON_PAGE)->withQueryString();
    }

    public static function fastSearch(string $q = '')
    {
        return self::search($q)->defaultOrder()->active()->whereNotNull('preview_image')->take(3)->get();
    }

    /**
     * @param string $q
     * @return mixed
     */
    public static function search(string $q = '')
    {
        return self::query()
            ->whereRaw("UPPER(JSON_UNQUOTE(JSON_EXTRACT(`title`, '$.ru'))) LIKE '%" . strtoupper($q) . "%'");
    }

    /**
     * Returns expected cars
     *
     * @return mixed
     */
    public static function expectedCars()
    {
        return Cache::remember(General::cacheKey(self::EXPECTED_CARS_CACHE_KEY), 86400, function () {
            return self::query()
                ->orderBy('id')
                ->where('status', self::EXPECTED_STATUS)
                ->active()
                ->take(11)
                ->get();
        });
    }

    public function category()
    {
        return $this->categories;
    }

    /**
     * Get popular cars
     *
     * @return mixed
     */
    public static function popularCars()
    {
        return Cache::remember(General::cacheKey(self::POPULAR_CARS_CACHE_KEY), 86400, function () {
            return self::query()->active()->orderBy('pin', 'desc')
                ->orderBy('sort')->take(12)->get();
        });
    }

    /**
     * @param $lotId
     * @return false|Builder|Model|object|null
     */
    public static function getCarByLotId($lotId)
    {
        if (!$lotId) {
            return false;
        }

        return self::query()->where('lot_id', $lotId)->first();
    }

    /**
     * @return array|Builder[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function getCarLinks()
    {
        return Cache::remember(General::cacheKey($this->slug . '_links'), 86400, function () {
            if (count($this->categories) > 0) {
                return $this->categories;
            }
            return [];
        });

    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'car_product');
    }

    public function equipments(): BelongsToMany
    {
        return $this->belongsToMany(Equipment::class, 'car_equipment');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'car_category');
    }

    public function links(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'categories_cars');
    }

    public function properties(): BelongsToMany
    {
        return $this->belongsToMany(\App\Models\Property::class, 'car_property')
            ->withTimestamps()->withPivot('value', 'slug')
            ->using(\App\Models\CarProperty::class);
    }

    /**
     * @return BelongsTo
     */
    public function pricePrefix(): BelongsTo
    {
        return $this->belongsTo(PricePrefix::class);
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

    public function getPreparedBenefitsAttribute()
    {
        if ($this->benefits) {
            return json_decode($this->benefits);
        }
        return null;
    }

    public function getCategoryAttribute()
    {
        if (count($this->categories) > 0) {
            return $this->categories->first()->title;
        }
        return '';
    }

    public function getColorsAttribute()
    {
        $colors = [];
        if (!$this->equipments || $this->equipments->count() <= 0) {
            return $colors;
        }

        foreach ($this->equipments as $equipment) {
            $colors[$equipment->id] = $equipment->color;
        }
        return $colors;
    }

    public function getCountryAttribute()
    {
        return app('domain')->getDomain()->country;
    }

    public function getTypeAttribute()
    {
        return $this->properties?->where('slug', Property::PROPERTY_TYPE_SLUG)->first()?->getSlug();
    }

    public function getFromCountryAttribute()
    {
        return $this->properties?->where('slug', Property::PROPERTY_COUNTRY_SLUG)->first()?->getSlug();
    }

    public function getStateAttribute()
    {
        return $this->properties?->where('slug', Property::PROPERTY_STATE_SLUG)->first()?->getValue();
    }

    public function getSeoMetaDescriptionAttribute()
    {
        $template = $this->properties?->where('slug', 'country')->first()?->getValue() ?
            Setting::get('car_meta_description_new'):
            Setting::get('car_meta_description_default');

        return $this->parseSnippets($this->meta_description ?: $template);
    }

    /**
     * Get property car year
     *
     * @return null
     */
    public function getYearAttribute()
    {
        if ($year = $this->properties->where('slug', 'year')->first()) {
            return $year->getValue() ?: null;
        }
        return null;
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    public function setBenefitsAttribute($values)
    {
        $destination_path = Str::replace('_', '', $this->table);
        if ($values && count($values) > 0) {
            $newValues = [];
            foreach ($values as $value) {
                if (key_exists('image', $value) && Str::startsWith($value['image'], 'data:image')) {
                    $image = $value['image'];
                    $ext = 'jpg';
                    if (Str::startsWith($image, 'data:image/png;base64')) $ext = 'png';
                    if (Str::startsWith($image, 'data:image/jpeg;base64')) $ext = 'jpeg';
                    if (Str::startsWith($image, 'data:image/webp;base64')) $ext = 'webp';

                    $image = \Image::make($image)->fit(550, 400, function ($constraint) {
                        $constraint->upsize();
                    })->encode($ext, 90);

                    $filename = md5($image . time()) . '.' . $ext;
                    Storage::disk('public')->put($destination_path . '/' . $filename, $image->stream());
                    $newValues[] = [
                        'text' => $value['text'],
                        'image' => $destination_path . '/' . $filename,
                    ];
                } else {
                    $newValues[] = [
                        'text' => $value['text'],
                        'image' => Str::replace(env('APP_URL') . '/storage', '', $value['image']),
                    ];
                }
            }

            $this->attributes['benefits'] = json_encode($newValues);
        }
    }

    public function setColorAttribute($values)
    {
        foreach ($values as $key => $value) {
            if (!$value) {
                unset($values[$key]);
            }
        }

        return $this->attributes['color'] = json_encode($values);
    }

    public function setFeedImageAttribute($value)
    {
        $attribute_name = "feed_image";
        $disk = "public";
        $destination_path = Str::replace('_', '', $this->table);

        if ($value == null) {
            \Storage::disk($disk)->delete($this->{$attribute_name} ?? '');
            $this->attributes[$attribute_name] = null;
        } else {
            if (Str::startsWith($value, 'data:image')) {
                $image = \Image::make($value)->resize(1080, 1080)->encode('png', 90);

                $filename = md5($value . time()) . '.' . 'png';
                \Storage::disk($disk)->put($destination_path . '/' . $filename, $image->stream());
                \Storage::disk($disk)->delete($this->{$attribute_name} ?? '');
                $this->attributes[$attribute_name] = $destination_path . '/' . $filename;
            } else {
                $this->attributes[$attribute_name] = Str::replace(env('APP_URL') . '/storage', '', $value);
            }
        }
    }



}
