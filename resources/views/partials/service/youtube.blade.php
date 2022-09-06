@if ($link = $service->youtube_link)
    <div class="section-text container">
        <div class="ratio">
            <iframe src="https://www.youtube.com/embed/{{ $link }}" loading=lazy title="youtube"
                    allowfullscreen></iframe>
        </div>
        <div class="h2 text-center">
            {!! $service->text !!}
        </div>
    </div>
@endif