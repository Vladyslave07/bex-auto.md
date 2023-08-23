<ul class="contacts">
    <li class="contact-mail">
        <a href="mailto:{{ Setting::get('main-email') }}">{{ Setting::get('main-email') }}</a>
    </li>
    <!-- @if (strlen(Setting::get('main-phone')) > 0)
         <li>
            <div class="color-red">{{ Setting::get('opt') }}</div>
            <a href="tel:{{ Str::phoneNumber(Setting::get('main-phone'))}}">
                {{ Setting::get('main-phone') }}
            </a>
        </li>
    @endif -->
</ul>
