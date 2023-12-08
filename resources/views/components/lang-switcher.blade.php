<div class="lang-switcher">
    <div class="title visible-sm">{{ __('header.lang') }}</div>
    @foreach($locales as $localeCode => $properties)
        @if(!$loop->first)
            <span class="separator"></span>
        @endif
        @if($currentLocale == $localeCode)
            <span class="active">{{ $properties['native'] }}</span>
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
