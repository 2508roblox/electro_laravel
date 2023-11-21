<?php

namespace App\Http\Controllers;

use App\Models\LoginHistory;
use Illuminate\Http\Request;

class LoginHistoryController extends Controller
{
    public function index()
    {
        // Lấy lịch sử đăng nhập cho user hiện tại
        $loginHistory = \App\Models\LoginHistory::where('user_id', auth()->id())->get();
        // dd($loginHistory);
        return view('frontend.myaccount.dashboard', compact('loginHistory'));
    }
}
