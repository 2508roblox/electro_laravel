<?php

namespace App\Http\Controllers;
use App\Models\Blog;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
    
        $blogs = Blog::all();
        return view('blog.index', compact('blogs'));
    }
    
    public function post($id) {
        // Truy vấn blog dựa trên ID
        $blog = Blog::find($id);
    
        // if (!$blog) {
        //     abort(404);
        // }
    
        return view('blog.post', compact('blog'));
    }
}
