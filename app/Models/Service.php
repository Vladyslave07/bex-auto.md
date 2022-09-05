<?php

namespace App\Models;

use App\Traits\DefaultScope;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

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
    protected $translatable = ['title', 'text'];
    protected $attributes = ['sort' => 500];
    protected $casts = ['active' => 'boolean'];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

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
