<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\LoginHistory;
use App\Mail\VerifyMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([

            'email' =>  'required',
            'password' => 'required'
        ]);
        //put account status to session
        $user = User::where('email', '=', $credentials['email'])->first();
        // check email verify
        //check authentication
        if (!$user) return back()->withErrors([
            'message' => 'Invalid Email or Password',
        ])->onlyInput('email');
        //storage email for otp view
        Session::put('registeredEmail',  $user->email);
        //check account verify status
        if ($user->email_verified_at) {
            Session::put('verifyStatus', true);

            # code...
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                // Thêm dòng sau đoạn code đăng nhập thành công
                $this->recordLoginHistory(Auth::user()->id, $request->ip());

                if (Auth::user()->role_as == '1') {
                    return redirect('/admin/dashboard');
                } else {
                    return redirect('/');
                }
            }
        } else {
            $user->otp = random_int(100000, 999999);
            $user->save();
            //send mail with otp
            Mail::to(($user->email))->send(new VerifyMail($user->otp));
            return redirect('/verify-email');
        }



        return back()->withErrors([
            'message' => 'Email or password is incorrect',
        ])->onlyInput('email');
    }

    private function recordLoginHistory($userId, $ipAddress)
    {
        // Sử dụng model để lưu lịch sử đăng nhập
        \App\Models\LoginHistory::create([
            'user_id' => $userId,
            'login_time' => now(),
            'ip_address' => $ipAddress,
            'status' => 'success',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function index()
    {
        return view('auth.auth');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
