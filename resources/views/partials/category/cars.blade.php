<div class="catalog-grid">
    @foreach($cars as $car)
        @include('partials.index.car-card')
    @endforeach
</div>
{{ $cars->onEachSide(1)->links() }}
