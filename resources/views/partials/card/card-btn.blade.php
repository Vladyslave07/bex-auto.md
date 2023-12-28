<button onclick="openModal('#applicationForCar')" class="btn">
    {{ app('domain')->getDomain()->slug == \App\Models\Domain::KAZACHSTAN_SLUG_DOMAIN ?
                    Setting::get('free_consultation') : Lang::get('car.btn.' . $car->status) }}
</button>
@if(\App\Models\Domain::currentDomain()?->slug !== 'kz' && $car->show_credit_btn)
    <button onclick="openModal('#applicationForCredit')"
            class="btn btn-blue">{{ Lang::get('car.detail.buy_in_credit') }}</button>
@endif
