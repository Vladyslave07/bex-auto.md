<div class="section-partners">
    <div class="container">
        <h2 class="main-title text-center noline">{!! Setting::get('auction_block_title') !!}</h2>
        <p class="text-center">{{ Setting::get('auction_block_sub_title') }}</p>
        <div class="text-center">
            <picture>
                <source type="image/webp" srcset="{{ asset('img/example/img_8.webp') }}">
                <img width="548" height="92" src="{{ asset('img/example/img_8.png') }}" loading="lazy" alt="">
            </picture>
        </div>
    </div>
</div>
