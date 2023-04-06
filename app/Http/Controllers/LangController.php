<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    public function changetoenglish()
    {
        App::setLocale('en');
        Session::put('lang', 'en');
        return back();
    }


    public function changetoarabic()
    {
        App::setLocale('ar');
        Session::put('lang', 'ar');
        return back();
    }
}
