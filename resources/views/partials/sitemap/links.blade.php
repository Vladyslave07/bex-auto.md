<style>
    .row {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        gap: 10px;
        margin-bottom: 20px;
    }

    .sitemap .list {
        max-width: 180px;
        display: flex;
        flex-direction: column;
    }

</style>

<div class="container sitemap">
    <div class="row">
        <h2>{{ __('sitemap.cities') }}</h2>
        @foreach($cities->chunk(10) as $citiesChunk)
            <div class="list">
                @foreach($citiesChunk as $city)
                    <a href="{{ route('index', ['city' => $city->slug]) }}">
                        {{ $city->title }}
                    </a>
                @endforeach
            </div>
        @endforeach
    </div>
    <div class="row">
        <h2>{{ __('sitemap.categories') }}</h2>
        @foreach($categories->chunk(10) as $categoryChunk)
            <div class="list">
                @foreach($categoryChunk as $category)
                    <a href="{{ route('category', ['category' => $category['url']]) }}">
                        {{ $category['name'] }}
                    </a>
                @endforeach
            </div>
        @endforeach
    </div>
    <div class="row">
        <h2><a href="{{ route('main-category') }}">{{ __('sitemap.cars') }}</a></h2>
        @foreach($cars->chunk(10) as $carsChunk)
            <div class="list">
                @foreach($carsChunk as $car)
                    <a href="{{ route('category', ['category' => $car->slug]) }}">
                        {{ $car->title }}
                    </a>
                @endforeach
            </div>
        @endforeach
    </div>
</div>
