<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class LanguageController extends Controller
{
    /**
     * @param string $locale
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeLanguage(string $locale)
    {
        session(['locale' => $locale]);
        App::setLocale($locale);
        return redirect()->back();
    }
}
