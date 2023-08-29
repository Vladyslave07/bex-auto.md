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
    <?php if (count($this->banks) > 0): ?>
    <div id="linksForCredit" class="modal links-credit @if($show === true) is-visible @endif">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="nav-tabs">
                            <?php if (count(array_filter($this->banks->pluck('link_for_old_cars')->toArray())) > 0): ?>
                                <span class="nav-link active" data-toggle="tab" data-target="#creditTab_1"><?= \App\Models\Setting::get('first_tab_title') ?></span>
                            <?php endif; ?>
                            <?php if (count(array_filter($this->banks->pluck('link_for_new_cars')->toArray())) > 0): ?>
                                <span class="nav-link" data-toggle="tab" data-target="#creditTab_2"><?= \App\Models\Setting::get('second_tab_title') ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="modal-inner">
                            <svg class="close-modal" width="10" height="10"><use xlink:href="#close-icon"></use></svg>
                            <div class="main-title text-center"><?= \App\Models\Setting::get('banks_form_title') ?></div>
                            <div class="tab-content">
                                <?php
                                    $active = false;
                                if (count(array_filter($this->banks->pluck('link_for_old_cars')->toArray())) > 0): $active = true; ?>
                                    <div id="creditTab_1" class="tab-pane active">
                                        <?php foreach ($this->banks as $bank):?>
                                            <?php if (strlen($bank->link_for_old_cars) > 0): ?>
                                                <div class="item">
                                                    <img width="60" height="60" src="<?= Storage::disk('public')->url($bank->image) ?>" loading="lazy" alt="<?= $bank->title ?>">
                                                    <?= $bank->title ?>
                                                    <a target="_blank" rel="nofollow" href="<?= $bank->link_for_old_cars ?>" class="btn"><?= $bank->btn_text ?></a>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (count(array_filter($this->banks->pluck('link_for_new_cars')->toArray())) > 0): ?>
                                    <div id="creditTab_2" class="tab-pane <?= $active ? '' : 'active' ?>">
                                        <?php foreach ($this->banks as $bank): ?>
                                            <?php if (strlen($bank->link_for_new_cars) > 0): ?>
                                                <div class="item">
                                                    <img width="60" height="60" src="<?= Storage::disk('public')->url($bank->image) ?>" loading="lazy" alt="<?= $bank->title ?>">
                                                        <?= $bank->title ?>
                                                    <a target="_blank" rel="nofollow" href="<?= $bank->link_for_new_cars ?>" class="btn"><?= $bank->btn_text ?></a>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
