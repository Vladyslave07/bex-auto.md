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

{{-- Form --}}
@if(App\Models\Domain::currentDomain()?->slug == App\Models\Domain::DEFAULT_SLUG_DOMAIN)
    @if($service->form_slug == \App\Http\Livewire\Forms\CallBack::SLUG_FORM)
        <livewire:forms.call-back :title="Setting::get('application_for_coop_title')" :btnText="Lang::get('service.form_btn')">
    @endif
    @if($service->form_slug == \App\Http\Livewire\Forms\AutoForZsu::SLUG_FORM)
        <livewire:forms.auto-for-zsu :title="Setting::get('application_for_coop_title')" :btnText="Lang::get('service.form_btn')">
    @endif
@else
    <livewire:forms.call-back :title="Setting::get('application_for_coop_title')" :btnText="Lang::get('service.form_btn')">
@endif

{{-- Youtube video --}}
@include('partials.service.youtube')

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
