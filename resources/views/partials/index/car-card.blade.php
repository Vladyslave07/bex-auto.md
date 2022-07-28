<div class="swiper-slide product-preview">
    <div class="img">
        <div class="icons">
            <svg width="33" height="17"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#electric"></use></svg>
        </div>
        <div class="stickers">
            <span>@lang('car.' . $car->status)</span>
        </div>
        <a href="{{ $car->slug }}" aria-label="img product">
            <picture>
                <img width="289" height="218" src="/storage/{{ $car->images[0] ?? ''}}" loading="lazy" alt="">
            </picture>
        </a>
    </div>
    <div class="body">
        <a href="{{ $car->slug }}" class="title">{{ $car->title }}</a>
        <div class="year">{{ $car->year }}</div>
        <div class="features">
            <div class="tr">
                <div class="item">
                    <svg width="20" height="18"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#fuel"></use></svg>
                    Електрика
                </div>
            </div>
            <div class="tr">
                <div class="item">
                    <svg width="21" height="21"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#drive"></use></svg>
                    Передній
                </div>
                <div class="item">
                    <svg width="20" height="20"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#state"></use></svg>
                    Новий
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="price">
            <span class="price-new">{{ $car->priceFormat }}</span>
            <div class="tooltip">
                <svg width="14" height="19"><use xlink:href="#tooltip-icon"></use></svg>
                <div>{{ $car->info }}</div>
            </div>
        </div>
        <a href="{{ $car->slug }}" class="btn">@lang('car.more')</a>
    </div>
</div>