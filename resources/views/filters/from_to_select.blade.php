<strong class="title">{{ $filter['name'] }}</strong>
<div class="label">Від</div>
<div class="dropdown dropdown-select">
    @php
        $fromFieldName = $filter['slug'] . 'From';
            $fromFieldName = $filter['slug'] . 'From';
            $fromCurrent = $filter['values']['from'][$this->$fromFieldName ?: array_key_first($filter['values']['from'])];
    @endphp
    <span class="dropdown-toggle form-control">{{ $fromCurrent }}</span>
    <div class="dropdown-menu">
        <ul>
            @foreach($filter['values']['from'] as $key => $from)
                <li class="dropdown-item option @if($key === $this->$fromFieldName) selected @endif">
                    <label>
                        {{ $from }}
                        <input wire:click="setRangeFilter('{{ $filter['slug'] }}', '{{ $key }}', 'from')"
                               class="form-hide" type="radio" name="price1"
                               @if($key === $this->$fromFieldName) checked @endif>
                    </label>
                </li>
            @endforeach
        </ul>
    </div>
</div>
<div class="label">До</div>
<div class="dropdown dropdown-select">
    @php
        $toFieldName = $filter['slug'] . 'To';
        $toCurrent = $filter['values']['to'][$this->$toFieldName ?: array_key_first($filter['values']['to'])];
    @endphp
    <span class="dropdown-toggle form-control">{{ $toCurrent }}</span>
    <div class="dropdown-menu">
        <ul>
            @foreach($filter['values']['to'] as $key => $to)
                <li class="dropdown-item option
                    @if($key === $this->$toFieldName) selected @endif">
                    <label>
                        {{ $to }}
                        <input wire:click="setRangeFilter('{{ $filter['slug'] }}', '{{ $key }}', 'to')"
                                class="form-hide" type="radio" name="price2"
                               @if($key === $this->$toFieldName) checked @endif>
                    </label>
                </li>
            @endforeach
        </ul>
    </div>
</div>
<hr class="hr">