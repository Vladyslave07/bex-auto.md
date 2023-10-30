<div class="lang-switcher">
    @foreach($locales as $localeCode => $properties)
        @if($currentLocale == $localeCode)
            <span>{{ $properties['native'] }}</span>
        @else
            <a href="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL($localeCode) }}">{{ $properties['native'] }}</a>
        @endif
    @endforeach
    @if (!$hideLangSwitchBtn)
        <a href="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL('uk') }}" class="lang-btn">
            {{ __('header.uk_lang_btm') }}
        </a>
    @endif
</div>
