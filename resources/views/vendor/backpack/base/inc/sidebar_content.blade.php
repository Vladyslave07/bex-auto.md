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
    </ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-building-o"></i> Компания</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('branch') }}'><i class='nav-icon la la-code-branch'></i> Филиалы</a></li>
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
    </ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-list"></i> Меню</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('menu') }}'><i class='nav-icon la la-list'></i> Простое меню</a></li>
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
                <i class='nav-icon la la-mobile-phone'></i> Обратная связь
            </a>
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
    </ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-cog"></i> Настройки</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('setting') }}'><i class='nav-icon la la-cog'></i> <span>Список настроек</span></a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('log') }}'><i class='nav-icon la la-terminal'></i> Логи</a></li>
    </ul>
</li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('parser') }}'><i class='nav-icon la la-th-list'></i> Парсер</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('redirect') }}'><i class='nav-icon la la-arrows-alt'></i> Редиректы</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('domain') }}'><i class='nav-icon la la-puzzle-piece'></i> Домены</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('elfinder') }}"><i class="nav-icon la la-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>