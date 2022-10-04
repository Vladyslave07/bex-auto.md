@if ($paginator->hasPages())
    <nav class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a aria-label="pagination.previous">
                    <svg width="24" height="30"><use xlink:href="#arrow-icon"></use></svg>
                </a>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" aria-label="pagination.previous">
                    <svg width="24" height="30"><use xlink:href="#arrow-icon"></use></svg></a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span aria-disabled="true">
                        <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5">{{ $element }}</span>
                    </span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <a
                                @if ($page == $paginator->currentPage())
                                class="active"
                                @endif
                                href="{{ $url }}"
                        >{{ $page }}</a>
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" aria-label="pagination.next"><svg width="24" height="30"><use xlink:href="#arrow-icon"></use></svg></a>
            @else
                <a aria-label="pagination.next">
                    <svg width="24" height="30"><use xlink:href="#arrow-icon"></use></svg>
                </a>
            @endif
    </nav>
@endif
