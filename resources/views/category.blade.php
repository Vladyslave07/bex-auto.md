@extends('layouts.app')

@section('title', 'Каталог')

@push('styles')
    <link rel="stylesheet" href="{{ mix('css/catalog.css') }}">
@endpush

@push('scripts')
    <script src="{{ mix('js/catalog.js') }}" defer></script>
@endpush

@section('content')

    {{-- Breadcrumbs --}}
    {{ Breadcrumbs::render() }}

    {{-- Title --}}
    @include('partials.category.title')


    <!-- ///КАТАЛОГ/// -->
    <div class="section-catalog container">
        {{-- Tabs --}}
        @include('partials.category.tabs')


        <div class="catalog-wrap">
            {{-- Sorting --}}
            @include('partials.category.sort')

            {{-- Filter --}}
            @include('partials.category.filter')

            {{-- Cars grid --}}
            @include('partials.category.cars')
        </div>
    </div>
    <!-- ///:end/// -->

    {{-- Popular cars --}}
    @include('partials.index.cars-expected', ['cars' => $popularCars, 'title' => \Illuminate\Support\Facades\Lang::get('category.title'), 'more' => false])

    {{-- Popular auto brand --}}
    @include('partials.index.popular-brand-auto')

    <!-- ///ВІДПОВІДІ НА ПИТАННЯ/// -->
    <div class="section-faq container">
        <div class="main-title text-center line-left">Відповіді на питання</div>
        <div class="item">
            <div class="title toggle-btn">
                Як перевіряються автомобілі з США?
                <svg width="24" height="30"><use xlink:href="#arrow-icon"></use></svg>
            </div>
            <div class="body">
                <p>Перш ніж приступити до торгів, менеджери компанії проводять більше 8 етапів ретельної перевірки автомобіля. Це дозволить дізнатися, чи був автомобіль учасником ДТП, кількість власників, історію його обслуговування, надійність продавця і т.д. Всі дані про автомобіль надаються клієнту і, тільки після його схвалення, менеджер приступає до процесу торгів.</p>
            </div>
        </div>
        <div class="item">
            <div class="title toggle-btn">
                Є машини, які вже можна подивитися "вживу"?
                <svg width="24" height="30"><use xlink:href="#arrow-icon"></use></svg>
            </div>
            <div class="body">
                <p>"Bexhill Trading Auto" надає можливість придбання авто на території України. Перед покупкою можна подивитися вподобаний автомобіль в тому місті, де він знаходиться (в Одесі, Києві, Харкові чи Львові). Ознайомитися з асортиментом можна в розділі - <a href="#">авто з США в наявності</a>.</p>
            </div>
        </div>
        <div class="item open">
            <div class="title toggle-btn">
                Що включає в себе поняття "авто під ключ"?
                <svg width="24" height="30"><use xlink:href="#arrow-icon"></use></svg>
            </div>
            <div class="body">
                <p>При покупці авто під ключ компанія здійснює комплекс послуг, який включає підбір авто, торги, оформлення необхідних документів, транспортування по США, доставку в порт України і розмитнення. У розділі "<a href="#">Авто з американських аукціонів</a>" можна подивитися цікаві варіанти, які можна пригнати під ключ. Крім того, "Bexhill Trading Auto" надає послуги з ремонту та сертифікації, які оплачуються окремо.</p>
            </div>
        </div>
        <div class="item">
            <div class="title toggle-btn">
                Які документи отримують наші клієнти на автомобілі з США?
                <svg width="24" height="30"><use xlink:href="#arrow-icon"></use></svg>
            </div>
            <div class="body">
                <p>TITLE (техпаспорт на автомобіль), інвойс, свідоцтво про реєстрацію та митна декларація.</p>
            </div>
        </div>
        <div class="item">
            <div class="title toggle-btn">
                Чи надає компанія гарантії?
                <svg width="24" height="30"><use xlink:href="#arrow-icon"></use></svg>
            </div>
            <div class="body">
                <p>Компанія укладає договір з кожним клієнтом і зобов’язується виконувати всі умови договору. Всі платежі здійснюються поетапно і відправляються на розрахунковий рахунок, вказаний в договорі. Фахівці компанії зобов’язуються здійснювати якісний підбір авто і забезпечувати супровід аж до прибуття автомобіля в Україну. Крім того, ми рекомендуємо застрахувати авто на час перевезення з США в Україну, що послужить додатковою гарантією. Ця послуга не є обов’язковою і здійснюється тільки на розсуд клієнта.</p>
            </div>
        </div>
        <div class="item">
            <div class="title toggle-btn">
                Скільки часу займає доставка авто з США?
                <svg width="24" height="30"><use xlink:href="#arrow-icon"></use></svg>
            </div>
            <div class="body">
                <p>Терміни доставки авто з США залежать від: віддаленості авто від місцезнаходження аукціону і порту відправлення; погодних умов або непередбачених ситуацій, на які неможливо вплинути; приблизний термін доставки авто в Україні складає від 30 до 60 днів.</p>
            </div>
        </div>
    </div>
    <!-- ///:end/// -->

    {{-- Seo text --}}
    @include('partials.index.seo-text')

    {{-- Order a calculation form --}}
    @include('partials.index.order-a-calculation')
@endsection