<div class="card">
    <div class="bg">
        <div class="container">

            @include('partials.full_card.gallery')

            <div class="card-title">
                <h1 class="main-title">{{ $car->titleWithYear }}</h1>
                <h2 class="sub-title">{{ $car->sub_title }}</h2>
            </div>
            <div class="card-btn">
                <div>
                    <div class="price">$23 500</div>
                    <p>Под заказ</p>
                </div>
                <a href="#" class="btn">Заказать</a>
            </div>
            <div class="card-btn">
                <div>
                    <p>Кредит (Условия)</p>
                    <div class="price-credit">926$ / мес</div>
                </div>
                <a href="#" class="btn btn-blue">В кредит</a>
            </div>
            <div class="card-options">
                <div class="item">
                    <div class="title">Состояние</div>
                    <div class="form-check">
                        <label>
                            <input class="form-radio" type="radio" name="status" checked>
                            Новая
                        </label>
                    </div>
                    <div class="form-check">
                        <label>
                            <input class="form-radio" type="radio" name="status">
                            С пробегом
                        </label>
                    </div>
                </div>
                <div class="item">
                    <div class="title">Комплектация</div>
                    <div class="tab-content">
                        <div id="equipments_1" class="tab-pane active">
                            <div class="ul">
                                <label class="li">
                                    <input type="radio" name="battery" checked>
                                    <svg width="32" height="25"><use xlink:href="{{ asset('img/icons/sprite.svg#battery') }}"></use></svg>
                                    <span>93 kWh</span>
                                </label>
                                <label class="li">
                                    <input type="radio" name="battery">
                                    <svg width="32" height="25"><use xlink:href="{{ asset('img/icons/sprite.svg#battery') }}"></use></svg>
                                    <span>144 kWh</span>
                                </label>
                            </div>
                        </div>
                        <div id="equipments_2" class="tab-pane">
                            <div class="ul">
                                <label class="li">
                                    <input type="radio" name="battery2" checked>
                                    <svg width="32" height="25"><use xlink:href="{{ asset('img/icons/sprite.svg#battery') }}"></use></svg>
                                    <span>100 kWh</span>
                                </label>
                            </div>
                        </div>
                        <div id="equipments_3" class="tab-pane">
                            <div class="ul">
                                <label class="li">
                                    <input type="radio" name="battery3" checked>
                                    <svg width="32" height="25"><use xlink:href="{{ asset('img/icons/sprite.svg#battery') }}"></use></svg>
                                    <span>50 kWh</span>
                                </label>
                                <label class="li">
                                    <input type="radio" name="battery3">
                                    <svg width="32" height="25"><use xlink:href="{{ asset('img/icons/sprite.svg#battery') }}"></use></svg>
                                    <span>100 kWh</span>
                                </label>
                                <label class="li">
                                    <input type="radio" name="battery3">
                                    <svg width="32" height="25"><use xlink:href="{{ asset('img/icons/sprite.svg#battery') }}"></use></svg>
                                    <span>114 kWh</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="nav-tabs">
                        <label data-toggle="tab" data-target="#equipments_1">
                            <input type="radio" name="engine" checked>
                            <span>Smart Edition</span>
                        </label>
                        <label data-toggle="tab" data-target="#equipments_2">
                            <input type="radio" name="engine">
                            <span>Plus 80D Ultimate</span>
                        </label>
                        <label data-toggle="tab" data-target="#equipments_3">
                            <input type="radio" name="engine">
                            <span>Plus 80D Max</span>
                        </label>
                    </div>
                </div>
                <div class="item">
                    <div class="title">Цвет</div>
                    <div class="colors">
                        <label>
                            <input class="form-radio" type="radio" name="colors">
                            <span style="background:#2D9CDB"></span>
                        </label>
                        <label>
                            <input class="form-radio" type="radio" name="colors">
                            <span style="background:#BDBDBD"></span>
                        </label>
                        <label>
                            <input class="form-radio" type="radio" name="colors">
                            <span style="background:#FBFBFB; border-color: #4F4F4F;"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="card-features">
                <div class="main-title">Характеристики энергоэффективности:</div>
                <ul>
                    <li>Батарея на 144 кВт-год / 1008 км (NEDC)</li>
                    <li>Розгін до 100 км / год за 3,9 секунд</li>
                    <li>Потужність 360 kW / 489 к.с.</li>
                    <li>Крутний момент 700 Нм</li>
                </ul>
            </div>
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
