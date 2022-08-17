

@php
    $pattern = ['/\/page-(.*)?page=(.*)/', '!\?page=(.*)!'];
    $replace = '/page-'.($paginator->currentPage() - 1);
    if ($paginator->currentPage() - 1 === 1) {
        $replace = '';
    }
    $previousPage = preg_replace($pattern, $replace, $paginator->previousPageUrl());
    $nextPageUrl = '';
    if ($paginator->hasMorePages()) {
        $nextPageUrl = preg_replace($pattern, '/page-'.($paginator->currentPage() + 1), $paginator->nextPageUrl());
    }
@endphp

@section('meta-pagination')
{{--@if (!$paginator->onFirstPage())--}}
{{--<meta name='robots' content='noindex, follow' />--}}
{{--@endif--}}
{{--@if($previousPage)--}}
{{--        <link rel="prev" href="{{ $previousPage }}" />--}}
{{--@endif--}}
{{--@if ($paginator->hasMorePages())--}}
{{--        <link rel="next" href="{{ $nextPageUrl }}" />--}}
{{--@endif--}}
@endsection

@if ($paginator->hasPages())

    <nav class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a  wire:click.prevent="previousPage" aria-label="pagination.previous">
                <svg width="24" height="30">
                    <use xlink:href="#arrow-icon"></use>
                </svg>
            </a>
        @else
            <a wire:click.prevent="previousPage">
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
                        <a
                            @if ($page == $paginator->currentPage())
                                class="active"
                            @endif
                            wire:click.prevent="setPage('{{ $page }}')"
                        >{{ $page }}</a>

                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a wire:click.prevent="nextPage"  aria-label="pagination.next">
                <svg width="24" height="30">
                    <use xlink:href="#arrow-icon"></use>
                </svg>
            </a>
        @else
            <span class="chevron" aria-label="pagination.next"></span>
        @endif
    </nav>

@endif
