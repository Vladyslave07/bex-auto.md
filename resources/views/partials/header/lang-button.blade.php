<div class="lang-switcher">
    @foreach(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        @if(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale() == $localeCode)
            <span>{{ $properties['native'] }}</span>
        @else
            <a href="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL($localeCode) }}">{{ $properties['native'] }}</a>
        @endif
    @endforeach
</div>