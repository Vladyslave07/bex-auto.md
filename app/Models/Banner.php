<?php

namespace App\Models;

use App\Helper\General;
use App\Traits\DefaultScope;
use App\Traits\MakesWebp;
use App\Traits\SaveImageAttribute;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Banner extends Model
{
    use MakesWebp, CrudTrait, HasTranslations, SaveImageAttribute, DefaultScope;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'banners';
    protected $guarded = ['id'];
    protected $fillable = ['active', 'sort', 'title', 'subtitle', 'text', 'image', 'mobile_image'];
    protected $attributes = ['sort' => 500, 'image' => ''];
    protected $translatable = ['title', 'subtitle', 'text', 'image'];
    protected $casts = ['active' => 'bool'];
    public static $images = ['image', 'mobile_image'];

    const BANNER_CACHE_KEY = 'banner';
    const BANNER_IMAGE_CACHE_KEY = 'popup_image';
    const IMAGE_FOR_POPUP_ID = 2;

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /**
     * Return banner
     *
     * @return mixed
     */
    public static function banner()
    {
        return Cache::remember(General::cacheKey(self::BANNER_CACHE_KEY), 86400, function () {
            return self::query()
                ->whereNot('id', self::IMAGE_FOR_POPUP_ID)
                ->orderBy('sort')
                ->orderBy('id', 'desc')
                ->active()->first(['title', 'subtitle', 'text', 'image', 'mobile_image']);
        });
    }

    /**
     * Returns image for popup
     *
     * @return mixed
     */
    public static function getImageForPopup()
    {
        return Cache::remember(General::cacheKey(self::BANNER_IMAGE_CACHE_KEY . '_' . app()->getLocale()), 86400, function () {
            if ($banner = self::query()->where('id', self::IMAGE_FOR_POPUP_ID)->first()) {
                return $banner->image;
            }
            return '';
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

    public function setMobileImageAttribute($value)
    {
        $attribute_name = "mobile_image";
        $disk = "public";
        $destination_path = Str::replace('_', '', $this->table);

        if ($value == null) {
            Storage::disk($disk)->delete($this->{$attribute_name} ?? '');
            $this->attributes[$attribute_name] = null;
        } else {
            if (Str::startsWith($value, 'data:image')) {
                $ext = 'jpg';
                if (Str::startsWith($value, 'data:image/png;base64')) $ext = 'png';
                if (Str::startsWith($value, 'data:image/jpeg;base64')) $ext = 'jpeg';
                if (Str::startsWith($value, 'data:image/webp;base64')) $ext = 'webp';

                $image = \Image::make($value);

                $image = $image->encode($ext, 90);
                $filename = md5($value . time()) . '.' . $ext;
                Storage::disk($disk)->put($destination_path . '/' . $filename, $image->stream());

                $this->attributes[$attribute_name] = $destination_path . '/' . $filename;
            } else {
                $path = parse_url($value, PHP_URL_PATH);
                if (str_contains($path, 'storage')) {
                    $path = preg_replace('/\/storage\//', '', $path);
                }

                $this->attributes[$attribute_name] = $path;
            }
        }
    }
}
