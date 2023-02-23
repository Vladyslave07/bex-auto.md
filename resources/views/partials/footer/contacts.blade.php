<ul class="contacts">
    <li class="contact-mail">
        <a href="mailto:{{ config('settings.main-email') }}">{{ config('settings.main-email') }}</a>
    </li>
    <!-- @if (strlen(config('settings.main-phone')) > 0)
         <li>
            <div class="color-red">{{ config('settings.opt') }}</div>
            <a href="tel:{{ Str::phoneNumber(config('settings.main-phone'))}}">
                {{ config('settings.main-phone') }}
            </a>
        </li>
    @endif -->
</ul>