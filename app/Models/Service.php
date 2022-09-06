<?php

namespace App\Models;

use App\Traits\DefaultScope;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Service extends Model
{
    use CrudTrait, HasTranslations, DefaultScope;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'services';
    protected $fillable = ['active', 'sort', 'image', 'sub_title', 'sub_title_text', 'title', 'slug', 'youtube_link', 'faq_id', 'seo_text_id', 'text'];
    protected $translatable = ['title', 'text', 'slug', 'sub_title', 'sub_title_text'];
    protected $attributes = ['sort' => 500];
    protected $casts = ['active' => 'boolean'];
    protected $with = ['faqs', 'seo_text'];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /**
     * @param mixed $value
     * @param null $field
     * @return \Illuminate\Database\Eloquent\Builder|Model|\never|object|null
     */
    public function resolveRouteBinding($value, $field = null)
    {
        $cacheKey = $value . '_' . app()->getLocale();
        return Cache::remember($cacheKey, 86400, function () use ($value) {
            return static::findByLocalizedSlug($value)->first() ?? abort(404);
        });
    }

    /**
     * @param $slug
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function findByLocalizedSlug($slug)
    {
        return static::query()->where($this->getRouteKeyName() . '->' . app()->getLocale(), $slug)
            ->with($this->with);
    }

    /**
     * @param $slug
     * @return \Illuminate\Database\Eloquent\Builder|Model|object|null
     */
    public function findBySlug($slug)
    {
        return static::findByLocalizedSlug($slug)->first();
    }


    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * seo text
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function seo_text(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(SeoText::class, 'seo_text_id');
    }

    /**
     * categories relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function faqs(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Faq::class, 'service_faq');
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
