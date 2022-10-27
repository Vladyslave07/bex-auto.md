@php($footerMenu = \App\Models\Menu::footerMenu())

{{-- about menu --}}
@if ($footerMenu['about'])
    @include('partials.footer.menu-footer-part', ['item' => $footerMenu['about']])
@endif

{{-- location list --}}
{{--@include('partials.header.location-list')--}}

{{-- catalog menu --}}
@if ($footerMenu['catalog'])
    @include('partials.footer.menu-footer-part', ['item' => $footerMenu['catalog']])
@endif
