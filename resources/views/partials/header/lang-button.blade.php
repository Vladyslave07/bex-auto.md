<div class="lang-switcher">
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        @if(LaravelLocalization::getCurrentLocale() == $localeCode)
            <span>{{ $properties['native'] }}</span>
        @else
            <a href="{{ LaravelLocalization::getLocalizedURL($localeCode) }}">{{ $properties['native'] }}</a>
        @endif
    @endforeach
</div>