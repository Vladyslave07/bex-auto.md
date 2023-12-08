<div class="menu-icons-mob">
    <a href="{{ route('static.contacts') }}" class="item">
        <div class="icon">
            <svg width="37" height="36"><use xlink:href="#phone-icon"></use></svg>
        </div>
        <span class="name">{{ __('header.contacts') }}</span>
    </a>
    <div class="item" data-target="menuOpen">
        <div class="icon">
            <svg width="24" height="24"><use xlink:href="#bar-icon"></use></svg>
        </div>
        <span class="name">{{ __('header.menu') }}</span>
    </div>
    <div class="item" data-target="catalogOpen">
        <div class="icon">
            <svg width="24" height="24"><use xlink:href="#catalog-icon"></use></svg>
        </div>
        <span class="name">{{ __('header.catalog') }}</span>
    </div>
    <div class="item" data-target="searchOpen">
        <div class="icon">
            <svg width="25" height="24"><use xlink:href="#search-icon"></use></svg>
        </div>
        <span class="name">{{ __('header.search') }}</span>
    </div>
</div>
