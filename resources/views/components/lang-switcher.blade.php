<div class="lang-switcher">
    @foreach($locales as $localeCode => $properties)
        @if($currentLocale == $localeCode)
            <span>{{ $properties['native'] }}</span>
        @else
            <a href="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL($localeCode) }}">{{ $properties['native'] }}</a>
        @endif
    @endforeach
    <a href="#" class="lang-btn">Оберіть Укр мову сайту</a>
</div>
