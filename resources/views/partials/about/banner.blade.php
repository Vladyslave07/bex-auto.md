<div class="about">
    <div class="container">
        <h1 class="h1 color-red text-center">BEX AUTO</h1>
        <h2 class="main-title text-center noline">{!! config('settings.about_sub_title') !!}</h2>
        <div class="img">
            <picture>
                <source type="image/webp" srcset="{{ asset('img/map_mob.webp') }}" media="(max-width: 767px)">
                <source type="image/webp" srcset="{{ asset('img/map.webp') }}" media="(min-width: 768px)">
                <img width="1364" height="378" src="{{ asset('img/map.png') }}" alt="">
            </picture>
        </div>
    </div>
</div>