@php($footerMenu = \App\Models\Menu::footerMenu())

{{-- about menu --}}
@include('partials.footer.menu-footer-part', ['item' => $footerMenu['about']])

{{-- location list --}}
@include('partials.header.location-list')

{{-- catalog menu --}}
@include('partials.footer.menu-footer-part', ['item' => $footerMenu['catalog']])
