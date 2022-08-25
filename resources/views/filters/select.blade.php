@if (count($filter['values']) > 0)
    <div class="dropdown dropdown-select">
        <span class="dropdown-toggle form-control">{{ $filter['name'] }}</span>
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
                            >
                        </label>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif