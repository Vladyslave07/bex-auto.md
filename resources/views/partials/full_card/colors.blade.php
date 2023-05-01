@if($car->color)
    <div class="item">
        <div class="title">Цвет</div>
        <div class="colors">
            @foreach($car->color as $color)
                <label>
                    <input class="form-radio" type="radio" name="colors" @if($loop->first) checked @endif>
                    <span style="background:{{ $color }}"></span>
                </label>
            @endforeach
        </div>
    </div>
@endif
