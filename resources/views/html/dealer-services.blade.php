@extends('layouts.app')

@section('title', 'Дилерські послуги')

@push('styles')
    <link rel="stylesheet" href="{{ mix('css/dealer.css') }}">
@endpush

@push('scripts')
    <script src="{{ mix('js/dealer.js') }}" defer></script>
@endpush

@section('content')

<!-- ///БАННЕР/// -->
<div class="banner bg">
    <div class="container">
        <!-- ///ХЛЕБНЫЕ КРОШКИ/// -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Bexhill Trading Auto</a></li>
                <li class="breadcrumb-item"><a href="/">Послуги</a></li>
                <li class="breadcrumb-item" aria-current="page">Дилерські послуги</li>
            </ol>
        </nav>
        <!-- ///:end/// -->
        <br>
        <br>
        <h1 class="h1">
            <span class="color-red">Дилерські<br> послуги</span>
        </h1>
        <div class="h2 color-blue">Партнерство оптовим покупцям</div>
        <span class="line"></span>
        <p class="color-blue">Продажа автомобилей из США на авторынке Украины набирает все большие обороты<br> и при разумном подходе принесет ощутимую прибыль.</p>
        <p class="color-blue">Мы поможем вам доставить авто действительно по низким тарифам<br> - свяжитесь с нашим специалистом и убедитесь в этом сами.</p>
        <picture class="img">
            <source type="image/webp" srcset="{{ asset('img/example/img_35.webp') }}" media="(max-width: 767px)">
            <source type="image/webp" srcset="{{ asset('img/example/img_35.webp') }}" media="(min-width: 768px)">
            <img width="714" height="562" src="{{ asset('img/example/img_35.png') }}" alt="">
        </picture>
    </div>
</div>
<!-- ///:end/// -->

<!-- ///ЗАЛИШАЙ ЗАЯВКУ/// -->
<form class="form-choose-car" action="#" novalidate autocomplete="off">
    <div class="title"> Заявка на співпрацю</div>
    <div class="form-group">
        <input class="form-control" placeholder="Им`я" type="text" oninput="this.value = this.value.replace(/[0-9]/g, '');" required>
        <div class="invalid-feedback">Поле обов'язкове до заповнення</div>
    </div>
    <div class="form-group">
        <input class="form-control" type="text" placeholder="+380 ( _____ )" data-type="tel" required>
        <div class="invalid-feedback">Поле обов'язкове до заповнення</div>
    </div>
    <button class="btn" type="submit">Надiслати</button>
</form>
<!-- ///:end/// -->

