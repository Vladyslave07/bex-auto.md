@extends('layouts.app')

@section('title', 'Kia Sorento 2015')

@push('styles')
    <link rel="stylesheet" href="{{ mix('css/card.css') }}">
@endpush

@push('scripts')
    <script src="{{ mix('js/card.js') }}" defer></script>
@endpush

@section('content')
<!-- ///ХЛЕБНЫЕ КРОШКИ/// -->
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Bexhill Trading Auto</a></li>
            <li class="breadcrumb-item"><a href="catalog">Авто из Кореи</a></li>
            <li class="breadcrumb-item" aria-current="page">Kia Sorento 2015</li>
        </ol>
    </nav>
</div>
<!-- ///:end/// -->

<!-- ///КАРТОЧКА ТОВАРА/// -->
@include('partials.card.card')
<!-- ///:end/// -->

{{-- Popular cars --}}
@include('partials.index.cars-expected', ['cars' => $popularCars, 'title' => \Illuminate\Support\Facades\Lang::get('category.title'), 'more' => false])

{{-- Popular auto brand --}}
@include('partials.index.popular-brand-auto')

{{-- Faqs --}}
@include('partials.index.faq')

{{-- Seo text --}}
@include('partials.index.seo-text')

{{-- Order a calculation form --}}
@include('partials.index.order-a-calculation')

@endsection