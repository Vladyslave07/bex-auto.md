<div>
    @foreach($locales as $localeCode => $properties)
        @php($code = $localeCode == \App\Models\Domain::KAZACHSTAN_SLUG_DOMAIN ? 'kk' : $localeCode)
        @if(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale() == $localeCode)
            <link rel="alternate" hrefLang="x-default" href="{{ request()->getUri() }}"/>
        @else
            <link rel="alternate" hrefLang="{{ $code . '-' . $properties['lang'] }}" href="{{ Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL($localeCode) }}"/>
        @endif
    @endforeach
</div>