<!-- ///АВТО В НАЯВНОСТІ/// -->
<div class="section-swiper container">
    <div class="main-title text-center">Авто в наявності</div>
    <div class="nav-tabs">
        <span class="nav-link active" data-toggle="tab" data-target="#availabTab_1">Авто з США</span>
        <span class="nav-link" data-toggle="tab" data-target="#availabTab_2">Нові електромобілі</span>
        <span class="nav-link" data-toggle="tab" data-target="#availabTab_3">Авто з Кореї</span>
    </div>
    <div class="tab-content">
        <div id="availabTab_1" class="tab-pane active">
            <div class="swiper product-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide product-preview">
                        <div class="img">
                            <div class="icons">
                                <svg width="33" height="17"><use xlink:href="{{ asset('/img/icons/sprite.svg#electric') }}"></use></svg>
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
                                        <svg width="20" height="18"><use xlink:href="{{ asset('/img/icons/sprite.svg#fuel') }}"></use></svg>
                                        Електрика
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="item">
                                        <svg width="21" height="21"><use xlink:href="{{ asset('/img/icons/sprite.svg#drive') }}"></use></svg>
                                        Передній
                                    </div>
                                    <div class="item">
                                        <svg width="20" height="20"><use xlink:href="{{ asset('/img/icons/sprite.svg#state') }}"></use></svg>
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
                                        <svg width="20" height="18"><use xlink:href="{{ asset('/img/icons/sprite.svg#fuel') }}"></use></svg>
                                        Бензин
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="item">
                                        <svg width="21" height="21"><use xlink:href="{{ asset('/img/icons/sprite.svg#drive') }}"></use></svg>
                                        Передній
                                    </div>
                                    <div class="item">
                                        <svg width="20" height="20"><use xlink:href="{{ asset('/img/icons/sprite.svg#state') }}"></use></svg>
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
                                <svg width="33" height="17"><use xlink:href="{{ asset('/img/icons/sprite.svg#electric') }}"></use></svg>
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
                                        <svg width="20" height="18"><use xlink:href="{{ asset('/img/icons/sprite.svg#fuel') }}"></use></svg>
                                        Електрика
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="item">
                                        <svg width="21" height="21"><use xlink:href="{{ asset('/img/icons/sprite.svg#drive') }}"></use></svg>
                                        Передній
                                    </div>
                                    <div class="item">
                                        <svg width="20" height="20"><use xlink:href="{{ asset('/img/icons/sprite.svg#state') }}"></use></svg>
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
                                <svg width="33" height="17"><use xlink:href="{{ asset('/img/icons/sprite.svg#electric') }}"></use></svg>
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
                                        <svg width="20" height="18"><use xlink:href="{{ asset('/img/icons/sprite.svg#fuel') }}"></use></svg>
                                        Електрика
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="item">
                                        <svg width="21" height="21"><use xlink:href="{{ asset('/img/icons/sprite.svg#drive') }}"></use></svg>
                                        Передній
                                    </div>
                                    <div class="item">
                                        <svg width="20" height="20"><use xlink:href="{{ asset('/img/icons/sprite.svg#state') }}"></use></svg>
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
                                <svg width="33" height="17"><use xlink:href="{{ asset('/img/icons/sprite.svg#electric') }}"></use></svg>
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
                                        <svg width="20" height="18"><use xlink:href="{{ asset('/img/icons/sprite.svg#fuel') }}"></use></svg>
                                        Електрика
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="item">
                                        <svg width="21" height="21"><use xlink:href="{{ asset('/img/icons/sprite.svg#drive') }}"></use></svg>
                                        Передній
                                    </div>
                                    <div class="item">
                                        <svg width="20" height="20"><use xlink:href="{{ asset('/img/icons/sprite.svg#state') }}"></use></svg>
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
                                        <svg width="20" height="18"><use xlink:href="{{ asset('/img/icons/sprite.svg#fuel') }}"></use></svg>
                                        Бензин
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="item">
                                        <svg width="21" height="21"><use xlink:href="{{ asset('/img/icons/sprite.svg#drive') }}"></use></svg>
                                        Передній
                                    </div>
                                    <div class="item">
                                        <svg width="20" height="20"><use xlink:href="{{ asset('/img/icons/sprite.svg#state') }}"></use></svg>
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
                                <svg width="33" height="17"><use xlink:href="{{ asset('/img/icons/sprite.svg#electric') }}"></use></svg>
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
                                        <svg width="20" height="18"><use xlink:href="{{ asset('/img/icons/sprite.svg#fuel') }}"></use></svg>
                                        Електрика
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="item">
                                        <svg width="21" height="21"><use xlink:href="{{ asset('/img/icons/sprite.svg#drive') }}"></use></svg>
                                        Передній
                                    </div>
                                    <div class="item">
                                        <svg width="20" height="20"><use xlink:href="{{ asset('/img/icons/sprite.svg#state') }}"></use></svg>
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
                                <svg width="33" height="17"><use xlink:href="{{ asset('/img/icons/sprite.svg#electric') }}"></use></svg>
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
                                        <svg width="20" height="18"><use xlink:href="{{ asset('/img/icons/sprite.svg#fuel') }}"></use></svg>
                                        Електрика
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="item">
                                        <svg width="21" height="21"><use xlink:href="{{ asset('/img/icons/sprite.svg#drive') }}"></use></svg>
                                        Передній
                                    </div>
                                    <div class="item">
                                        <svg width="20" height="20"><use xlink:href="{{ asset('/img/icons/sprite.svg#state') }}"></use></svg>
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
                                <svg width="33" height="17"><use xlink:href="{{ asset('/img/icons/sprite.svg#electric') }}"></use></svg>
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
                                        <svg width="20" height="18"><use xlink:href="{{ asset('/img/icons/sprite.svg#fuel') }}"></use></svg>
                                        Електрика
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="item">
                                        <svg width="21" height="21"><use xlink:href="{{ asset('/img/icons/sprite.svg#drive') }}"></use></svg>
                                        Передній
                                    </div>
                                    <div class="item">
                                        <svg width="20" height="20"><use xlink:href="{{ asset('/img/icons/sprite.svg#state') }}"></use></svg>
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
                                <svg width="33" height="17"><use xlink:href="{{ asset('/img/icons/sprite.svg#electric') }}"></use></svg>
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
                                        <svg width="20" height="18"><use xlink:href="{{ asset('/img/icons/sprite.svg#fuel') }}"></use></svg>
                                        Електрика
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="item">
                                        <svg width="21" height="21"><use xlink:href="{{ asset('/img/icons/sprite.svg#drive') }}"></use></svg>
                                        Передній
                                    </div>
                                    <div class="item">
                                        <svg width="20" height="20"><use xlink:href="{{ asset('/img/icons/sprite.svg#state') }}"></use></svg>
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
                                <svg width="33" height="17"><use xlink:href="{{ asset('/img/icons/sprite.svg#electric') }}"></use></svg>
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
                                        <svg width="20" height="18"><use xlink:href="{{ asset('/img/icons/sprite.svg#fuel') }}"></use></svg>
                                        Електрика
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="item">
                                        <svg width="21" height="21"><use xlink:href="{{ asset('/img/icons/sprite.svg#drive') }}"></use></svg>
                                        Передній
                                    </div>
                                    <div class="item">
                                        <svg width="20" height="20"><use xlink:href="{{ asset('/img/icons/sprite.svg#state') }}"></use></svg>
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
        <div id="availabTab_2" class="tab-pane">
            <div class="swiper product-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide product-preview">
                        <div class="img">
                            <div class="icons">
                                <svg width="33" height="17"><use xlink:href="{{ asset('/img/icons/sprite.svg#electric') }}"></use></svg>
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
                                        <svg width="20" height="18"><use xlink:href="{{ asset('/img/icons/sprite.svg#fuel') }}"></use></svg>
                                        Електрика
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="item">
                                        <svg width="21" height="21"><use xlink:href="{{ asset('/img/icons/sprite.svg#drive') }}"></use></svg>
                                        Передній
                                    </div>
                                    <div class="item">
                                        <svg width="20" height="20"><use xlink:href="{{ asset('/img/icons/sprite.svg#state') }}"></use></svg>
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
                                <svg width="33" height="17"><use xlink:href="{{ asset('/img/icons/sprite.svg#electric') }}"></use></svg>
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
                                        <svg width="20" height="18"><use xlink:href="{{ asset('/img/icons/sprite.svg#fuel') }}"></use></svg>
                                        Електрика
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="item">
                                        <svg width="21" height="21"><use xlink:href="{{ asset('/img/icons/sprite.svg#drive') }}"></use></svg>
                                        Передній
                                    </div>
                                    <div class="item">
                                        <svg width="20" height="20"><use xlink:href="{{ asset('/img/icons/sprite.svg#state') }}"></use></svg>
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
                                <svg width="33" height="17"><use xlink:href="{{ asset('/img/icons/sprite.svg#electric') }}"></use></svg>
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
                                        <svg width="20" height="18"><use xlink:href="{{ asset('/img/icons/sprite.svg#fuel') }}"></use></svg>
                                        Електрика
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="item">
                                        <svg width="21" height="21"><use xlink:href="{{ asset('/img/icons/sprite.svg#drive') }}"></use></svg>
                                        Передній
                                    </div>
                                    <div class="item">
                                        <svg width="20" height="20"><use xlink:href="{{ asset('/img/icons/sprite.svg#state') }}"></use></svg>
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
                                <svg width="33" height="17"><use xlink:href="{{ asset('/img/icons/sprite.svg#electric') }}"></use></svg>
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
                                        <svg width="20" height="18"><use xlink:href="{{ asset('/img/icons/sprite.svg#fuel') }}"></use></svg>
                                        Електрика
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="item">
                                        <svg width="21" height="21"><use xlink:href="{{ asset('/img/icons/sprite.svg#drive') }}"></use></svg>
                                        Передній
                                    </div>
                                    <div class="item">
                                        <svg width="20" height="20"><use xlink:href="{{ asset('/img/icons/sprite.svg#state') }}"></use></svg>
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
                                <svg width="33" height="17"><use xlink:href="{{ asset('/img/icons/sprite.svg#electric') }}"></use></svg>
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
                                        <svg width="20" height="18"><use xlink:href="{{ asset('/img/icons/sprite.svg#fuel') }}"></use></svg>
                                        Електрика
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="item">
                                        <svg width="21" height="21"><use xlink:href="{{ asset('/img/icons/sprite.svg#drive') }}"></use></svg>
                                        Передній
                                    </div>
                                    <div class="item">
                                        <svg width="20" height="20"><use xlink:href="{{ asset('/img/icons/sprite.svg#state') }}"></use></svg>
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
                                <svg width="33" height="17"><use xlink:href="{{ asset('/img/icons/sprite.svg#electric') }}"></use></svg>
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
                                        <svg width="20" height="18"><use xlink:href="{{ asset('/img/icons/sprite.svg#fuel') }}"></use></svg>
                                        Електрика
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="item">
                                        <svg width="21" height="21"><use xlink:href="{{ asset('/img/icons/sprite.svg#drive') }}"></use></svg>
                                        Передній
                                    </div>
                                    <div class="item">
                                        <svg width="20" height="20"><use xlink:href="{{ asset('/img/icons/sprite.svg#state') }}"></use></svg>
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
                                        <svg width="20" height="18"><use xlink:href="{{ asset('/img/icons/sprite.svg#fuel') }}"></use></svg>
                                        Бензин
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="item">
                                        <svg width="21" height="21"><use xlink:href="{{ asset('/img/icons/sprite.svg#drive') }}"></use></svg>
                                        Передній
                                    </div>
                                    <div class="item">
                                        <svg width="20" height="20"><use xlink:href="{{ asset('/img/icons/sprite.svg#state') }}"></use></svg>
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
                                <svg width="33" height="17"><use xlink:href="{{ asset('/img/icons/sprite.svg#electric') }}"></use></svg>
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
                                        <svg width="20" height="18"><use xlink:href="{{ asset('/img/icons/sprite.svg#fuel') }}"></use></svg>
                                        Електрика
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="item">
                                        <svg width="21" height="21"><use xlink:href="{{ asset('/img/icons/sprite.svg#drive') }}"></use></svg>
                                        Передній
                                    </div>
                                    <div class="item">
                                        <svg width="20" height="20"><use xlink:href="{{ asset('/img/icons/sprite.svg#state') }}"></use></svg>
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
                                <svg width="33" height="17"><use xlink:href="{{ asset('/img/icons/sprite.svg#electric') }}"></use></svg>
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
                                        <svg width="20" height="18"><use xlink:href="{{ asset('/img/icons/sprite.svg#fuel') }}"></use></svg>
                                        Електрика
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="item">
                                        <svg width="21" height="21"><use xlink:href="{{ asset('/img/icons/sprite.svg#drive') }}"></use></svg>
                                        Передній
                                    </div>
                                    <div class="item">
                                        <svg width="20" height="20"><use xlink:href="{{ asset('/img/icons/sprite.svg#state') }}"></use></svg>
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
                                <svg width="33" height="17"><use xlink:href="{{ asset('/img/icons/sprite.svg#electric') }}"></use></svg>
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
                                        <svg width="20" height="18"><use xlink:href="{{ asset('/img/icons/sprite.svg#fuel') }}"></use></svg>
                                        Електрика
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="item">
                                        <svg width="21" height="21"><use xlink:href="{{ asset('/img/icons/sprite.svg#drive') }}"></use></svg>
                                        Передній
                                    </div>
                                    <div class="item">
                                        <svg width="20" height="20"><use xlink:href="{{ asset('/img/icons/sprite.svg#state') }}"></use></svg>
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
                                        <svg width="20" height="18"><use xlink:href="{{ asset('/img/icons/sprite.svg#fuel') }}"></use></svg>
                                        Бензин
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="item">
                                        <svg width="21" height="21"><use xlink:href="{{ asset('/img/icons/sprite.svg#drive') }}"></use></svg>
                                        Передній
                                    </div>
                                    <div class="item">
                                        <svg width="20" height="20"><use xlink:href="{{ asset('/img/icons/sprite.svg#state') }}"></use></svg>
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
                </div>
                <div class="swiper-nav">
                    <div class="swiper-button-prev team-prev"><svg width="24" height="30"><use xlink:href="#arrow-icon"></use></svg></div>
                    <div class="swiper-bullets"></div>
                    <div class="swiper-button-next team-next"><svg width="24" height="30"><use xlink:href="#arrow-icon"></use></svg></div>
                </div>
            </div>
        </div>
        <div id="availabTab_3" class="tab-pane">
            <div class="swiper product-swiper">
                <div class="swiper-wrapper">
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
                                        <svg width="20" height="18"><use xlink:href="{{ asset('/img/icons/sprite.svg#fuel') }}"></use></svg>
                                        Бензин
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="item">
                                        <svg width="21" height="21"><use xlink:href="{{ asset('/img/icons/sprite.svg#drive') }}"></use></svg>
                                        Передній
                                    </div>
                                    <div class="item">
                                        <svg width="20" height="20"><use xlink:href="{{ asset('/img/icons/sprite.svg#state') }}"></use></svg>
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
                                <svg width="33" height="17"><use xlink:href="{{ asset('/img/icons/sprite.svg#electric') }}"></use></svg>
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
                                        <svg width="20" height="18"><use xlink:href="{{ asset('/img/icons/sprite.svg#fuel') }}"></use></svg>
                                        Електрика
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="item">
                                        <svg width="21" height="21"><use xlink:href="{{ asset('/img/icons/sprite.svg#drive') }}"></use></svg>
                                        Передній
                                    </div>
                                    <div class="item">
                                        <svg width="20" height="20"><use xlink:href="{{ asset('/img/icons/sprite.svg#state') }}"></use></svg>
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
                                <svg width="33" height="17"><use xlink:href="{{ asset('/img/icons/sprite.svg#electric') }}"></use></svg>
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
                                        <svg width="20" height="18"><use xlink:href="{{ asset('/img/icons/sprite.svg#fuel') }}"></use></svg>
                                        Електрика
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="item">
                                        <svg width="21" height="21"><use xlink:href="{{ asset('/img/icons/sprite.svg#drive') }}"></use></svg>
                                        Передній
                                    </div>
                                    <div class="item">
                                        <svg width="20" height="20"><use xlink:href="{{ asset('/img/icons/sprite.svg#state') }}"></use></svg>
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
                                <svg width="33" height="17"><use xlink:href="{{ asset('/img/icons/sprite.svg#electric') }}"></use></svg>
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
                                        <svg width="20" height="18"><use xlink:href="{{ asset('/img/icons/sprite.svg#fuel') }}"></use></svg>
                                        Електрика
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="item">
                                        <svg width="21" height="21"><use xlink:href="{{ asset('/img/icons/sprite.svg#drive') }}"></use></svg>
                                        Передній
                                    </div>
                                    <div class="item">
                                        <svg width="20" height="20"><use xlink:href="{{ asset('/img/icons/sprite.svg#state') }}"></use></svg>
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
                                        <svg width="20" height="18"><use xlink:href="{{ asset('/img/icons/sprite.svg#fuel') }}"></use></svg>
                                        Бензин
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="item">
                                        <svg width="21" height="21"><use xlink:href="{{ asset('/img/icons/sprite.svg#drive') }}"></use></svg>
                                        Передній
                                    </div>
                                    <div class="item">
                                        <svg width="20" height="20"><use xlink:href="{{ asset('/img/icons/sprite.svg#state') }}"></use></svg>
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
                                <svg width="33" height="17"><use xlink:href="{{ asset('/img/icons/sprite.svg#electric') }}"></use></svg>
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
                                        <svg width="20" height="18"><use xlink:href="{{ asset('/img/icons/sprite.svg#fuel') }}"></use></svg>
                                        Електрика
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="item">
                                        <svg width="21" height="21"><use xlink:href="{{ asset('/img/icons/sprite.svg#drive') }}"></use></svg>
                                        Передній
                                    </div>
                                    <div class="item">
                                        <svg width="20" height="20"><use xlink:href="{{ asset('/img/icons/sprite.svg#state') }}"></use></svg>
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
                                <svg width="33" height="17"><use xlink:href="{{ asset('/img/icons/sprite.svg#electric') }}"></use></svg>
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
                                        <svg width="20" height="18"><use xlink:href="{{ asset('/img/icons/sprite.svg#fuel') }}"></use></svg>
                                        Електрика
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="item">
                                        <svg width="21" height="21"><use xlink:href="{{ asset('/img/icons/sprite.svg#drive') }}"></use></svg>
                                        Передній
                                    </div>
                                    <div class="item">
                                        <svg width="20" height="20"><use xlink:href="{{ asset('/img/icons/sprite.svg#state') }}"></use></svg>
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
                                <svg width="33" height="17"><use xlink:href="{{ asset('/img/icons/sprite.svg#electric') }}"></use></svg>
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
                                        <svg width="20" height="18"><use xlink:href="{{ asset('/img/icons/sprite.svg#fuel') }}"></use></svg>
                                        Електрика
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="item">
                                        <svg width="21" height="21"><use xlink:href="{{ asset('/img/icons/sprite.svg#drive') }}"></use></svg>
                                        Передній
                                    </div>
                                    <div class="item">
                                        <svg width="20" height="20"><use xlink:href="{{ asset('/img/icons/sprite.svg#state') }}"></use></svg>
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
                                <svg width="33" height="17"><use xlink:href="{{ asset('/img/icons/sprite.svg#electric') }}"></use></svg>
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
                                        <svg width="20" height="18"><use xlink:href="{{ asset('/img/icons/sprite.svg#fuel') }}"></use></svg>
                                        Електрика
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="item">
                                        <svg width="21" height="21"><use xlink:href="{{ asset('/img/icons/sprite.svg#drive') }}"></use></svg>
                                        Передній
                                    </div>
                                    <div class="item">
                                        <svg width="20" height="20"><use xlink:href="{{ asset('/img/icons/sprite.svg#state') }}"></use></svg>
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
                                <svg width="33" height="17"><use xlink:href="{{ asset('/img/icons/sprite.svg#electric') }}"></use></svg>
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
                                        <svg width="20" height="18"><use xlink:href="{{ asset('/img/icons/sprite.svg#fuel') }}"></use></svg>
                                        Електрика
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="item">
                                        <svg width="21" height="21"><use xlink:href="{{ asset('/img/icons/sprite.svg#drive') }}"></use></svg>
                                        Передній
                                    </div>
                                    <div class="item">
                                        <svg width="20" height="20"><use xlink:href="{{ asset('/img/icons/sprite.svg#state') }}"></use></svg>
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
                                <svg width="33" height="17"><use xlink:href="{{ asset('/img/icons/sprite.svg#electric') }}"></use></svg>
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
                                        <svg width="20" height="18"><use xlink:href="{{ asset('/img/icons/sprite.svg#fuel') }}"></use></svg>
                                        Електрика
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="item">
                                        <svg width="21" height="21"><use xlink:href="{{ asset('/img/icons/sprite.svg#drive') }}"></use></svg>
                                        Передній
                                    </div>
                                    <div class="item">
                                        <svg width="20" height="20"><use xlink:href="{{ asset('/img/icons/sprite.svg#state') }}"></use></svg>
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
    </div>
    <div class="swiper-btn text-center">
        <a href="#" class="btn">Переглянути усі авто</a>
    </div>
