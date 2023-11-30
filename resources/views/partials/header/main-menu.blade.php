<nav class="main-menu">
    <ul>
        @foreach($items as $item)
            <li>
                <a @if ($item->show_link) href="{{ \App\Models\Menu::localeMenuLink($item->slug) }}" @else @if($loop->first) onclick="document.querySelector('[data-target=catalogOpen]').click()" @else class="toggle-btn" @endif @endif>
                    @if($loop->first)
                        <svg width="15" height="14"><use xlink:href="#catalog-icon"></use></svg>
                    @endif
                    {{ $item->title }}
                </a>
                @if(count($item->children) > 0)
                    @if(!$loop->first)
                        <svg class="toggle-btn" width="13" height="7">
                            <use xlink:href="#arrow-icon"></use>
                        </svg>
                    @endif
                    <div class="menu-dropdown">
                        <div class="submenu">
                            @foreach($item->children as $child)
                                @if ($child)
                                <a href="{{ \App\Models\Menu::localeMenuLinks($item->slug, key_exists('url', $child) ? $child['url'] : '')  }}">{{ $child['name'] }}</a>
                                @endif
                            @endforeach
                        </div>
                        @if($loop->first && $item->image)
                            <div class="menu-img">
                                    <img width="290" height="202" src="{{ Storage::disk('public')->url($item->image) }}" alt="">
                            </div>
                        @endif()
                    </div>
                @endif
            </li>
        @endforeach
    </ul>

    {{-- location list --}}
{{--    @include('partials.header.location-list', ['class' => 'visible-sm'])--}}
</nav>