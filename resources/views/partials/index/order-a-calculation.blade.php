<div class="section-order-calculation container">
    <div class="text">
        <h3 class="main-title noline">{!! Setting::get('order_calc_title') !!}</h3>
        @if (isset($dealerService) && $dealerService)
            @livewire('forms.order-calculate', ['dealerService' => true])
        @else
            @livewire('forms.order-calculate')
        @endif
    </div>
    <picture class="img">
        <source type="image/webp" srcset="{{ asset('img/order-calculation-new.webp') }}">
        <img width="340" height="346" src="{{ asset('img/order-calculation-new.png') }}" loading="lazy" alt="">
    </picture>
</div>
