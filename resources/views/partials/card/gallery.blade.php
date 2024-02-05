<div class="card-gallery">
    @if ($car->images)
        <div class="swiper gallery-swiper">
            <div class="swiper-wrapper">
                @foreach($car->images as $key => $image)
                    <a data-fancybox="gallery" href="{{ Storage::disk('public')->url($image) }}" class="swiper-slide">
                        {!! \App\Helper\ImageHelper::getPicture($image,
                        \App\Helper\ImageHelper::alt($car->titleWithYear, $loop->index, getenv(app('domain')->getDomain()->slug == \App\Models\Domain::KAZACHSTAN_SLUG_DOMAIN ? 'KZ_APP_DOMAIN' : 'APP_DOMAIN')),
                        \App\Helper\ImageHelper::title($car->titleWithYear, $loop->index)
                        ) !!}
                    </a>
                    @if ($key === 0 && ($link = $car->youtube_link))
                        <a href="https://www.youtube.com/embed/{{ $link }}" data-fancybox="gallery" data-type="iframe" class="swiper-slide video">
                            <iframe data-src="https://www.youtube.com/embed/{{ $link }}"></iframe>
                        </a>
                    @endif
                @endforeach
            </div>
            <div class="swiper-nav">
                <div class="swiper-button-prev team-prev">
                    <svg width="24" height="30">
                        <use xlink:href="#arrow-icon"></use>
                    </svg>
                </div>
                <div class="swiper-button-next team-next">
                    <svg width="24" height="30">
                        <use xlink:href="#arrow-icon"></use>
                    </svg>
                </div>
            </div>
        </div>
        <div class="gallery-thumbs">
            @foreach($car->images as $key =>  $image)
                <div class="item @if($key === 0) active @endif">
                    {!! \App\Helper\ImageHelper::getPicture($image,
                        \App\Helper\ImageHelper::alt($car->titleWithYear, $loop->index, getenv(app('domain')->getDomain()->slug == \App\Models\Domain::KAZACHSTAN_SLUG_DOMAIN ? 'KZ_APP_DOMAIN' : 'APP_DOMAIN')),
                        \App\Helper\ImageHelper::title($car->titleWithYear, $loop->index)
                        ) !!}
                    @if($key === 3 && count($car->images) > 4)
                        <span class="more toggle-btn">{{ Lang::get('car.detail.more_photo', ['num' => count($car->images) - 4]) }}</span>
                    @endif
                </div>
                @if ($key === 0 && ($link = $car->youtube_link))
                    <div class="item">
                        <picture>
                            <img src="//img.youtube.com/vi/{{ $link }}/mqdefault.jpg" width="480"
                                 height="360">
                        </picture>
                        <svg class="play" width="45" height="45">
                            <use xlink:href="{{ asset('img/icons/sprite.svg#play') }}"></use>
                        </svg>
                    </div>
                @endif
            @endforeach
        </div>
    @endif
</div>
