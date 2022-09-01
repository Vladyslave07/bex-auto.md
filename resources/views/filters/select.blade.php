@if (count($filter['values']) > 0)
    <div class="dropdown dropdown-select">
        @if (in_array(true, array_column($filter['values'], 'active')))
            @foreach($filter['values'] as $value)
                @if ($value['active'])
                    <span class="dropdown-toggle form-control">{{ $value['value'] }}</span>
                @endif
            @endforeach
        @else
            <span class="dropdown-toggle form-control">{{ $filter['name'] }}</span>
        @endif
        <div class="dropdown-menu">
            <ul>
                @foreach($filter['values'] as $key => $value)
                    {{--                selected--}}
                    <li class="dropdown-item option">
                        <label>
                            {{ $value['value'] }}
                            <input
                                    class="form-hide" type="radio" name="price1"
                                    wire:click="setFilter('{{ $filter['slug'] }}', '{{ $key }}')"
                            @if($value['active']) checked @endif
                            >
                        </label>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif