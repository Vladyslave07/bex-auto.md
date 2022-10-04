<div class="lang-switcher">
    @foreach(\App\Services\LaravelLocalizationCustom::getSupportedLocales() as $localeCode => $properties)
        @if(\App\Services\LaravelLocalizationCustom::getCurrentLocale() == $localeCode)
            <span>{{ $properties['native'] }}</span>
        @else
            <a href="{{ \App\Services\LaravelLocalizationCustom::getLocalizedURL($localeCode) }}">{{ $properties['native'] }}</a>
        @endif
    @endforeach
</div>