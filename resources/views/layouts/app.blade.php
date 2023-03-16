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

        @stack('styles')
        @livewireStyles
    </head>
    <body>
        {{-- Сео скрипты --}}
        @include('partials.seo_scripts.after_body_start')

        <header class="main-header container">
            <a href="{{ route('index') }}" class="logo" aria-label="logo">
                @php $path = app()->getLocale() === 'uk' ? 'img/bex-logo-ua.svg' : 'img/bex-logo-ru.svg' @endphp
                <img width="134" height="59" src="{{ asset($path) }}" alt="">
            </a>

            {{-- search form --}}
            @include('partials.search.search-form')

            {{-- main phone --}}
            @include('partials.header.phone')

            <div class="burger toggle-btn visible-sm">
                <span></span>
            </div>

            {{-- select site lang --}}
            <x-lang-switcher></x-lang-switcher>

            {{-- menu --}}
            @include('partials.header.main-menu', ['items' => \App\Models\Menu::menuItems()])

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
