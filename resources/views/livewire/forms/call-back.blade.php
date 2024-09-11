<div>
    <form class="form-choose-car callbackForm" wire:submit.prevent="submit" novalidate autocomplete="off">
        <h4 class="title">{{ $this->title ?: Setting::get('call_back_form_title') }}</h4>
        <div class="form-group">
            <input wire:model.defer="name" class="form-control @error('name') is-invalid @enderror" placeholder="@lang('forms.name')" type="text" oninput="this.value = this.value.replace(/[0-9]/g, '');">
            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <input wire:model.defer="phone" class="form-control @error('phone') is-invalid @enderror" type="text" placeholder="{{ \App\Models\Domain::phonePlaceholderForCurrDomain() }}" data-type="tel">
            @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <button class="btn" type="submit">{{ $this->btnText ?: \Illuminate\Support\Facades\Lang::get('forms.call_back_button')}}</button>
    </form>
</div>

<script>
    document.querySelector('.callbackForm').addEventListener('submit', e => {
        let phone = e.target.querySelector('input[data-type="tel"]');
        window.formSubmit('+' + phone.value.replace(/[^0-9]/g, ''));
    });

    window.addEventListener('submitCallBackForm', event => {
        if (event.detail.link) {
            window.location.href = event.detail.link;
        }
    })
</script>
