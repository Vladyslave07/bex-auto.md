<div class="footer-bottom">

    {{-- social button --}}
    @include('partials.footer.social')

    {{-- contacts --}}
    @include('partials.footer.contacts')

    <a href="{{ route('sitemap') }}">{{ __('sitemap.sitemap') }}</a>
</div>
