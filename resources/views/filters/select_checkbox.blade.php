<div class="row">
    @if($filter['slug'] === 'brand')

        @include('filters.partials.dropdown', ['disabled' => false])

        @if (key_exists('model', $filters))
            @include('filters.partials.dropdown', ['filter' => $filters['model'], 'disabled' => true])
        @endif
    @elseif($filter['slug'] !== 'model')

        @include('filters.partials.dropdown', ['disabled' => false])

    @endif
</div>
