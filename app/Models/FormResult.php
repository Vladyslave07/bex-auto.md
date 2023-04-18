<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class FormResult extends Model
{
    use CrudTrait;

    const FORM_NAMES = [
        'order_calculate' => 'Расчет стоимости',
        'buy_and_delivery' => 'Услуги приобретения и доставки авто',
        'call_back' => 'Заявки на подбор авто',
        'discount' => 'Получить скидку',
        'application_for_credit' => 'Заявка на покупку авто в Кредит',
        'buy_car_from' => 'Заявка на покупку авто',
    ];

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'form_results';
    protected $guarded = ['id'];
     protected $fillable = ['domain_id', 'slug_form', 'name', 'phone', 'car', 'country', 'utm_source', 'utm_medium', 'utm_campaign'];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            $item->domain_id = Domain::currentDomain()?->id ?? Domain::DEFAULT_DOMAIN;
        });
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function domain(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Domain::class, 'domain_id');
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
