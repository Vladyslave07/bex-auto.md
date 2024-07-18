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
                        <div class="price">
                            {{ $this->equipment ? $this->equipment->price_format : $car->price_format }}
                            @if($car->price_for_current_country)
                                <small>{{ $car->price_for_current_country }}</small>
                            @endif
                        </div>
                        <p>@lang('car.' . $car->status)</p>
                    </div>
                    <button onclick="openModal('#applicationForCar')" class="btn">{{ __('car.btn.' . $car->status) }}</button>
                </div>
                @if (count($car->equipments) > 0)
                    <div class="card-options">
                        <div class="item">
                            <div class="title">{{ __('car.equipment') }}</div>
                            <div class="tab-content">
                                @foreach($car->equipments as $key => $equipment)
                                    @if ($equipment->volumes)
                                        <div id="equipments_{{ $key }}"
                                             class="tab-pane @if($this->equipment->id == $equipment->id) active @endif">
                                            <div class="ul">
                                                @foreach($equipment->volumes as $volume)
                                                    <label class="li">
                                                        <input wire:click.prevent="setPrice('{{ $volume['price'] }}', '{{ $volume['value'] }}')"
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
                @else
                    <div class="card-features-car">
                        <h2 class="title">{{ Lang::get('car.detail.characteristic')}}:</h2>
                        <ul class="list">
                            @foreach($car->properties as $property)
                                @if(($value = $property->getValue()) && $property->slug !== \App\Models\Property::PROPERTY_TYPE_SLUG)
                                    <li>
                                        <div class="dt">
                                            @if ($image = $property->image)
                                                <div class="icon">
                                                    <img src="{{ Storage::disk('public')->url($image) }}">
                                                </div>
                                            @endif
                                            {{ $property->title }}:
                                        </div>
                                        <div class="dd">{{ Str::ucfirst($value) }} {{ $property->prefix }}</div>
                                    </li>
                                @endif
                            @endforeach
                            @if($car->vin)
                                <li>
                                    <div class="dt">
                                        Vin code:
                                    </div>
                                    <div class="dd">{{ $car->vin }}</div>
                                </li>
                            @endif
                        </ul>
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
        @if (!$this->equipment)
            {{-- Links --}}
            @include('partials.card.links')
        @endif
        @if (!$this->equipment && $car->description)
            <div class="card-description container">
                <h2 class="main-title text-center hidden-sm">{{ Lang::get('car.detail.description') }}</h2>
                {!! $car->description !!}
            </div>
        @endif
<div class="container">
   {{-- Benefits --}}
   @include('partials.full_card.benefits')

   <div class="card-equipments">
       {!! $car->equipment !!}
   </div>
</div>
</div>
</div>
