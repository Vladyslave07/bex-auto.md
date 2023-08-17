<div class="section-advantages">
    <div class="container">
        <div class="main-title text-center color-red noline">
            {!! Setting::get('about_easy_with') !!}
        </div>
    </div>
    <div class="img">
        <picture>
            <source type="image/webp" srcset="{{ asset('img/section-advantages.webp') }}">
            <img width="1154" height="330" src="{{ asset('img/section-advantages.png') }}" alt="" loading="lazy">
        </picture>
    </div>
    @include('partials.index.advantages_list')
</div>
