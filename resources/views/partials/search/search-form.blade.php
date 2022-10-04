<form class="search" action="{{ route('search') }}">
    <input type="text" name="q" value="{{ request()->get('q') }}" placeholder="@lang('index.search.placeholder')" autocomplete="off">
    <button class="search-btn" type="submit" aria-label="Search">
        <svg width="20" height="19"><use xlink:href="#search-icon"></use></svg>
    </button>
</form>