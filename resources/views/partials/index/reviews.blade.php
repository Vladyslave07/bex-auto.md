<div class="section-reviews container hidden-xs">
    <div class="main-title text-center noline">{{ config('settings.reviews_block_title') }}</div>
    <div class="h3 text-center">{{ config('settings.reviews_block_sub_title') }}</div>
    <!-- <div class="swiper reviews-swiper">
        <script src="https://apps.elfsight.com/p/platform.js" defer></script>
        <div class="elfsight-app-a3acb51c-5909-4721-9168-ff918eae4d23"></div>
        <a href="#" class="link-more">@lang('index.reviews.more')</a>
    </div> -->
    <div class="swiper reviews-swiper">
        <div class="swiper-wrapper reviews-list"></div>
        <div class="swiper-nav">
            <div class="swiper-button-prev team-prev"><svg width="24" height="30"><use xlink:href="#arrow-icon"></use></svg></div>
            <div class="swiper-bullets"></div>
            <div class="swiper-button-next team-next"><svg width="24" height="30"><use xlink:href="#arrow-icon"></use></svg></div>
        </div>
        <a href="#" class="link-more">@lang('index.reviews.more')</a>
    </div>
</div>