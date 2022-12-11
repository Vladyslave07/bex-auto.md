@extends('layouts.app')

@section('title', 'Гарантії')

@push('styles')
    <link rel="stylesheet" href="{{ mix('css/about.css') }}">
@endpush

@push('scripts')
    <script src="{{ mix('js/about.js') }}" defer></script>
@endpush

@section('content')

    {{-- Breadcrumbs --}}
    {{ Breadcrumbs::render() }}

    {{-- Banner --}}
    @include('partials.about.banner')

    {{-- Official partner --}}
    @include('partials.index.partner')

    @include('partials.about.under_auction_text')

    {{-- For clients --}}
    @include('partials.about.opt_clients')

    {{-- Cabinet --}}
    @include('partials.about.cabinet')

    {{-- Why we --}}
    @include('partials.about.why_we')

    {{-- select site lang --}}
    <x-branches></x-branches>

    {{-- Offers soc. --}}
    @include('partials.index.offer')

    {{-- Become partner --}}
    @include('partials.service.become_partner')

    {{-- Seo text --}}
    @include('partials.index.seo-text', ['seoText' => \App\Models\SeoText::aboutSeoText()])

@endsection