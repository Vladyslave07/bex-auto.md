<div class="section-social">
    <div class="container">
        <picture class="img hidden-sm">
            <source type="image/webp" srcset="{{ asset('img/section-social.webp') }}">
            <img width="855" height="604" src="{{ asset('img/section-social.png') }}" loading="lazy" alt="">
        </picture>
        <div class="text">
            <div class="main-title noline">@lang('index.offer.title')</div>
            <p>@lang('index.offer.sub_title')</p>
            <picture class="img visible-sm">
                <source type="image/webp" srcset="{{ asset('img/section-social-mob.webp') }}">
                <img width="855" height="604" src="{{ asset('img/section-social-mob.png') }}" loading="lazy" alt="">
            </picture>
            {{-- social button --}}
            @include('partials.footer.social')
        </div>
    </div>
</div>