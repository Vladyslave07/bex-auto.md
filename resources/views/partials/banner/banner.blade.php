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
        @if (strlen($banner->image) > 0)
            <picture class="img">
                @if ($banner->mobile_image)
                    <source media="(max-width: 990px)" srcset="{{ Storage::url($banner->mobile_image) }}">
                @endif
                <img src="{{ Storage::url($banner->image) }}" width="729" height="512" alt="" title="">
            </picture>
        @endif
        @if($banner->text)
            <br>
            <br>
            <span class="line hidden-xs"></span>
            <div class="h3 color-blue color-red-xs">{!! $banner->text !!}</div>
        @endif
    </div>
</div>
