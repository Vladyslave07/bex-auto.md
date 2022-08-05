<div class="popular-brands">
    <div class="container hidden-xs">
        <div class="main-title text-center">@lang('index.popular.title')</div>
    </div>
    <div class="list">
        <div class="container">
            @foreach($brands as $brand)
                <a href="{{ route('category', $brand->slug) }}" title="{{ $brand->title }}">{{ $brand->title }} </a>
            @endforeach
        </div>
    </div>
    <span class="toggle-btn visible-xs">@lang('index.popular.more')</span>
</div>