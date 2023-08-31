@if(count($countries) > 0)
    <div class="section-countries container">
        @if(strlen(\App\Models\Setting::get('country_title_block')) > 0)
            <div class="main-title text-center">{{ \App\Models\Setting::get('country_title_block') }}</div>
        @endif
        <div class="swiper countries-swiper">
            <div class="swiper-wrapper nav-tabs">
                @foreach($countries as $key => $country)
                    <div class="swiper-slide item {{ $loop->first ? 'active' : '' }}" data-toggle="tab"
                         data-target="#partnerTab_{{ $key }}">
                        {!! \App\Helper\ImageHelper::getPicture($country->image) !!}
                        {{ $country->title }}
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination">
                <div class="swiper-bullets"></div>
            </div>
        </div>
    </div>

    <div class="section-partners">
        <div class="container">
            <div class="tab-content">
                @foreach($countries as $key => $country)
                    <div id="partnerTab_{{ $key }}" class="tab-pane {{ $loop->first ? 'active' : '' }}">
                        @if($country->country_text)
                            @if ($country->country_text->title)
                                <div class="main-title text-center noline">{{ $country->country_text->title }}</div>
                            @endif
                            @if ($country->country_text->value)
                                <p>
                                    {!! $country->country_text->value !!}
                                </p>
                            @endif
                        @endif
                        @if($country->auction_images)
                            <div class="auctions">
                                @foreach($country->auction_images as $image)
                                    <div class="item">
                                        {!! \App\Helper\ImageHelper::getPicture($image['logo'], null, 'img') !!}
                                        @if($image['link'])
                                            <a href="{{ LaravelLocalization::localizeURL($image['link']) }}">
                                                {{ __('service.more') }}
                                            </a>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