</div>
<!-- ///:end/// -->

<!-- ///ОФІЦІЙНИЙ ПАРТНЕР/// -->
<div class="section-partners">
    <div class="container">
        <div class="main-title text-center noline"><span class="color-red">Bexhill</span> <span class="color-blue">Trading</span> Auto – офіційний партнер американських<br> аукціонів  Copart и IAAI</div>
        <div class="text-center">
            <picture>
                <source type="image/webp" srcset="{{ asset('img/example/img_8.webp') }}">
                <img width="548" height="92" src="{{ asset('img/example/img_8.png') }}" loading="lazy" alt="">
            </picture>
        </div>
    </div>
</div>
<!-- ///:end/// -->

<hr class="hr mb-1">

<!-- ///СОТРУДНИЧЕСТВО ДЛЯ ОПТОВЫХ КЛИЕНТОВ/// -->
<div class="section-cooperation container">
    <div class="main-title text-center">Сотрудничество для оптовых клиентов по доставке авто из США</div>
    <div class="list">
        <div class="item">
            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.6668 8.33341V3.33341C11.6668 2.89139 11.8424 2.46746 12.155 2.1549C12.4675 1.84234 12.8915 1.66675 13.3335 1.66675H26.6668C27.1089 1.66675 27.5328 1.84234 27.8453 2.1549C28.1579 2.46746 28.3335 2.89139 28.3335 3.33341V8.33341H35.0002C35.4422 8.33341 35.8661 8.50901 36.1787 8.82157C36.4912 9.13413 36.6668 9.55805 36.6668 10.0001V33.3334C36.6668 33.7754 36.4912 34.1994 36.1787 34.5119C35.8661 34.8245 35.4422 35.0001 35.0002 35.0001H5.00016C4.55814 35.0001 4.13421 34.8245 3.82165 34.5119C3.50909 34.1994 3.3335 33.7754 3.3335 33.3334V10.0001C3.3335 9.55805 3.50909 9.13413 3.82165 8.82157C4.13421 8.50901 4.55814 8.33341 5.00016 8.33341H11.6668ZM15.0002 21.6667H6.66683V31.6667H33.3335V21.6667H25.0002V26.6667H15.0002V21.6667ZM33.3335 11.6667H6.66683V18.3334H15.0002V15.0001H25.0002V18.3334H33.3335V11.6667ZM18.3335 18.3334V23.3334H21.6668V18.3334H18.3335ZM15.0002 5.00008V8.33341H25.0002V5.00008H15.0002Z" stroke="none" fill="#BD072B"/></svg>
            Сотрудничество для оптовых клиентов по доставке авто из США
        </div>
        <div class="item">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M23.3335 33.3333V36.6666H3.3335V33.3333H23.3335ZM24.3102 1.14331L37.2735 14.1066L34.9168 16.4666L33.1502 15.8766L29.0218 20L38.4502 29.4283L36.0935 31.785L26.6668 22.3566L22.6602 26.3633L23.1318 28.25L20.7735 30.6066L7.81016 17.6433L10.1685 15.2866L12.0518 15.7566L22.5418 5.26831L21.9535 3.50164L24.3102 1.14331ZM25.4885 7.03664L13.7035 18.82L19.5952 24.7133L31.3802 12.93L25.4885 7.03664Z" stroke="none" fill="#BD072B"/></svg>
                Доступы к аукционам для самостоятельной покупки.
        </div>
        <div class="item">
            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.6668 8.33341V3.33341C11.6668 2.89139 11.8424 2.46746 12.155 2.1549C12.4675 1.84234 12.8915 1.66675 13.3335 1.66675H26.6668C27.1089 1.66675 27.5328 1.84234 27.8453 2.1549C28.1579 2.46746 28.3335 2.89139 28.3335 3.33341V8.33341H35.0002C35.4422 8.33341 35.8661 8.50901 36.1787 8.82157C36.4912 9.13413 36.6668 9.55805 36.6668 10.0001V33.3334C36.6668 33.7754 36.4912 34.1994 36.1787 34.5119C35.8661 34.8245 35.4422 35.0001 35.0002 35.0001H5.00016C4.55814 35.0001 4.13421 34.8245 3.82165 34.5119C3.50909 34.1994 3.3335 33.7754 3.3335 33.3334V10.0001C3.3335 9.55805 3.50909 9.13413 3.82165 8.82157C4.13421 8.50901 4.55814 8.33341 5.00016 8.33341H11.6668ZM15.0002 21.6667H6.66683V31.6667H33.3335V21.6667H25.0002V26.6667H15.0002V21.6667ZM33.3335 11.6667H6.66683V18.3334H15.0002V15.0001H25.0002V18.3334H33.3335V11.6667ZM18.3335 18.3334V23.3334H21.6668V18.3334H18.3335ZM15.0002 5.00008V8.33341H25.0002V5.00008H15.0002Z" stroke="none" fill="#BD072B"/></svg>
            Минимальные сборы аукционов.
        </div>
        <div class="item">
            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.6902 8.33333H35.0002C35.4422 8.33333 35.8661 8.50893 36.1787 8.82149C36.4912 9.13405 36.6668 9.55797 36.6668 10V33.3333C36.6668 33.7754 36.4912 34.1993 36.1787 34.5118C35.8661 34.8244 35.4422 35 35.0002 35H5.00016C4.55814 35 4.13421 34.8244 3.82165 34.5118C3.50909 34.1993 3.3335 33.7754 3.3335 33.3333V6.66667C3.3335 6.22464 3.50909 5.80072 3.82165 5.48816C4.13421 5.17559 4.55814 5 5.00016 5H17.3568L20.6902 8.33333ZM6.66683 8.33333V31.6667H33.3335V11.6667H19.3102L15.9768 8.33333H6.66683ZM13.3335 30C13.3335 28.2319 14.0359 26.5362 15.2861 25.286C16.5364 24.0357 18.2321 23.3333 20.0002 23.3333C21.7683 23.3333 23.464 24.0357 24.7142 25.286C25.9645 26.5362 26.6668 28.2319 26.6668 30H13.3335ZM20.0002 21.6667C18.8951 21.6667 17.8353 21.2277 17.0539 20.4463C16.2725 19.6649 15.8335 18.6051 15.8335 17.5C15.8335 16.3949 16.2725 15.3351 17.0539 14.5537C17.8353 13.7723 18.8951 13.3333 20.0002 13.3333C21.1052 13.3333 22.165 13.7723 22.9464 14.5537C23.7278 15.3351 24.1668 16.3949 24.1668 17.5C24.1668 18.6051 23.7278 19.6649 22.9464 20.4463C22.165 21.2277 21.1052 21.6667 20.0002 21.6667Z" stroke="none" fill="#BD072B"/></svg>
            Личный кабинет пользователя для отслеживания авто и оплат.
        </div>
        <div class="item">
            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 1.66675L33.695 4.71008C34.4567 4.88008 35 5.55508 35 6.33675V22.9817C35 26.3251 33.3283 29.4484 30.5467 31.3017L20 38.3334L9.45333 31.3017C6.67 29.4467 5 26.3251 5 22.9834V6.33675C5 5.55508 5.54333 4.88008 6.305 4.71008L20 1.66675ZM20 5.08175L8.33333 7.67341V22.9817C8.33333 25.2101 9.44667 27.2917 11.3017 28.5284L20 34.3284L28.6983 28.5284C30.5533 27.2917 31.6667 25.2117 31.6667 22.9834V7.67341L20 5.08341V5.08175ZM27.42 13.7034L29.7783 16.0601L19.1717 26.6667L12.1 19.5951L14.4567 17.2384L19.17 21.9517L27.42 13.7017V13.7034Z" stroke="none" fill="#BD072B"/></svg>
            Страхование автомобилей по выгодным ставкам.
        </div>
        <div class="item">
            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M35 11.2616L31.6667 14.5949V6.66659H16.6667V14.9999H8.33337V33.3333H31.6667V28.7383L35 25.4049V35.0133C34.9996 35.4519 34.825 35.8724 34.5147 36.1824C34.2044 36.4925 33.7837 36.6666 33.345 36.6666H6.65504C6.43617 36.6651 6.21974 36.6204 6.01812 36.5353C5.81649 36.4501 5.63362 36.326 5.47993 36.1702C5.32625 36.0143 5.20477 35.8298 5.12243 35.627C5.04009 35.4242 4.9985 35.2071 5.00004 34.9883V13.3333L15.005 3.33325H33.33C34.25 3.33325 35 4.09159 35 4.98659V11.2616ZM36.2967 14.6783L38.6534 17.0366L25.69 29.9999L23.33 29.9966L23.3334 27.6433L36.2967 14.6799V14.6783Z" stroke="none" fill="#BD072B"/></svg>
            Переделка проблемных тайтлов.
        </div>
        <div class="item">
            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.33317 15C8.7752 15 9.19912 15.1756 9.51168 15.4882C9.82424 15.8007 9.99984 16.2246 9.99984 16.6667C12.6184 16.6628 15.1615 17.5438 17.2165 19.1667H20.8332C23.0532 19.1667 25.0498 20.1317 26.4215 21.665L31.6665 21.6667C33.2419 21.6662 34.7852 22.1124 36.1174 22.9534C37.4496 23.7944 38.5161 24.9958 39.1932 26.4183C35.2515 31.62 28.8698 35 21.6665 35C17.0165 35 13.0832 33.995 9.89984 32.2367C9.78324 32.5584 9.57024 32.8364 9.28987 33.0327C9.00949 33.2289 8.67541 33.3339 8.33317 33.3333H3.33317C2.89114 33.3333 2.46722 33.1578 2.15466 32.8452C1.8421 32.5326 1.6665 32.1087 1.6665 31.6667V16.6667C1.6665 16.2246 1.8421 15.8007 2.15466 15.4882C2.46722 15.1756 2.89114 15 3.33317 15H8.33317ZM10.0015 20L9.99984 28.3683L10.0748 28.4233C13.0665 30.5233 16.9632 31.6667 21.6665 31.6667C26.6732 31.6667 31.3315 29.74 34.7248 26.45L34.9465 26.2283L34.7465 26.0617C33.9595 25.4453 33.0055 25.0795 32.0082 25.0117L31.6665 25L28.1465 24.9983C28.2682 25.535 28.3332 26.0933 28.3332 26.6667V28.3333H13.3332V25L24.6498 24.9983L24.5932 24.8683C24.2738 24.2009 23.7825 23.6305 23.1697 23.2158C22.5569 22.801 21.8448 22.5569 21.1065 22.5083L20.8332 22.5H15.9498C15.1754 21.7079 14.2503 21.0786 13.229 20.6493C12.2078 20.22 11.111 19.9992 10.0032 20H10.0015ZM6.6665 18.3333H4.99984V30H6.6665V18.3333ZM22.7432 5.95834L23.3332 6.55001L23.9232 5.96001C24.3095 5.57037 24.769 5.26088 25.2753 5.04931C25.7816 4.83774 26.3247 4.72825 26.8734 4.72712C27.4221 4.726 27.9656 4.83327 28.4727 5.04276C28.9799 5.25226 29.4407 5.55987 29.8286 5.94792C30.2165 6.33597 30.524 6.79682 30.7334 7.30402C30.9427 7.81122 31.0498 8.35478 31.0486 8.90349C31.0473 9.4522 30.9376 9.99525 30.7259 10.5015C30.5142 11.0077 30.2046 11.4671 29.8148 11.8533L23.3332 18.3333L16.8498 11.85C16.4602 11.4637 16.1507 11.0042 15.9391 10.4979C15.7276 9.9916 15.6181 9.44851 15.617 8.89981C15.6158 8.3511 15.7231 7.80757 15.9326 7.30043C16.1421 6.79329 16.4497 6.33252 16.8377 5.94458C17.2258 5.55664 17.6867 5.24917 18.1939 5.03981C18.7011 4.83046 19.2446 4.72334 19.7933 4.72462C20.342 4.7259 20.8851 4.83554 21.3913 5.04726C21.8975 5.25898 22.3569 5.5686 22.7432 5.95834ZM19.2098 8.31667C19.0717 8.45404 18.9861 8.63547 18.9678 8.82942C18.9495 9.02337 18.9998 9.2176 19.1098 9.37834L19.2065 9.49334L23.3332 13.6167L27.4598 9.49334C27.5979 9.35546 27.6832 9.1735 27.7008 8.97919C27.7185 8.78488 27.6674 8.59053 27.5565 8.43001L27.4598 8.31334C27.3217 8.17555 27.1397 8.09057 26.9454 8.07321C26.7511 8.05585 26.5568 8.10721 26.3965 8.21834L26.2798 8.31501L23.3315 11.2617L20.3865 8.31167L20.2732 8.21834C20.1127 8.10742 19.9183 8.05635 19.724 8.07401C19.5297 8.09167 19.3477 8.17696 19.2098 8.31501V8.31667Z" stroke="none" fill="#BD072B"/></svg>
            Консультация и помощь в растаможке и сертификации.
        </div>
        <div class="item">
            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M33.2298 13.3333H34.9998C35.8839 13.3333 36.7317 13.6845 37.3569 14.3096C37.982 14.9348 38.3332 15.7826 38.3332 16.6667V23.3333C38.3332 24.2174 37.982 25.0652 37.3569 25.6904C36.7317 26.3155 35.8839 26.6667 34.9998 26.6667H33.2298C32.8235 29.8888 31.2553 32.852 28.8194 35C26.3836 37.148 23.2475 38.3333 19.9998 38.3333V35C22.652 35 25.1955 33.9464 27.0709 32.0711C28.9463 30.1957 29.9998 27.6522 29.9998 25V15C29.9998 12.3478 28.9463 9.80429 27.0709 7.92893C25.1955 6.05357 22.652 5 19.9998 5C17.3477 5 14.8041 6.05357 12.9288 7.92893C11.0534 9.80429 9.99984 12.3478 9.99984 15V26.6667H4.99984C4.11578 26.6667 3.26794 26.3155 2.64281 25.6904C2.01769 25.0652 1.6665 24.2174 1.6665 23.3333V16.6667C1.6665 15.7826 2.01769 14.9348 2.64281 14.3096C3.26794 13.6845 4.11578 13.3333 4.99984 13.3333H6.76984C7.17655 10.1115 8.74497 7.14878 11.1808 5.00112C13.6166 2.85346 16.7524 1.66846 19.9998 1.66846C23.2472 1.66846 26.3831 2.85346 28.8189 5.00112C31.2547 7.14878 32.8231 10.1115 33.2298 13.3333ZM4.99984 16.6667V23.3333H6.6665V16.6667H4.99984ZM33.3332 16.6667V23.3333H34.9998V16.6667H33.3332ZM12.9332 26.3083L14.6998 23.4817C16.2883 24.4767 18.1254 25.003 19.9998 25C21.8742 25.003 23.7114 24.4767 25.2998 23.4817L27.0665 26.3083C24.9486 27.6352 22.4991 28.3372 19.9998 28.3333C17.5006 28.3372 15.0511 27.6352 12.9332 26.3083Z" stroke="none" fill="#BD072B"/></svg>
            Обучение с работой на аукционах Manheim, Copart, Insurance (IAAI).
        </div>
        <div class="item">
            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.0002 3.33325C29.2052 3.33325 36.6668 10.7949 36.6668 19.9999C36.6668 23.9999 35.2568 27.6733 32.9068 30.5466L32.9635 30.6066L30.6068 32.9633L30.5468 32.9066C27.5729 35.3436 23.8451 36.6726 20.0002 36.6666C10.7952 36.6666 3.3335 29.2049 3.3335 19.9999C3.3335 10.7949 10.7952 3.33325 20.0002 3.33325ZM6.66683 19.9999C6.66679 22.4948 7.36674 24.9396 8.68711 27.0565C10.0075 29.1733 11.8953 30.8773 14.1359 31.9746C16.3765 33.0719 18.88 33.5185 21.3619 33.2637C23.8437 33.0089 26.2042 32.0629 28.1752 30.5333L24.2168 26.5733C23.9265 26.6356 23.6304 26.6669 23.3335 26.6666H21.6668V29.9999H18.3335V26.6666H14.1668V23.3333H23.3335C23.5417 23.3336 23.7426 23.256 23.8965 23.1157C24.0504 22.9754 24.1461 22.7826 24.165 22.5752C24.1838 22.3678 24.1243 22.1609 23.9981 21.9952C23.872 21.8295 23.6884 21.717 23.4835 21.6799L23.3335 21.6666H16.6668C15.9354 21.6666 15.2169 21.474 14.5835 21.1083C13.9501 20.7426 13.4242 20.2166 13.0585 19.5832C12.6928 18.9498 12.5003 18.2313 12.5003 17.4999C12.5003 16.7685 12.6928 16.05 13.0585 15.4166L9.46516 11.8233C7.64647 14.1604 6.66147 17.0385 6.66683 19.9999ZM20.0002 6.66659C16.9202 6.66659 14.0835 7.71159 11.8252 9.46659L15.7835 13.4249C16.0739 13.3631 16.37 13.3324 16.6668 13.3333H18.3335V9.99992H21.6668V13.3333H25.8335V16.6666H16.6668C16.4586 16.6662 16.2577 16.7438 16.1039 16.8841C15.95 17.0244 15.8542 17.2172 15.8354 17.4246C15.8166 17.632 15.8761 17.8389 16.0022 18.0046C16.1283 18.1703 16.3119 18.2828 16.5168 18.3199L16.6668 18.3333H23.3335C24.0649 18.3333 24.7834 18.5258 25.4168 18.8915C26.0502 19.2572 26.5762 19.7832 26.9419 20.4166C27.3075 21.05 27.5001 21.7686 27.5001 22.4999C27.5001 23.2313 27.3075 23.9498 26.9418 24.5833L30.5352 28.1749C32.0649 26.2039 33.0109 23.8432 33.2657 21.3612C33.5204 18.8792 33.0736 16.3756 31.9761 14.1349C30.8786 11.8942 29.1744 10.0064 27.0573 8.6862C24.9402 7.36596 22.4952 6.66624 20.0002 6.66659Z" stroke="none" fill="#BD072B"/></svg>
            Только у нас Carfax всего по 1 доллару !
        </div>
        <div class="item">
            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.0002 36.6666C10.7952 36.6666 3.3335 29.2049 3.3335 19.9999C3.3335 10.7949 10.7952 3.33325 20.0002 3.33325C29.2052 3.33325 36.6668 10.7949 36.6668 19.9999C36.6668 29.2049 29.2052 36.6666 20.0002 36.6666ZM16.1835 32.7783C14.5392 29.2904 13.5866 25.5169 13.3785 21.6666H6.77016C7.09447 24.2314 8.1567 26.6469 9.82778 28.6194C11.4989 30.592 13.7069 32.0368 16.1835 32.7783ZM16.7168 21.6666C16.9685 25.7316 18.1302 29.5499 20.0002 32.9199C21.9207 29.4608 23.0426 25.6157 23.2835 21.6666H16.7168ZM33.2302 21.6666H26.6218C26.4137 25.5169 25.4611 29.2904 23.8168 32.7783C26.2935 32.0368 28.5015 30.592 30.1726 28.6194C31.8436 26.6469 32.9059 24.2314 33.2302 21.6666ZM6.77016 18.3333H13.3785C13.5866 14.4829 14.5392 10.7094 16.1835 7.22159C13.7069 7.96305 11.4989 9.40784 9.82778 11.3804C8.1567 13.353 7.09447 15.7684 6.77016 18.3333ZM16.7185 18.3333H23.2818C23.0414 14.3843 21.9201 10.5391 20.0002 7.07992C18.0796 10.539 16.9578 14.3841 16.7168 18.3333H16.7185ZM23.8168 7.22159C25.4611 10.7094 26.4137 14.4829 26.6218 18.3333H33.2302C32.9059 15.7684 31.8436 13.353 30.1726 11.3804C28.5015 9.40784 26.2935 7.96305 23.8168 7.22159Z" stroke="none" fill="#BD072B"/></svg>
            Помощь в продаже ваших и клиентских машин. Разместим объявления на всех автопорталах и досках объявлений.
        </div>
    </div>
