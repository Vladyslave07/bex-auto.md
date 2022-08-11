@php
    $pattern = ['/\/page-(.*)?page=(.*)/', '!\?page=(.*)!'];
@endphp

@if ($paginator->hasPages())

    <nav class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a aria-label="pagination.previous">
                <svg width="24" height="30">
                    <use xlink:href="#arrow-icon"></use>
                </svg>
            </a>
        @else
            @php
                $replace = '/page-'.($paginator->currentPage() - 1);
                if ($paginator->currentPage() - 1 === 1) {
                    $replace = '';
                }
            @endphp
            <a href="{{ preg_replace($pattern, $replace, $paginator->previousPageUrl()) }}" aria-label="pagination.previous">
                <svg width="24" height="30">
                    <use xlink:href="#arrow-icon"></use>
                </svg>
            </a>
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
                    @if ($page == $paginator->currentPage())
                        <a class="active">{{ $page }}</a>
                    @else
                        @php
                            $replace = "/page-$page";
                            if ($page === 1) {
                                $replace = '';
                            }
                        @endphp
                        <a href="{{ preg_replace($pattern, $replace, $url) }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ preg_replace($pattern, '/page-'.($paginator->currentPage() + 1), $paginator->nextPageUrl()) }}" aria-label="pagination.next">
                <svg width="24" height="30">
                    <use xlink:href="#arrow-icon"></use>
                </svg>
            </a>
        @else
            <span class="chevron" aria-label="pagination.next"></span>
        @endif
    </nav>

@endif
