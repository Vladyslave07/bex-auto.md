@extends('layouts.app')

@section('title', 'Контакти')

@push('styles')
    <link rel="stylesheet" href="{{ mix('css/contacts.css') }}">
@endpush

@push('scripts')
    <script src="{{ mix('js/contacts.js') }}" defer></script>
    <script async defer src='https://maps.googleapis.com/maps/api/js?key=AIzaSyD52qrObUbkp2F2ZK3ZQ_ex5LBBLpdvylI&#038;callback=initMap'></script>
@endpush

@section('content')

<!-- ///ХЛЕБНЫЕ КРОШКИ/// -->
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Bexhill Trading Auto</a></li>
            <li class="breadcrumb-item"><a href="/">Про компанiю</a></li>
            <li class="breadcrumb-item" aria-current="page">Контакти</li>
        </ol>
    </nav>
</div>
<!-- ///:end/// -->

<!-- ///КОНТАКТИ/// -->
<div class="contacts container">
    <h1 class="main-title noline color-red">Контакти</h1>
    <div class="row">
        <div class="col">
            <ul>
                <li>
                    <div class="color-red">Київ</div>
                    Харківське шосе, 18
                    <a href="tel:380675503454">+38 (067) 550 34 54</a>
                </li>
                <li>
                    <div class="color-red">Харків</div>
                    Гімназійна набережна, 18
                    <a href="tel:380677123254">+38 (067) 712 32 54</a>
                </li>
                <li>
                    <div class="color-red">Одеса</div>
                    вул. Канатна, 83
                    <a href="tel:380674404610">+38 (067) 440 46 10</a>
                </li>
                <li>
                    <div class="color-red">Прокат</div>
                    Отамана Головатого 147
                    <a href="tel:380674707600">+38 (067) 47 07 600</a>
                </li>
                <li>
                    <div class="color-red">Днiпрo</div>
                    ул. Сирко, 140
                    <a href="tel:380633232910">+38 (063) 323 29 10</a>
                </li>
                <li>
                    <div class="color-red">Миколаїв</div>
                    пр-т. Центральний, 2б/1
                    <a href="tel:380675503510">+38 (067) 550 35 10</a>
                </li>
            </ul>
            <ul>
                <li>
                    <div class="color-red">Опт</div>
                    <a href="tel:380671565359" class="mt-0">+38 (067) 156 53 59</a>
                </li>
                <li>
                    <a href="mailto:welcome@bexhilltrading.net" class="contact-mail">welcome@bexhilltrading.net</a>
                </li>
                <li class="schedule">
                    <div class="color-red">График роботи компанії:</div>
                </li>
                <li class="schedule">
                    <span>Пн-Пт с 09:00 до 20:00</span>
                    <span>Сб-Вс с 09:00 до 18:00.</span>
                </li>
            </ul>
        </div>
        <div class="col">
            <div class="imgs">
                <picture>
                    <source type="image/webp" srcset="{{ asset('img/example/img_32.webp') }}">
                    <img width="320" height="187" src="{{ asset('img/example/img_32.png.png') }}" alt="">
                </picture>
                <picture>
                    <source type="image/webp" srcset="{{ asset('img/example/img_31.webp') }}">
                    <img width="320" height="187" src="{{ asset('img/example/img_31.png.png') }}" alt="">
                </picture>
            </div>
            <div id="map"></div>
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

@push('scripts')
    <script>
        var map;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 47.845335, lng: 30.6470585},
                zoom: 5,
                disableDefaultUI: true
            });
            var marker0 = new google.maps.Marker({
                position: {lat: 50.43456440000001, lng: 30.6303377},
                map: map,
                title: 'Харьковское шоссе, 18, Киев, Украина',
                icon: "{{ asset('img/map-marker.svg') }}"
            });
                var marker1 = new google.maps.Marker({
                position: {lat: 46.5183705, lng: 30.7236463},
                map: map,
                title: 'улица Атамана Головатого, 147, Одесса, Одесская область, Украина',
                icon: "{{ asset('img/map-marker.svg') }}"
            });
                var marker2 = new google.maps.Marker({
                position: {lat: 49.983665537901345, lng: 36.240420420231075},
                map: map,
                title: 'Червоношкільна набережна, 18, Харків, Харківська область, Украина, 61000',
                icon: "{{ asset('img/map-marker.svg') }}"
            });
                var marker4 = new google.maps.Marker({
                position: {lat: 46.5190304, lng: 30.7239056},
                map: map,
                title: 'улица Атамана Головатого, 147, Одесса, Одесская область, Украина',
                icon: "{{ asset('img/map-marker.svg') }}"
            });
		}
    </script>
@endpush