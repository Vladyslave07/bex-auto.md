<?php

namespace App\View\Components;

use App\Models\Domain;
use Illuminate\View\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class LangSwitcher extends Component
{
    public $locales;
    public $currentLocale;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->currentLocale = LaravelLocalization::getCurrentLocale();
        $this->setLocales();
    }


    public function setLocales()
    {
        $supportedLocales = LaravelLocalization::getSupportedLocales();

        foreach ($supportedLocales as $key => $locale) {
            if ($locale['default'] === true || $key === $this->currentDomain()->slug) {
                $this->locales[$key] = $locale;
            }
        }
    }

    /**
     * @return mixed
     */
    public function currentDomain()
    {
        // todo: Вынести установку домена глобально
        $domainSlug = trim(preg_replace('/(.*)\/\//', '', str_replace(env('APP_DOMAIN'), '', request()->root())), '.') ?: 'uk';
        return Domain::domainBySlug($domainSlug);
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
