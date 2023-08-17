<aside class="filter-side">
    <form action="#">
        @foreach($filters as $filter)

            @if (key_exists('values', $filter))

                @include('filters.' . $filter['type'], compact('filter'))

            @endif

        @endforeach
        <a href="#" class="clear-filter" wire:click.prevent="cleanFilters()">{{ Setting::get('clear_all_filters') }}</a>
    </form>
</aside>
