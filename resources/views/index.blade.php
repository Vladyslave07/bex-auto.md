@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ mix('css/index.css') }}">
@endpush

@push('scripts')
    <script src="{{ mix('js/index.js') }}" defer></script>
@endpush

@section('content')

{{-- Banner --}}
@include('partials.banner.banner')

{{-- Call back form --}}
@livewire('forms.call-back')

{{-- Auto in stock --}}
@include('partials.index.cars-in-stock')

{{-- Expected cars --}}
@include('partials.index.cars-expected',
    [
        'cars' => $expectedCars,
        'title' => \Illuminate\Support\Facades\Lang::get('car.' . \App\Models\Car::EXPECTED_STATUS),
        'more' => true
    ]
)

<hr class="hr mb-1">

{{-- Popular requests --}}
@include('partials.index.popular-requests')

{{-- Buy and delivery auto block --}}
@include('partials.index.buy-and-delivery-auto')

{{-- Offers soc. --}}
@include('partials.index.offer')

{{-- Official partner --}}
@include('partials.index.partner')

{{-- Services --}}
@include('partials.index.services')

{{-- Reviews --}}
@include('partials.index.reviews')

{{-- Why we --}}
@include('partials.index.why-we')

{{-- Popular auto brand --}}
@include('partials.index.popular-brand-auto')

{{-- Faqs --}}
@include('partials.index.faq')

{{-- Seo text --}}
@include('partials.index.seo-text')

{{-- Order a calculation form --}}
@include('partials.index.order-a-calculation')

@endsection

@push('scripts')
    <!-- TODO:Времмены код -->
    <script>
        document.addEventListener('livewire:load', function () {
            document.querySelectorAll('form').forEach((el) => {
                el.addEventListener('submit', (e) => {
                    e.target.querySelectorAll('[required]').forEach(el => {
                        el.classList.remove('is-invalid');
                        if (el.value == '') {
                            el.classList.add('is-invalid');
                        }
                    });
                    e.preventDefault();
                });
            });
        });
    </script>
@endpush