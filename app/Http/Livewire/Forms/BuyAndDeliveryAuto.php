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

class BuyAndDeliveryAuto extends Component implements BaseForm
{
    use UtmMarkTrait;

    const SLUG_FORM = 'buy_and_delivery';

    public $phone;
    public $name;
    public $car;
    public $country;

    public function render()
    {
        return view('livewire.forms.buy-and-delivery-auto');
    }

    public function submit()
    {
        $fields = $this->validate();
        $fields['phone'] = Str::phoneNumber($fields['phone']);
        $fields['slug_form'] = self::SLUG_FORM;
        $fields = $this->addUtmMarks($fields);
        $result = FormResult::query()->create($fields);

        // Send result to B24
        if ($result->id > 0) {
            FormResultToB24::dispatch($result->id)->onQueue('formResultToB24')->onConnection(app('domain')->getDomain()->getQueueConnection());
        }

        return redirect(LaravelLocalization::getLocalizedUrl(app()->getLocale(), route('thanks')));
    }

    protected function rules()
    {
        $this->phone = Str::phoneNumber($this->phone);
        return [
            'name' => ['required', 'min:3', 'max:255'],
            'phone' => ['required', 'min:10', new PhoneNumber()],
            'car' => ['max:100'],
            'country' => ['max:100'],
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
            'car.max' => Lang::get('messages.max', ['num' => 100]),
            'country.max' => Lang::get('messages.max', ['num' => 100]),
        ];
    }
}
