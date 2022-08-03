@extends('layouts.app')

@section('title', 'Главная')

@push('styles')
    <link rel="stylesheet" href="{{ mix('css/index.css') }}">
@endpush

@push('scripts')
    <script src="{{ mix('js/index.js') }}" defer></script>
@endpush

@section('content')

{{-- Banner --}}
@include('partials.banner.banner')

{{-- Call back form --}}
@livewire('forms.call-back')

{{-- Auto in stock --}}
@include('partials.index.cars-in-stock')

{{-- Expected cars --}}
@include('partials.index.cars-expected')

<hr class="hr mb-1">

{{-- Popular requests --}}
@include('partials.index.popular-requests')

{{-- Buy and delivery auto block --}}
@include('partials.index.buy-and-delivery-auto')

{{-- Offers soc. --}}
@include('partials.index.offer')

{{-- Official partner --}}
@include('partials.index.partner')

{{-- Services --}}
@include('partials.index.services')

{{-- Reviews --}}
@include('partials.index.reviews')

{{-- Why we --}}
@include('partials.index.why-we')

{{-- Popular auto brand --}}
@include('partials.index.popular-brand-auto')

{{-- Faqs --}}
@include('partials.index.faq')

{{-- Seo text --}}
@include('partials.index.seo-text')

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
    <!-- TODO:Времмены код -->
    <script>
        document.addEventListener('livewire:load', function () {
            document.querySelectorAll('form').forEach((el) => {
                el.addEventListener('submit', (e) => {
                    e.target.querySelectorAll('[required]').forEach(el => {
                        el.classList.remove('is-invalid');
                        if (el.value == '') {
                            el.classList.add('is-invalid');
                        }
                    });
                    e.preventDefault();
                });
            });
        });
    </script>
@endpush