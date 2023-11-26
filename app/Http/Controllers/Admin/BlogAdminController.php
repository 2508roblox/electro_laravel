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
    public function index()
    {
        $blogs = Blog::orderBy('id', 'DESC')->get();
        return view('admin.blog.index', compact('blogs'));
    }
    public function showComment()
    {
        $comments = BlogComment::orderBy('created_at', 'DESC')->get();
        return view('admin.blog.comment', compact('comments'));
    }
    
    public function editComment($id)
    {
        $comment = BlogComment::find($id);
        $comments = BlogComment::all();
        return view('admin.blog.edit-comment', compact('comment', 'comments'));
    }

    public function updateComment(Request $request, $id)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        // Validate request
        $request->validate([
            'content' => 'required',
            'status' => 'required|in:show,hide',
            'is_accept' => 'required|in:accepted,not accepted',
            'report_count' => 'numeric',
            'updated_at' => date('d-m-Y H:i:s'),
        ]);

        $comment = BlogComment::find($id);

        $comment->content = $request->input('content');
        $comment->status = $request->input('status');
        $comment->is_accept = $request->input('is_accept');
        $comment->report_count = $request->input('report_count');
        $comment->updated_at = $request->date('d-m-Y H:i:s');

        $comment->save();

        return redirect()->back()->with('success', 'Comment updated successfully.');
    }
}
