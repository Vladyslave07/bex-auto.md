<button onclick="openModal('#applicationForCar')"
        class="btn">{{ Lang::get('car.detail.buy') }}</button>
@if(\App\Models\Domain::currentDomain()?->slug !== 'kz')
    <button onclick="openModal('#applicationForCredit')"
            class="btn btn-blue">{{ Lang::get('car.detail.buy_in_credit') }}</button>
@endif
