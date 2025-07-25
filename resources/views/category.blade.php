@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ mix('css/catalog.css') }}">
    <link rel="stylesheet" href="{{ mix('css/new-elektromobili.css') }}">
@endpush

@push('scripts')
    <script src="{{ mix('js/catalog.js') }}" defer></script>
@endpush

@section('content')

    {{-- Banner --}}
    @include('partials.category.banner')

    {{-- Title --}}
    @include('partials.category.title')
    <div class="section-catalog container">
        {{-- Tabs --}}
        @include('partials.category.tabs')

    <!-- ///КАТАЛОГ/// -->
        @livewire('category', compact('category', 'page'))
    </div>

    {{-- Popular cars --}}
    @include('partials.index.cars-expected', ['cars' => $popularCars, 'title' => Setting::get('popular_auto_title'), 'more' => false])

    {{-- Faqs --}}
    @include('partials.index.faq')

    {{-- Seo text --}}
    @include('partials.index.seo-text')

    {{-- Order a calculation form --}}
    @include('partials.index.order-a-calculation')

    {{-- Popular auto brand --}}
    @include('partials.index.popular-brand-auto')
@endsection
