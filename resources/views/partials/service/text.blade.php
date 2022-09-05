@if(($text = $service->text) && !$service->youtube_link)
    <div class="text-page">
        {!! $text !!}
    </div>
@endif