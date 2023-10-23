<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item">
    <a class="nav-link" href="{{ backpack_url('dashboard') }}">
        <i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}
    </a>
</li>


<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-car-side"></i> Автомобили</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('car') }}'><i class='nav-icon la la-car'></i> Список</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('property') }}'><i class='nav-icon la la-wrench'></i>Свойства</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('category') }}'><i class='nav-icon la la-list'></i> Категории</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('brand') }}'><i class='nav-icon la la-cab'></i> Марки</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('car-model') }}'><i class='nav-icon la la-car-alt'></i> Модели</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('equipment') }}"><i class="nav-icon la la-plus-square"></i> Комплектация</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('product') }}"><i class="nav-icon la la-product-hunt"></i> Товары</a></li>
    </ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-building-o"></i> Компания</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('branch') }}'><i class='nav-icon la la-code-branch'></i> Филиалы</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('city') }}"><i class="nav-icon la la-city"></i> Города</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('employee') }}"><i class="nav-icon la la-people-carry"></i> Сотрудники</a></li>
    </ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-align-justify"></i> Контент</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('banner') }}'><i class='nav-icon la la-image'></i> Баннеры</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('faq') }}'><i class='nav-icon la la-question'></i> Вопросы и ответы</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('seo-text') }}'><i class='nav-icon la la-file-text-o'></i> Сео текст</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('news') }}'><i class='nav-icon la la-newspaper-o'></i> Новости</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('popular-request') }}'><i class='nav-icon la la-question-circle'></i> Популярные запросы</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('review') }}'><i class='nav-icon la la-voicemail'></i> Отзывы</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('popup') }}"><i class="nav-icon la la-windows"></i> Поп-апы</a></li>
    </ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-list"></i> Меню</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('menu') }}'><i class='nav-icon la la-list'></i> Простое меню</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('footer_menus') }}"><i class="nav-icon la la-list"></i>Меню в футере</a></li>
    </ul>
</li>


<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-wpforms"></i> Результаты форм</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'>
            <a class='nav-link'
               href='{{ backpack_url('form-result', [\App\Http\Livewire\Forms\ApplicationForCar::SLUG_FORM]) }}'
            >
                <i class='nav-icon la la-car-alt'></i> Заявка на покупку машины
            </a>
            <a class='nav-link'
               href='{{ backpack_url('form-result', [\App\Http\Livewire\Forms\ApplicationForCredit::SLUG_FORM]) }}'
            >
                <i class='nav-icon la la-car'></i> Заявка на покупку машины в кредит
            </a>
            <a class='nav-link'
               href='{{ backpack_url('form-result', [\App\Http\Livewire\Forms\CallBack::SLUG_FORM]) }}'
            >
                <i class='nav-icon la la-mobile-phone'></i> {{ \App\Models\FormResult::FORM_NAMES['call_back'] }}
            </a>
            @if(App\Models\Domain::currentDomain()?->slug == App\Models\Domain::DEFAULT_SLUG_DOMAIN)
                <a class='nav-link'
                href='{{ backpack_url('form-result', [\App\Http\Livewire\Forms\AutoForZsu::SLUG_FORM]) }}'
                >
                    <i class='nav-icon la la-mobile-phone'></i> {{ \App\Models\FormResult::FORM_NAMES['auto_for_zsu'] }}
                </a>
            @endif
            <a class='nav-link'
               href='{{ backpack_url('form-result', [\App\Http\Livewire\Forms\OrderCalculate::SLUG_FORM]) }}'
            >
                <i class='nav-icon la la-money-bill'></i> Заказ расчета стоимости
            </a>
            <a class='nav-link'
               href='{{ backpack_url('form-result', [\App\Http\Livewire\Forms\BuyAndDeliveryAuto::SLUG_FORM]) }}'
            >
                <i class='nav-icon la la-money-bill'></i> Купить и доставить авто
            </a>
            <a class='nav-link'
               href='{{ backpack_url('form-result', [\App\Http\Livewire\Forms\DiscountForm::SLUG_FORM]) }}'
            >
                <i class='nav-icon la la-percent'></i> Получить скидку
            </a>
            <a class='nav-link'
               href='{{ backpack_url('form-result', [\App\Models\FormResult::DEALER_SLUG_FORM]) }}'
            >
                <i class='nav-icon la la-handshake-o'></i> Дилерские услуги
            </a>
        </li>
    </ul>
</li>

<!-- Users, Roles, Permissions -->
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Пользователи</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>Список</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>Роли</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>Права</span></a></li>
    </ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-reply"></i> Услуги</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('service') }}'><i class='nav-icon la la-reply'></i> <span>Список</span></a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('benefit') }}'><i class='nav-icon la la-surprise'></i> Преимущества</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('country') }}"><i class="nav-icon la la-globe"></i> Страны</a></li>
    </ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-cog"></i> Настройки</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('setting') }}'><i class='nav-icon la la-cog'></i> <span>Список настроек</span></a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('log') }}'><i class='nav-icon la la-terminal'></i> Логи</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('currency') }}"><i class="nav-icon la la-sort-amount-up"></i> Валюты</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('bank') }}"><i class="nav-icon la la-bank"></i> Банки</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('word-case') }}"><i class="nav-icon la la-question"></i> {{ trans('backpack::crud.word_cases') }}</a></li>
    </ul>
</li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('parser') }}'><i class='nav-icon la la-th-list'></i> Парсер</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('redirect') }}'><i class='nav-icon la la-arrows-alt'></i> Редиректы</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('domain') }}'><i class='nav-icon la la-puzzle-piece'></i> Домены</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('elfinder') }}"><i class="nav-icon la la-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>
