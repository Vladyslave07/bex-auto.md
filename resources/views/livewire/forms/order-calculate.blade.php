<div>
    <form class="form" wire:submit.prevent="submit" novalidate autocomplete="off">
        <h4 class="title">{{ \Illuminate\Support\Facades\Lang::get('forms.order-calc.sub_title') }}</h4>
        <div class="form-group">
            <input wire:model.defer="name" class="form-control @error('name') is-invalid @enderror" placeholder="@lang('forms.name')" type="text" oninput="this.value = this.value.replace(/[0-9]/g, '');">
            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <input wire:model.defer="phone" class="form-control @error('phone') is-invalid @enderror" type="text" placeholder="{{ \App\Models\Domain::phonePlaceholderForCurrDomain() }}" data-type="tel">
            @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <button class="btn" type="submit">{{ $this->btnText ?: Lang::get('forms.order-calc.submit') }}</button>
    </form>
</div>

<script>
    window.addEventListener('submitOrderCalculateForm', event => {
        window.formSubmit(event.detail.phone);
    })
</script>
