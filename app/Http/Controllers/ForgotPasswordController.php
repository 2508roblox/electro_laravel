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
        Mail::to($email)->send(new ResetPassMail($otp, $email));

        return back()->with('success', 'Check the reset link in your email');
    }
    public function reset(Request $request)
    {
        // Lấy địa chỉ email và mã OTP từ URL
        $email = urldecode($request->input('mail'));
        $otp = urldecode($request->input('otp'));

        // Kiểm tra tính hợp lệ của địa chỉ email và mã OTP
        $user = User::where('email', $email)->first();
        if (!$user || !($user->otp == $otp)) {
            return back()->with('error', 'Địa chỉ email hoặc mã OTP không hợp lệ');
        }

        return view("frontend.forgotPassword.change", compact('email'));
    }

    public function store(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $passwordConfirmation = $request->password_confirmation;

        // Kiểm tra xem hai mật khẩu đã nhập có khớp hay không
        if ($password !== $passwordConfirmation) {
            return back()->with('error', 'Mật khẩu xác nhận không khớp');
        }

        // Tìm người dùng với email tương ứng
        $user = User::where('email', $email)->first();
        if (!$user) {
            return back()->with('error', 'Người dùng không tồn tại');
        }

        // Lưu mật khẩu mới cho người dùng
        $user->password = bcrypt($password);
        $user->save();

        return redirect()->route('login')->with('success', 'Mật khẩu đã được thay đổi thành công. Vui lòng đăng nhập bằng mật khẩu mới của bạn.');
    }

}
