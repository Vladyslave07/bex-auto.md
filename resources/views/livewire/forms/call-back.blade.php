<div>
    <form class="form-choose-car" wire:submit.prevent="submit" novalidate autocomplete="off">
        <div class="title">{{ $this->title ?: config('settings.call_back_form_title') }}</div>
        <div class="form-group">
            <input wire:model.defer="name" class="form-control @error('name') is-invalid @enderror" placeholder="@lang('forms.name')" type="text" oninput="this.value = this.value.replace(/[0-9]/g, '');">
            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <input wire:model.defer="phone" class="form-control @error('phone') is-invalid @enderror" type="text" placeholder="+380 ( _____ )" data-type="tel">
            @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <button class="btn" type="submit">@lang('forms.call_back_button')</button>
    </form>
</div>
