@if(count($filter['values']) > 0)
    <div class="dropdown dropdown-check @if($filter['slug'] === 'model' && $this->disabled) disabled @endif">
        @if (in_array(true, array_column($filter['values'], 'active')))
            @foreach($filter['values'] as $value)
                @if ($value['active'])
                    <span class="dropdown-toggle">{{ $value['value'] }}</span>
                @endif
            @endforeach
        @else
            <span class="dropdown-toggle">{{ $filter['name'] }}</span>
        @endif
        <div class="dropdown-menu">
            <ul>
                @foreach($filter['values'] as $key => $value)
                    <li class="dropdown-item option">
                        <label>
                            {{ $value['value'] }}
                            <input class="form-checkbox"
                                   wire:click="setFilter('{{ $filter['slug'] }}', '{{ $key }}')" type="radio"
                                   name="{{ $filter['slug'] }}" @if($value['active']) checked @endif>
                        </label>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif