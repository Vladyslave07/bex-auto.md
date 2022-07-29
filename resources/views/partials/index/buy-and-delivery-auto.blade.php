<div class="section-order-car">
    <div class="container">
        <div class="main-title text-center line-left">@lang('index.buy-and-delivery.title')</div>
        <div class="row">
            <div class="text">
                <div class="main-title noline"></div>
                <p>@lang('index.buy-and-delivery.sub_title')</p>
                <p class="color-red">@lang('index.buy-and-delivery.countries')</p>
                <div class="img">
                    <picture>
                        <source type="image/webp" srcset="{{ asset('img/section-order-car.webp') }}">
                        <img width="607" height="314" src="{{ asset('img/section-order-car.png') }}" loading="lazy" alt="">
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