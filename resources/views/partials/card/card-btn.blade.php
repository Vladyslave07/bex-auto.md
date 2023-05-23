<button onclick="openModal('#applicationForCar')"
        class="btn">{{ Lang::get('car.btn.' . $car->status) }}</button>
@if(\App\Models\Domain::currentDomain()?->slug !== 'kz' && $car->show_credit_btn)
    <button onclick="openModal('#applicationForCredit')"
            class="btn btn-blue">{{ Lang::get('car.detail.buy_in_credit') }}</button>
@endif
