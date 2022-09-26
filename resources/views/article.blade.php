@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ mix('css/article.css') }}">
@endpush

@push('scripts')
    <script src="{{ mix('js/article.js') }}" defer></script>
@endpush

@section('content')

    {{-- Breadcrumbs --}}
    {{ Breadcrumbs::render() }}

    {{-- Article content --}}
    @include('partials.article.content')

    {{-- Popular auto brand --}}
    @include('partials.index.popular-brand-auto')

    {{-- Faqs --}}
    @include('partials.index.faq')

    {{-- Seo text --}}
    @include('partials.index.seo-text')

    {{-- Order a calculation form --}}
    @include('partials.index.order-a-calculation')
@endsection