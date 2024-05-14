@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ mix('css/guarantee.css') }}">
@endpush

@push('scripts')
    <script src="{{ mix('js/guarantee.js') }}" defer></script>
@endpush

@section('content')

    {{-- Breadcrumbs --}}
    {{ Breadcrumbs::render() }}

    <!-- ///ГАРАНТІЇ/// -->
    <div class="guarantee">
        <div class="container">
            <h1 class="main-title noline color-red">@lang('static.guarantee.title')</h1>
            <div class="text-page">
                <h2 class="main-title text-center noline">
                    {{ Setting::get('guarantee_h1') }}
                </h2>
                <div class="width-fix">
                    <picture>
                        <source type="image/webp" srcset="{{ asset('img/example/img_34.webp') }}" media="(max-width: 767px)">
                        <source type="image/webp" srcset="{{ asset('img/example/img_33.webp') }}" media="(min-width: 768px)">
                        <img width="1177" height="257" src="{{ asset('img/example/img_33.png.png') }}" alt="">
                    </picture>
                </div>
                <h2 class="main-title noline color-red">
                    @lang('static.guarantee.for_auto')
                </h2>
                @php
                    $text = \App\Models\SeoText::seoTextBySlug('guarantee');
                @endphp

                {!! $text->text !!}

            </div>
        </div>
    </div>
    <!-- ///:end/// -->

    {{-- Faqs --}}
    @include('partials.index.faq')

    {{-- Seo text --}}
    @include('partials.index.seo-text')

    {{-- Order a calculation form --}}
    @include('partials.index.order-a-calculation')

    {{-- Popular auto brand --}}
    @include('partials.index.popular-brand-auto')

@endsection
