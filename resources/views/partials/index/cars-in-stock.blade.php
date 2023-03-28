@if(count($carsInStock) > 0)
    <div class="section-swiper container">
        <div class="main-title text-center">{{ config('settings.title_in_stock') }}</div>
        @if (count($categories) > 0)
            <div class="nav-tabs">
                @foreach($categories as $category)
                    @if (in_array($category->id, array_keys($carsInStock)))
                        <span class="nav-link @if($categories->first()->id === $category->id) active @endif"
                              data-toggle="tab"
                              data-target="#availabTab_{{ $category->id }}">{{ $category->title }}</span>
                    @endif
                @endforeach
            </div>
        @endif
        <div class="tab-content">
            @foreach($carsInStock as $key => $cars)
                <div id="availabTab_{{ $key }}"
                     class="tab-pane @if($categories->first()->id === $key) active @endif">
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
                </div>
            @endforeach
        </div>
        <div class="swiper-btn text-center">
            <a href="{{ route('category', 'avto-iz-ssha') }}" class="btn">@lang('car.show_all')</a>
        </div>
    </div>
@endif
