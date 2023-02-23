@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ mix('css/index.css') }}">
@endpush

@section('title', 'Все страницы')

@section('header-class', 'header-br')

@push('scripts')
    <script src="{{ mix('js/index.js') }}"></script>
@endpush

@section('content')
    <div class="container">
        <div class="main-wrap">
            <div>
                <br>
                <br>
                <ul>
                    <li><a target="_blank" href="{{ route('html.index') }}">Головна</a></li>
                    <li><a target="_blank" href="{{ route('html.catalog') }}">Каталог</a></li>
                    <li><a target="_blank" href="{{ route('html.card') }}">Карточка товару</a></li>
                    <li><a target="_blank" href="{{ route('html.new-card') }}">Розгорнута Карточка товару</a></li>
                    <li><a target="_blank" href="{{ route('html.dealer-services') }}">Дiлерськi послуги</a></li>
                    <li><a target="_blank" href="{{ route('html.new-elektromobili') }}">Нові Електрокари</a></li>
                    <li><a target="_blank" href="{{ route('html.elektromobili') }}">Електрокари</a></li>
                    <li><a target="_blank" href="{{ route('html.delivery') }}">Доставка авто з США в Україну</a></li>
                    <li><a target="_blank" href="{{ route('html.news') }}">Новини</a></li>
                    <li><a target="_blank" href="{{ route('html.article') }}">Сторінка новини</a></li>
                    <li><a target="_blank" href="{{ route('html.contacts') }}">Контакти</a></li>
                    <li><a target="_blank" href="{{ route('html.guarantee') }}">Гарантії</a></li>
                    <li><a target="_blank" href="{{ route('html.thanks-order') }}">Спасибо за заявку</a></li>
                    <li><a target="_blank" href="{{ route('html.search') }}">Результаты поиска</a></li>
                    <li><a target="_blank" href="{{ route('html.about') }}">Про нас</a></li>
                </ul>
                <br>
                <br>
                <br>
            </div>
        </div>
    </div>
@endsection

<style>
    .main-wrap ul li {
        margin-bottom: 20px;
    }
    .main-wrap ul li a{
        font-size: 20px;
        font-weight: bold;
    }
</style>