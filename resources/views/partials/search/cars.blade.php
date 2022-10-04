<div class="section-catalog container">
    <div class="catalog-wrap">
        <div class="catalog-grid">
            @foreach($cars as $car)
                @include('partials.index.car-card')
            @endforeach
        </div>
        {{ $cars->onEachSide(2)->links('vendor.pagination.default') }}
    </div>
</div>