@extends('layouts.app')

@section('title', 'Гарантії')

@push('styles')
    <link rel="stylesheet" href="{{ mix('css/about.css') }}">
@endpush

@push('scripts')
    <script src="{{ mix('js/about.js') }}" defer></script>
@endpush

@section('content')

    {{-- Breadcrumbs --}}
    {{ Breadcrumbs::render() }}

    {{-- Banner --}}
    @include('partials.about.banner')

    {{-- Official partner --}}
    @include('partials.index.partner')

    @include('partials.about.under_auction_text')

    {{-- For clients --}}
    @include('partials.about.opt_clients')

    {{-- Cabinet --}}
    @include('partials.about.cabinet')

    {{-- Why we --}}
    @include('partials.about.why_we')

<!-- ///Наші філії/// -->
<div class="section-branches container">
    <div class="main-title text-center">Наші філії</div>
    <div class="nav-tabs">
        <span class="nav-link active" data-toggle="tab" data-target="#brancheTab_1">Украина</span>
        <span class="nav-link" data-toggle="tab" data-target="#brancheTab_2">Казахстан</span>
        <span class="nav-link" data-toggle="tab" data-target="#brancheTab_3">США</span>
        <span class="nav-link" data-toggle="tab" data-target="#brancheTab_4">Корея</span>
    </div>
    <div class="tab-content">
        <div id="brancheTab_1" class="tab-pane active">
            <div class="swiper-wrap">
                <ul class="contacts">
                    <li>
                        <div class="color-red">Одесса</div>
                        Атамана Головатого, 147
                        <a href="tel:380503816952">+38 (050) 381 69 52</a>
                    </li>
                    <li>
                        <div class="color-red">Графік роботы: </div>
                        <p>Пн-Пт с 09:00 до 20:00</p>
                        <p>Сб-Вс с 09:00 до 18:00.</p>
                    </li>
                </ul>
                <div class="swiper branches-swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <picture>
                                <source type="image/webp" srcset="{{ asset('img/example/img_41.webp') }}">
                                <img width="100%" height="100%" src="{{ asset('img/example/img_41.png') }}" loading="lazy" alt="">
                            </picture>
                        </div>
                        <div class="swiper-slide">
                            <picture>
                                <source type="image/webp" srcset="{{ asset('img/example/img_42.webp') }}">
                                <img width="100%" height="100%" src="{{ asset('img/example/img_42.png') }}" loading="lazy" alt="">
                            </picture>
                        </div>
                        <div class="swiper-slide">
                            <picture>
                                <source type="image/webp" srcset="{{ asset('img/example/img_43.webp') }}">
                                <img width="100%" height="100%" src="{{ asset('img/example/img_43.png') }}" loading="lazy" alt="">
                            </picture>
                        </div>
                        <div class="swiper-slide">
                            <picture>
                                <source type="image/webp" srcset="{{ asset('img/example/img_44.webp') }}">
                                <img width="100%" height="100%" src="{{ asset('img/example/img_44.png') }}" loading="lazy" alt="">
                            </picture>
                            <span class="more toggle-btn">+2 фото</span>
                        </div>
                        <div class="swiper-slide">
                            <picture>
                                <source type="image/webp" srcset="https://via.placeholder.com/768x365">
                                <img width="100%" height="100%" src="https://via.placeholder.com/768x365" loading="lazy" alt="">
                            </picture>
                        </div>
                        <div class="swiper-slide">
                            <picture>
                                <source type="image/webp" srcset="https://via.placeholder.com/550x365">
                                <img width="100%" height="100%" src="https://via.placeholder.com/550x365" loading="lazy" alt="">
                            </picture>
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
        <div id="brancheTab_2" class="tab-pane">
            <div class="swiper-wrap">
                <ul class="contacts">
                    <li>
                        <div class="color-red">Одесса</div>
                        Атамана Головатого, 147
                        <a href="tel:380503816952">+38 (050) 381 69 52</a>
                    </li>
                    <li>
                        <div class="color-red">Графік роботы: </div>
                        <p>Пн-Пт с 09:00 до 20:00</p>
                        <p>Сб-Вс с 09:00 до 18:00.</p>
                    </li>
                </ul>
                <div class="swiper branches-swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <picture>
                                <source type="image/webp" srcset="{{ asset('img/example/img_41.webp') }}">
                                <img width="100%" height="100%" src="{{ asset('img/example/img_41.png') }}" loading="lazy" alt="">
                            </picture>
                        </div>
                        <div class="swiper-slide">
                            <picture>
                                <source type="image/webp" srcset="{{ asset('img/example/img_42.webp') }}">
                                <img width="100%" height="100%" src="{{ asset('img/example/img_42.png') }}" loading="lazy" alt="">
                            </picture>
                        </div>
                        <div class="swiper-slide">
                            <picture>
                                <source type="image/webp" srcset="{{ asset('img/example/img_43.webp') }}">
                                <img width="100%" height="100%" src="{{ asset('img/example/img_43.png') }}" loading="lazy" alt="">
                            </picture>
                        </div>
                        <div class="swiper-slide">
                            <picture>
                                <source type="image/webp" srcset="{{ asset('img/example/img_44.webp') }}">
                                <img width="100%" height="100%" src="{{ asset('img/example/img_44.png') }}" loading="lazy" alt="">
                            </picture>
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
        <div id="brancheTab_3" class="tab-pane">
            <div class="swiper-wrap">
                <ul class="contacts">
                    <li>
                        <div class="color-red">Одесса</div>
                        Атамана Головатого, 147
                        <a href="tel:380503816952">+38 (050) 381 69 52</a>
                    </li>
                    <li>
                        <div class="color-red">Графік роботы: </div>
                        <p>Пн-Пт с 09:00 до 20:00</p>
                        <p>Сб-Вс с 09:00 до 18:00.</p>
                    </li>
                </ul>
                <div class="swiper branches-swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <picture>
                                <source type="image/webp" srcset="{{ asset('img/example/img_41.webp') }}">
                                <img width="100%" height="100%" src="{{ asset('img/example/img_41.png') }}" loading="lazy" alt="">
                            </picture>
                        </div>
                        <div class="swiper-slide">
                            <picture>
                                <source type="image/webp" srcset="{{ asset('img/example/img_42.webp') }}">
                                <img width="100%" height="100%" src="{{ asset('img/example/img_42.png') }}" loading="lazy" alt="">
                            </picture>
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
        <div id="brancheTab_4" class="tab-pane">
            <div class="swiper-wrap">
                <ul class="contacts">
                    <li>
                        <div class="color-red">Одесса</div>
                        Атамана Головатого, 147
                        <a href="tel:380503816952">+38 (050) 381 69 52</a>
                    </li>
                    <li>
                        <div class="color-red">Графік роботы: </div>
                        <p>Пн-Пт с 09:00 до 20:00</p>
                        <p>Сб-Вс с 09:00 до 18:00.</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- ///:end/// -->

    {{-- Offers soc. --}}
    @include('partials.index.offer')

    {{-- Become partner --}}
    @include('partials.service.become_partner')

    {{-- Seo text --}}
    @include('partials.index.seo-text', ['seoText' => \App\Models\SeoText::aboutSeoText()])

@endsection