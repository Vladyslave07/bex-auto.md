<?php

namespace App\Traits;

use App\Enums\BtnTextType;
use App\Models\Domain;
use App\Models\Property;
use App\Models\Setting;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

trait ProductCarsTrait
{

    public $carsFromUsa = 'avto-iz-ssha';

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

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
     *
     * @return mixed
     */
    public function getCategoryProperties()
    {
        return Property::query()->active()->where('slug', '!=', Property::PROPERTY_STATUS)->where('for', $this->table)->orderBy('id')->get();
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

    public function getSlugOrTitleAttribute()
    {
        if ($this->slug != '') {
            return $this->slug;
        }

        return $this->title;
    }

    public function getTitleWithYearAttribute()
    {
        if ($this->year && !Str::contains($this->title, $this->year)) {
            return sprintf('%s %s', $this->title, $this->year);
        }
        return $this->title;
    }

    public function getPriceForCurrentCountryAttribute()
    {
        if ($currency = app('domain')->getDomain()->currency) {
            $price = $this->price * $currency->exchange_rate;
            return $currency->currency_symbol . number_format($price, 0, '.', ' ');
        }
        return null;
    }

    public function getPriceFormatAttribute()
    {
        return '$' . number_format($this->price, 0, '.', ' ');
    }

    public function getSeoMetaTitleAttribute()
    {
        return $this->parseSnippets($this->meta_title ?: Setting::get('car_meta_title_default'));
    }

    public function getSeoMetaDescriptionAttribute()
    {
        if ($this->meta_description) {
            return $this->parseSnippets($this->meta_description);
        }
        return '';
    }

    public function getBtnTextAttribute(): ?string
    {
        $btnTxt = new \App\Services\Car\BtnTextService($this, BtnTextType::BuyBtn->value);
        return $btnTxt->getBtnText();
    }

    public function getBtnCreditTextAttribute(): ?string
    {
        $btnTxt = new \App\Services\Car\BtnTextService($this, BtnTextType::CreditBtn->value);
        return $btnTxt->getBtnText();
    }

    public function getPriceFromTextAttribute()
    {
        if (app('domain')->getDomain()->slug === Domain::KAZACHSTAN_SLUG_DOMAIN &&
            $this->categories?->pluck('slug')->contains('avto-iz-ssha')) {
            return  __('car.price_in_usa');
        }
        return  __('car.price_from');
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
}
