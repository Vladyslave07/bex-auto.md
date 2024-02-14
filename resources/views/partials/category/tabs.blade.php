@if (count($categories) > 0 && $category->slug !== 'zaryadnye-stancii')
    <div class="tab-links row">
        @foreach($categories as $selectCategory)
            <h3 class="@if($category->slug === $selectCategory->slug) active @endif"
               href="{{ route('category', ['category' => $selectCategory->slug]) }}">{{ $selectCategory->title }}</h3>
        @endforeach
    </div>
@endif
