<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LanguageSwitcher extends Component
{
    public $currentLocale;
    public $availableLocales;

    public function __construct()
    {
        $this->currentLocale = app()->getLocale();
        $this->availableLocales = config('app.available_locales');
    }

    public function render()
    {
        return view('components.language-switcher');
    }
}
