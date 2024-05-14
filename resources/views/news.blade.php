@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ mix('css/news.css') }}">
@endpush

@push('scripts')
    <script src="{{ mix('js/news.js') }}" defer></script>
@endpush

@section('content')

    {{-- Breadcrumbs --}}
    {{ Breadcrumbs::render() }}

    {{-- News list --}}
    @livewire('news-list')

    {{-- Faqs --}}
    @include('partials.index.faq')

    {{-- Seo text --}}
    @include('partials.index.seo-text')

    {{-- Order a calculation form --}}
    @include('partials.index.order-a-calculation')

    {{-- Popular auto brand --}}
    @include('partials.index.popular-brand-auto')

@endsection
