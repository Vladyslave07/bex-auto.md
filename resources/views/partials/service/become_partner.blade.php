<div class="partner-form container">
    <div class="main-title noline">{!! Setting::get('become_partner_title') !!}</div>
    <livewire:forms.order-calculate :btnText="Lang::get('service.form_btn')"
                                    :dealerService=$dealerService>
</div>
