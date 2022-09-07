@if(count($item->children) > 0)
    <div class="menu-footer">
        @foreach($item->children as $child)
            <a href="/{{ $item->slug . '/' . $child['url'] }}">{{ $child['name'] }}</a>
        @endforeach
    </div>
@endif