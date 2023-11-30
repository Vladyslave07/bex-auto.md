<div>
    @if ($items->count() > 0)
        <nav class="menu-info">
            @foreach($items as $item)
                <a href="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::localizeUrl($item->link) }}">{{ $item->title }}</a>
            @endforeach
        </nav>
    @endif
</div>
