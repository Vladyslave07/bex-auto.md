@if (isset($editPath) && strlen($editPath) > 0)
    @push('scripts')
        <script src="{{ mix('js/admin-menu.js') }}" defer></script>
    @endpush

    <div class="admin-menu-wrap">
        <a href="#menu" id="toggle"><span></span></a>

        <div id="menu">
            <ul>
                <li><a href="{{ $editPath }}">Редактировать</a></li>
            </ul>
        </div>
    </div>
@endif
