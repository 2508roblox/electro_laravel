<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GithubController extends Controller
{
    public function a2508roblox()
    {
        return view('admin.github.index', ['github' => '2508roblox']);
    }
    public function tranlehuyhoang()
    {
        return view('admin.github.index', ['github' => 'tranlehuyhoang']);
    }
    public function huutai2312()
    {
        return view('admin.github.index', ['github' => 'huutai2312']);
    }
}
