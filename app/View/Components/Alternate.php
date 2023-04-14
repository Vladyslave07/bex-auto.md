<?php

namespace App\View\Components;

use App\Models\Domain;
use Illuminate\View\Component;

class Alternate extends Component
{
    public $locales;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->locales = $this->manageAlternate();
    }

    public function manageAlternate()
    {
        $supportedLocales = \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getSupportedLocales();

        // Delete uk lang for kz domain
        if (Domain::currentDomain()?->slug == Domain::KAZACHSTAN_SLUG_DOMAIN) {
            unset($supportedLocales[Domain::DEFAULT_SLUG_DOMAIN]);
        }

        // Delete kz lang for uk domain
        if (Domain::currentDomain()?->slug == Domain::DEFAULT_SLUG_DOMAIN) {
            unset($supportedLocales[Domain::KAZACHSTAN_SLUG_DOMAIN]);
        }

        foreach ($supportedLocales as $key => $locale) {
            $supportedLocales[$key]['lang'] = Domain::currentDomain()?->slug == Domain::DEFAULT_SLUG_DOMAIN ? 'UA' : 'KZ';
        }

       return $supportedLocales;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alternate');
    }
}
