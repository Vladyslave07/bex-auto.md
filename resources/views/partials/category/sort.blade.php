<div class="catalog-settings">
    <svg class="btn-filter visible-sm toggle-btn" width="22" height="25" viewBox="0 0 22 25" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.0606 24.7446H7.875V12.2603L0 1.95008V0H21.375V1.93895L13.875 12.2492V20.5497L10.0606 24.7446ZM9.375 23.095H9.43936L12.375 19.8665V11.6706L19.6645 1.64964H1.72969L9.375 11.6595V23.095Z" fill="#2A3D68" stroke="none"/></svg>
    <div class="dropdown">
        <span class="dropdown-toggle">
            @foreach($this->orderBy as $sort)
                @if($sort['by'] === $this->by && $sort['sort'] === $this->sort)
                    {{$sort['title']}}
                @endif
            @endforeach
        </span>
        <div class="dropdown-menu">
            <ul>
                @foreach($this->orderBy as $sort)
                    <li class="dropdown-item option @if($sort['by'] === $this->by && $sort['sort'] === $this->sort) selected @endif"
                        wire:click.prevent="sortBy('{{ $sort['by'] }}', '{{ $sort['sort'] }}')"
                    >
                        {{ $sort['title'] }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>