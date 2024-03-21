@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ mix('css/card.css') }}">
@endpush

@push('scripts')
    <script src="{{ mix('js/card.js') }}" defer></script>
@endpush

@section('content')
{{-- Breadcrumbs --}}
{{ Breadcrumbs::render() }}

{{-- Car card --}}
@include('partials.card.card')

{{-- Popular cars --}}
@include('partials.index.cars-expected', ['cars' => $car->products, 'title' => \Illuminate\Support\Facades\Lang::get('car.product_block_title'), 'more' => false])

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


<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof fbq == 'funciton') {
            fbq('track', 'ViewContent', {
                    content_type: 'product',
                    content_ids: ['<?= $car->id ?>'],
                    value: <?= $car->price ?>,
                    currency: 'USD'
                }
            );
        }
    });
</script>

{{-- Modal form for application for a car --}}
<livewire:forms.application-for-car :car="$car"/>
<livewire:forms.application-for-credit :car="$car"/>

@endsection
