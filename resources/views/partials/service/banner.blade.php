<div class="banner bg">
    <div class="container">

        {{-- Breadcrumbs --}}
        {{ Breadcrumbs::render() }}

        <h1 class="h1">
            <span class="color-red">{!! $service->title !!}</span>
        </h1>
        @if ($subtitle = $service->sub_title)
            <div class="h2 color-blue">{{ $subtitle }}</div>
        @endif
        @if ($subtitleText = $service->sub_title_text)
            <span class="line"></span>
            {!! $subtitleText !!}
        @endif
        <picture class="img">
            <source type="image/webp" srcset="{{ Storage::disk('public')->url($service->image) }}" media="(max-width: 767px)">
            <source type="image/webp" srcset="{{ Storage::disk('public')->url($service->image) }}" media="(min-width: 768px)">
            <img width="714" height="562" src="{{ Storage::disk('public')->url($service->image) }}" alt="{{ $service->title }}">
        </picture>
    </div>
</div>

