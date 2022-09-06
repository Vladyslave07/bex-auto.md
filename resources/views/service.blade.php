@extends('layouts.app')

@section('title', 'Дилерські послуги')

@push('styles')
    <link rel="stylesheet" href="{{ mix('css/delivery.css') }}">
    <link rel="stylesheet" href="{{ mix('css/dealer.css') }}">
@endpush

@push('scripts')
    <script src="{{ mix('js/dealer.js') }}" defer></script>
@endpush


@section('content')

{{-- Banner --}}
@include('partials.service.banner')

{{-- Call back form --}}
<livewire:forms.call-back :title="Lang::get('service.form_title')">

@if ($service->is_diller_page)

    {{-- Auto in stock --}}
    @include('partials.index.cars-in-stock')

    {{-- Official partner --}}
    @include('partials.index.partner')

    <hr class="hr mb-1">

    {{-- Benefits --}}
    @include('partials.service.benefits')

@endif

{{-- Youtube video --}}
@include('partials.service.youtube')

@if ($service->is_diller_page)

    {{-- Become partner --}}
    @include('partials.service.become_partner')

@endif

{{-- Seo text --}}
@include('partials.service.text')

{{-- Popular auto brand --}}
@include('partials.index.popular-brand-auto')

{{-- Faqs --}}
@include('partials.index.faq', ['faqs' => $service->faqs])

{{-- Seo text --}}
@include('partials.index.seo-text', ['seoText' => $service->seo_text])

{{-- Order a calculation form --}}
@include('partials.index.order-a-calculation')

@endsection