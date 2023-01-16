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
        @if(strlen($service->image) > 0)
            {!! \App\Helper\ImageHelper::getPicture($service->image, $service->title, 'img') !!}
        @endif
    </div>
</div>

