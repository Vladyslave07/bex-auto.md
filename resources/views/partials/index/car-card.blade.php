<div class="swiper-slide product-preview">
    <div class="img">
        @foreach($car->properties as $property)
            @if($property->slug === \App\Models\Property::FUEL_PROPERTY_SLUG && $property->pivot->value === \App\Models\Property::FUEL_ELECTRIC_OPTION_SLUG)
                <div class="icons">
                    <svg width="33" height="17">
                        <use xlink:href="{{ asset('/img/icons/sprite.svg#electric') }}"></use>
                    </svg>
                </div>
            @endif
        @endforeach
        <div class="stickers">
            <span>@lang('car.' . $car->status)</span>
        </div>
        <a href="{{ route('car_detail', ['car' => $car->slug]) }}" aria-label="img product">
            <picture>
                <img width="289" height="218" src="{{ Storage::disk('public')->url($car->preview_image ?? '') }}"
                     loading="lazy" alt="">
            </picture>
        </a>
    </div>
    <div class="body">
        <a href="{{ route('car_detail',  ['car' => $car->slug]) }}" class="title">{{ $car->titleWithYear }}</a>
        @if ($car->year)
            <div class="year">{{ $car->year }}</div>
        @endif
        <div class="features">
            <div class="tr">
                @foreach($car->properties as $property)
                    @if($property->show_product && ($value = $property->getValue()))
                        <div class="item">
                            <img width="21" height="21" src="{{ Storage::disk('public')->url($property->image) }}">
                            {{ $value }}
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="price">
            <span class="price-new">{{ $car->priceFormat }}</span>
            @if ($car->info)
                <div class="tooltip">
                    <svg width="14" height="19">
                        <use xlink:href="#tooltip-icon"></use>
                    </svg>
                    <div>{{ $car->info }}</div>
                </div>
            @endif
        </div>
        <a href="{{ route('car_detail', ['car' => $car->slug]) }}" class="btn">@lang('car.more')</a>
    </div>
</div>