@extends('layouts.app')

@section('title', 'Гарантії')

@push('styles')
    <link rel="stylesheet" href="{{ mix('css/about.css') }}">
@endpush

@push('scripts')
    <script src="{{ mix('js/about.js') }}" defer></script>
@endpush

@section('content')

<!-- ///ХЛЕБНЫЕ КРОШКИ/// -->
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Bex Auto</a></li>
            <li class="breadcrumb-item"><a href="/">Про компанiю</a></li>
            <li class="breadcrumb-item" aria-current="page">Про нас</li>
        </ol>
    </nav>
</div>
<!-- ///:end/// -->

<!-- ///ПРО НАС/// -->
<div class="about">
    <div class="container">
        <h1 class="h1 color-red text-center">BEX AUTO</h1>
        <h2 class="main-title text-center noline">Поставляємо авто з <span class="color-red">Кореї</span>, <span class="color-red">США</span> та нові електромобілі</h2>
        <div class="img">
            <picture>
                <source type="image/webp" srcset="{{ asset('img/map_mob.webp') }}" media="(max-width: 767px)">
                <source type="image/webp" srcset="{{ asset('img/map.webp') }}" media="(min-width: 768px)">
                <img width="1364" height="378" src="{{ asset('img/map.png') }}" alt="">
            </picture>
        </div>
    </div>
</div>
<!-- ///:end/// -->

<!-- ///ОФІЦІЙНИЙ ПАРТНЕР/// -->
<div class="section-partners">
    <div class="container">
        <div class="main-title text-center noline"><span class="color-red">"Bex Auto"</span> – офіційний партнер американських та корейских аукціонів!</div>
        <p class="text-center">Ми – команда професіоналів, котрі люблять свою справу! Наше завдання – підібрати для клієнта вигідний варіант автомобіля чи іншої техніки за доступною ціною!</p>
        <div class="text-center">
            <picture>
                <source type="image/webp" srcset="{{ asset('img/example/img_8.webp') }}">
                <img width="548" height="92" src="{{ asset('img/example/img_8.png') }}" loading="lazy" alt="">
            </picture>
        </div>
    </div>
</div>
<!-- ///:end/// -->

<div class="text-page text-center">
    <br>
    <br>
    <br>
    <p>Компанія працює без посередників на всіх етапах транспортування. Надаємо комплекс послуг від підбору автомобіля на аукціоні в США та Кореї до видачі ключів відремонтованого авто на українській реєстрації.</p>
</div>

