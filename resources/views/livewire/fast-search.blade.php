<div class="search">
    <form action="{{ route('search') }}">
        <input wire:model.live="query" type="text" name="q" value="{{ request()->get('q') }}"
               placeholder="@lang('index.search.placeholder')" autocomplete="off">
        <span class="search-result__close" onclick="searchClose()" aria-label="Search close">
            <svg width="15" height="15"><use xlink:href="#close-icon"></use></svg>
        </span>
        <button class="search-btn" type="submit" aria-label="Search">
            <svg width="20" height="19">
                <use xlink:href="#search-icon"></use>
            </svg>
        </button>
    </form>

    <div class="search-result" style="display: @if ($showResults) block @else none @endif">
        <div class="search-result__inner">
            <a class="all-result" href="{{ route('search') }}?q={{ $query }}">
                {{ __('search.all_results') }}
            </a>
            @if (count($fastResults) > 0)
                <div class="search-result__categories">
                    @foreach($fastResults as $result)
                        @if ($result->car_count > 0)
                            <a class="item" href="{{ route('search') }}?q={{ $result->title }}">
                                <span class="name">{{ $result->title }}</span>
                                <span class="amt">{{ __('search.in_stock', ['count' => $result->car_count]) }}</span>
                                <svg width="12" height="12">
                                    <use xlink:href="#arrowL-icon"></use>
                                </svg>
                            </a>
                        @endif
                    @endforeach
                </div>
            @endif
            @if (count($cars) > 0)
                <div class="search-result__products">
                    @foreach($cars as $car)
                        <a class="item" href="{{ route($car->detailRouteName, [$car->getKeyRouteName() => $car->slug]) }}">
                            @if (strlen($car->previewPicture) > 0)
                                {!! \App\Helper\ImageHelper::getPicture($car->previewPicture) !!}
                            @endif
                            <div class="name">
                                {{ $car->title }}
                                @if ($car->price)
                                    <span class="price">
                                    {{ $car->price_format }}
                                    @if($car->price_for_current_country)
                                        <span>{{ $car->price_for_current_country }}</span>
                                    @endif
                                    </span>
                                @endif
                            </div>
                            <svg width="12" height="12">
                                <use xlink:href="#arrowL-icon"></use>
                            </svg>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@push('scripts')
    <script>
        const input = document.querySelector(".search input");
        const searchResult = document.querySelector('.search-result');

        window.searchClose = () => {
            if (window.innerWidth <= 992) {
                document.querySelector('[data-target=searchOpen]').click();
            } else {
                searchResult.style.display = 'none';
                input.classList.remove('open');
            }
        }


        const handleInput = (e) => {
            searchResult.style.display = e.target.value ? 'block' : 'none';
            input.classList.toggle('open', e.target.value !== '');
        };

        input.onfocus = handleInput;

        searchResult.addEventListener('click', (e) => {
            if (!e.target.closest('.search-result__inner')) {
                searchClose();
            }
        });
    </script>
@endpush

