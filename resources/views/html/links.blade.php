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
                    <li><a target="_blank" href="{{ route('html.index') }}">Главная</a></li>
                    <li><a target="_blank" href="{{ route('html.catalog') }}">Каталог</a></li>
                    <li><a target="_blank" href="{{ route('html.card') }}">Карточка товара</a></li>
                </ul>
                <br>
                <br>
                <br>
            </div>
        </div>
    </div>
@endsection

<style>
    ul li {
        margin-bottom: 20px;
    }
    ul li a{
        font-size: 20px;
        font-weight: bold;
    }
</style>