<!-- ///СОТРУДНИЧЕСТВО ДЛЯ ОПТОВЫХ КЛИЕНТОВ/// -->
<div class="section-cooperation container">
    <div class="main-title text-center">
        <span class="color-red">Будуй свій бізнес з нами!</span>
        <div class="h3">Надаємо партнерську програму для тих, хто хоче стати дилером авто з США та Кореї. </div>
    </div>
    <div class="list">
        <div class="item">
            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.9987 36.6666C10.7937 36.6666 3.33203 29.2049 3.33203 19.9999C3.33203 10.7949 10.7937 3.33325 19.9987 3.33325C29.2037 3.33325 36.6654 10.7949 36.6654 19.9999C36.6654 29.2049 29.2037 36.6666 19.9987 36.6666ZM19.9987 33.3333C23.5349 33.3333 26.9263 31.9285 29.4268 29.428C31.9273 26.9275 33.332 23.5361 33.332 19.9999C33.332 16.4637 31.9273 13.0723 29.4268 10.5718C26.9263 8.07134 23.5349 6.66659 19.9987 6.66659C16.4625 6.66659 13.0711 8.07134 10.5706 10.5718C8.07012 13.0723 6.66536 16.4637 6.66536 19.9999C6.66536 23.5361 8.07012 26.9275 10.5706 29.428C13.0711 31.9285 16.4625 33.3333 19.9987 33.3333ZM14.1654 23.3333H23.332C23.553 23.3333 23.765 23.2455 23.9213 23.0892C24.0776 22.9329 24.1654 22.7209 24.1654 22.4999C24.1654 22.2789 24.0776 22.0669 23.9213 21.9107C23.765 21.7544 23.553 21.6666 23.332 21.6666H16.6654C15.5603 21.6666 14.5005 21.2276 13.7191 20.4462C12.9377 19.6648 12.4987 18.605 12.4987 17.4999C12.4987 16.3949 12.9377 15.335 13.7191 14.5536C14.5005 13.7722 15.5603 13.3333 16.6654 13.3333H18.332V9.99992H21.6654V13.3333H25.832V16.6666H16.6654C16.4444 16.6666 16.2324 16.7544 16.0761 16.9107C15.9198 17.0669 15.832 17.2789 15.832 17.4999C15.832 17.7209 15.9198 17.9329 16.0761 18.0892C16.2324 18.2455 16.4444 18.3333 16.6654 18.3333H23.332C24.4371 18.3333 25.4969 18.7722 26.2783 19.5536C27.0597 20.335 27.4987 21.3949 27.4987 22.4999C27.4987 23.605 27.0597 24.6648 26.2783 25.4462C25.4969 26.2276 24.4371 26.6666 23.332 26.6666H21.6654V29.9999H18.332V26.6666H14.1654V23.3333Z" fill="#E53934"/></svg>
            Конкурентоспроможні ціни
        </div>
        <div class="item">
            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M33.3346 36.6667H30.0013V33.3334C30.0013 32.0073 29.4745 30.7356 28.5368 29.7979C27.5992 28.8602 26.3274 28.3334 25.0013 28.3334H15.0013C13.6752 28.3334 12.4034 28.8602 11.4658 29.7979C10.5281 30.7356 10.0013 32.0073 10.0013 33.3334V36.6667H6.66797V33.3334C6.66797 31.1233 7.54594 29.0037 9.10875 27.4409C10.6715 25.8781 12.7912 25.0001 15.0013 25.0001H25.0013C27.2114 25.0001 29.3311 25.8781 30.8939 27.4409C32.4567 29.0037 33.3346 31.1233 33.3346 33.3334V36.6667ZM20.0013 21.6667C18.6881 21.6667 17.3877 21.4081 16.1745 20.9055C14.9612 20.403 13.8588 19.6664 12.9302 18.7378C12.0016 17.8092 11.2651 16.7068 10.7625 15.4936C10.26 14.2803 10.0013 12.98 10.0013 11.6667C10.0013 10.3535 10.26 9.05317 10.7625 7.83991C11.2651 6.62666 12.0016 5.52427 12.9302 4.59568C13.8588 3.66709 14.9612 2.9305 16.1745 2.42795C17.3877 1.92541 18.6881 1.66675 20.0013 1.66675C22.6535 1.66675 25.197 2.72032 27.0724 4.59568C28.9477 6.47104 30.0013 9.01458 30.0013 11.6667C30.0013 14.3189 28.9477 16.8625 27.0724 18.7378C25.197 20.6132 22.6535 21.6667 20.0013 21.6667ZM20.0013 18.3334C21.7694 18.3334 23.4651 17.631 24.7153 16.3808C25.9656 15.1306 26.668 13.4349 26.668 11.6667C26.668 9.89864 25.9656 8.20294 24.7153 6.9527C23.4651 5.70246 21.7694 5.00008 20.0013 5.00008C18.2332 5.00008 16.5375 5.70246 15.2873 6.9527C14.037 8.20294 13.3346 9.89864 13.3346 11.6667C13.3346 13.4349 14.037 15.1306 15.2873 16.3808C16.5375 17.631 18.2332 18.3334 20.0013 18.3334Z" fill="#E53934"/></svg>
            Особистий кабінет для замовлення та відстежування авто
        </div>
        <div class="item">
            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.305 4.71008L20 1.66675L33.695 4.71008C34.0651 4.79235 34.3961 4.99836 34.6334 5.29409C34.8706 5.58982 34.9999 5.95761 35 6.33675V22.9817C34.9999 24.628 34.5933 26.2487 33.8165 27.7001C33.0396 29.1515 31.9164 30.3886 30.5467 31.3017L20 38.3334L9.45333 31.3017C8.08379 30.3888 6.96077 29.1519 6.18391 27.7008C5.40706 26.2498 5.00039 24.6294 5 22.9834V6.33675C5.00007 5.95761 5.1294 5.58982 5.36665 5.29409C5.6039 4.99836 5.93489 4.79235 6.305 4.71008ZM8.33333 7.67341V22.9817C8.33335 24.0792 8.60429 25.1596 9.1221 26.1272C9.63991 27.0948 10.3886 27.9196 11.3017 28.5284L20 34.3284L28.6983 28.5284C29.6112 27.9198 30.3597 27.0952 30.8775 26.128C31.3953 25.1607 31.6664 24.0806 31.6667 22.9834V7.67341L20 5.08341L8.33333 7.67341Z" fill="#E53934"/></svg>
            Гарантії на послуги компанії
        </div>
    </div>
