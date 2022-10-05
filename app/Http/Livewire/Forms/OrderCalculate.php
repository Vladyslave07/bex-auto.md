<?php

namespace App\Http\Livewire\Forms;

use App\Models\FormResult;
use App\Rules\PhoneNumber;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;
use Livewire\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class OrderCalculate extends Component implements BaseForm
{
    public $phone;
    public $name;
    public $btnText;

    const SLUG_FORM = 'order_calculate';

    public function render()
    {
        return view('livewire.forms.order-calculate');
    }

    public function submit()
    {
        $this->validate();

        FormResult::query()->create([
            'name' => $this->name,
            'phone' => Str::phoneNumber($this->phone),
            'slug_form' => self::SLUG_FORM,
        ]);
        return redirect(LaravelLocalization::getLocalizedUrl(app()->getLocale(), route('thanks')));
    }

    protected function rules()
    {
        return [
            'name' => ['required', 'min:3'],
            'phone' => ['required', new PhoneNumber()],
        ];
    }

    protected function messages()
    {
        return [
            'name.required' => Lang::get('messages.required'),
            'name.min' => Lang::get('messages.min', ['num' => 3]),
            'phone.required' => Lang::get('messages.required'),
        ];
    }
}
