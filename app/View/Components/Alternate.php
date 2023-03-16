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
        if (Domain::currentDomain()->slug == 'kz') {
            unset($supportedLocales['uk']);
        }

        // Delete kz lang for uk domain
        if (Domain::currentDomain()->slug == 'uk') {
            unset($supportedLocales['kz']);
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
