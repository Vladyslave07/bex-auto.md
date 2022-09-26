<div class="banner bg">
    <div class="container">
        <br>
        <br>
        <br>
        <br>
        <h1 class="h1">
            <span class="color-red">{{ $banner->title }}</span>
        </h1>
        @if($banner->subtitle)
            <div class="h2 color-blue-xs">{!! $banner->subtitle !!}</div>
        @endif
        <picture class="img">
            <img width="729" height="633" src="{{ Storage::disk('public')->url($banner->image) }}" alt="">
        </picture>
        @if($banner->text)
            <br>
            <br>
            <span class="line hidden-xs"></span>
            <div class="h3 color-blue color-red-xs">{!! $banner->text !!}</div>
        @endif
    </div>
</div>