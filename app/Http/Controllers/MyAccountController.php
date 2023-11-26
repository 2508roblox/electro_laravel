<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\BlogComment;

class MyAccountController extends Controller
{
    public function index()
    {
        $loginHistory = \App\Models\LoginHistory::where('user_id', auth()->id())->get();
        
        $userId = Auth::id();
        $userComments = BlogComment::where('user_id', $userId)->orderBy('created_at', 'desc')->get();
        
        return view("frontend.myaccount.dashboard", compact('loginHistory', 'userComments'));
    }
    // public function order(){
    //     return view("frontend.myaccount.order");
    // }
    // public function address(){
    //     return view("frontend.myaccount.address");
    // }
    // public function accountdetail(){
    //     return view("frontend.myaccount.accountdetail");
    // }

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'companyname' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'zipcode' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();
        $user->update($request->all());

        return redirect()->route('frontend.myaccount.dashboard')->with('success', 'Profile updated successfully');
    }

    public function userComments()
    {
        $userComments = BlogComment::where('user_id', auth()->user()->id)->with('blog')->get();
        return view("frontend.myaccount.usercomments", compact('userComments'));
    }
}
