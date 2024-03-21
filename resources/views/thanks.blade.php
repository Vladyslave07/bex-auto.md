@extends('layouts.app')

@section('title', 'Спасибо за заявку!')

@push('styles')
    <link rel="stylesheet" href="{{ mix('css/thanks-order.css') }}">
@endpush

@push('scripts')
    <script src="{{ mix('js/thanks-order.js') }}" defer></script>
    @if($car)
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                    fbq('track', 'Purchase', {
                            content_ids: ['{{ $car->id }}'],
                            content_type: 'product',
                            value: {{ $car->price }},
                            currency: 'USD'
                        }
                    );
            });
        </script>
    @endif
@endpush

@section('content')

<div class="section-thanks container">
    <picture>
        <source type="image/webp" srcset="/img/envelope.webp">
        <img width="167" height="122" src="/img/envelope.png" alt="">
    </picture>
    <h1 class="main-title noline color-red">{{ Lang::get('index.thanks.title') }}</h1>
    <div class="text">{!! Lang::get('index.thanks.text') !!}</div>
    <div class="btns">
        <a href="{{ back()->getTargetUrl() }}" class="btn">@lang('index.thanks.btn-back')</a>
        <a href="{{ route('index') }}#reviews" class="btn btn-blue">@lang('index.thanks.btn-reviews')</a>
    </div>

    {{-- Social links --}}
    @include('partials.footer.social')
</div>

@endsection
