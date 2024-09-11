<div class="form">
    <form wire:submit.prevent="submit" novalidate autocomplete="off">
        <div class="form-body">
            <div class="header">
                <h3>{{ Setting::get('buy_and_delivery_title_form') }}</h3>
                <h4>{{ Setting::get('buy_and_delivery_sub_title') }}</h4>
            </div>
            <div class="form-group">
                <input class="form-control @error('name') is-invalid @enderror" wire:model.defer="name"
                       placeholder="@lang('forms.name')" type="text"
                       oninput="this.value = this.value.replace(/[0-9]/g, '');" required>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <input class="form-control @error('phone') is-invalid @enderror" wire:model.defer="phone" type="text"
                       placeholder="{{ \App\Models\Domain::phonePlaceholderForCurrDomain() }}"
                       data-type="tel" required>
                @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <input class="form-control @error('car') is-invalid @enderror" wire:model.defer="car"
                       placeholder="@lang('forms.car')" type="text">
                @error('car')
                <div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <input class="form-control @error('country') is-invalid @enderror" wire:model.defer="country"
                       placeholder="{{ $placeholder }}" type="text">
                @error('country')
                <div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>
        <button class="btn" type="submit">@lang('forms.buy-and-delivery.submit')</button>
    </form>
</div>

<script>
    window.addEventListener('submitBuyAndDeliveryAutoForm', event => {
        window.formSubmit(event.detail.phone);
        if (event.detail.link) {
            window.location.href = event.detail.link;
        }
    })
</script>
