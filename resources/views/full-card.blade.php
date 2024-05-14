@extends('layouts.app')

@section('title', 'Kia Sorento 2015')

@push('styles')
    <link rel="stylesheet" href="{{ mix('css/new-card.css') }}">
@endpush

@push('scripts')
    <script src="{{ mix('js/new-card.js') }}" defer></script>
@endpush

@section('content')
    {{-- Breadcrumbs --}}
    {{ Breadcrumbs::render() }}

    <!-- ///КАРТОЧКА ТОВАРА/// -->
    @livewire('equipment-template', compact('car'))
    <!-- ///:end/// -->

    {{-- Popular cars --}}
    @include('partials.index.cars-expected', ['cars' => $popularCars, 'title' => \Illuminate\Support\Facades\Lang::get('category.title'), 'more' => false])

    {{-- Faqs --}}
    @include('partials.index.faq')

    {{-- Seo text --}}
    @include('partials.index.seo-text')

    {{-- Order a calculation form --}}
    @include('partials.index.order-a-calculation')

    {{-- Popular auto brand --}}
    @include('partials.index.popular-brand-auto')

    {{-- Modal form for application for a car --}}
    <livewire:forms.application-for-car :car="$car->title"/>
    <livewire:forms.application-for-credit :car="$car->title"/>

@endsection