</div>
<!-- ///:end/// -->

<!-- ///ВИДЕО И КОНТЕНТ ОПИСАНИЯ ЛК/// -->
<div class="section-text container">
    <div class="ratio">
        <iframe src="https://www.youtube.com/embed/O6jHA1o9xYk" loading=lazy title="youtube" allowfullscreen></iframe>
    </div>
    <div class="h2 text-center"><span class="color-red">Особливості вибору автомобілів</span><br> <span class="color-blue">із США для вигідною розмитнення</span></div>
    <p>Американці намагаються міняти автомобілі кожні три роки, пересідаючи на більш нові та сучасні версії. На відміну від України, у них немає вільного ринку з продажу авто, і машину з пробігом здають на аукціон. Там лоту призначається мінімальна ціна (іноді пару десятків доларів), після чого починаються торги. У підсумку, покупка машин на такому аукціоні і доставка автомобілів із США в Україну стала дуже затребуваною і цією послугою користуються тисячі покупців в рік.</p>
    <p>Наша компанія Bexhill Trading Auto моніторить аукціони авто в США і допоможе підібрати для вас підходящий автомобіль. Ми розрахуємо вартість доставки до Одеси, Києва, Харкова чи будь-який інший місто, переправимо вантаж, допоможемо оформити всі необхідні документи.</p>
    <br>
    <br>
    <br>
</div>
<!-- ///:end/// -->

<!-- ///СТАТИ ПАРТНЕРОМ/// -->
<div class="partner-form container">
    <div class="main-title noline">Стати партнером <span class="color-blue">Bexhill Trading Auto</span></div>
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
        <button class="btn" type="submit">Надiслати запит</button>
    </form>
</div>
<!-- ///:end/// -->

<!-- ///ПОПУЛЯРНІ МАРКИ АВТО/// -->
<div class="popular-brands">
    <div class="container">
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
        <h3>Почему ввоз <span class="color-red">авто из США?</span></h3>
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