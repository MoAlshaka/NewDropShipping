<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    public function en()
    {
        Session::put('lang', 'en');
        return back();
    }
    public function ar()
    {
        Session::put('lang', 'ar');
        return back();
    }
}
