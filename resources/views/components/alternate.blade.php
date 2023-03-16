<div>
    @foreach($locales as $localeCode => $properties)
        @if(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale() == $localeCode)
            <link rel="alternate" hrefLang="x-default" href="{{ request()->getUri() }}"/>
        @else
            <link rel="alternate" hrefLang="{{ $localeCode . '-' . strtoupper(preg_replace('/(.*)\.' . env('APP_DOMAIN') . '/', '$1', request()->getHost())) }}" href="{{ Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL($localeCode) }}"/>
        @endif
    @endforeach
</div>
