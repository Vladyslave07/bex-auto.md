<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        {{-- Сео скрипты --}}
        @include('partials.seo_scripts.after_header_start')

        <meta charset="UTF-8" />
        <meta name="viewport" content="initial-scale=1.0, width=device-width">
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />

        {!! SEO::generate() !!}

        @yield('meta-pagination')
        <link rel="canonical" href="{{ url()->current() }}" />
        <link rel="shortcut icon" href="{{ asset('img/favicon.svg') }}">

        <meta name="phone_mask" content="{{ \App\Models\Domain::phoneMaskForCurrDomain() }}">

        <x-alternate></x-alternate>
        <link rel="stylesheet" href="{{ mix('css/admin-menu.css') }}">
        @stack('styles')
        @livewireStyles
    </head>
    <body>
        {{-- Сео скрипты --}}
        @include('partials.seo_scripts.after_body_start')

        {{-- Bottom mobile menu --}}
        @include('partials.header.mob-menu-icons')

        <header class="main-header">
            <div class="header-top">
                <div class="container">
                    {{-- Header menu --}}
                    <x-header-menu></x-header-menu>

                    {{-- select site lang --}}
                    <x-lang-switcher></x-lang-switcher>
                </div>
            </div>
            <div class="header-middle">
                <div class="container">
                    <div class="burger visible-sm" aria-label="burger" onclick="document.querySelector('[data-target=menuOpen]').click()">
                        <span></span>
                    </div>
                    {{-- Admin menu. Only for admins --}}
                    {!! App\Services\Admin\Menu::render() !!}

                    @if (\App\Models\Domain::currentDomain()->id == 5)
                        <meta name="facebook-domain-verification" content="1ok4pz78y350j624157v7vyrnv4fk3" />
                    @endif
                    <a href="{{ route('index') }}" class="logo" aria-label="logo">
                <img width="134" height="59" src="{{ asset(\App\Helper\ImageHelper::logoPath()) }}" alt="">
            </a>

                    {{-- search form --}}
                    @include('partials.search.search-form')

                    <nav class="menu-search">
                        <a href="#">Geely</a>
                        <a href="#">Honda</a>
                        <a href="#">Weltmeister</a>
                        <a href="#">Mitsubishi</a>
                        <a href="#">BYD</a>
                        <a href="#">BMW</a>
                        <a href="#">Ford</a>
                    </nav>

                    {{-- main phone --}}
                    @include('partials.header.phone')

                    <div class="search-btn visible-sm" aria-label="Search" onclick="document.querySelector('[data-target=searchOpen]').click()">
                        <svg width="25" height="24"><use xlink:href="#search-icon"></use></svg>
                    </div>

                    {{-- menu --}}
                    @include('partials.header.main-menu', ['items' => \App\Models\Menu::menuItems()])
                </div>
            </div>
        </header>

        <main class="main">
            @yield('content')
        </main>

        <footer class="main-footer">
            <div class="container">

                {{-- footer menu --}}
                @include('partials.footer.menu')

                {{-- branches --}}
                @include('partials.footer.branches')

                {{-- footer bottom --}}
                @include('partials.footer.footer-bottom')
            </div>
        </footer>

        <!-- Modals -->
        <livewire:forms.discount-form />

        {{-- Icons --}}
        @include('partials.icons')

        @stack('scripts')
        @livewireScripts
    </body>
</html>
