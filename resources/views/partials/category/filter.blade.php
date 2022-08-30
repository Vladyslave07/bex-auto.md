<aside class="filter-side">
    <form action="#">
        @foreach($filters as $filter)

            @if (key_exists('values', $filter))

                @include('filters.' . $filter['type'], compact('filter'))

            @endif

        @endforeach

        <button class="btn" type="submit">Пошук</button>
        <a href="catalog" class="clear-filter">Зкинути усі фільтри</a>
    </form>
</aside>