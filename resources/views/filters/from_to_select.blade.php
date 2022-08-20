{{--@php(dd($filter))--}}
<strong class="title">{{ $filter['name'] }}</strong>
<div class="label">Від</div>
<div class="dropdown dropdown-select">
    <span class="dropdown-toggle form-control">{{ $filter['values']['from'][array_key_first($filter['values']['from'])] }}</span>
    <div class="dropdown-menu">
        <ul>
            @foreach($filter['values']['from'] as $key => $from)
                <li class="dropdown-item option @if($key === array_key_first($filter['values']['from'])) selected @endif">
                    <label>
                        {{ $from }}
                        <input wire:click="setRangeFilter('{{ $filter['slug'] }}', '{{ $key }}', 'from')"
                               class="form-hide" type="radio" name="price1"
                               @if($key === array_key_first($filter['values']['from'])) checked @endif>
                    </label>
                </li>
            @endforeach
        </ul>
    </div>
</div>
<div class="label">До</div>
<div class="dropdown dropdown-select">
    <span class="dropdown-toggle form-control">{{ $filter['values']['to'][array_key_last($filter['values']['to'])] }}</span>
    <div class="dropdown-menu">
        <ul>
            @foreach($filter['values']['to'] as $key => $to)
                <li class="dropdown-item option
                    @if($key === array_key_last($filter['values']['to'])) selected @endif">
                    <label>
                        {{ $to }}
                        <input wire:click="setRangeFilter('{{ $filter['slug'] }}', '{{ $key }}', 'to')"
                                class="form-hide" type="radio" name="price2"
                               @if($key === array_key_last($filter['values']['to'])) checked @endif>
                    </label>
                </li>
            @endforeach
        </ul>
    </div>
</div>