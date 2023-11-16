<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentDatabase extends Controller
{
    public function index()
    {
        return view('admin.doc.index');
    }
}
