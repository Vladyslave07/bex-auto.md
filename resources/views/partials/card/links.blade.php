@if (count($links) > 0)
    <div class="hashtags container hidden-sm">
        @foreach($links as $link)
            <a href="{{ route('category', ['category' => $link->slug]) }}">{{ $link->title }}</a>
        @endforeach
    </div>
@endif