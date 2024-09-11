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

class AutoForZsu extends Component implements BaseForm
{
    use UtmMarkTrait;

    public $phone;
    public $name;
    public $title;
    public $btnText;
    public $dealerService = false;

    const SLUG_FORM = 'auto_for_zsu';

    public function submit()
    {
        $this->validate();

        $formattedPhone = Str::phoneNumber($this->phone);

        $slugForm = self::SLUG_FORM;

        if ($this->dealerService) {
            $slugForm = FormResult::DEALER_SLUG_FORM;
        }

        $data = [
            'name' => $this->name,
            'phone' => $formattedPhone,
            'slug_form' => $slugForm,
        ];

        $data = $this->addUtmMarks($data);

        $result = FormResult::query()->create($data);

        // Send result to B24
        if ($result->id > 0) {
            FormResultToB24::dispatch($result->id)->onQueue('formResultToB24')->onConnection(app('domain')->getDomain()->getQueueConnection());
        }

        $this->dispatchBrowserEvent('submitAutoForZSUForm', [
            'phone' => '+' . $formattedPhone,
            'link' => LaravelLocalization::getLocalizedUrl(app()->getLocale(), route('thanks'))
        ]);
    }

    public function render()
    {
        return view('livewire.forms.auto-for-zsu');
    }

    protected function rules()
    {
        $this->phone = Str::phoneNumber($this->phone);
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
