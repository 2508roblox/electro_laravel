<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index(Request $request)
    {
        return view('frontend.pages.about');
    }
}
