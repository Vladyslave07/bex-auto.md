<?php

namespace App\Http\Livewire\Forms;

use App\Jobs\FormResultToB24;
use App\Models\Bank;
use App\Models\FormResult;
use App\Rules\PhoneNumber;
use App\Traits\UtmMarkTrait;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;
use Livewire\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ApplicationForCredit extends Component implements BaseForm
{
    use UtmMarkTrait;

    public $show;
    public $showBanks = false;
    public $name;
    public $phone;
    public $car;
    public $banks;

    const SLUG_FORM = 'application_for_credit';

    public function mount()
    {
        $this->banks = Bank::query()->orderBy('sort')->get();
    }

    public function render()
    {
        return view('livewire.forms.application-for-credit');
    }

    public function submit()
    {
        $this->show = true;
        $fields = $this->validate();
        $fields['phone'] = Str::phoneNumber($fields['phone']);
        $fields['car'] = $this->car->title;
        $fields['slug_form'] = self::SLUG_FORM;
        $fields = $this->addUtmMarks($fields);
        $result = FormResult::query()->create($fields);
        $this->show = false;
        $this->showBanks = true;

        // Send result to B24
        if ($result->id > 0) {
            FormResultToB24::dispatch($result->id)->onQueue('formResultToB24')->onConnection(app('domain')->getDomain()->getQueueConnection());
        }

        $this->dispatchBrowserEvent('submitCreditForm', [
            'car_id' => $this->car->id,
            'price' => $this->car->price,
            'phone' => '+' . Str::phoneNumber($fields['phone']),
        ]);
    }

    protected function rules()
    {
        $this->phone = Str::phoneNumber($this->phone);
        return [
            'name' => ['required', 'min:3', 'max:255'],
            'phone' => ['required', 'min:10', new PhoneNumber()],
        ];
    }

    protected function messages()
    {
        return [
            'name.required' => Lang::get('messages.required'),
            'name.min' => Lang::get('messages.min', ['num' => 3]),
            'name.max' => Lang::get('messages.max', ['num' => 255]),
            'phone.required' => Lang::get('messages.required'),
            'phone.min' => Lang::get('messages.min', ['num' => 10]),
        ];
    }
}
