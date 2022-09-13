@extends('layouts.app')

@section('title', 'Гарантії')

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
                <h2 class="main-title text-center noline color-blue">
                    @lang('static.guarantee.sub_title')
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

    {{-- Popular auto brand --}}
    @include('partials.index.popular-brand-auto')

    {{-- Faqs --}}
    @include('partials.index.faq')

    {{-- Seo text --}}
    @include('partials.index.seo-text')

    {{-- Order a calculation form --}}
    @include('partials.index.order-a-calculation')

@endsection


Количество и качество технического обслуживания транспортного средства.
Количество ДТП, если таковые были в период эксплуатации.
Количество владельцев.
Заводские отзывы.
Отчет о приобретении американского авто на аукционе (скрин из личного кабинета аукциона)
Примерный просчет стоимости ремонта (по желанию клиента)
Фотоотчет транспортного средства перед погрузкой в ​​контейнер
Предоставляем номер контейнера, в котором автомобиль транспортируется в Украину, что позволяет отслеживать маршрут и сроки прибытия в порт назначения.


Гарантийные обязательства компании:
Заключение договора о сотрудничестве, регулирующего взаимоотношения сторон о предоставлении услуг подбора, покупки, доставки и растаможки автомобиля
Все оплаты производятся в безналичной форме на расчетный счет компании, реквизиты которой указаны в договоре
Клиенту предоставляется возможность расторжения договора в одностороннем порядке и возврат аванса к покупке автомобиля
Сопровождение клиента на всех этапах сделки до момента получения автомобиля
Наличие личного кабинета позволяет отслеживать фото, этапы доставки и оплаты