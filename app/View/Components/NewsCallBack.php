<?php

namespace App\View\Components;


use App\Http\Livewire\Forms\CallBack;
use App\Jobs\FormResultToB24;
use App\Models\FormResult;
use App\Rules\PhoneNumber;
use App\Traits\UtmMarkTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class NewsCallBack extends Component
{
    use UtmMarkTrait;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public static function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'phone' => ['required', 'min:10', new PhoneNumber()],
        ]);

        $formattedPhone = Str::phoneNumber($validated['phone']);

        $data = [
            'name' => $validated['name'],
            'phone' => $formattedPhone,
            'slug_form' => CallBack::SLUG_FORM,
        ];

        $data = self::addUtmMarks($data);

        $result = FormResult::query()->create($data);

        // Send result to B24
        if ($result->id > 0) {
            FormResultToB24::dispatch($result->id)->onQueue('formResultToB24');
        }

        return response()->json(['link' => LaravelLocalization::getLocalizedUrl(app()->getLocale(), route('thanks'))]);

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.news-call-back');
    }
}
