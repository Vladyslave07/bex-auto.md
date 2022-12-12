<div>
    <div class="catalog-wrap">
        {{-- Sorting --}}
        @include('partials.category.sort')

        {{-- Filter --}}
        @include('partials.category.filter')

        {{-- Cars grid --}}
        @include('partials.category.cars')
    </div>
</div>

<script>
    // Event for set pagination url. Url looks like this: /category/page-2
    window.addEventListener('setPageUrl', event => {
        let url = event.detail.url
        history.pushState(null, null, url);

        setTimeout(() => {
            document.querySelector('.catalog-wrap').scrollIntoView();
        }, 500)
    })
</script>
