@if(count($filter['values']) > 0)
    <div class="dropdown dropdown-check @if($filter['slug'] === 'model' && $this->disabled) disabled @endif">
        <span class="dropdown-toggle">{{ $filter['name'] }}</span>
        <div class="dropdown-menu">
            <ul>
                @foreach($filter['values'] as $key => $value)
                    <li class="dropdown-item option">
                        <label>
                            {{ $value['value'] }}
                            <input class="form-checkbox"
                                   wire:click="setFilter('{{ $filter['slug'] }}', '{{ $key }}')" type="radio"
                                   name="{{ $filter['slug'] }}">
                        </label>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif