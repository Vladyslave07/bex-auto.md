<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="initial-scale=1.0, width=device-width">
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />

        {!! SEO::generate() !!}

        @yield('meta-pagination')

        <link href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mNUq5n3HwAEUQJBudQtMwAAAABJRU5ErkJggg==" rel="icon" type="image/x-icon" />

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
                    <svg width="20" height="19"><use xlink:href="#search-icon"></use></svg>
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
        <div id="modalDiscount" class="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <svg class="close-modal" width="10" height="10"><use xlink:href="#close-icon"></use></svg>
                    <div class="modal-body">
                        <p class="text-center">Залиш контактні дані прямо зараз і отримай знижку 50% на послуги компанії при замовленні седанів з США</p>
                        <form action="#" novalidate autocomplete="off">
                            <div class="form-group">
                                <input class="form-control" placeholder="Им`я" type="text" oninput="this.value = this.value.replace(/[0-9]/g, '');" required>
                                <div class="invalid-feedback">Поле обов'язкове до заповнення</div>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="+380 ( _____ )" data-type="tel" required>
                                <div class="invalid-feedback">Поле обов'язкове до заповнення</div>
                            </div>
                            <button class="btn" type="submit">Надiслати</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Icons --}}
        @include('partials.icons')

        @stack('scripts')
        @livewireScripts
    </body>
</html>
