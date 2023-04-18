@if($items && count($items) > 0)
    <div class="menu-footer">
        @foreach($items as $item)
            @if ($item)
                <a href="{{  LaravelLocalization::localizeURL($item->slug) }}">{{ $item->title }}</a>
            @endif
        @endforeach
    </div>
@endif
