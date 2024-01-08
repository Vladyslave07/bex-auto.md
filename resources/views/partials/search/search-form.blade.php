<div class="search">
    <form action="{{ route('search') }}">
        <input type="text" name="q" value="{{ request()->get('q') }}" placeholder="@lang('index.search.placeholder')" autocomplete="off">
        <span class="search-result__close" onclick="searchClose()" aria-label="Search close">
            <svg width="15" height="15"><use xlink:href="#close-icon"></use></svg>
        </span>
        <button class="search-btn" type="submit" aria-label="Search">
            <svg width="20" height="19"><use xlink:href="#search-icon"></use></svg>
        </button>
    </form>

    <div class="search-result">
        <div class="search-result__inner">
            <a class="all-result" href="/search?q=">
                Всі результати пошуку
            </a>
            <div class="search-result__categories">
                <a class="item" href="#">
                    <span class="name">nissan leaf</span>
                    <span class="amt">в наявності близько 2 автомобілів</span>
                    <svg width="12" height="12"><use xlink:href="#arrowL-icon"></use></svg>
                </a>
                <a class="item" href="#">
                    <span class="name">nissan qashqai</span>
                    <span class="amt">в наявності близько 12 автомобілів</span>
                    <svg width="12" height="12"><use xlink:href="#arrowL-icon"></use></svg>
                </a>
                <a class="item" href="#">
                    <span class="name">nissan rogue</span>
                    <span class="amt">в наявності близько 1 автомобіля</span>
                    <svg width="12" height="12"><use xlink:href="#arrowL-icon"></use></svg>
                </a>
                <a class="item" href="#">
                    <span class="name">nissan juke</span>
                    <span class="amt">в наявності близько 4 автомобілів</span>
                    <svg width="12" height="12"><use xlink:href="#arrowL-icon"></use></svg>
                </a>
            </div>
            <div class="search-result__products">
                <a class="item" href="#">
                    <picture>
                        <source type="image/webp" srcset="https://placehold.co/120x80">
                        <img src="https://placehold.co/120x80" width="120" height="80" alt="">
                    </picture>
                    <div class="name">
                        Mitsubishi Airtrek 2022
                        <span class="price">
                            $53 300
                            <span>₸24 783 813</span>
                        </span>
                    </div>
                    <svg width="12" height="12"><use xlink:href="#arrowL-icon"></use></svg>
                </a>
                <a class="item" href="#">
                    <picture>
                        <source type="image/webp" srcset="https://placehold.co/120x80">
                        <img src="https://placehold.co/120x80" width="120" height="80" alt="">
                    </picture>
                    <div class="name">
                        Mitsubishi Airtrek 2022
                        <span class="price">
                            $53 300
                            <span>₸24 783 813</span>
                        </span>
                    </div>
                    <svg width="12" height="12"><use xlink:href="#arrowL-icon"></use></svg>
                </a>
                <a class="item" href="#">
                    <picture>
                        <source type="image/webp" srcset="https://placehold.co/120x80">
                        <img src="https://placehold.co/120x80" width="120" height="80" alt="">
                    </picture>
                    <div class="name">
                        Mitsubishi Airtrek 2022
                        <span class="price">
                            $53 300
                            <span>₸24 783 813</span>
                        </span>
                    </div>
                    <svg width="12" height="12"><use xlink:href="#arrowL-icon"></use></svg>
                </a>
            </div>
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

        input.oninput = handleInput;
        input.onfocus = handleInput;

        searchResult.addEventListener('click', (e) => {
            if(!e.target.closest('.search-result__inner')) {
                searchClose();
            }
        });
    </script>
@endpush