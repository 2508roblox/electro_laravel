<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function loginUsingGoogle()
    {
       return Socialite::driver('google')->redirect();
    }

    public function callbackFromGoogle()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();
            Session::put('verifyStatus', true);
            $saveUser = User::updateOrCreate(
                ['google_id' => $user->getId()],
                [
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => Hash::make($user->getName().'@'.$user->getId())
                ]
            );

            // Kiểm tra xem wallet đã tồn tại cho user_id hay chưa
            $wallet = Wallet::where('user_id', $user->getId())->first();

            if (!$wallet) {
                // Nếu wallet chưa tồn tại, tạo mới
                $wallet = new Wallet;
                $wallet->user_id = $saveUser->id;
                $wallet->balance = 0;
                $wallet->save();
            }

            Auth::loginUsingId($saveUser->id);

            return redirect()->route('home');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
