@if ($cars && count($cars) > 0)
    <div class="section-swiper container">
        <div class="main-title text-center">{{ $title }}</div>
        <div class="swiper product-swiper">
            <div class="swiper-wrapper">

                @foreach($cars as $car)

                    @include('partials.index.car-card')

                @endforeach

            </div>
            <div class="swiper-nav">
                <div class="swiper-button-prev team-prev">
                    <svg width="24" height="30">
                        <use xlink:href="#arrow-icon"></use>
                    </svg>
                </div>
                <div class="swiper-bullets"></div>
                <div class="swiper-button-next team-next">
                    <svg width="24" height="30">
                        <use xlink:href="#arrow-icon"></use>
                    </svg>
                </div>
            </div>
        </div>
        @if ($more)
            <div class="swiper-btn text-center">
                <a href="#" class="btn">@lang('car.show_all')</a>
            </div>
        @endif
    </div>
@endif
