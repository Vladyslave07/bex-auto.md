@extends('layouts.app')

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
    <livewire:forms.call-back :title="Setting::get('application_for_coop_title')"
                              :btnText="Lang::get('service.form_btn')"
                              :dealerService="true">

    {{-- Countries --}}
    @include('partials.service.countries', ['countries' => $countries])

    {{-- Benefits --}}
    @include('partials.service.benefits')

    {{-- Youtube video --}}
    @include('partials.service.youtube')

    {{-- Become partner --}}
    @include('partials.service.become_partner', ['dealerService' => true])

    {{-- Seo text --}}
    @include('partials.service.text')

    {{-- Popular auto brand --}}
    @include('partials.index.popular-brand-auto')

    {{-- Faqs --}}
    @include('partials.index.faq', ['faqs' => $service->faqs])

    {{-- Employees --}}
    @include('partials.service.employees', ['employees' => $employees])

    {{-- Seo text --}}
    @include('partials.index.seo-text', ['seoText' => $service->seo_text])

    {{-- Order a calculation form --}}
    @include('partials.index.order-a-calculation', ['dealerService' => true])

@endsection
