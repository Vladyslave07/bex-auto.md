@if($car->colors)
    <div class="item">
        <div class="title">Цвет</div>
        <div class="colors">
            @foreach($car->colors as $key => $color)
                <label>
                    <input
                        wire:click.prevent="setColor('{{ $key }}')"
                        class="form-radio"
                        type="radio"
                        name="colors"
                        @if($this->colorId == $key) checked @endif>
                    <span style="background:{{ $color }}"></span>
                </label>
            @endforeach
        </div>
    </div>
@endif
