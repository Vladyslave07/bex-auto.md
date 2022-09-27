<div class="section-services">
    <div class="container">
        <div class="h3 text-center">{{ config('settings.service_block_title') }}</div>
        <div class="swiper services-swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="title color-red">@lang('index.services.block_1.title')</div>
                    <ul>
                        <li>@lang('index.services.block_1.li1')</li>
                        <li>@lang('index.services.block_1.li2')</li>
                        <li>@lang('index.services.block_1.li3')</li>
                    </ul>
                </div>
                <div class="swiper-slide">
                    <div class="title color-red">@lang('index.services.block_2.title')</div>
                    <p>@lang('index.services.block_2.sub_title')</p>
                    <picture>
                        <source type="image/webp" srcset="{{ asset('img/example/img_9.webp') }}">
                        <img width="272" height="36" src="{{ asset('img/example/img_9.png') }}" loading="lazy" alt="">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <div class="title color-red">@lang('index.services.block_3.title')</div>
                    <p>@lang('index.services.block_2.sub_title')</p>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>