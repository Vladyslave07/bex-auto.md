<?php

namespace App\Http\Livewire\Forms;

use App\Jobs\FormResultToB24;
use App\Jobs\OrderPartToB24Job;
use App\Models\FormResult;
use App\Rules\PhoneNumber;
use App\Traits\UtmMarkTrait;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;
use Livewire\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CallBack extends Component implements BaseForm
{
    use UtmMarkTrait;

    public $phone;
    public $name;
    public $title;
    public $btnText;

    const SLUG_FORM = 'call_back';

    public function submit()
    {
        $this->validate();

        $formattedPhone = Str::phoneNumber($this->phone);

        $data = [
            'name' => $this->name,
            'phone' => $formattedPhone,
            'slug_form' => self::SLUG_FORM,
        ];

        $data = $this->addUtmMarks($data);

        $result = FormResult::query()->create($data);

        // Send result to B24
        if ($result->id > 0) {
            FormResultToB24::dispatch($result->id)->onQueue('formResultToB24');
        }

        return redirect(LaravelLocalization::getLocalizedUrl(app()->getLocale(), route('thanks')));
    }

    public function render()
    {
        return view('livewire.forms.call-back');
    }

    protected function rules()
    {
        return [
            'name' => ['required', 'min:3'],
            'phone' => ['required', 'min:10', new PhoneNumber()],
        ];
    }

    protected function messages()
    {
        return [
            'name.required' => Lang::get('messages.required'),
            'name.min' => Lang::get('messages.min', ['num' => 3]),
            'phone.required' => Lang::get('messages.required'),
            'phone.min' => Lang::get('messages.min', ['num' => 10]),
        ];
    }
}
