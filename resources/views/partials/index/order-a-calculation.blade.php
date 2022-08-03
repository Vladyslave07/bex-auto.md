<div class="section-order-calculation container">
    <div class="text">
        <div class="main-title noline">@lang('forms.order-calc.title')</div>
        @livewire('forms.order-calculate')
    </div>
    <picture class="img">
        <source type="image/webp" srcset="{{ asset('img/order-calculation.webp') }}">
        <img width="340" height="346" src="{{ asset('img/order-calculation.png') }}" loading="lazy" alt="">
    </picture>
</div>