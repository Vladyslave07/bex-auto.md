<?php

namespace App\Models;

use App\Traits\DefaultScope;
use App\Traits\MakesWebp;
use App\Traits\SaveImageAttribute;
use App\Traits\SeoSnippets;
use App\Traits\SlugOrTitleTrait;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use MakesWebp, CrudTrait, HasTranslations, DefaultScope, SeoSnippets, SaveImageAttribute, Sluggable, SluggableScopeHelpers, SlugOrTitleTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'services';
    protected $fillable = ['active', 'sort', 'image', 'sub_title', 'sub_title_text', 'title', 'slug', 'youtube_link', 'faq_id', 'seo_text_id', 'text', 'meta_title', 'meta_description'];
    protected $translatable = ['title', 'text', 'sub_title', 'sub_title_text', 'meta_title', 'meta_description'];
    protected $attributes = ['sort' => 500];
    protected $casts = ['active' => 'boolean'];
    protected $with = ['faqs', 'seo_text'];
    public static $images = ['image'];
    public static $imageSize = ['width' => 826, 'height' => 614];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
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
            ],
        ];
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


    public function getSeoMetaTitleAttribute()
    {
        return $this->parseSnippets($this->meta_title ?: config('settings.service_meta_title_default'));
    }

    public function getSeoMetaDescriptionAttribute()
    {
        return $this->parseSnippets($this->meta_description ?: config('settings.service_meta_description_default'));
    }
}
