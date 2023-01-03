<div>
    <div id="modalDiscount" class="modal @if($show === true) is-visible @endif">
        <div class="modal-dialog">
            <div class="modal-content">
                <svg class="close-modal" width="10" height="10"><use xlink:href="#close-icon"></use></svg>
                <div class="modal-body">
                    <img width="500" height="500" src="{{ Storage::disk('public')->url(\App\Models\Banner::getImageForPopup()) }}" alt="" loading="lazy">
                    <!-- <p class="text-center">{{ config('settings.discount_form_title') }}</p> -->
                    <form wire:submit.prevent="submit" class="form-discount" novalidate autocomplete="off">
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
        window.onload = () => {
            if (readCookie('show-discount-modal') != 0) {
                setTimeout(() => {
                    openModal('#modalDiscount');
                }, 3000);
            }

            let closeBtn = document.querySelector('#modalDiscount .close-modal');
            if (closeBtn) {
                closeBtn.addEventListener('click', e => {
                    writeCookie('show-discount-modal', 0, 7)
                })
            }

            let discountForm = document.querySelector('#modalDiscount form')
            if (discountForm) {
                discountForm.addEventListener('submit', e => {
                    writeCookie('show-discount-modal', 0, 7)
                })
            }
        }

        function writeCookie(name, val, expires) {
            let date = new Date;
            date.setDate(date.getDate() + expires);
            document.cookie = name+"="+val+"; path=/; expires=" + date.toUTCString();
        }

        function readCookie(name) {
            let matches = document.cookie.match(new RegExp(
                "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
            ));
            return matches ? decodeURIComponent(matches[1]) : undefined;
        }
    </script>
</div>


