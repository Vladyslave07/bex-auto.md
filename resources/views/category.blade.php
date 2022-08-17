@extends('layouts.app')

@section('title', 'Каталог')

@push('styles')
    <link rel="stylesheet" href="{{ mix('css/catalog.css') }}">
@endpush

@push('scripts')
    <script src="{{ mix('js/catalog.js') }}" defer></script>
@endpush

@section('content')

    {{-- Breadcrumbs --}}
    {{ Breadcrumbs::render() }}

    {{-- Title --}}
    @include('partials.category.title')
    <div class="section-catalog container">
        {{-- Tabs --}}
        @include('partials.category.tabs')

    <!-- ///КАТАЛОГ/// -->
        @livewire('category', compact('category', 'page'))
    </div>

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