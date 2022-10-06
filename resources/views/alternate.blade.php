@foreach(\App\Services\LaravelLocalizationCustom::getSupportedLocales() as $localeCode => $properties)
    @if(\App\Services\LaravelLocalizationCustom::getCurrentLocale() == $localeCode)
<link rel="alternate" hrefLang="x-default" href="{{ request()->getUri() }}" />
    @else
<link rel="alternate" hrefLang="{{ $localeCode . '-' . strtoupper(preg_replace('/(.*)\.' . env('APP_DOMAIN') . '/', '$1', request()->getHost())) }}" href="{{ \App\Services\LaravelLocalizationCustom::getLocalizedURL($localeCode) }}" />
    @endif
@endforeach



