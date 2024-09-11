<div>
    <div id="applicationForCar" class="modal @if($show === true) is-visible @endif">
        <div class="modal-dialog">
            <div class="modal-content">
                <svg class="close-modal" width="10" height="10"><use xlink:href="#close-icon"></use></svg>
                <div class="modal-body">
                    <p class="text-center">{{ Setting::get('buy_car_from') }}</p>
                    <form wire:submit.prevent="submit" novalidate autocomplete="off">
                        <div class="form-group">
                            <input wire:model.defer="name" class="form-control @error('name') is-invalid @enderror" placeholder="@lang('forms.name')" type="text" oninput="this.value = this.value.replace(/[0-9]/g, '');" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <input wire:model.defer="phone" class="form-control @error('phone') is-invalid @enderror" type="text" placeholder="{{ \App\Models\Domain::phonePlaceholderForCurrDomain() }}" data-type="tel" required>
                            @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <button class="btn" type="submit">{{ Lang::get('forms.discount.btn') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('submitCarForm', event => {
        if (typeof fbq == 'function') {
            fbq('track', 'AddToCart', {
                    content_type: 'product',
                    content_ids: [`${event.detail.car_id}`],
                    value: event.detail.price,
                    currency: 'USD'
                }
            );
        }
        window.formSubmit(event.detail.phone);

        if (event.detail.link) {
            window.location.href = event.detail.link;
        }
    })
</script>
