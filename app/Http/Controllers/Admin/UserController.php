<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Wallet;;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // $users = User::all();
        // return view('admin.user.index', compact('users'));
        $users = User::with('wallet')->get();
        return view('admin.user.index', compact('users'));
    }
    
    public function create()
    {
        $users = User::all();
        return view('admin.user.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'email_verified_at' => 'nullable',
            'password' => 'required',
            'remember_token' => 'nullable',
            'created_at' => NOW(),
            'updated_at' => 'nullable',
            'role_as' => "required",
        ]);

        $validatedData['role_as'] = $validatedData['role_as'] == 'Admin' ? '1' : '0';
        User::create($validatedData);
        return redirect('admin/user')->with('message','user has been created successfully!');
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
    public function edit($id)
    {
        $user = user::find($id);
        $users = User::all();
        return view('admin.user.edit', compact('user', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role_as' => 'required',
        ]);

        $validatedData['role_as'] = $request->has('role_as') ? '1' : '0';
        User::find($id)->update($validatedData);

        return redirect()->route('admin.user.list')->with('message', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = user::find($id);
        $user->delete();
        return redirect('admin/user');
    }
}
