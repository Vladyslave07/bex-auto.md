<div class="menu-info">
    @if ($items->count() > 0)
        <nav>
            @foreach($items as $item)
                <a href="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::localizeUrl($item->link) }}">{{ $item->title }}</a>
            @endforeach
        </nav>
    @endif
</div>
