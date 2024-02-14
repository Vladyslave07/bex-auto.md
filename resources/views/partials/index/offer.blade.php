<div class="section-social">
    <div class="container">
        <picture class="img hidden-sm">
            <source type="image/webp" srcset="{{ asset('img/' . \App\Helper\General::siteDirectory() . '/section-social-mob.webp') }}">
            <img width="855" height="604" src="{{ asset('img/' . \App\Helper\General::siteDirectory() . '/section-social-mob.png') }}" loading="lazy" alt="">
        </picture>
        <div class="text">
            <h2 class="main-title noline">{!! Setting::get('get_offer_title') !!}</h2>
            <p>{!! Setting::get('get_offer_sub_title') !!}</p>
            <picture class="img visible-sm">
                <source type="image/webp" srcset="{{ asset('img/' . \App\Helper\General::siteDirectory() . '/section-social-mob.webp') }}">
                <img width="855" height="604" src="{{ asset('img/' . \App\Helper\General::siteDirectory() . '/section-social-mob.png') }}" loading="lazy" alt="">
            </picture>
            {{-- social button --}}
            @include('partials.footer.social')
        </div>
    </div>
</div>
