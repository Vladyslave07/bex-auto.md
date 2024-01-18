<div class="card-btn">
    <button onclick="openModal('#applicationForCar')" class="btn">
        {{ $car->btn_text }}
    </button>
    @if($car->show_credit_btn)
        <button onclick="openModal('#applicationForCredit')"
                class="btn btn-blue">{{ Lang::get('car.detail.buy_in_credit') }}</button>
    @endif
</div>
