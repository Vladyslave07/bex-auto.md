<div class="card">
    <div class="inner">
        <div class="bg">
            <div class="container">
                <div class="card-title">
                    <h1 class="main-title">{{ $car->titleWithYear }}</h1>
                    <div class="price">
                        @if($car->show_price_from)
                            <span>{{ $car->price_from_text }}</span>
                        @endif
                            {{ $car->price_format }}
                        @if($car->price_for_current_country)
                            <small>{{ $car->price_for_current_country }}</small>
                        @endif
                    </div>
                    @if(app('domain')->getDomain()->slug == \App\Models\Domain::KAZACHSTAN_SLUG_DOMAIN)
                        <div class="card-btn">
                            <button onclick="openModal('#applicationForCar')" class="btn">
                                {{ $car->btn_text }}
                            </button>
                        </div>
                    @endif
                </div>
                <div class="card-nav">
                    <span class="item active" data-target="Tab_1">{{ Lang::get('car.detail.characteristic')}}</span>
                    <span class="item" data-target="Tab_2">{{ Lang::get('car.detail.description') }}</span>
                </div>

                @include('partials.card.gallery')

                @if(app('domain')->getDomain()->slug !== \App\Models\Domain::KAZACHSTAN_SLUG_DOMAIN)
                     @include('partials.card.card-btn')
                @endif

                <div class="card-features">
                    <h2 class="title">{{ Lang::get('car.detail.characteristic')}}:</h2>
                    <ul class="list">
                        @foreach($car->properties as $property)
                            @if($value = $property->getValue())
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
                            <li>
                                <div class="dt">
                                    ID:
                                </div>
                                <div class="dd">{{ $car->id }}</div>
                            </li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Links --}}
        @include('partials.card.links')

        @if ($car->description)
            <div class="card-description container">
                <h2 class="main-title text-center hidden-sm">{{ Lang::get('car.detail.description') }}</h2>
                {!! $car->description !!}
            </div>
        @endif

        @if(app('domain')->getDomain()->slug == \App\Models\Domain::KAZACHSTAN_SLUG_DOMAIN)
            {{-- Call back form --}}
            @livewire('forms.call-back', ['btnText' => Setting::get('call_back_btn_form'), 'title' => Setting::get('call_back_form_title_2')])
        @endif

    </div>
    <div class="card-btn_mob">
        @include('partials.card.card-btn')
    </div>
</div>
