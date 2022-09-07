@extends('layouts.app')

@section('title', 'Контакти')

@push('styles')
    <link rel="stylesheet" href="{{ mix('css/contacts.css') }}">
@endpush

@push('scripts')
    <script src="{{ mix('js/contacts.js') }}" defer></script>
    <script async defer src='https://maps.googleapis.com/maps/api/js?key=AIzaSyD52qrObUbkp2F2ZK3ZQ_ex5LBBLpdvylI&#038;callback=initMap'></script>
@endpush

@section('content')

    {{-- Breadcrumbs --}}
    {{ Breadcrumbs::render() }}

    @php
        $branches = \App\Models\Branch::branches();
    @endphp

    <!-- ///КОНТАКТИ/// -->
    <div class="contacts container">
        <h1 class="main-title noline color-red">@lang('static.contacts.breadcrumbs')</h1>
        <div class="row">
            <div class="col">
                <ul>
                    @foreach($branches as $branch)
                        <li>
                            <div class="color-red">{{ $branch->city }}</div>
                            {{ $branch->address }}
                            <a href="tel:{{ \Illuminate\Support\Str::phoneNumber($branch->phone)}}">{{ $branch->phone }}</a>
                        </li>
                    @endforeach
                </ul>
                <ul>
                    <li class="schedule">
                        <div class="color-red">@lang('static.contacts.schedule')</div>
                    </li>
                    <li class="schedule">
                        <span>@lang('static.contacts.weekdays')</span>
                        <span>@lang('static.contacts.weekends')</span>
                    </li>
                    <li>
                    </li>
                    <li>
                        <a href="mailto:{{ config('settings.main-email') }}">{{ config('settings.main-email') }}</a>
                    </li>
                </ul>
            </div>
            <div class="col">
                <div class="imgs">
                    <picture>
                        <source type="image/webp" srcset="{{ asset('img/example/img_32.webp') }}">
                        <img width="320" height="187" src="{{ asset('img/example/img_32.png.png') }}" alt="">
                    </picture>
                    <picture>
                        <source type="image/webp" srcset="{{ asset('img/example/img_31.webp') }}">
                        <img width="320" height="187" src="{{ asset('img/example/img_31.png.png') }}" alt="">
                    </picture>
                </div>
                <div id="map"></div>
            </div>
        </div>
    </div>
    <!-- ///:end/// -->

    {{-- Order a calculation form --}}
    @include('partials.index.order-a-calculation')
@endsection

@push('scripts')
    <script>
        var map;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 47.845335, lng: 30.6470585},
                zoom: 5,
                disableDefaultUI: true
            });
            @foreach($branches as $key => $branch)
                @if ($branch->lat && $branch->lng)
                new google.maps.Marker({
                    position: {lat: {{ $branch->lat }}, lng: {{ $branch->lng }}},
                    map: map,
                    title: '{{ $branch->address }}',
                    icon: "{{ asset('img/map-marker.svg') }}"
                });
                @endif
            @endforeach
        }
    </script>
@endpush