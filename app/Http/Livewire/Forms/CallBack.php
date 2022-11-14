<?php

namespace App\Http\Livewire\Forms;

use App\Jobs\FormResultToB24;
use App\Jobs\OrderPartToB24Job;
use App\Models\FormResult;
use App\Rules\PhoneNumber;
use App\Utilities\Bitrix24\Entity\Contact;
use App\Utilities\Bitrix24\Entity\Deal;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;
use Livewire\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CallBack extends Component implements BaseForm
{
    public $phone;
    public $name;
    public $title;
    public $btnText;

    const SLUG_FORM = 'call_back';

    public function submit()
    {
        $this->validate();

        $formattedPhone = Str::phoneNumber($this->phone);

        $result = FormResult::query()->create([
            'name' => $this->name,
            'phone' => $formattedPhone,
            'slug_form' => self::SLUG_FORM,
        ]);

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
