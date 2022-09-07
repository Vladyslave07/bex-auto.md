<ul class="contacts">
    <li class="contact-mail">
        <a href="mailto:{{ config('settings.main-email') }}">{{ config('settings.main-email') }}</a>
    </li>
    <li>
        <div class="color-red">Опт</div>
        <a href="tel:{{ Str::phoneNumber(config('settings.main-phone'))}}">
            {{ config('settings.main-phone') }}
        </a>
    </li>
</ul>