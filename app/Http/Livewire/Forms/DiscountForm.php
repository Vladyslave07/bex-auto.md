<?php

namespace App\Http\Livewire\Forms;

use App\Jobs\FormResultToB24;
use App\Models\Category;
use App\Models\FormResult;
use App\Models\Popup;
use App\Models\Service;
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
    public $popup;
    public $category;
    public $service;

    const SLUG_FORM = 'discount';

    public function render()
    {
        $this->popup();
        return view('livewire.forms.discount-form');
    }

    public function popup()
    {
        $currentUrl = request()->url();
        $parts = explode('/', $currentUrl);
        $url = end($parts);

        $popup = false;
        $category = Category::findBySlug($url);
        if ($category) {
            $this->category = $category;
            $popup = Popup::getPopupByCategory($category);
        }

        $service = Service::findBySlug($url);
        if ($service) {
            $this->service = $service;
            $popup = Popup::getPopupByService($service);
        }

        if ($popup) {
            $this->popup = $popup;
            return;
        }

        $this->popup = Popup::getMainPopup();
    }

    public function submit()
    {
        $this->show = true;
        $this->validate();

        $fields = [
            'name' => $this->name,
            'phone' => Str::phoneNumber($this->phone),
            'slug_form' => self::SLUG_FORM,
            'popup_id' => $this->popup->id,
            'category_id' => $this->category?->id,
            'service_id' => $this->service?->id,
        ];
        $fields = $this->addUtmMarks($fields);
        $result = FormResult::query()->create($fields);
        $this->show = false;

        // Send result to B24
        if ($result->id > 0) {
            FormResultToB24::dispatch($result->id)->onQueue('formResultToB24')->onConnection(app('domain')->getDomain()->getQueueConnection());
        }

        $this->dispatchBrowserEvent('submitDiscountForm', [
            'phone' => '+' . Str::phoneNumber($this->phone),
            'link' => LaravelLocalization::getLocalizedUrl(app()->getLocale(), route('thanks')),
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
