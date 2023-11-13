<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\VerifyMail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class OtpController extends Controller
{
    public function index()
    {
        return view('frontend.pages.otp' );
    }
    public function store()
    {
        $otp = request()->otp;

        $code= '';
        foreach( $otp as $key => $value ) {
            $code = $code . $value;
        }
        $user = User::where('email', '=', Session::get('registeredEmail'))->get()[0];

        if ($user->otp == $code) {
            $user->email_verified_at = Carbon::now();
            $user->save();
            auth()->login($user);
            Session::put('verifyStatus', true);
            return redirect('/')->with('success','verify account successfully');
        }
        else {
            return redirect()->back()->with('error','the otp code is not valid');

        }
        // dd( $code, Session::get('registedEmail') );
        // return view('frontend.pages.otp' );
    }

}
