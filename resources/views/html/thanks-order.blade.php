@extends('layouts.app')

@section('title', 'Спасибо за заявку!')

@push('styles')
    <link rel="stylesheet" href="{{ mix('css/thanks-order.css') }}">
@endpush

@push('scripts')
    <script src="{{ mix('js/thanks-order.js') }}" defer></script>
@endpush

@section('content')

<div class="section-thanks container">
    <picture>
        <source type="image/webp" srcset="/img/envelope.webp">
        <img width="167" height="122" src="/img/envelope.png" alt="">
    </picture>
    <h1 class="main-title noline color-red">Спасибо за заявку!</h1>
    <div class="text">Наш менеджер свяжется с вами в ближайшее время.<br> А пока можете посмотреть отзывы наших клиентов</div>
    <div class="btns">
        <a href="#" class="btn">Каталог авто</a>
        <a href="#" class="btn btn-blue">Отзывы клиентов</a>
    </div>
    <div class="social-list">
        <a href="#" aria-label="telegram">
            <svg width="18" height="17"><use xlink:href="#telegram-icon"></use></svg>
        </a>
        <a href="#" aria-label="tiktok">
            <svg width="16" height="19"><use xlink:href="#tiktok-icon"></use></svg>
        </a>
        <a href="#" aria-label="viber">
            <svg width="16" height="18"><use xlink:href="#viber-icon"></use></svg>
        </a>
    </div>
</div>

@endsection