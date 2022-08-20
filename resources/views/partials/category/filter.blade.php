<aside class="filter-side">
    <form action="#">
        @foreach($filters as $filter)

            @include('filters.' . $filter['type'], compact('filter'))

        @endforeach

        <hr class="hr">

        <strong class="title">Ціна в дол.</strong>
        <div class="label">Від</div>
        <div class="dropdown dropdown-select">
            <span class="dropdown-toggle form-control">$ 5000</span>
            <div class="dropdown-menu">
                <ul>
                    <li class="dropdown-item option selected">
                        <label>
                            $ 5000
                            <input class="form-hide" type="radio" name="price1" checked>
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            $ 15 000
                            <input class="form-hide" type="radio" name="price1">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            $ 25 000
                            <input class="form-hide" type="radio" name="price1">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            $ 30 000
                            <input class="form-hide" type="radio" name="price1">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            $ 40 000
                            <input class="form-hide" type="radio" name="price1">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            $ 50 000
                            <input class="form-hide" type="radio" name="price1">
                        </label>
                    </li>
                </ul>
            </div>
        </div>
        <div class="label">До</div>
        <div class="dropdown dropdown-select">
            <span class="dropdown-toggle form-control">$ 50 000</span>
            <div class="dropdown-menu">
                <ul>
                    <li class="dropdown-item option">
                        <label>
                            $ 5000
                            <input class="form-hide" type="radio" name="price2">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            $ 15 000
                            <input class="form-hide" type="radio" name="price2">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            $ 25 000
                            <input class="form-hide" type="radio" name="price2">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            $ 30 000
                            <input class="form-hide" type="radio" name="price2">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            $ 40 000
                            <input class="form-hide" type="radio" name="price2">
                        </label>
                    </li>
                    <li class="dropdown-item option selected">
                        <label>
                            $ 50 000
                            <input class="form-hide" type="radio" name="price2" checked>
                        </label>
                    </li>
                </ul>
            </div>
        </div>

        <hr class="hr">

        <div class="dropdown dropdown-check">
            <span class="dropdown-toggle">Місто</span>
            <div class="dropdown-menu">
                <ul>
                    <li class="dropdown-item option">
                        <label>
                            Київ
                            <input class="form-checkbox" type="radio" name="city">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            Миколаїв
                            <input class="form-checkbox" type="radio" name="city">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            Одеса
                            <input class="form-checkbox" type="radio" name="city">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            Харків
                            <input class="form-checkbox" type="radio" name="city">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            Дніпро
                            <input class="form-checkbox" type="radio" name="city">
                        </label>
                    </li>
                </ul>
            </div>
        </div>
        <div class="dropdown dropdown-check">
            <span class="dropdown-toggle">Вид транспорта</span>
            <div class="dropdown-menu">
                <ul>
                    <li class="dropdown-item option">
                        <label>
                            Автомобіль
                            <input class="form-checkbox" type="radio" name="mode">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            Мотоцикл
                            <input class="form-checkbox" type="radio" name="mode">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            Електрокар
                            <input class="form-checkbox" type="radio" name="mode">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            Водяний
                            <input class="form-checkbox" type="radio" name="mode">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            Навантажувач
                            <input class="form-checkbox" type="radio" name="mode">
                        </label>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="dropdown dropdown-check">
                <span class="dropdown-toggle">Марка</span>
                <div class="dropdown-menu">
                    <ul>
                        <li class="dropdown-item option">
                            <label>
                                Acura
                                <input class="form-checkbox" type="radio" name="brand">
                            </label>
                        </li>
                        <li class="dropdown-item option">
                            <label>
                                Audi
                                <input class="form-checkbox" type="radio" name="brand">
                            </label>
                        </li>
                        <li class="dropdown-item option">
                            <label>
                                BMW
                                <input class="form-checkbox" type="radio" name="brand">
                            </label>
                        </li>
                        <li class="dropdown-item option">
                            <label>
                                Cadillac
                                <input class="form-checkbox" type="radio" name="brand">
                            </label>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="dropdown dropdown-check disabled">
                <span class="dropdown-toggle">Модель</span>
                <div class="dropdown-menu">
                    <ul>
                        <li class="dropdown-item option">
                            <label>
                                Model Y
                                <input class="form-checkbox" type="radio" name="model">
                            </label>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="dropdown dropdown-check">
            <span class="dropdown-toggle">Рік виготовлення</span>
            <div class="dropdown-menu">
                <ul>
                    <li class="dropdown-item option">
                        <label>
                            2010
                            <input class="form-checkbox" type="radio" name="year">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            2011
                            <input class="form-checkbox" type="radio" name="year">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            2012
                            <input class="form-checkbox" type="radio" name="year">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            2013
                            <input class="form-checkbox" type="radio" name="year">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            2014
                            <input class="form-checkbox" type="radio" name="year">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            2015
                            <input class="form-checkbox" type="radio" name="year">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            2016
                            <input class="form-checkbox" type="radio" name="year">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            2017
                            <input class="form-checkbox" type="radio" name="year">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            2018
                            <input class="form-checkbox" type="radio" name="year">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            2019
                            <input class="form-checkbox" type="radio" name="year">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            2020
                            <input class="form-checkbox" type="radio" name="year">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            2021
                            <input class="form-checkbox" type="radio" name="year">
                        </label>
                    </li>
                </ul>
            </div>
        </div>

        <hr class="hr">

        <strong class="title">Пальне</strong>
        <div class="tab-links">
            <label>
                Бензин
                <input class="form-checkbox" type="checkbox" onchange="this.parentElement.classList.toggle('active');">
            </label>
            <label>
                Газ
                <input class="form-checkbox" type="checkbox" onchange="this.parentElement.classList.toggle('active');">
            </label>
            <label>
                Електро
                <input class="form-checkbox" type="checkbox" onchange="this.parentElement.classList.toggle('active');">
            </label>
            <label>
                Гібрид
                <input class="form-checkbox" type="checkbox" onchange="this.parentElement.classList.toggle('active');">
            </label>
            <label>
                Дизель
                <input class="form-checkbox" type="checkbox" onchange="this.parentElement.classList.toggle('active');">
            </label>
        </div>

        <strong class="title">Коробка</strong>
        <div class="table">
            <div class="form-check">
                <label>
                    Автомат
                    <input class="form-checkbox" type="checkbox">
                </label>
            </div>
            <div class="form-check">
                <label>
                    Ручна
                    <input class="form-checkbox" type="checkbox">
                </label>
            </div>
        </div>

        <div class="dropdown dropdown-check">
            <span class="dropdown-toggle">Тип кузова</span>
            <div class="dropdown-menu">
                <ul>
                    <li class="dropdown-item option">
                        <label>
                            Седан
                            <input class="form-checkbox" type="radio" name="city">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            Позашляховик
                            <input class="form-checkbox" type="radio" name="city">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            Кабріолет
                            <input class="form-checkbox" type="radio" name="city">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            Пікап
                            <input class="form-checkbox" type="radio" name="city">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            Купе
                            <input class="form-checkbox" type="radio" name="city">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            Мінівен
                            <input class="form-checkbox" type="radio" name="city">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            Електромобіль
                            <input class="form-checkbox" type="radio" name="city">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            Фургон
                            <input class="form-checkbox" type="radio" name="city">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            Універсал
                            <input class="form-checkbox" type="radio" name="city">
                        </label>
                    </li>
                </ul>
            </div>
        </div>

        <strong class="title">Пробіг, км</strong>
        <div class="label">Від</div>
        <div class="dropdown dropdown-select">
            <span class="dropdown-toggle form-control">0 км</span>
            <div class="dropdown-menu">
                <ul>
                    <li class="dropdown-item option selected">
                        <label>
                            0 км
                            <input class="form-hide" type="radio" name="race1" checked>
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            15 000 км
                            <input class="form-hide" type="radio" name="race1">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            25 000 км
                            <input class="form-hide" type="radio" name="race1">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            30 000 км
                            <input class="form-hide" type="radio" name="race1">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            40 000 км
                            <input class="form-hide" type="radio" name="race1">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            50 000 км
                            <input class="form-hide" type="radio" name="race1">
                        </label>
                    </li>
                </ul>
            </div>
        </div>
        <div class="label">До</div>
        <div class="dropdown dropdown-select">
            <span class="dropdown-toggle form-control">50 000 км</span>
            <div class="dropdown-menu">
                <ul>
                    <li class="dropdown-item option">
                        <label>
                            0 км
                            <input class="form-hide" type="radio" name="race2">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            15 000 км
                            <input class="form-hide" type="radio" name="race2">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            25 000 км
                            <input class="form-hide" type="radio" name="race2">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            30 000 км
                            <input class="form-hide" type="radio" name="race2">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            40 000 км
                            <input class="form-hide" type="radio" name="race2">
                        </label>
                    </li>
                    <li class="dropdown-item option selected">
                        <label>
                            50 000 км
                            <input class="form-hide" type="radio" name="race2" checked>
                        </label>
                    </li>
                </ul>
            </div>
        </div>

        <strong class="title">Об`єм двигуна, л</strong>
        <div class="label">Від</div>
        <div class="dropdown dropdown-select">
            <span class="dropdown-toggle form-control">1.0 л</span>
            <div class="dropdown-menu">
                <ul>
                    <li class="dropdown-item option selected">
                        <label>
                            1.0 л
                            <input class="form-hide" type="radio" name="volume1" checked>
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            2.0 л
                            <input class="form-hide" type="radio" name="volume1">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            3.0 л
                            <input class="form-hide" type="radio" name="volume1">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            4.0 л
                            <input class="form-hide" type="radio" name="volume1">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            5.0 л
                            <input class="form-hide" type="radio" name="volume1">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            6.0 л
                            <input class="form-hide" type="radio" name="volume1">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            7.0 л
                            <input class="form-hide" type="radio" name="volume1">
                        </label>
                    </li>
                </ul>
            </div>
        </div>
        <div class="label">До</div>
        <div class="dropdown dropdown-select">
            <span class="dropdown-toggle form-control">7.0 л</span>
            <div class="dropdown-menu">
                <ul>
                    <li class="dropdown-item option">
                        <label>
                            1.0 л
                            <input class="form-hide" type="radio" name="volume2">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            2.0 л
                            <input class="form-hide" type="radio" name="volume2">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            3.0 л
                            <input class="form-hide" type="radio" name="volume2">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            4.0 л
                            <input class="form-hide" type="radio" name="volume2">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            5.0 л
                            <input class="form-hide" type="radio" name="volume2">
                        </label>
                    </li>
                    <li class="dropdown-item option">
                        <label>
                            6.0 л
                            <input class="form-hide" type="radio" name="volume2">
                        </label>
                    </li>
                    <li class="dropdown-item option selected">
                        <label>
                            7.0 л
                            <input class="form-hide" type="radio" name="volume2" checked>
                        </label>
                    </li>
                </ul>
            </div>
        </div>

        <button class="btn" type="submit">Пошук</button>
        <a href="catalog" class="clear-filter">Зкинути усі фільтри</a>
    </form>
</aside>