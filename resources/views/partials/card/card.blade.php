<div class="card">
    <div class="inner">
        <div class="bg">
            <div class="container">
                <div class="card-title">
                    <h1 class="main-title">{{ $car->titleWithYear }}</h1>
                    <div class="price">{{ $car->price_format }}</div>
                </div>
                <div class="card-nav">
                    <span class="item active" data-target="Tab_1">{{ Lang::get('car.detail.characteristic')}}</span>
                    <span class="item" data-target="Tab_2">{{ Lang::get('car.detail.description') }}</span>
                </div>
                <div class="card-gallery">
                    @if ($car->images)
                        <div class="swiper gallery-swiper">
                            <div class="swiper-wrapper">
                                @foreach($car->images as $key => $image)
                                    <a data-fancybox="gallery" href="{{ Storage::disk('public')->url($image) }}" class="swiper-slide">
                                        {!! \App\Helper\ImageHelper::getPicture($image) !!}
                                    </a>
                                    @if ($key === 0 && ($link = $car->youtube_link))
                                        <div data-fancybox="gallery" data-type="iframe" class="swiper-slide">
                                            <iframe data-src="https://www.youtube.com/embed/{{ $link }}"></iframe>
                                        </div>
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
                                        {!! \App\Helper\ImageHelper::getPicture($image) !!}
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
                <div class="card-btn">
                    @if ($car->status != \App\Models\Car::SOLD_STATUS)
                        @include('partials.card.card-btn')
                    @else
                        <button onclick="openModal('#applicationForCar')"
                                class="btn btn-blue">{{ Lang::get('car.detail.sold') }}</button>
                    @endif
                </div>
                <div class="card-features">
                    <strong class="title">{{ Lang::get('car.detail.characteristic')}}:</strong>
                    <ul class="list">
                        @foreach($car->properties as $property)
                            @if($value = $property->getValue())
                                <li>
                                    <div class="dt">
                                        @if ($image = $property->image)
                                            <div class="icon">
                                                <img src="{{ Storage::disk('public')->url($image) }}">
                                            </div>
                                        @endif
                                        {{ $property->title }}:
                                    </div>
                                    <div class="dd">{{ Str::ucfirst($value) }} {{ $property->prefix }}</div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        {{-- Links --}}
        @include('partials.card.links')

        @if ($car->description)
            <div class="card-description container">
                <div class="main-title text-center hidden-sm">{{ Lang::get('car.detail.description') }}</div>
                {!! $car->description !!}
            </div>
        @endif
    </div>
    <div class="card-btn_mob">
        @include('partials.card.card-btn')
    </div>
</div>
