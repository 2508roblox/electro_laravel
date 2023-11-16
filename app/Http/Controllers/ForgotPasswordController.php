<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\ResetPassMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function index(){
        return view("frontend.forgotPassword.index");
    }
    public function handle(Request $request)
    {
        $email = $request->email;

        // Kiểm tra xem email có tồn tại trong model User hay không
        $user = User::where('email', $email)->first();
        if (!$user) {
            return back()->with('error', 'Email không tồn tại');
        }

        // Tạo mã OTP (One-Time Password) hoặc sử dụng logic xác nhận mật khẩu khác
        $otp =random_int(100000, 999999);
        $user->otp =  $otp;
        $user->save();


        // Gửi email chứa mã OTP đến địa chỉ email người dùng
        Mail::to($email)->send(new ResetPassMail($otp));

        return view("frontend.forgotPassword.index");
    }

}
