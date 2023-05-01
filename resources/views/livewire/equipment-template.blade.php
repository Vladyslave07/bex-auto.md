<div>
    <div class="card">
        <div class="bg">
            <div class="container">

                @include('partials.full_card.gallery')

                <div class="card-title">
                    <h1 class="main-title">{{ $car->titleWithYear }}</h1>
                    @if ($this->equipment)
                        <h2 class="sub-title">{{ $this->equipment->title }}</h2>
                    @endif
                </div>
                <div class="card-btn">
                    <div>
                        <div class="price">{{ $this->equipment ? $this->equipment->price_format : $car->price_format }}</div>
                        <p>@lang('car.' . $car->status)</p>
                    </div>
                    <a href="#" class="btn">{{ __('car.btn.' . $car->status) }}</a>
                </div>
                {{--            <div class="card-btn">--}}
                {{--                <div>--}}
                {{--                    <p>Кредит (Условия)</p>--}}
                {{--                    <div class="price-credit">926$ / мес</div>--}}
                {{--                </div>--}}
                {{--                <a href="#" class="btn btn-blue">В кредит</a>--}}
                {{--            </div>--}}
                @if ($car->equipments)
                    <div class="card-options">
                        <div class="item">
                            <div class="title">Комплектация</div>
                            <div class="tab-content">
                                @foreach($car->equipments as $key => $equipment)
                                    @if ($equipment->volumes)
                                        <div id="equipments_{{ $key }}"
                                             class="tab-pane @if($this->equipment->id == $equipment->id) active @endif">
                                            <div class="ul">
                                                @foreach($equipment->volumes as $volume)
                                                    <label class="li">
                                                        <input wire:click.prevent="setPrice('{{$volume['price']}}', '{{$volume['value']}}')"
                                                               type="radio" name="battery"
                                                               @if($this->volume == $volume['value']) checked @endif>
                                                        <svg width="32" height="25">
                                                            <use
                                                                xlink:href="{{ asset('img/icons/sprite.svg#battery') }}"></use>
                                                        </svg>
                                                        <span>{{ sprintf('%s %s', $volume['value'], $volume['unit']) }} </span>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                <div id="equipments_2" class="tab-pane">
                                    <div class="ul">
                                        <label class="li">
                                            <input type="radio" name="battery2" checked>
                                            <svg width="32" height="25">
                                                <use xlink:href="{{ asset('img/icons/sprite.svg#battery') }}"></use>
                                            </svg>
                                            <span>100 kWh</span>
                                        </label>
                                    </div>
                                </div>
                                <div id="equipments_3" class="tab-pane">
                                    <div class="ul">
                                        <label class="li">
                                            <input type="radio" name="battery3" checked>
                                            <svg width="32" height="25">
                                                <use xlink:href="{{ asset('img/icons/sprite.svg#battery') }}"></use>
                                            </svg>
                                            <span>50 kWh</span>
                                        </label>
                                        <label class="li">
                                            <input type="radio" name="battery3">
                                            <svg width="32" height="25">
                                                <use xlink:href="{{ asset('img/icons/sprite.svg#battery') }}"></use>
                                            </svg>
                                            <span>100 kWh</span>
                                        </label>
                                        <label class="li">
                                            <input type="radio" name="battery3">
                                            <svg width="32" height="25">
                                                <use xlink:href="{{ asset('img/icons/sprite.svg#battery') }}"></use>
                                            </svg>
                                            <span>114 kWh</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="nav-tabs">
                                @foreach($car->equipments as $key => $equipment)
                                    <label data-toggle="tab" data-target="#equipments_{{ $key }}"
                                           class="@if($this->equipment->id == $equipment->id) active @endif">
                                        <input wire:click.prevent="setEquipment('{{ $equipment->id }}')" type="radio"
                                               name="engine" @if($this->equipment->id == $equipment->id) checked @endif>
                                        <span>{{ $equipment->title }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        {{-- Colors --}}
                        @include('partials.full_card.colors')

                    </div>
                @endif
                @if ($this->equipment && ($characteristic = $this->equipment->prepared_characteristic))
                    <div class="card-features">
                        <div class="main-title">{{ $characteristic->title }}</div>
                        {!! $characteristic->text !!}
                    </div>
                @endif
            </div>
        </div>
        <div class="container">
            {{-- Benefits --}}
            @include('partials.full_card.benefits')

            <div class="card-equipments">
                {!! $car->equipment !!}
            </div>
        </div>
    </div>
</div>
