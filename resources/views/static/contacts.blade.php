@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ mix('css/contacts.css') }}">
@endpush

@push('scripts')
    <script src="{{ mix('js/contacts.js') }}" defer></script>
    <script async defer src='https://maps.googleapis.com/maps/api/js?key=AIzaSyBUNXuMito23uou4dxrhuPY22n2r4B4ntc&#038;callback=initMap'></script>
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
                        <a href="mailto:{{ Setting::get('main-email') }}">{{ Setting::get('main-email') }}</a>
                    </li>
                </ul>
            </div>
            <div class="col">
            @if ($branch = $branches->first())
                @if($branch->images && count($branch->images) > 0)
                        <div class="imgs">
                            @foreach($branch->images as $image)
                                @if($loop->iteration <= 2)
                                    <picture>
                                        {{--                                <source type="image/webp" srcset="{{ asset('img/example/img_32.webp') }}">--}}
                                        <img width="320" height="187" src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($image) }}" alt="">
                                    </picture>
                                @endif
                            @endforeach
                        </div>
                @endif
            @endif
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
                center: {lat: {{ \App\Models\Domain::currentDomain()?->lat }}, lng: {{ \App\Models\Domain::currentDomain()?->lng }}},
                zoom: 4,
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
