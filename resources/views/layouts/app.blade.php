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
        <link href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mNUq5n3HwAEUQJBudQtMwAAAABJRU5ErkJggg==" rel="icon" type="image/x-icon" />

        <meta name="phone_mask" content="{{ \App\Models\Domain::phoneMaskForCurrDomain() }}">

        @include('alternate')

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
{{--        <livewire:forms.discount-form />--}}


        <div id="modalDiscount" class="modal ">
            <div class="modal-dialog">
                <div class="modal-content">
                    <svg class="close-modal" width="10" height="10"><use xlink:href="#close-icon"></use></svg>
                    <div class="modal-body">
                        {!! \App\Helper\ImageHelper::getPicture(\App\Models\Banner::getImageForPopup()) !!}
                    <!-- <p class="text-center">{{ config('settings.discount_form_title') }}</p> -->
                        <form class="form-discount" novalidate autocomplete="off">
                            <div class="form-group">
{{--                                is-invalid--}}
                                <input class="form-control" placeholder="@lang('forms.name')" type="text" oninput="this.value = this.value.replace(/[0-9]/g, '');" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="{{ \App\Models\Domain::phonePlaceholderForCurrDomain() }}" data-type="tel" required>
                            </div>
                            <button class="btn" type="submit">{{ Lang::get('forms.discount.btn') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", (event) => {
                if (readCookie('show-discount-modal') != 0) {
                    setTimeout(() => {
                        openModal('#modalDiscount');
                    }, 5000);
                }

                let closeBtn = document.querySelector('#modalDiscount .close-modal');
                if (closeBtn) {
                    closeBtn.addEventListener('click', e => {
                        writeCookie('show-discount-modal', 0, 7)
                    })
                }

                let discountForm = document.querySelector('#modalDiscount form')
                if (discountForm) {
                    discountForm.addEventListener('submit', e => {
                        writeCookie('show-discount-modal', 0, 7)
                    })
                }
            });

            function writeCookie(name, val, expires) {
                let date = new Date;
                date.setDate(date.getDate() + expires);
                document.cookie = name+"="+val+"; path=/; expires=" + date.toUTCString();
            }

            function readCookie(name) {
                let matches = document.cookie.match(new RegExp(
                    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
                ));
                return matches ? decodeURIComponent(matches[1]) : undefined;
            }
        </script>


        {{-- Icons --}}
        @include('partials.icons')

        @stack('scripts')
        @livewireScripts
    </body>
</html>
