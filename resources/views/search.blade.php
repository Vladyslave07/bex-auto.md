@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ mix('css/catalog.css') }}">
@endpush

@push('scripts')
    <script src="{{ mix('js/catalog.js') }}" defer></script>
@endpush

@section('content')

    {{-- Breadcrumbs --}}
    {{ Breadcrumbs::render() }}

    {{-- Cars list --}}
    @livewire('search-page', ['q' => request()->get('q')])

    {{-- Popular cars --}}
    @include('partials.index.cars-expected', ['cars' => $popularCars, 'title' => Setting::get('popular_auto_title'), 'more' => false])

    {{-- Popular auto brand --}}
    @include('partials.index.popular-brand-auto')

    {{-- Faqs --}}
    @include('partials.index.faq')

    {{-- Order a calculation form --}}
    @include('partials.index.order-a-calculation')
@endsection
