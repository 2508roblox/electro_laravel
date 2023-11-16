<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DesignDatabase extends Controller
{
    public function index()
    {
        return view('admin.database.design');
    }
    public function usecase()
    {
        return view('admin.database.usecase');
    }
}
