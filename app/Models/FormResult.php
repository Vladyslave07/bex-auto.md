<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class FormResult extends Model
{
    use CrudTrait;

    const DEALER_SLUG_FORM = 'dealer_service_call_back';

    const FORM_NAMES = [
        'order_calculate' => 'Расчет стоимости',
        'buy_and_delivery' => 'Услуги приобретения и доставки авто',
        'call_back' => 'Заявки на подбор авто',
        'discount' => 'Получить скидку',
        'application_for_credit' => 'Заявка на покупку авто в Кредит',
        'buy_car_from' => 'Заявка на покупку авто',
        self::DEALER_SLUG_FORM => 'Обратная связь - Дилерские услуги',
    ];

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'form_results';
    protected $guarded = ['id'];
     protected $fillable = ['slug_form', 'name', 'phone', 'car', 'country', 'category_id', 'popup_id', 'utm_source', 'utm_medium', 'utm_campaign'];

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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function popup()
    {
        return $this->belongsTo(Popup::class);
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
