@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ mix('css/about.css') }}">
@endpush

@push('scripts')
    <script src="{{ mix('js/about.js') }}" defer></script>
@endpush

@section('content')

    {{-- Breadcrumbs --}}
    {{ Breadcrumbs::render() }}

    {{-- Seo text --}}
    <div class="container">
        {!! \App\Models\SeoText::seoTextBySlug(\App\Models\SeoText::PRIVACY_SEO_TEXT_SLUG)->text !!}
    </div>

@endsection
