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

class OrderCalculate extends Component implements BaseForm
{
    use UtmMarkTrait;

    public $phone;
    public $name;
    public $btnText;
    public $dealerService = false;

    const SLUG_FORM = 'order_calculate';

    public function render()
    {
        return view('livewire.forms.order-calculate');
    }

    public function submit()
    {
        $this->validate();

        $slugForm = self::SLUG_FORM;

        if ($this->dealerService) {
            $slugForm = FormResult::DEALER_SLUG_FORM;
        }

        $fields = [
            'name' => $this->name,
            'phone' => Str::phoneNumber($this->phone),
            'slug_form' => $slugForm,
        ];
        $fields = $this->addUtmMarks($fields);
        $result = FormResult::query()->create($fields);

        // Send result to B24
        if ($result->id > 0) {
            FormResultToB24::dispatch($result->id)->onQueue('formResultToB24')->onConnection(app('domain')->getDomain()->getQueueConnection());
        }

        $this->dispatchBrowserEvent('submitOrderCalculateForm', [
            'phone' => '+' . Str::phoneNumber($this->phone),
            'link' => LaravelLocalization::getLocalizedUrl(app()->getLocale(), route('thanks'))
        ]);

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
