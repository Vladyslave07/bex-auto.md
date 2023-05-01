<?php

namespace App\Models;

use App\Helper\General;
use App\Http\Controllers\CatalogController;
use App\Traits\DefaultScope;
use App\Traits\MakesWebp;
use App\Traits\SaveImageAttribute;
use App\Traits\SeoSnippets;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use phpDocumentor\Reflection\Types\Integer;
use Spatie\Sitemap\Contracts\Sitemapable;

class Car extends Model
{
    use MakesWebp, CrudTrait, HasTranslations, SaveImageAttribute, DefaultScope, Sluggable, SluggableScopeHelpers, SeoSnippets;

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
    const SOLD_STATUS = 'sold';

    protected $table = 'cars';
    protected $guarded = ['id'];
    protected $fillable = ['show_credit_btn', 'equipment', 'benefits', 'sub_title', 'full_template', 'domain_id', 'active', 'sort', 'title', 'slug', 'description', 'images', 'price', 'info', 'status', 'category_id', 'year', 'pin', 'youtube_link', 'meta_title', 'meta_description', 'lot_id', 'vin', 'preview_image', 'color'];
    public static $images = ['images', 'preview_image'];
    protected $translatable = ['title', 'description', 'info', 'meta_title', 'meta_description', 'sub_title', 'sub_title', 'benefits', 'equipment'];
    protected $attributes = ['sort' => 500, 'images' => ''];
    protected $casts = ['images' => 'array', 'color' => 'array'];
    protected $with = ['properties', 'equipments'];


    const POPULAR_CARS_CACHE_KEY = 'popular_cars';
    const EXPECTED_CARS_CACHE_KEY = 'expected_cars_slider';
    const CARS_IN_STOCK_CATEGORY = 'cars_in_stock_category';

    const KZ_DOMAIN_ID = 5;

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

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
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
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
                ->carsForCurrentDomain()
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
        return self::query()
            ->CarsForCurrentDomain()
            ->whereRaw("UPPER(JSON_UNQUOTE(JSON_EXTRACT(`title`, '$.ru'))) LIKE '%" . strtoupper($q) . "%'")
            ->paginate(CatalogController::COUNT_CARS_ON_PAGE)->withQueryString();
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
                ->carsForCurrentDomain()
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

    /**
     * Get popular cars
     *
     * @return mixed
     */
    public static function popularCars()
    {
        return Cache::remember(General::cacheKey(self::POPULAR_CARS_CACHE_KEY), 86400, function () {
            return self::query()->active()->orderBy('pin', 'desc')
                ->orderBy('sort')->carsForCurrentDomain()->take(12)->get();
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
            if($brand = $this->properties->where('slug', 'brand')->first()) {
                return Category::query()->where('slug', 'like','%' . $brand->getValue() . '%')->get();
            }
            return [];
        });

    }

    /**
     * Check car for current domain
     *
     * @return bool
     */
    public function forCurrentDomain()
    {
        return $this->domain_id === Domain::currentDomain()->id;
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
    public function equipments(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Equipment::class, 'car_equipment');
    }

    public function domain(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Domain::class, 'domain_id');
    }

    /**
     * categories relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'car_category');
    }

    /**
     * categories relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function links(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'categories_cars');
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

    /**
     * Return cars only for current domain
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeCarsForCurrentDomain(Builder $query): Builder
    {
        // НУЖНО УСТАНОВИТЬ ГЛОБАЛЬНО ДЛЯ ВСЕГО САЙТА
        // todo: Вынести установку домена глобально
        $domainSlug = trim(preg_replace('/(.*)\/\//', '', str_replace(env('APP_DOMAIN'), '', request()->root())), '.') ?: 'uk';
        $domain = Domain::domainBySlug($domainSlug);

        $id = self::KZ_DOMAIN_ID;
        if ($domain) {
            $id = $domain->id;
        }

        return $query->where('domain_id', $id);
    }


    public function scopeDefaultOrder(Builder $query): Builder
    {
        return $query->orderByRaw("FIELD(status, \"in_stock\", \"expect\", \"on_order\", \"on_order_usa\", \"on_order_korea\", \"sold\")");
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    public function getPreviewPictureAttribute()
    {
        $previewImage = ($this->images && count($this->images) > 0) ? $this->images[0] : '';

        return strlen($this->preview_image) > 0 ? $this->preview_image : $previewImage;
    }

    // The slug is created automatically from the "title" field if no slug exists.
    public function getSlugOrTitleAttribute()
    {
        if ($this->slug != '') {
            return $this->slug;
        }

        return $this->title;
    }


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

    public function getTitleWithYearAttribute()
    {
        if (!Str::contains($this->title, $this->year)) {
            return sprintf('%s %s', $this->title, $this->year);
        }
        return $this->title;
    }

    public function getPriceFormatAttribute()
    {
        return '$' . number_format($this->price, 0, '.', ' ');
    }

    public function getSeoMetaTitleAttribute()
    {
        return $this->parseSnippets($this->meta_title ?: config('settings.car_meta_title_default'));
    }

    public function getCountryAttribute()
    {
        return Domain::currentDomain()?->country;
    }

    public function getSeoMetaDescriptionAttribute()
    {
        return $this->parseSnippets($this->meta_description ?: config('settings.car_meta_description_default'));
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

    public function setPreviewImageAttribute($value)
    {
        $attribute_name = "preview_image";
        $disk = "public";
        $destination_path = Str::replace('_', '', $this->table);

        if ($value == null) {
            \Storage::disk($disk)->delete($this->{$attribute_name} ?? '');
            $this->attributes[$attribute_name] = null;
        } else {
            if (Str::startsWith($value, 'data:image')) {
                $ext = 'jpg';
                if (Str::startsWith($value, 'data:image/png;base64')) $ext = 'png';
                if (Str::startsWith($value, 'data:image/jpeg;base64')) $ext = 'jpeg';
                if (Str::startsWith($value, 'data:image/webp;base64')) $ext = 'webp';

                $image = \Image::make($value)->fit(289, 220, function ($constraint) {
                    $constraint->upsize();
                })->encode($ext, 90);

                $filename = md5($value . time()) . '.' . $ext;
                \Storage::disk($disk)->put($destination_path . '/' . $filename, $image->stream());
                \Storage::disk($disk)->delete($this->{$attribute_name} ?? '');
                $this->attributes[$attribute_name] = $destination_path . '/' . $filename;
            } else $this->attributes[$attribute_name] = Str::replace(env('APP_URL') . '/storage', '', $value);
        }
    }

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

}
