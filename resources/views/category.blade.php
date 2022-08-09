@extends('layouts.app')

@section('title', 'Каталог')

@push('styles')
    <link rel="stylesheet" href="{{ mix('css/catalog.css') }}">
@endpush

@push('scripts')
    <script src="{{ mix('js/catalog.js') }}" defer></script>
@endpush

@section('content')
    <!-- ///ХЛЕБНЫЕ КРОШКИ/// -->
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Bexhill Trading Auto</a></li>
                <li class="breadcrumb-item" aria-current="page">Каталог</li>
            </ol>
        </nav>
    </div>
    <!-- ///:end/// -->

    <!-- ///НАЗВАНИЕ РАЗДЕЛА/// -->
    <div class="container">
        <h1 class="main-title text-center line-left h1">Авто з США, Кореї та Канади</h1>
    </div>
    <!-- ///:end/// -->

    <!-- ///КАТАЛОГ/// -->
    <div class="section-catalog container">
        <div class="tab-links row">
            <a href="#" onclick="this.classList.toggle('active'); return false">Авто з США</a>
            <a href="#" onclick="this.classList.toggle('active'); return false">Авто з Кореї</a>
            <a href="#" onclick="this.classList.toggle('active'); return false">Електрокари з США</a>
            <a href="new-elektromobili">Нові електрокари</a>
            <a href="#" onclick="this.classList.toggle('active'); return false">Мотоцикли з США</a>
            <a href="#" onclick="this.classList.toggle('active'); return false">Навантажувачі</a>
        </div>
        <div class="catalog-wrap">
            <div class="catalog-settings">
                <svg class="btn-filter visible-sm toggle-btn" width="22" height="25" viewBox="0 0 22 25" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.0606 24.7446H7.875V12.2603L0 1.95008V0H21.375V1.93895L13.875 12.2492V20.5497L10.0606 24.7446ZM9.375 23.095H9.43936L12.375 19.8665V11.6706L19.6645 1.64964H1.72969L9.375 11.6595V23.095Z" fill="#2A3D68" stroke="none"/></svg>
                <div class="dropdown">
                    <span class="dropdown-toggle">Відсортувати за ціною</span>
                    <div class="dropdown-menu">
                        <ul>
                            <li class="dropdown-item option selected">Відсортувати за ціною</li>
                            <li class="dropdown-item option">Від дешевих до дорогих</li>
                            <li class="dropdown-item option">Від дорогих до дешевих</li>
                        </ul>
                    </div>
                </div>
            </div>

            <aside class="filter-side">
                <form action="#">
                    <div class="form-check">
                        <label>
                            <input class="form-radio" type="radio" name="status" checked>
                            В наявності
                        </label>
                    </div>
                    <div class="form-check">
                        <label>
                            <input class="form-radio" type="radio" name="status">
                            Очікуємо
                        </label>
                    </div>
                    <div class="form-check">
                        <label>
                            <input class="form-radio" type="radio" name="status">
                            Під замовлення
                        </label>
                    </div>

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
            <div class="catalog-grid">
                <div class="product-preview">
                    <div class="img">
                        <div class="icons">
                            <svg width="33" height="17"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#electric"></use></svg>
                        </div>
                        <div class="stickers">
                            <span>В наяності</span>
                        </div>
                        <a href="#" aria-label="img product">
                            <picture>
                                <source type="image/webp" srcset="{{ asset('img/example/img_4.webp') }}">
                                <img width="289" height="218" src="{{ asset('img/example/img_4.png') }}" loading="lazy" alt="">
                            </picture>
                        </a>
                    </div>
                    <div class="body">
                        <a href="#" class="title">Nissan</a>
                        <div class="year">2017</div>
                        <div class="features">
                            <div class="tr">
                                <div class="item">
                                    <svg width="20" height="18"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#fuel"></use></svg>
                                    Електрика
                                </div>
                            </div>
                            <div class="tr">
                                <div class="item">
                                    <svg width="21" height="21"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#drive"></use></svg>
                                    Передній
                                </div>
                                <div class="item">
                                    <svg width="20" height="20"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#state"></use></svg>
                                    Новий
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="price">
                            <span class="price-new">$25 200</span>
                            <div class="tooltip">
                                <svg width="14" height="19"><use xlink:href="#tooltip-icon"></use></svg>
                                <div>БВ ціла - це вживане авто без слідів ушкодження.</div>
                            </div>
                        </div>
                        <a href="#" class="btn">Детальніше</a>
                    </div>
                </div>
                <div class="product-preview">
                    <div class="img">
                        <div class="stickers">
                            <span>В наяності</span>
                        </div>
                        <a href="#" aria-label="img product">
                            <picture>
                                <source type="image/webp" srcset="{{ asset('img/example/img_5.webp') }}">
                                <img width="289" height="218" src="{{ asset('img/example/img_5.png') }}" loading="lazy" alt="">
                            </picture>
                        </a>
                    </div>
                    <div class="body">
                        <a href="#" class="title">JEEP</a>
                        <div class="year">2018</div>
                        <div class="features">
                            <div class="tr">
                                <div class="item">
                                    <svg width="20" height="18"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#fuel"></use></svg>
                                    Бензин
                                </div>
                            </div>
                            <div class="tr">
                                <div class="item">
                                    <svg width="21" height="21"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#drive"></use></svg>
                                    Передній
                                </div>
                                <div class="item">
                                    <svg width="20" height="20"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#state"></use></svg>
                                    80 200 км
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="price">
                            <span class="price-new">$12 400</span>
                            <div class="tooltip">
                                <svg width="14" height="19"><use xlink:href="#tooltip-icon"></use></svg>
                                <div>БВ ціла - це вживане авто без слідів ушкодження.</div>
                            </div>
                        </div>
                        <a href="#" class="btn">Детальніше</a>
                    </div>
                </div>
                <div class="product-preview">
                    <div class="img">
                        <div class="icons">
                            <svg width="33" height="17"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#electric"></use></svg>
                        </div>
                        <div class="stickers">
                            <span>В наяності</span>
                        </div>
                        <a href="#" aria-label="img product">
                            <picture>
                                <source type="image/webp" srcset="{{ asset('img/example/img_12.webp') }}">
                                <img width="289" height="218" src="{{ asset('img/example/img_12.png') }}" loading="lazy" alt="">
                            </picture>
                        </a>
                    </div>
                    <div class="body">
                        <a href="#" class="title">Hyundai</a>
                        <div class="year">2013</div>
                        <div class="features">
                            <div class="tr">
                                <div class="item">
                                    <svg width="20" height="18"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#fuel"></use></svg>
                                    Електрика
                                </div>
                            </div>
                            <div class="tr">
                                <div class="item">
                                    <svg width="21" height="21"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#drive"></use></svg>
                                    Передній
                                </div>
                                <div class="item">
                                    <svg width="20" height="20"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#state"></use></svg>
                                    Б/В
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="price">
                            <span class="price-new">$9 200</span>
                            <div class="tooltip">
                                <svg width="14" height="19"><use xlink:href="#tooltip-icon"></use></svg>
                                <div>БВ ціла - це вживане авто без слідів ушкодження.</div>
                            </div>
                        </div>
                        <a href="#" class="btn">Детальніше</a>
                    </div>
                </div>
                <div class="product-preview">
                    <div class="img">
                        <div class="icons">
                            <svg width="33" height="17"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#electric"></use></svg>
                        </div>
                        <div class="stickers">
                            <span>В наяності</span>
                        </div>
                        <a href="#" aria-label="img product">
                            <picture>
                                <source type="image/webp" srcset="{{ asset('img/example/img_7.webp') }}">
                                <img width="289" height="218" src="{{ asset('img/example/img_7.png') }}" loading="lazy" alt="">
                            </picture>
                        </a>
                    </div>
                    <div class="body">
                        <a href="#" class="title">Geely</a>
                        <div class="year">2017</div>
                        <div class="features">
                            <div class="tr">
                                <div class="item">
                                    <svg width="20" height="18"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#fuel"></use></svg>
                                    Електрика
                                </div>
                            </div>
                            <div class="tr">
                                <div class="item">
                                    <svg width="21" height="21"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#drive"></use></svg>
                                    Передній
                                </div>
                                <div class="item">
                                    <svg width="20" height="20"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#state"></use></svg>
                                    Новий
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="price">
                            <span class="price-new">$25 200</span>
                            <div class="tooltip">
                                <svg width="14" height="19"><use xlink:href="#tooltip-icon"></use></svg>
                                <div>БВ ціла - це вживане авто без слідів ушкодження.</div>
                            </div>
                        </div>
                        <a href="#" class="btn">Детальніше</a>
                    </div>
                </div>
                <div class="product-preview">
                    <div class="img">
                        <div class="icons">
                            <svg width="33" height="17"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#electric"></use></svg>
                        </div>
                        <div class="stickers">
                            <span>В наяності</span>
                        </div>
                        <a href="#" aria-label="img product">
                            <picture>
                                <source type="image/webp" srcset="{{ asset('img/example/img_4.webp') }}">
                                <img width="289" height="218" src="{{ asset('img/example/img_4.png') }}" loading="lazy" alt="">
                            </picture>
                        </a>
                    </div>
                    <div class="body">
                        <a href="#" class="title">Nissan</a>
                        <div class="year">2017</div>
                        <div class="features">
                            <div class="tr">
                                <div class="item">
                                    <svg width="20" height="18"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#fuel"></use></svg>
                                    Електрика
                                </div>
                            </div>
                            <div class="tr">
                                <div class="item">
                                    <svg width="21" height="21"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#drive"></use></svg>
                                    Передній
                                </div>
                                <div class="item">
                                    <svg width="20" height="20"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#state"></use></svg>
                                    Новий
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="price">
                            <span class="price-new">$25 200</span>
                            <div class="tooltip">
                                <svg width="14" height="19"><use xlink:href="#tooltip-icon"></use></svg>
                                <div>БВ ціла - це вживане авто без слідів ушкодження.</div>
                            </div>
                        </div>
                        <a href="#" class="btn">Детальніше</a>
                    </div>
                </div>
                <div class="product-preview">
                    <div class="img">
                        <div class="stickers">
                            <span>В наяності</span>
                        </div>
                        <a href="#" aria-label="img product">
                            <picture>
                                <source type="image/webp" srcset="{{ asset('img/example/img_5.webp') }}">
                                <img width="289" height="218" src="{{ asset('img/example/img_5.png') }}" loading="lazy" alt="">
                            </picture>
                        </a>
                    </div>
                    <div class="body">
                        <a href="#" class="title">JEEP</a>
                        <div class="year">2018</div>
                        <div class="features">
                            <div class="tr">
                                <div class="item">
                                    <svg width="20" height="18"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#fuel"></use></svg>
                                    Бензин
                                </div>
                            </div>
                            <div class="tr">
                                <div class="item">
                                    <svg width="21" height="21"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#drive"></use></svg>
                                    Передній
                                </div>
                                <div class="item">
                                    <svg width="20" height="20"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#state"></use></svg>
                                    80 200 км
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="price">
                            <span class="price-new">$12 400</span>
                            <div class="tooltip">
                                <svg width="14" height="19"><use xlink:href="#tooltip-icon"></use></svg>
                                <div>БВ ціла - це вживане авто без слідів ушкодження.</div>
                            </div>
                        </div>
                        <a href="#" class="btn">Детальніше</a>
                    </div>
                </div>
                <div class="product-preview">
                    <div class="img">
                        <div class="icons">
                            <svg width="33" height="17"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#electric"></use></svg>
                        </div>
                        <div class="stickers">
                            <span>В наяності</span>
                        </div>
                        <a href="#" aria-label="img product">
                            <picture>
                                <source type="image/webp" srcset="{{ asset('img/example/img_6.webp') }}">
                                <img width="289" height="218" src="{{ asset('img/example/img_6.png') }}" loading="lazy" alt="">
                            </picture>
                        </a>
                    </div>
                    <div class="body">
                        <a href="#" class="title">Hyundai</a>
                        <div class="year">2013</div>
                        <div class="features">
                            <div class="tr">
                                <div class="item">
                                    <svg width="20" height="18"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#fuel"></use></svg>
                                    Електрика
                                </div>
                            </div>
                            <div class="tr">
                                <div class="item">
                                    <svg width="21" height="21"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#drive"></use></svg>
                                    Передній
                                </div>
                                <div class="item">
                                    <svg width="20" height="20"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#state"></use></svg>
                                    Б/В
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="price">
                            <span class="price-new">$9 200</span>
                            <div class="tooltip">
                                <svg width="14" height="19"><use xlink:href="#tooltip-icon"></use></svg>
                                <div>БВ ціла - це вживане авто без слідів ушкодження.</div>
                            </div>
                        </div>
                        <a href="#" class="btn">Детальніше</a>
                    </div>
                </div>
                <div class="product-preview">
                    <div class="img">
                        <div class="icons">
                            <svg width="33" height="17"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#electric"></use></svg>
                        </div>
                        <div class="stickers">
                            <span>В наяності</span>
                        </div>
                        <a href="#" aria-label="img product">
                            <picture>
                                <source type="image/webp" srcset="{{ asset('img/example/img_7.webp') }}">
                                <img width="289" height="218" src="{{ asset('img/example/img_7.png') }}" loading="lazy" alt="">
                            </picture>
                        </a>
                    </div>
                    <div class="body">
                        <a href="#" class="title">Geely</a>
                        <div class="year">2017</div>
                        <div class="features">
                            <div class="tr">
                                <div class="item">
                                    <svg width="20" height="18"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#fuel"></use></svg>
                                    Електрика
                                </div>
                            </div>
                            <div class="tr">
                                <div class="item">
                                    <svg width="21" height="21"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#drive"></use></svg>
                                    Передній
                                </div>
                                <div class="item">
                                    <svg width="20" height="20"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#state"></use></svg>
                                    Новий
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="price">
                            <span class="price-new">$25 200</span>
                            <div class="tooltip">
                                <svg width="14" height="19"><use xlink:href="#tooltip-icon"></use></svg>
                                <div>БВ ціла - це вживане авто без слідів ушкодження.</div>
                            </div>
                        </div>
                        <a href="#" class="btn">Детальніше</a>
                    </div>
                </div>
                <div class="product-preview">
                    <div class="img">
                        <div class="icons">
                            <svg width="33" height="17"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#electric"></use></svg>
                        </div>
                        <div class="stickers">
                            <span>В наяності</span>
                        </div>
                        <a href="#" aria-label="img product">
                            <picture>
                                <source type="image/webp" srcset="{{ asset('img/example/img_12.webp') }}">
                                <img width="289" height="218" src="{{ asset('img/example/img_12.png') }}" loading="lazy" alt="">
                            </picture>
                        </a>
                    </div>
                    <div class="body">
                        <a href="#" class="title">Nissan</a>
                        <div class="year">2017</div>
                        <div class="features">
                            <div class="tr">
                                <div class="item">
                                    <svg width="20" height="18"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#fuel"></use></svg>
                                    Електрика
                                </div>
                            </div>
                            <div class="tr">
                                <div class="item">
                                    <svg width="21" height="21"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#drive"></use></svg>
                                    Передній
                                </div>
                                <div class="item">
                                    <svg width="20" height="20"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#state"></use></svg>
                                    Новий
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="price">
                            <span class="price-new">$25 200</span>
                            <div class="tooltip">
                                <svg width="14" height="19"><use xlink:href="#tooltip-icon"></use></svg>
                                <div>БВ ціла - це вживане авто без слідів ушкодження.</div>
                            </div>
                        </div>
                        <a href="#" class="btn">Детальніше</a>
                    </div>
                </div>
            </div>
            <nav class="pagination">
                <a href="#" aria-label="pagination.previous"><svg width="24" height="30"><use xlink:href="#arrow-icon"></use></svg></a>
                <a href="#" class="active">1</a>
                <a href="#">2</a>
                <a href="#">...</a>
                <a href="#">8</a>
                <a href="#" aria-label="pagination.next"><svg width="24" height="30"><use xlink:href="#arrow-icon"></use></svg></a>
            </nav>
        </div>
    </div>
    <!-- ///:end/// -->

    <!-- ///ПОПУЛЯРНI АВТО/// -->
    <div class="section-swiper container">
        <div class="main-title text-center">Популярнi авто</div>
        <div class="swiper product-swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide product-preview">
                    <div class="img">
                        <div class="icons">
                            <svg width="33" height="17"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#electric"></use></svg>
                        </div>
                        <div class="stickers">
                            <span>В наяності</span>
                        </div>
                        <a href="#" aria-label="img product">
                            <picture>
                                <source type="image/webp" srcset="{{ asset('img/example/img_4.webp') }}">
                                <img width="289" height="218" src="{{ asset('img/example/img_4.png') }}" loading="lazy" alt="">
                            </picture>
                        </a>
                    </div>
                    <div class="body">
                        <a href="#" class="title">Nissan</a>
                        <div class="year">2017</div>
                        <div class="features">
                            <div class="tr">
                                <div class="item">
                                    <svg width="20" height="18"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#fuel"></use></svg>
                                    Електрика
                                </div>
                            </div>
                            <div class="tr">
                                <div class="item">
                                    <svg width="21" height="21"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#drive"></use></svg>
                                    Передній
                                </div>
                                <div class="item">
                                    <svg width="20" height="20"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#state"></use></svg>
                                    Новий
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="price">
                            <span class="price-new">$25 200</span>
                            <div class="tooltip">
                                <svg width="14" height="19"><use xlink:href="#tooltip-icon"></use></svg>
                                <div>БВ ціла - це вживане авто без слідів ушкодження.</div>
                            </div>
                        </div>
                        <a href="#" class="btn">Детальніше</a>
                    </div>
                </div>
                <div class="swiper-slide product-preview">
                    <div class="img">
                        <div class="stickers">
                            <span>В наяності</span>
                        </div>
                        <a href="#" aria-label="img product">
                            <picture>
                                <source type="image/webp" srcset="{{ asset('img/example/img_5.webp') }}">
                                <img width="289" height="218" src="{{ asset('img/example/img_5.png') }}" loading="lazy" alt="">
                            </picture>
                        </a>
                    </div>
                    <div class="body">
                        <a href="#" class="title">JEEP</a>
                        <div class="year">2018</div>
                        <div class="features">
                            <div class="tr">
                                <div class="item">
                                    <svg width="20" height="18"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#fuel"></use></svg>
                                    Бензин
                                </div>
                            </div>
                            <div class="tr">
                                <div class="item">
                                    <svg width="21" height="21"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#drive"></use></svg>
                                    Передній
                                </div>
                                <div class="item">
                                    <svg width="20" height="20"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#state"></use></svg>
                                    80 200 км
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="price">
                            <span class="price-new">$12 400</span>
                            <div class="tooltip">
                                <svg width="14" height="19"><use xlink:href="#tooltip-icon"></use></svg>
                                <div>БВ ціла - це вживане авто без слідів ушкодження.</div>
                            </div>
                        </div>
                        <a href="#" class="btn">Детальніше</a>
                    </div>
                </div>
                <div class="swiper-slide product-preview">
                    <div class="img">
                        <div class="icons">
                            <svg width="33" height="17"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#electric"></use></svg>
                        </div>
                        <div class="stickers">
                            <span>В наяності</span>
                        </div>
                        <a href="#" aria-label="img product">
                            <picture>
                                <source type="image/webp" srcset="{{ asset('img/example/img_6.webp') }}">
                                <img width="289" height="218" src="{{ asset('img/example/img_6.png') }}" loading="lazy" alt="">
                            </picture>
                        </a>
                    </div>
                    <div class="body">
                        <a href="#" class="title">Hyundai</a>
                        <div class="year">2013</div>
                        <div class="features">
                            <div class="tr">
                                <div class="item">
                                    <svg width="20" height="18"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#fuel"></use></svg>
                                    Електрика
                                </div>
                            </div>
                            <div class="tr">
                                <div class="item">
                                    <svg width="21" height="21"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#drive"></use></svg>
                                    Передній
                                </div>
                                <div class="item">
                                    <svg width="20" height="20"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#state"></use></svg>
                                    Б/В
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="price">
                            <span class="price-new">$9 200</span>
                            <div class="tooltip">
                                <svg width="14" height="19"><use xlink:href="#tooltip-icon"></use></svg>
                                <div>БВ ціла - це вживане авто без слідів ушкодження.</div>
                            </div>
                        </div>
                        <a href="#" class="btn">Детальніше</a>
                    </div>
                </div>
                <div class="swiper-slide product-preview">
                    <div class="img">
                        <div class="icons">
                            <svg width="33" height="17"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#electric"></use></svg>
                        </div>
                        <div class="stickers">
                            <span>В наяності</span>
                        </div>
                        <a href="#" aria-label="img product">
                            <picture>
                                <source type="image/webp" srcset="{{ asset('img/example/img_7.webp') }}">
                                <img width="289" height="218" src="{{ asset('img/example/img_7.png') }}" loading="lazy" alt="">
                            </picture>
                        </a>
                    </div>
                    <div class="body">
                        <a href="#" class="title">Geely</a>
                        <div class="year">2017</div>
                        <div class="features">
                            <div class="tr">
                                <div class="item">
                                    <svg width="20" height="18"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#fuel"></use></svg>
                                    Електрика
                                </div>
                            </div>
                            <div class="tr">
                                <div class="item">
                                    <svg width="21" height="21"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#drive"></use></svg>
                                    Передній
                                </div>
                                <div class="item">
                                    <svg width="20" height="20"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#state"></use></svg>
                                    Новий
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="price">
                            <span class="price-new">$25 200</span>
                            <div class="tooltip">
                                <svg width="14" height="19"><use xlink:href="#tooltip-icon"></use></svg>
                                <div>БВ ціла - це вживане авто без слідів ушкодження.</div>
                            </div>
                        </div>
                        <a href="#" class="btn">Детальніше</a>
                    </div>
                </div>
                <div class="swiper-slide product-preview">
                    <div class="img">
                        <div class="icons">
                            <svg width="33" height="17"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#electric"></use></svg>
                        </div>
                        <div class="stickers">
                            <span>В наяності</span>
                        </div>
                        <a href="#" aria-label="img product">
                            <picture>
                                <source type="image/webp" srcset="{{ asset('img/example/img_4.webp') }}">
                                <img width="289" height="218" src="{{ asset('img/example/img_4.png') }}" loading="lazy" alt="">
                            </picture>
                        </a>
                    </div>
                    <div class="body">
                        <a href="#" class="title">Nissan</a>
                        <div class="year">2017</div>
                        <div class="features">
                            <div class="tr">
                                <div class="item">
                                    <svg width="20" height="18"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#fuel"></use></svg>
                                    Електрика
                                </div>
                            </div>
                            <div class="tr">
                                <div class="item">
                                    <svg width="21" height="21"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#drive"></use></svg>
                                    Передній
                                </div>
                                <div class="item">
                                    <svg width="20" height="20"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#state"></use></svg>
                                    Новий
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="price">
                            <span class="price-new">$25 200</span>
                            <div class="tooltip">
                                <svg width="14" height="19"><use xlink:href="#tooltip-icon"></use></svg>
                                <div>БВ ціла - це вживане авто без слідів ушкодження.</div>
                            </div>
                        </div>
                        <a href="#" class="btn">Детальніше</a>
                    </div>
                </div>
                <div class="swiper-slide product-preview">
                    <div class="img">
                        <div class="stickers">
                            <span>В наяності</span>
                        </div>
                        <a href="#" aria-label="img product">
                            <picture>
                                <source type="image/webp" srcset="{{ asset('img/example/img_5.webp') }}">
                                <img width="289" height="218" src="{{ asset('img/example/img_5.png') }}" loading="lazy" alt="">
                            </picture>
                        </a>
                    </div>
                    <div class="body">
                        <a href="#" class="title">JEEP</a>
                        <div class="year">2018</div>
                        <div class="features">
                            <div class="tr">
                                <div class="item">
                                    <svg width="20" height="18"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#fuel"></use></svg>
                                    Бензин
                                </div>
                            </div>
                            <div class="tr">
                                <div class="item">
                                    <svg width="21" height="21"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#drive"></use></svg>
                                    Передній
                                </div>
                                <div class="item">
                                    <svg width="20" height="20"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#state"></use></svg>
                                    80 200 км
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="price">
                            <span class="price-new">$12 400</span>
                            <div class="tooltip">
                                <svg width="14" height="19"><use xlink:href="#tooltip-icon"></use></svg>
                                <div>БВ ціла - це вживане авто без слідів ушкодження.</div>
                            </div>
                        </div>
                        <a href="#" class="btn">Детальніше</a>
                    </div>
                </div>
                <div class="swiper-slide product-preview">
                    <div class="img">
                        <div class="icons">
                            <svg width="33" height="17"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#electric"></use></svg>
                        </div>
                        <div class="stickers">
                            <span>В наяності</span>
                        </div>
                        <a href="#" aria-label="img product">
                            <picture>
                                <source type="image/webp" srcset="{{ asset('img/example/img_6.webp') }}">
                                <img width="289" height="218" src="{{ asset('img/example/img_6.png') }}" loading="lazy" alt="">
                            </picture>
                        </a>
                    </div>
                    <div class="body">
                        <a href="#" class="title">Hyundai</a>
                        <div class="year">2013</div>
                        <div class="features">
                            <div class="tr">
                                <div class="item">
                                    <svg width="20" height="18"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#fuel"></use></svg>
                                    Електрика
                                </div>
                            </div>
                            <div class="tr">
                                <div class="item">
                                    <svg width="21" height="21"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#drive"></use></svg>
                                    Передній
                                </div>
                                <div class="item">
                                    <svg width="20" height="20"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#state"></use></svg>
                                    Б/В
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="price">
                            <span class="price-new">$9 200</span>
                            <div class="tooltip">
                                <svg width="14" height="19"><use xlink:href="#tooltip-icon"></use></svg>
                                <div>БВ ціла - це вживане авто без слідів ушкодження.</div>
                            </div>
                        </div>
                        <a href="#" class="btn">Детальніше</a>
                    </div>
                </div>
                <div class="swiper-slide product-preview">
                    <div class="img">
                        <div class="icons">
                            <svg width="33" height="17"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#electric"></use></svg>
                        </div>
                        <div class="stickers">
                            <span>В наяності</span>
                        </div>
                        <a href="#" aria-label="img product">
                            <picture>
                                <source type="image/webp" srcset="{{ asset('img/example/img_7.webp') }}">
                                <img width="289" height="218" src="{{ asset('img/example/img_7.png') }}" loading="lazy" alt="">
                            </picture>
                        </a>
                    </div>
                    <div class="body">
                        <a href="#" class="title">Geely</a>
                        <div class="year">2017</div>
                        <div class="features">
                            <div class="tr">
                                <div class="item">
                                    <svg width="20" height="18"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#fuel"></use></svg>
                                    Електрика
                                </div>
                            </div>
                            <div class="tr">
                                <div class="item">
                                    <svg width="21" height="21"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#drive"></use></svg>
                                    Передній
                                </div>
                                <div class="item">
                                    <svg width="20" height="20"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#state"></use></svg>
                                    Новий
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="price">
                            <span class="price-new">$25 200</span>
                            <div class="tooltip">
                                <svg width="14" height="19"><use xlink:href="#tooltip-icon"></use></svg>
                                <div>БВ ціла - це вживане авто без слідів ушкодження.</div>
                            </div>
                        </div>
                        <a href="#" class="btn">Детальніше</a>
                    </div>
                </div>
                <div class="swiper-slide product-preview">
                    <div class="img">
                        <div class="icons">
                            <svg width="33" height="17"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#electric"></use></svg>
                        </div>
                        <div class="stickers">
                            <span>В наяності</span>
                        </div>
                        <a href="#" aria-label="img product">
                            <picture>
                                <source type="image/webp" srcset="{{ asset('img/example/img_4.webp') }}">
                                <img width="289" height="218" src="{{ asset('img/example/img_4.png') }}" loading="lazy" alt="">
                            </picture>
                        </a>
                    </div>
                    <div class="body">
                        <a href="#" class="title">Nissan</a>
                        <div class="year">2017</div>
                        <div class="features">
                            <div class="tr">
                                <div class="item">
                                    <svg width="20" height="18"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#fuel"></use></svg>
                                    Електрика
                                </div>
                            </div>
                            <div class="tr">
                                <div class="item">
                                    <svg width="21" height="21"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#drive"></use></svg>
                                    Передній
                                </div>
                                <div class="item">
                                    <svg width="20" height="20"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#state"></use></svg>
                                    Новий
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="price">
                            <span class="price-new">$25 200</span>
                            <div class="tooltip">
                                <svg width="14" height="19"><use xlink:href="#tooltip-icon"></use></svg>
                                <div>БВ ціла - це вживане авто без слідів ушкодження.</div>
                            </div>
                        </div>
                        <a href="#" class="btn">Детальніше</a>
                    </div>
                </div>
                <div class="swiper-slide product-preview">
                    <div class="img">
                        <div class="icons">
                            <svg width="33" height="17"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#electric"></use></svg>
                        </div>
                        <div class="stickers">
                            <span>В наяності</span>
                        </div>
                        <a href="#" aria-label="img product">
                            <picture>
                                <source type="image/webp" srcset="{{ asset('img/example/img_6.webp') }}">
                                <img width="289" height="218" src="{{ asset('img/example/img_6.png') }}" loading="lazy" alt="">
                            </picture>
                        </a>
                    </div>
                    <div class="body">
                        <a href="#" class="title">Hyundai</a>
                        <div class="year">2013</div>
                        <div class="features">
                            <div class="tr">
                                <div class="item">
                                    <svg width="20" height="18"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#fuel"></use></svg>
                                    Електрика
                                </div>
                            </div>
                            <div class="tr">
                                <div class="item">
                                    <svg width="21" height="21"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#drive"></use></svg>
                                    Передній
                                </div>
                                <div class="item">
                                    <svg width="20" height="20"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#state"></use></svg>
                                    Б/В
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="price">
                            <span class="price-new">$9 200</span>
                            <div class="tooltip">
                                <svg width="14" height="19"><use xlink:href="#tooltip-icon"></use></svg>
                                <div>БВ ціла - це вживане авто без слідів ушкодження.</div>
                            </div>
                        </div>
                        <a href="#" class="btn">Детальніше</a>
                    </div>
                </div>
                <div class="swiper-slide product-preview">
                    <div class="img">
                        <div class="icons">
                            <svg width="33" height="17"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#electric"></use></svg>
                        </div>
                        <div class="stickers">
                            <span>В наяності</span>
                        </div>
                        <a href="#" aria-label="img product">
                            <picture>
                                <source type="image/webp" srcset="{{ asset('img/example/img_7.webp') }}">
                                <img width="289" height="218" src="{{ asset('img/example/img_7.png') }}" loading="lazy" alt="">
                            </picture>
                        </a>
                    </div>
                    <div class="body">
                        <a href="#" class="title">Geely</a>
                        <div class="year">2017</div>
                        <div class="features">
                            <div class="tr">
                                <div class="item">
                                    <svg width="20" height="18"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#fuel"></use></svg>
                                    Електрика
                                </div>
                            </div>
                            <div class="tr">
                                <div class="item">
                                    <svg width="21" height="21"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#drive"></use></svg>
                                    Передній
                                </div>
                                <div class="item">
                                    <svg width="20" height="20"><use xlink:href="http://127.0.0.1:8000/img/icons/sprite.svg#state"></use></svg>
                                    Новий
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="price">
                            <span class="price-new">$25 200</span>
                            <div class="tooltip">
                                <svg width="14" height="19"><use xlink:href="#tooltip-icon"></use></svg>
                                <div>БВ ціла - це вживане авто без слідів ушкодження.</div>
                            </div>
                        </div>
                        <a href="#" class="btn">Детальніше</a>
                    </div>
                </div>
            </div>
            <div class="swiper-nav">
                <div class="swiper-button-prev team-prev"><svg width="24" height="30"><use xlink:href="#arrow-icon"></use></svg></div>
                <div class="swiper-bullets"></div>
                <div class="swiper-button-next team-next"><svg width="24" height="30"><use xlink:href="#arrow-icon"></use></svg></div>
            </div>
        </div>
    </div>
    <!-- ///:end/// -->

    <!-- ///ПОПУЛЯРНІ МАРКИ АВТО/// -->
    <div class="popular-brands">
        <div class="container hidden-xs">
            <div class="main-title text-center">Популярні марки авто</div>
        </div>
        <div class="list">
            <div class="container">
                <a href="#" title="Alfa Romeo">Alfa Romeo</a>
                <a href="#" title="Aston Martin">Aston Martin</a>
                <a href="#" title="Audi">Audi</a>
                <a href="#" title="Bentley">Bentley</a>
                <a href="#" title="BMW">BMW</a>
                <a href="#" title="Buick">Buick</a>
                <a href="#" title="Cadillac">Cadillac</a>
                <a href="#" title="Chevrolet">Chevrolet</a>
                <a href="#" title="Chrysler">Chrysler</a>
                <a href="#" title="Dodge">Dodge</a>
                <a href="#" title="Ducati">Ducati</a>
                <a href="#" title="Ferrari">Ferrari</a>
                <a href="#" title="Fiat">Fiat</a>
                <a href="#" title="Ford">Ford</a>
                <a href="#" title="GMC">GMC</a>
                <a href="#" title="Harley Davidson">Harley Davidson</a>
                <a href="#" title="Honda">Honda</a>
                <a href="#" title="Hummer">Hummer</a>
                <a href="#" title="Hyundai">Hyundai</a>
                <a href="#" title="Infiniti">Infiniti</a>
                <a href="#" title="Jaguar">Jaguar</a>
                <a href="#" title="Jeep">Jeep</a>
                <a href="#" title="Kawasaki">Kawasaki</a>
                <a href="#" title="KIA">KIA</a>
                <a href="#" title="Lamborghini">Lamborghini</a>
                <a href="#" title="Land Rover">Land Rover</a>
                <a href="#" title="Lexus">Lexus</a>
                <a href="#" title="Lincoln Maserati">Lincoln Maserati</a>
                <a href="#" title="Maybach">Maybach</a>
                <a href="#" title="Mazda">Mazda</a>
                <a href="#" title="McLaren">McLaren</a>
                <a href="#" title="Mercedes-Benz">Mercedes-Benz</a>
                <a href="#" title="Mini Cooper">Mini Cooper</a>
                <a href="#" title="Mitsubishi">Mitsubishi</a>
                <a href="#" title="Nissan">Nissan</a>
                <a href="#" title="Pontiac">Pontiac</a>
                <a href="#" title="Porsche">Porsche</a>
                <a href="#" title="RAM">RAM</a>
                <a href="#" title="Range Rover">Range Rover</a>
                <a href="#" title="Renault">Renault</a>
                <a href="#" title="Rolls Royce">Rolls Royce</a>
                <a href="#" title="Scion">Scion</a>
                <a href="#" title="Smart">Smart</a>
                <a href="#" title="Subaru">Subaru</a>
                <a href="#" title="Suzuki">Suzuki</a>
                <a href="#" title="Tesla">Tesla</a>
                <a href="#" title="Toyota">Toyota</a>
                <a href="#" title="Volkswagen">Volkswagen</a>
                <a href="#" title="Volvo">Volvo</a>
                <a href="#" title="Yamaha">Yamaha</a>
            </div>
        </div>
        <span class="toggle-btn visible-xs">Детальніше</span>
    </div>
    <!-- ///:end/// -->

    <!-- ///ВІДПОВІДІ НА ПИТАННЯ/// -->
    <div class="section-faq container">
        <div class="main-title text-center line-left">Відповіді на питання</div>
        <div class="item">
            <div class="title toggle-btn">
                Як перевіряються автомобілі з США?
                <svg width="24" height="30"><use xlink:href="#arrow-icon"></use></svg>
            </div>
            <div class="body">
                <p>Перш ніж приступити до торгів, менеджери компанії проводять більше 8 етапів ретельної перевірки автомобіля. Це дозволить дізнатися, чи був автомобіль учасником ДТП, кількість власників, історію його обслуговування, надійність продавця і т.д. Всі дані про автомобіль надаються клієнту і, тільки після його схвалення, менеджер приступає до процесу торгів.</p>
            </div>
        </div>
        <div class="item">
            <div class="title toggle-btn">
                Є машини, які вже можна подивитися "вживу"?
                <svg width="24" height="30"><use xlink:href="#arrow-icon"></use></svg>
            </div>
            <div class="body">
                <p>"Bexhill Trading Auto" надає можливість придбання авто на території України. Перед покупкою можна подивитися вподобаний автомобіль в тому місті, де він знаходиться (в Одесі, Києві, Харкові чи Львові). Ознайомитися з асортиментом можна в розділі - <a href="#">авто з США в наявності</a>.</p>
            </div>
        </div>
        <div class="item open">
            <div class="title toggle-btn">
                Що включає в себе поняття "авто під ключ"?
                <svg width="24" height="30"><use xlink:href="#arrow-icon"></use></svg>
            </div>
            <div class="body">
                <p>При покупці авто під ключ компанія здійснює комплекс послуг, який включає підбір авто, торги, оформлення необхідних документів, транспортування по США, доставку в порт України і розмитнення. У розділі "<a href="#">Авто з американських аукціонів</a>" можна подивитися цікаві варіанти, які можна пригнати під ключ. Крім того, "Bexhill Trading Auto" надає послуги з ремонту та сертифікації, які оплачуються окремо.</p>
            </div>
        </div>
        <div class="item">
            <div class="title toggle-btn">
                Які документи отримують наші клієнти на автомобілі з США?
                <svg width="24" height="30"><use xlink:href="#arrow-icon"></use></svg>
            </div>
            <div class="body">
                <p>TITLE (техпаспорт на автомобіль), інвойс, свідоцтво про реєстрацію та митна декларація.</p>
            </div>
        </div>
        <div class="item">
            <div class="title toggle-btn">
                Чи надає компанія гарантії?
                <svg width="24" height="30"><use xlink:href="#arrow-icon"></use></svg>
            </div>
            <div class="body">
                <p>Компанія укладає договір з кожним клієнтом і зобов’язується виконувати всі умови договору. Всі платежі здійснюються поетапно і відправляються на розрахунковий рахунок, вказаний в договорі. Фахівці компанії зобов’язуються здійснювати якісний підбір авто і забезпечувати супровід аж до прибуття автомобіля в Україну. Крім того, ми рекомендуємо застрахувати авто на час перевезення з США в Україну, що послужить додатковою гарантією. Ця послуга не є обов’язковою і здійснюється тільки на розсуд клієнта.</p>
            </div>
        </div>
        <div class="item">
            <div class="title toggle-btn">
                Скільки часу займає доставка авто з США?
                <svg width="24" height="30"><use xlink:href="#arrow-icon"></use></svg>
            </div>
            <div class="body">
                <p>Терміни доставки авто з США залежать від: віддаленості авто від місцезнаходження аукціону і порту відправлення; погодних умов або непередбачених ситуацій, на які неможливо вплинути; приблизний термін доставки авто в Україні складає від 30 до 60 днів.</p>
            </div>
        </div>
    </div>
    <!-- ///:end/// -->

    <!-- ///SEO - ТЕКСТ/// -->
    <div class="section-seo container">
        <div class="seo-inner">
            <h2 class="main-title noline"> <span class="hidden-xs">Компания</span> <span class="color-red">Bexhill</span> <span class="color-blue">Trading</span> Auto – автомобили из США</h2>
            <p>Bexhill Trading Auto – официальный дилер IAAI, Copart, Manheim на территории Украины, занимающееся пригоном и продажей авто из США. мы являемся официальным партнером автомобильных аукционов, таких как IAAI, Copart и Manheim. Одновременно наша компания активно развивается на востоке – уже более двух лет возим авто из Кореи.</p>
            <h3>Почему ввоз авто из США?</h3>
            <p>Ми порівняли ринки США з Європейськими та зрозуміли, що покупка автомобіля в Америці вигідніше в кілька разів, як би парадоксально це не звучало. Це спричинено продуманою логістикою, рівнем розвитку сервісів по оцінюванню стану авто та самим процесом покупки автомобіля.</p>
            <p>Більшість громадян США беруть автомобіль в лізинг на кілька років і весь час експлуатації сама лізингова компанія займається постійним ТО автомобіля, внаслідок чого, машини з США – один з кращих виборів для автолюбителів України.</p>
            <h3>Через що така низька ціна?</h3>
            <p>Биті автомобілі з США викуповуються з аукціонів страхових компаній. На цих аукціонах машина втрачає половину ціни навіть через мінімальні пошкодження. Якщо враховувати грошові витрати, а саме викуп, доставку, митницю і ремонт, то ціна аналогічного за станом автомобіля в Україні буде вище на 35-50%, а нові будуть коштувати космічних грошей.</p>
            <h3>Комплектації європейських і американських автомобілів</h3>
            <p>Відмітна риса автомобілів з США – переважання повної комплектації над базовою. Через це автомобіль в «максималці» буде коштувати трохи дорожче «порожнього» автомобіля, тому найвигідніше рішення – покупка машини з США в «повному фарші». Більш детально ви можете прочитати в нашій статті – “Основні відмінності американських авто від європейських”.</p>
            <h3>Пробіг</h3>
            <p>Ми спеціально підбираємо автомобілі з Америки на аукціонах з найнижчим показником пробігу. Це дозволяє вам надалі чітко розуміти, як буде вести себе автомобіль на дистанції в декілька років.</p>
            <h3>Обслуговування</h3>
            <p>Сфера автомобільного обслуговування в Америці розвивалася разом зі світовим автомобілебудуванням. Всі американці чесно проходять ТО, і записи про це залишаються в базі, автомобіль майже зі стовідсотковою ймовірністю буде прогнозованим. Продаж в більшості випадків проходить без посередників.</p>
            <h3>Модельний ряд</h3>
            <p>Американці щорічно продають сотні тисяч особистих автомобілів різних марок на аукціонах авто в США.</p>
            <h3>Робота аукціонів з американськими автомобілями:</h3>
            <p>Після отримання доступу до торгів наш співробітник робить ставку на викуп машини.</p>
            <p>Автомобіль дістається тому, чия ставка буде вище за інших. Якщо ставка зайшла, то починається складний процес отримання документів на автомобіль, транспортування на майданчик компанії в США, потім в порт і далі в Україну.</p>
            <p>Що потрібно від клієнта? Вам потрібно оголосити максимальну вартість викупу машини (цей момент обговорюється ще до торгів на аукціоні, виходячи з прогнозованої ціни на торгах прораховується автомобіль «під ключ» в Україні.</p>
            <p>Далі машина відправляється в плавання до України. Час транспортування буває не більше 10 тижнів з моменту виграшу і оформлення автомобіля.</p>
            <h3>Особливість торгів на аукціонах</h3>
            <p>Як вже говорилося вище, для участі в торгах людина повинна мати спеціальний доступ, тому покупка автомобіля з аукціону в США для рядового громадянина України буде непростим завданням, але тільки не для нас. Компанія Bexhill Trading Auto отримала доступ до відкритих і закритих аукціонів, що дозволяє купити авто з США, орієнтуючись на переваги клієнта і здійснювати пригін авто в Україну під замовлення.</p>
            <p>Наші клієнти замовляють автомобіль зі Сполучених штатів Америки за ціною на 35-50% нижчою від ринкової. На аукціонах щотижня реалізуються тисячі автомобілів страхових компаній, серед них є дизельні, бензинові, гібриди і електромобілі. Ми можемо організувати транспортування автомобіля не тільки до України, але і по території України (крім тимчасово окупованих територій Донецької і Луганської області, і АР Крим).</p>
            <h3>Чому ми?</h3>
            <h3>Власні автосалони</h3>
            <p>Компанія Bexhill Trading Auto відкрила власні автомобільні салони в містах України: Києві, Одесі, Харкові та Миколаєві. Нам дуже важливо, щоб клієнти відчували себе безпечно в процесі покупки і доставки автомобіля з США. Кількість салонів згодом тільки зростає, заплановані відкриття філій в інших містах України, щоб постійно клієнти вибирали авто з Америки в наявності.</p>
            <h3>Посередники</h3>
            <p>Компанія Bexhill Trading Auto уклала договір з посередниками в Штатах, які допомагають нам привезти авто в цілості й схоронності, зіставляють заявлений та реальний стан автомобіля, перевіряють машину і всі агрегати на наявність прихованих пошкоджень.</p>
            <h3>Особистий кабінет</h3>
            <p>Покупці після укладення угоди отримують доступ до особистого кабінету клієнта Bexhill Trading Auto, де вони можуть спостерігати за статусом автомобіля, бачити повну суму виплат і іншу необхідну інформацію.</p>
            <h3>Консультування</h3>
            <p>Наші фахівці готові 24/7 консультувати з будь-яких питань, пов’язаних з бажанням купити авто з США б/у. За консультації не потрібно платити додатково, наша внутрішня політика передбачає роботу з клієнтом як до укладення договору, так і після транспортування автомобіля в Україну.</p>
            <h3>Ремонт американських авто і підбір запчастин</h3>
            <p>Спеціально для допомоги клієнтам відкрили власну СТО, де наші механіки продіагностують автомобілі з США б/у, відремонтують або допоможуть замовити необхідні запчастини, які не знайдеш на ринку України.</p>
            <h3>Автомобіль з Америки під ключ</h3>
            <p>Надаємо послуги з купівлі авто з США під ключ, коли клієнт лише називає свій бюджет, а наші фахівці самі займаються пошуком авто, купівлею, транспортуванням в Україну, митним очищенням і постановкою на облік.</p>
            <h3>Купити авто з США</h3>
            <p>Компанія Bexhill Trading Auto з радістю допоможе вибрати, придбати і отримати автомобіль мрії з США. Менеджери врахують всі вимоги та побажання, звернуть увагу на нюанси покупки конкретної моделі і будуть на зв’язку 24 години на добу, щоб проконсультувати з питань, пов’язаних з роботою компанії.</p>
        </div>
        <span class="toggle-btn" data-text="Згорнути">Детальніше</span>
    </div>
    <!-- ///:end/// -->

    <!-- ///ЗАМОВТЕ РОЗРАХУНОК/// -->
    <div class="section-order-calculation container">
        <div class="text">
            <div class="main-title noline">Замовте розрахунок вартості <span class="color-blue">придбання та доставки вашого авто</span></div>
            <form class="form" action="#" novalidate autocomplete="off">
                <strong class="title">Вкажіть ваш телефон та наш менеджер зв'яжеться з вами</strong>
                <div class="form-group">
                    <input class="form-control" placeholder="Им`я" type="text" oninput="this.value = this.value.replace(/[0-9]/g, '');" required>
                    <div class="invalid-feedback">Поле обов'язкове до заповнення</div>
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="+380 ( _____ )" data-type="tel" required>
                    <div class="invalid-feedback">Поле обов'язкове до заповнення</div>
                </div>
                <button class="btn" type="submit">Замовити розрахунок</button>
            </form>
        </div>
        <picture class="img">
            <source type="image/webp" srcset="{{ asset('img/order-calculation.webp') }}">
            <img width="340" height="346" src="{{ asset('img/order-calculation.png') }}" loading="lazy" alt="">
        </picture>
    </div>
    <!-- ///:end/// -->
@endsection