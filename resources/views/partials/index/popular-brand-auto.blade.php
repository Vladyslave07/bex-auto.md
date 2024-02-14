@if (count($brands) > 0)
<div class="popular-brands">
    <div class="container">
        <h2 class="main-title text-center">{{ Setting::get('popular_brand_auto_title') }}</h2>
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
