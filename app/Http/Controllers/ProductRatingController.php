<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductRatingController extends Controller
{
    public function rating(Request $request){
        dd( $request);
        return view("frontend.forgotPassword.index");
    }

}
