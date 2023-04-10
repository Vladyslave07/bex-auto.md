@php($footerMenu = \App\Models\Menu::footerMenu())

@foreach(\App\Models\FooterMenu::footerMenu()->groupBy('column') as $items)
    @include('partials.footer.menu-footer-part', ['items' => $items])
@endforeach

