<div>
    <div id="applicationForCredit" class="modal @if($show === true) is-visible @endif">
        <div class="modal-dialog">
            <div class="modal-content">
                <svg class="close-modal" width="10" height="10"><use xlink:href="#close-icon"></use></svg>
                <div class="modal-body">
                    <p class="text-center">{{ Setting::get('application_for_credit') }}</p>
                    <form wire:submit.prevent="submit" novalidate autocomplete="off">
                        <div class="form-group">
                            <input wire:model.defer="name" class="form-control @error('name') is-invalid @enderror" placeholder="@lang('forms.name')" type="text" oninput="this.value = this.value.replace(/[0-9]/g, '');" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <input wire:model.defer="phone" class="form-control @error('phone') is-invalid @enderror" type="text" placeholder="{{ \App\Models\Domain::phonePlaceholderForCurrDomain() }}" data-type="tel" required>
                            @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <!-- <button class="btn" type="submit">{{ Lang::get('forms.discount.btn') }}</button> -->
                        <button class="btn" type="button" onclick="closeModal('#applicationForCredit');openModal('#linksForCredit')">{{ Lang::get('forms.discount.btn') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="linksForCredit" class="modal links-credit @if($show === true) is-visible @endif">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="nav-tabs">
                        <span class="nav-link active" data-toggle="tab" data-target="#creditTab_1">БУ Автомобиль</span>
                        <span class="nav-link" data-toggle="tab" data-target="#creditTab_2">Новый автомобиль</span>
                    </div>
                    <div class="modal-inner">
                        <svg class="close-modal" width="10" height="10"><use xlink:href="#close-icon"></use></svg>
                        <div class="main-title text-center">Расчет кредитования</div>
                        <div class="tab-content">
                            <div id="creditTab_1" class="tab-pane active">
                                <div class="item">
                                    <img width="60" height="60" src="https://placehold.jp/E53934/ffffff/60x60.png" loading="lazy" alt="">
                                    Приватбанк
                                    <a href="#" class="btn">Рассчитать</a>
                                </div>
                                <div class="item">
                                    <img width="60" height="60" src="https://placehold.jp/E53934/ffffff/60x60.png" loading="lazy" alt="">
                                    Ощадбанк
                                    <a href="#" class="btn">Рассчитать</a>
                                </div>
                                <div class="item">
                                    <img width="60" height="60" src="https://placehold.jp/E53934/ffffff/60x60.png" loading="lazy" alt="">
                                    ПУМБ
                                    <a href="#" class="btn">Рассчитать</a>
                                </div>
                                <div class="item">
                                    <img width="60" height="60" src="https://placehold.jp/E53934/ffffff/60x60.png" loading="lazy" alt="">
                                    Пiвденний
                                    <a href="#" class="btn">Рассчитать</a>
                                </div>
                            </div>
                            <div id="creditTab_2" class="tab-pane">
                                <div class="item">
                                    <img width="60" height="60" src="https://placehold.jp/E53934/ffffff/60x60.png" loading="lazy" alt="">
                                    Ощадбанк
                                    <a href="#" class="btn">Рассчитать</a>
                                </div>
                                <div class="item">
                                    <img width="60" height="60" src="https://placehold.jp/E53934/ffffff/60x60.png" loading="lazy" alt="">
                                    ПУМБ
                                    <a href="#" class="btn">Рассчитать</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
