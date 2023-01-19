<?php

namespace App\Http\Livewire\Forms;

use App\Jobs\FormResultToB24;
use App\Models\FormResult;
use App\Rules\PhoneNumber;
use App\Traits\UtmMarkTrait;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;
use Livewire\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class DiscountForm extends Component implements BaseForm
{
    use UtmMarkTrait;

    public $phone;
    public $name;
    public $show;
    public $readyToLoad = false;

    const SLUG_FORM = 'discount';

    public function init()
    {
        $this->readyToLoad = true;
    }

    public function render()
    {
        return view('livewire.forms.discount-form', [
            'src' => $this->readyToLoad
                ? \App\Models\Banner::getImageForPopup()
                : '',
        ]);
    }

    public function submit()
    {
        $this->show = true;
        $this->validate();

        $fields = [
            'name' => $this->name,
            'phone' => Str::phoneNumber($this->phone),
            'slug_form' => self::SLUG_FORM,
        ];
        $fields = $this->addUtmMarks($fields);
        $result = FormResult::query()->create($fields);
        $this->show = false;

        // Send result to B24
        if ($result->id > 0) {
            FormResultToB24::dispatch($result->id)->onQueue('formResultToB24');
        }

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
