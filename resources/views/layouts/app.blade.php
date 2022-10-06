<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="initial-scale=1.0, width=device-width">
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />

        {!! SEO::generate() !!}

        @yield('meta-pagination')

        <link href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mNUq5n3HwAEUQJBudQtMwAAAABJRU5ErkJggg==" rel="icon" type="image/x-icon" />

        @include('alternate')

        @stack('styles')
        @livewireStyles
    </head>
    <body>

        <header class="main-header container">
            <a href="{{ route('index') }}" class="logo" aria-label="logo">
                <img width="134" height="59" src="{{ asset('img/logo.png') }}" alt="">
            </a>

            {{-- search form --}}
            @include('partials.search.search-form')

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