</div>
<!-- ///:end/// -->

<div class="text-page">
    <h3 class="h3">Особистий кабінет клієнта Bex Auto дозволяє:</h3>
    <ul>
        <li>Відслідковувати авто під час доставки в Україну</li>
        <li>Контролювати стан авто на всіх авто</li>
        <li>Здійснювати оплату та відслідковувати оплати</li>
        <li>Оплачувати аукціони</li>
    </ul>
</div>

<!-- ///ЧОМУ НАС ОБРАЛИ/// -->
<div class="section-advantages">
    <div class="container">
        <div class="main-title text-center color-red noline">
            З нами просто, прозоро та легко! 
            <span class="color-gray-xs">Bex Auto – імпортер автомобілів №1</span>
        </div>
    </div>
    <div class="img">
        <picture>
            <source type="image/webp" srcset="{{ asset('img/section-advantages.webp') }}">
            <img width="1154" height="330" src="{{ asset('img/section-advantages.png') }}" alt="" loading="lazy">
        </picture>
    </div>
    <div class="advantages-list">
        <div class="container">
            <div class="item">
                <div class="title">500+</div>
                <p>Куплених авто щомісяця</p>
            </div>
            <div class="item">
                <div class="title">14</div>
                <p>Рокiв досвiду</p>
            </div>
            <div class="item">
                <div class="title">10 000+</div>
                <p>Задоволених клієнтів</p>
            </div>
            <div class="item">
                <div class="title">5 000+</div>
                <p>Позитивних відгуків</p>
            </div>
        </div>
    </div>
</div>
<!-- ///:end/// -->

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

<!-- ///ОТРИМУЙ ПЕРШИМ ВИГІДНІ ПРОПОЗИЦІЇ АВТО/// -->
<div class="section-social">
    <div class="container">
        <picture class="img hidden-sm">
            <source type="image/webp" srcset="{{ asset('img/section-social.webp') }}">
            <img width="855" height="604" src="{{ asset('img/section-social.png') }}" loading="lazy" alt="">
        </picture>
        <div class="text">
            <div class="main-title noline">Отримуй першим вигідні<br> <span class="color-red">пропозиції авто!</span></div>
            <p>Публікуємо розрахунки вартості, відеоогляди<br> та відгуки клієнтів в наших спільнотах.</p>
            <picture class="img visible-sm">
                <source type="image/webp" srcset="{{ asset('img/section-social-mob.webp') }}">
                <img width="855" height="604" src="{{ asset('img/section-social-mob.png') }}" loading="lazy" alt="">
            </picture>
            <div class="social-list">
                <a href="#" aria-label="telegram">
                    <svg width="27" height="25"><use xlink:href="#telegram-icon"></use></svg>
                </a>
                <a href="#" aria-label="tiktok">
                    <svg width="23" height="29"><use xlink:href="#tiktok-icon"></use></svg>
                </a>
                <a href="#" aria-label="viber">
                    <svg width="24" height="28"><use xlink:href="#viber-icon"></use></svg>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- ///:end/// -->

<!-- ///СТАТИ ПАРТНЕРОМ/// -->
<div class="partner-form container">
    <div class="main-title noline text-center">Стати партнером <span class="color-red">Bex Auto</span></div>
    <form class="form" action="#" novalidate autocomplete="off">
        <strong class="title text-center">Вкажіть ваш телефон та наш менеджер зв'яжеться з вами</strong>
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

<!-- ///SEO - ТЕКСТ/// -->
<div class="section-seo container">
    <div class="seo-inner">
        <h2 class="main-title noline"> <span class="hidden-xs">Компания</span> <span class="color-red">Bex Auto</span> – автомобили из США</h2>
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
@endsection