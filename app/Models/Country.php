<?php

namespace App\Models;

use App\Helper\General;
use App\Traits\DefaultScope;
use App\Traits\MakesWebp;
use App\Traits\SaveImageAttribute;
use App\Traits\SlugOrTitleTrait;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class Country extends Model
{
    use CrudTrait, HasTranslations, DefaultScope, SaveImageAttribute, MakesWebp, Sluggable, SluggableScopeHelpers, SlugOrTitleTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    const COUNTRY_CACHE_KEY = 'countries';

    protected $table = 'countries';
    protected $guarded = ['id'];
    protected $fillable = ['active', 'sort', 'title', 'slug', 'image', 'text', 'auction_images'];
    protected $translatable = ['title', 'text'];
    protected $attributes = ['sort' => 500];
    public static $images = ['image'];
    protected $casts = ['auction_images' => 'json', 'text' => 'array'];


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
                'unique' => true,
            ],
        ];
    }

    public static function list()
    {
        return Cache::remember(General::cacheKey(self::COUNTRY_CACHE_KEY), 86400, function () {
            return self::query()->active()->orderBy('sort')->take(5)->get();
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

    public function getCountryTextAttribute()
    {
        $text = json_decode($this->text);
        if ($text && count($text) > 0) {
            return $text[0];
        }
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = "public";
        $destination_path = Str::replace('_', '', $this->table);

        if ($value == null) {
            \Storage::disk($disk)->delete($this->{$attribute_name} ?? '');
            $this->attributes[$attribute_name] = null;
        } else {
            if (Str::startsWith($value, 'data:image')) {
                $ext = 'jpg';
                if (Str::startsWith($value, 'data:image/png;base64')) $ext = 'png';
                if (Str::startsWith($value, 'data:image/png;base64')) $ext = 'svg';
                if (Str::startsWith($value, 'data:image/jpeg;base64')) $ext = 'jpeg';
                if (Str::startsWith($value, 'data:image/webp;base64')) $ext = 'webp';

                $image = \Image::make($value)->fit(207, 136, function ($constraint) {
                    $constraint->upsize();
                })->encode($ext, 90);

                $filename = md5($value . time()) . '.' . $ext;
                \Storage::disk($disk)->put($destination_path . '/' . $filename, $image->stream());
                \Storage::disk($disk)->delete($this->{$attribute_name} ?? '');
                $this->attributes[$attribute_name] = $destination_path . '/' . $filename;
            } else $this->attributes[$attribute_name] = Str::replace(env('APP_URL') . '/storage', '', $value);
        }
    }

    public function setAuctionImagesAttribute($values)
    {
        $attribute_name = "auction_images";
        $disk = "public";
        $destination_path = 'auctionslogo';

        $newValues = [];

        if (!empty($values)) {
            foreach ($values as $value) {
                $logoPath = null;
                if ($logo = $value['logo']) {
                    if (Str::startsWith($logo, 'data:image')) {
                        $ext = 'jpg';
                        if (Str::startsWith($logo, 'data:image/png;base64')) $ext = 'png';
                        if (Str::startsWith($logo, 'data:image/png;base64')) $ext = 'svg';
                        if (Str::startsWith($logo, 'data:image/jpeg;base64')) $ext = 'jpeg';
                        if (Str::startsWith($logo, 'data:image/webp;base64')) $ext = 'webp';

                        $image = \Image::make($logo)->fit(170, 100, function ($constraint) {
                            $constraint->upsize();
                        })->encode($ext, 90);

                        $filename = md5($logo . time()) . '.' . $ext;
                        \Storage::disk($disk)->put($destination_path . '/' . $filename, $image->stream());
                        $logoPath = $destination_path . '/' . $filename;
                    } else {
                        $logoPath = Str::replace(env('APP_URL') . '/storage', '', $logo);
                    }
                }
                $newValues[] = [
                    'logo' => $logoPath,
                    'link' => $value['link'] ?? ''
                ];
            }
        }
        $this->attributes[$attribute_name] = json_encode($newValues);
    }
}
