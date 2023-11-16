<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyAccountController extends Controller
{
    public function index(){
        return view("frontend.myaccount.dashboard");
    }
    public function order(){
        return view("frontend.myaccount.order");
    }
    public function address(){
        return view("frontend.myaccount.address");
    }
    public function accountdetail(){
        return view("frontend.myaccount.accountdetail");
    }
}
