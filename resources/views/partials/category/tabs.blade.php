@if (count($categories) > 0 && $category->slug !== 'zaryadnye-stancii')
    <div class="tab-links row">
        @foreach($categories as $selectCategory)
            <a class="@if($category->slug === $selectCategory->slug) active @endif"
               href="{{ route('category', ['category' => $selectCategory->slug]) }}"><h3 class="tab-h3">{{ $selectCategory->title }}</h3></a>
        @endforeach
    </div>
@endif
