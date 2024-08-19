@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ mix('css/index.css') }}">
@endpush

@section('content')

    @include('partials.sitemap.links')

@endsection

