@if (count($brands) > 0)
<div class="popular-brands">
    <div class="container hidden-xs">
        <div class="main-title text-center">{{ config('settings.popular_brand_auto_title') }}</div>
    </div>
    <div class="list">
        <div class="container">
            @foreach($brands as $brand)
                <a href="{{ route('category', ['category' => $brand->slug]) }}" title="{{ $brand->title }}">{{ $brand->title }} </a>
            @endforeach
        </div>
    </div>
    <span class="toggle-btn visible-xs">@lang('index.popular.more')</span>
</div>
@endif