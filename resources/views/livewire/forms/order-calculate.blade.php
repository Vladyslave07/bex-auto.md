<div>
    <form class="form" wire:submit.prevent="submit" novalidate autocomplete="off">
        <strong class="title">{{ \Illuminate\Support\Facades\Lang::get('forms.order-calc.sub_title') }}</strong>
        <div class="form-group">
            <input wire:model.defer="name" class="form-control @error('name') is-invalid @enderror" placeholder="@lang('forms.name')" type="text" oninput="this.value = this.value.replace(/[0-9]/g, '');">
            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <input wire:model.defer="phone" class="form-control @error('phone') is-invalid @enderror" type="text" placeholder="+380 ( _____ )" data-type="tel">
            @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <button class="btn" type="submit">{{ $this->btnText ?: Lang::get('forms.order-calc.submit') }}</button>
    </form>
</div>
