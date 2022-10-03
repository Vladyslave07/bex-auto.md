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
            <li class="breadcrumb-item"><a href="/">Bex Auto</a></li>
            <li class="breadcrumb-item" aria-current="page">результаты по запросу <span class="color-red">"Ford"</span></li>
        </ol>
    </nav>
</div>
<!-- ///:end/// -->

<!-- ///НАЗВАНИЕ РАЗДЕЛА/// -->
<div class="container">
    <h1 class="main-title text-center h1">Результаты по запросу <span class="color-red">"Ford"</span></h1>
</div>
<!-- ///:end/// -->

<!-- ///КАТАЛОГ/// -->
<div class="section-catalog container">
    <div class="catalog-wrap">
        <div class="catalog-grid">
            <div class="product-preview">
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
            <div class="product-preview">
                <div class="img">
                    <div class="icons">
                        <svg width="33" height="17"><use xlink:href="{{ asset('/img/icons/sprite.svg#electric') }}"></use></svg>
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
            <div class="product-preview">
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
            <div class="product-preview">
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
            <div class="product-preview">
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
            <div class="product-preview">
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
            <div class="product-preview">
                <div class="img">
                    <div class="icons">
                        <svg width="33" height="17"><use xlink:href="{{ asset('/img/icons/sprite.svg#electric') }}"></use></svg>
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