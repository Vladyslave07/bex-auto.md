@if(count($item->children) > 0)
    <div class="menu-footer">
        @foreach($item->children as $child)
            @if ($child)
                <a href="{{ \App\Models\Menu::localeMenuLinks($item->slug, key_exists('url', $child) ? $child['url'] : '') }}">{{ $child['name'] }}</a>
            @endif
        @endforeach
    </div>
@endif