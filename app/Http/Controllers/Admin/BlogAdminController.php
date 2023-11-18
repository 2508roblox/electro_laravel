<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\BlogComment;
use App\Models\Blog;

class BlogAdminController extends Controller
{
    public function index(){
        $blogs = Blog::orderBy('id', 'DESC')->get();
        return view('admin.blog.index', compact('blogs'));
    }
}
