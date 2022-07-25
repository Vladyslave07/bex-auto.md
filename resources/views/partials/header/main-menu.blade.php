<nav class="main-menu">
    <ul>
        @foreach($items as $item)
            <li>
                <a href="/{{ $item->slug}}">{{ $item->title }}</a>
                @if(count($item->children) > 0)
                    <svg class="toggle-btn" width="13" height="7">
                        <use xlink:href="#arrow-icon"></use>
                    </svg>
                    <div class="menu-dropdown">
                        <div class="submenu">
                            @foreach($item->children as $child)
                                <a href="{{ $child['url'] }}">{{ $child['name'] }}</a>
                            @endforeach
                        </div>
                        @if($items->first()->slug === $item->slug)
                            <div class="menu-img">
                                    <img width="290" height="202" src="/storage/{{ $item->image }}" alt="">
                            </div>
                        @endif()
                    </div>
                @endif
            </li>
        @endforeach
    </ul>
    <div class="location-list visible-sm">
        <a href="#">Одеса</a>
        <a href="#">Київ</a>
        <a href="#">Миколаїв</a>
        <a href="#">Харків</a>
        <a href="#">Херсон</a>
        <a href="#">Кривий Ріг</a>
        <a href="#">Полтава</a>
        <a href="#">Черкаси</a>
        <a href="#">Дніпро</a>
        <a href="#">Вінниця</a>
        <a href="#">Запоріжжя</a>
    </div>
</nav>