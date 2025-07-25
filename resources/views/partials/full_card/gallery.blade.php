<div class="card-gallery">
    @if ($car->images)
        <div class="swiper gallery-swiper">
            <div class="swiper-wrapper">
                @foreach($car->images as $key => $image)
                    <a data-fancybox="gallery" href="{{ Storage::disk('public')->url($image) }}" class="swiper-slide">
                        {!! \App\Helper\ImageHelper::getPicture($image) !!}
                    </a>
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
        <div class="swiper gallery-thumbs">
            <div class="swiper-wrapper">
                @foreach($car->images as $key =>  $image)
                    <div class="swiper-slide">
                        {!! \App\Helper\ImageHelper::getPicture($image) !!}
                    </div>
                    @if ($key === 0 && ($link = $car->youtube_link))
                        <div class="swiper-slide">
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
        </div>
    @endif
</div>
