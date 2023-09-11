<div class="section-order-calculation container">
    <div class="text">
        <div class="main-title noline">{!! Setting::get('order_calc_title') !!}</div>
        @if (isset($dealerService) && $dealerService)
            @livewire('forms.order-calculate', ['dealerService' => true])
        @else
            @livewire('forms.order-calculate')
        @endif
    </div>
    <picture class="img">
        <source type="image/webp" srcset="{{ asset('img/order-calculation.webp') }}">
        <img width="340" height="346" src="{{ asset('img/order-calculation.png') }}" loading="lazy" alt="">
    </picture>
</div>
