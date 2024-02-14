<div class="partner-form container">
    <h3 class="main-title noline">{!! Setting::get('become_partner_title') !!}</h3>
    <livewire:forms.order-calculate :btnText="Lang::get('service.form_btn')"
                                    :dealerService=$dealerService>
</div>
