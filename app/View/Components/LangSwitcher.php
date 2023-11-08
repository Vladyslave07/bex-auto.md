<?php

namespace App\View\Components;

use App\Models\Domain;
use Illuminate\View\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Cookie;

class LangSwitcher extends Component
{
    public $locales;
    public $currentLocale;

    public $hideLangSwitchBtn = true;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->currentLocale = LaravelLocalization::getCurrentLocale();
        $this->setLocales();
        $this->hideLangBtn();
    }


    public function setLocales()
    {
        $supportedLocales = LaravelLocalization::getSupportedLocales();

        foreach ($supportedLocales as $key => $locale) {
            if ($locale['default'] === true || $key === $this->currentDomain()?->slug) {
                $this->locales[$key] = $locale;
            }
        }
    }

    /**
     * @return mixed
     */
    public function currentDomain()
    {
        $domainSlug = app('domain')?->getDomain()->slug ?: 'uk';
        return Domain::domainBySlug($domainSlug);
    }

    public function hideLangBtn()
    {
        if ($this->currentDomain()?->slug == Domain::DEFAULT_SLUG_DOMAIN) {
            if ($this->currentLocale == 'ru' && !Cookie::get('show_lang_switch_btn')) {
                $this->hideLangSwitchBtn = false;
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.lang-switcher');
    }
}
