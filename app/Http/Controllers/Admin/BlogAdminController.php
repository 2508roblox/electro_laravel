<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

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
    
    public function edit($id)
    {
        $blog = Blog::find($id);
        $blogs = Blog::all();
        return view('admin.blog.edit', compact('blog', 'blogs'));
    }
    
    public function update(Request $request, $id)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        // Validate request
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'tag' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'image' => 'required',
            'status' => 'required|in:Published,Draft',
            'updated_at' => now(),
        ]);

        $blog = Blog::find($id);

        $blog->title = $request->input('title');
        $blog->slug = $request->input('slug');
        $blog->tag = $request->input('tag');
        $blog->short_description = $request->input('short_description');
        $blog->long_description = $request->input('long_description');
        $blog->image = $request->input('image');
        $blog->status = $request->input('status');
        $blog->updated_at = $request->date('d-m-Y H:i:s');

        $blog->save();

        return redirect()->back()->with('success', 'Blog updated successfully.');
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

    public function create()
    {
        return view('admin.blog.create');
    }

    public function getAndStorePost()
    {
        $newsApiKey = env('NEWSAPI');
        $sourceNewsApiKey = env('SOURCE_NEWSAPI');

        // Gửi yêu cầu đến News API
        $response = Http::get("https://newsapi.org/v2/everything", [
            'sources' => $sourceNewsApiKey,
            'apiKey' => $newsApiKey,
        ]);

        $newsArticles = $response->json()['articles'];

        // Lưu vào cơ sở dữ liệu
        foreach ($newsArticles as $article) {
            Blog::create([
                'title' => $article['title'],
                'tag' => 'News',
                'date_time' => now(),
                'short_description' => $article['description'],
                'long_description' => $article['content'],
                'image' => $article['urlToImage'],
                'slug' => Str::slug($article['title']),
                'status' => 'Draft',
            ]);
        }

        if ($newsArticles) {
            return redirect()->back()->with('success', 'Các bài viết đã được thêm vào DB.');
        } else {
            return redirect()->back()->with('error', 'Có lỗi xảy ra. Các bài viết chưa được thêm vào DB.');
        }
    }

    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return redirect('admin/blog');
    }
}
