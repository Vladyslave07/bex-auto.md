<?php

namespace App\Models;

use App\Traits\DefaultScope;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Faq extends Model
{
    use CrudTrait, HasTranslations, DefaultScope;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'faqs';
    protected $guarded = ['id'];
    protected $fillable = ['active', 'sort', 'question', 'answer', 'default'];
    protected $translatable = ['question', 'answer'];
    protected $attributes = ['sort' => 500];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public static function categoryFaqs(Category $category)
    {
        $faqs = Cache::remember($category->slug . '_faqs', 86400, function () use ($category) {
            return self::query()->whereHas('categories', function ($query) use ($category) {
                return $query->where('category_id', $category->id);
            })->get();
        });
        
        if (count($faqs) <= 0) {
            return self::defaultFaqs();
        }

        return $faqs;
    }

    /**
     * @return mixed
     */
    public static function defaultFaqs()
    {
        return Cache::remember('index_faqs', 86400, function () {
            return self::query()->orderBy('sort')->active()->default()->get(['question', 'answer']);
        });
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
        return $this->belongsToMany(Category::class, 'category_faq');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /**
     * Returns only defaults faqs
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeDefault(Builder $query): Builder
    {
        return $query->where('active', 1);
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
}
