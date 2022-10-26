<?php

namespace App\Http\Livewire\Forms;

use App\Models\FormResult;
use App\Rules\PhoneNumber;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;
use Livewire\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ApplicationForCar extends Component implements BaseForm
{
    public $show;
    public $name;
    public $phone;
    public $car;

    const SLUG_FORM = 'buy_car_from';

    public function render()
    {
        return view('livewire.forms.application-for-car');
    }

    public function submit()
    {
        $this->show = true;
        $fields = $this->validate();
        $fields['phone'] = Str::phoneNumber($fields['phone']);
        $fields['car'] = $this->car;
        $fields['slug_form'] = self::SLUG_FORM;
        $res = FormResult::query()->create($fields);
        $this->show = false;
        return redirect(LaravelLocalization::getLocalizedUrl(app()->getLocale(), route('thanks')));
    }

    protected function rules()
    {
        return [
            'name' => ['required', 'min:3', 'max:255'],
            'phone' => ['required', new PhoneNumber()],
        ];
    }

    protected function messages()
    {
        return [
            'name.required' => Lang::get('messages.required'),
            'name.min' => Lang::get('messages.min', ['num' => 3]),
            'name.max' => Lang::get('messages.max', ['num' => 255]),
            'phone.required' => Lang::get('messages.required'),
        ];
    }
}
