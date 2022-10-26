@if(count($item->children) > 0)
    <div class="menu-footer">
        @foreach($item->children as $child)
            <a href="{{ \App\Models\Menu::localeMenuLinks($item->slug, $child['url']) }}">{{ $child['name'] }}</a>
        @endforeach
    </div>
@endif