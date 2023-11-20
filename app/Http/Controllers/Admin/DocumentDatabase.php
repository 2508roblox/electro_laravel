<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentDatabase extends Controller
{
    public function sheet()
    {
        return view('admin.doc.sheet');
    }
    public function word()
    {
        return view('admin.doc.word');
    }
}
