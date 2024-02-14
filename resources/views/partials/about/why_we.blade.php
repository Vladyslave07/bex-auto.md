<div class="section-advantages">
    <div class="container">
        <h2 class="main-title text-center color-red">
            {!! Setting::get('about_easy_with') !!}
        </h2>
    </div>
    <div class="img">
        <picture>
            <source type="image/webp" srcset="{{ asset('img/section-advantages.webp') }}">
            <img width="1154" height="330" src="{{ asset('img/section-advantages.png') }}" alt="" loading="lazy">
        </picture>
    </div>
    @include('partials.index.advantages_list')
</div>
