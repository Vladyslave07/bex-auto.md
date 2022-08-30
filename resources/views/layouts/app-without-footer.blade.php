<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="Description" content="Put your description here.">

    @yield('meta-pagination')

    <link href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mNUq5n3HwAEUQJBudQtMwAAAABJRU5ErkJggg=="
          rel="icon" type="image/x-icon"/>
    <title>@yield('title')</title>

    @stack('styles')
    @livewireStyles
</head>
<body>

<header class="main-header container">
    <a href="/" class="logo" aria-label="logo">
        <img width="134" height="59" src="{{ asset('img/logo.png') }}" alt="">
    </a>

    <form class="search" action="#">
        <input type="text" placeholder="@lang('index.search.placeholder')" autocomplete="off">
        <button class="search-btn" type="submit" aria-label="Search">
            <svg width="20" height="19">
                <use xlink:href="#search-icon"></use>
            </svg>
        </button>
    </form>

    {{-- main phone --}}
    @include('partials.header.phone')

    <div class="burger toggle-btn visible-sm">
        <span></span>
    </div>

    {{-- cabinet link --}}
    @include('partials.header.cabinet')

    {{-- select site lang --}}
    @include('partials.header.lang-button')

    {{-- menu --}}
    @include('partials.header.main-menu', ['items' => \App\Models\Menu::menuItems()])

</header>

<main class="main">
    @yield('content')
</main>

{{-- Icons --}}
@include('partials.icons')

@stack('scripts')
@livewireScripts
</body>
</html>
