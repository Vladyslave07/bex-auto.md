@if(count($filter['values']) > 0)
    @foreach($filter['values'] as $value)
        <div class="form-check">
            <label>
                <input class="form-radio" wire:click="setFilter('{{ $filter['slug'] }}', '{{ $value['value'] }}')" type="radio" name="status" >
                {{ \Illuminate\Support\Facades\Lang::get('car.' . $value['value']) }}
            </label>
        </div>
    @endforeach
@endif
<hr class="hr">