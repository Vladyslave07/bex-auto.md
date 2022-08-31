@if (count($filter['values']) > 0)
    <strong class="title">{{ $filter['name'] }}</strong>
    <div class="table">
        @foreach($filter['values'] as $key => $value)
            {{--                selected--}}
            <div class="form-check">
                <label>
                    {{ $value['value'] }}
                    <input class="form-checkbox"
                           wire:click="setFilter('{{ $filter['slug'] }}', '{{ $key }}', 'true')"
                           type="checkbox">
                </label>
            </div>
        @endforeach
    </div>
@endif