<div class="section-order-car">
    <div class="container">
        <h2 class="main-title text-center">{{ Setting::get('buy_and_delivery_title') }}</h2>
        <div class="row">
            <div class="text">
                <div class="main-title noline"></div>
                <p>@lang('index.buy-and-delivery.sub_title')</p>
                <p class="color-red">@lang('index.buy-and-delivery.countries')</p>
                <div class="img">
                    <picture>
                        <source type="image/webp" srcset="{{ asset('img/' . \App\Helper\General::siteDirectory() . '/section-order-car.webp') }}">
                        <img width="607" height="314" src="{{ asset('img/' . \App\Helper\General::siteDirectory() . '/section-order-car.png') }}" loading="lazy" alt="">
                    </picture>
                    <picture>
                        <source type="image/webp" srcset="{{ asset('img/section-order-car-map.webp') }}">
                        <img class="map" width="1232" height="631" src="{{ asset('img/section-order-car-map.png') }}" loading="lazy" alt="">
                    </picture>
                </div>
            </div>
            @livewire('forms.buy-and-delivery-auto')
        </div>
    </div>
</div>
