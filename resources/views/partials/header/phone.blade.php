<div class="header phone">
    <a href="tel:{{ Str::phoneNumber(\App\Models\Domain::phoneForCurrDomain()) }}"
       class="phone"><svg width="36" height="37"><use xlink:href="#phone-icon"></use></svg> {{ \App\Models\Domain::phoneForCurrDomain() }}</a>
</div>
