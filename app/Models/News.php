<?php

namespace App\Models;

use App\Traits\DefaultScope;
use App\Traits\SaveImageAttribute;
use App\Traits\SeoSnippets;
use App\Traits\SlugOrTitleTrait;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class News extends Model
{
    use CrudTrait, HasTranslations, Sluggable, SluggableScopeHelpers, SaveImageAttribute, SlugOrTitleTrait, DefaultScope, SeoSnippets;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'news';
    protected $guarded = ['id'];
    protected $fillable = ['active', 'sort', 'title', 'slug', 'preview_text', 'detail_text', 'image', 'meta_title', 'meta_description'];
    public static $images = ['image'];
    protected $attributes = ['sort' => 500];
    protected $translatable = ['title', 'preview_text', 'detail_text', 'meta_title', 'meta_description'];
    protected $casts = ['active' => 'bool'];

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
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * News list
     *
     * @param $page
     * @return mixed
     */
    public static function newsList($page)
    {
        return Cache::remember('news_list_' . $page, 86400, function () {
            return self::query()->active()->orderBy('sort', 'asc')->orderBy('id', 'desc')->paginate(4);
        });
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

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

    public function getCurrentPreviewTextAttribute()
    {
        if ($text = $this->preview_text) {
            return $text;
        }

        return $this->detail_text ? substr($this->detail_text, 0, 250) : '';

    }

}
