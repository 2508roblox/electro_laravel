<?php

namespace App\Http\Controllers;

use App\Models\BlogComment;
use App\Models\Blog;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {

        $blogs = Blog::all();
        return view('blog.index', compact('blogs'));
    }

    // public function post($id)
    // {
    //     // Truy vấn blog dựa trên ID
    //     $blog = Blog::find($id);

    //     // if (!$blog) {
    //     //     abort(404);
    //     // }

    //     return view('blog.post', compact('blog'));
    // }
    
    public function post($id) {
        $blog = Blog::with('comments.user')->find($id);
        return view('blog.post', compact('blog'));
    }

    public function storeComment(Request $request, $id)
    {
        // Validate request
        $request->validate([
            'content' => 'required',
        ]);

        $comment = new BlogComment([
            'blog_id' => $id,
            'user_id' => auth()->user()->id,
            'user_role' => auth()->user()->role_as,
            'content' => $request->input('content'),
            'status' => 'draft',
            'ip_address' => $request->ip(),
            'ip_spam' => '',
            'report_count' => 0,
        ]);

        $comment->save();

        return redirect()->back();
    }

    public function reportComment($commentId)
    {
        $comment = BlogComment::find($commentId);

        $comment->report_count += 1;
        $comment->save();

        return redirect()->back();
    }
}
