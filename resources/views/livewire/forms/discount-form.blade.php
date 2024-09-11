<div>
    @if($popup)
    <div id="modalDiscount" class="modal @if($show === true) is-visible @endif">
        <div class="modal-dialog">
            <div class="modal-content">
                <svg class="close-modal" width="10" height="10"><use xlink:href="#close-icon"></use></svg>
                <div class="modal-body">
                    <img width="500" height="500" src="{{ Storage::disk('public')->url($popup->image) }}" alt="" loading="lazy">
                    <!-- <p class="text-center">{{ Setting::get('discount_form_title') }}</p> -->
                    <form wire:submit.prevent="submit" class="form-discount discountForm" novalidate autocomplete="off">
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

    <script>
        document.querySelector('.discountForm').addEventListener('submit', e => {
            let phone = e.target.querySelector('input[data-type="tel"]');
            window.formSubmit('+' + phone.value.replace(/[^0-9]/g, ''));
        });

        document.addEventListener("DOMContentLoaded", (event) => {
            window.showForm = false;
            window.addEventListener('scroll', showDiscountForm);
        });

        function showDiscountForm () {
            if (!getSessionStorageItem('show-discount-modal') && !window.showForm) {
                setTimeout(() => {
                    openModal('#modalDiscount');
                    window.removeEventListener('scroll', showDiscountForm);
                    setSessionStorageItem('show-discount-modal', true);
                }, 30000);
                window.showForm = true;
            }
        }

        // Функция для записи данных в session storage
        function setSessionStorageItem(key, value) {
            sessionStorage.setItem(key, JSON.stringify(value));
        }

        // Функция для чтения данных из session storage
        function getSessionStorageItem(key) {
            const value = sessionStorage.getItem(key);
            return value ? JSON.parse(value) : null;
        }

        window.addEventListener('submitDiscountForm', event => {
            if (event.detail.link) {
                window.location.href = event.detail.link;
            }
        })
    </script>
    @endif
</div>
