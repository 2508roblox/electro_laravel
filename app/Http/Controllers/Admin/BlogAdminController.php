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
use App\Services\ImgurService;

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

    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'fileImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'title' => 'required',
            'slug' => 'required|unique:blogs',
            'tag' => 'required|max:255',
            'short_description' => 'required',
            'long_description' => 'required',
            'status' => 'required|in:Published,draft',
        ]);

        // Xử lý upload hình ảnh lên Imgur và nhận link
        $imgurLink = $this->uploadToImgur($request->file('fileImage'));

        // Tạo blog mới
        $blog = new Blog([
            'title' => $request->input('title'),
            'tag' => $request->input('tag'),
            'date_time' => now(), // Đặt ngày giờ hiện tại hoặc có thể sửa đổi theo yêu cầu
            'short_description' => $request->input('short_description'),
            'long_description' => $request->input('long_description'),
            'image' => $imgurLink,
            'slug' => Str::slug($request->input('title')), // Tự động tạo slug từ title
            'status' => $request->input('status'),
            // Thêm các trường khác nếu cần
        ]);

        // Lưu blog vào cơ sở dữ liệu
        $blog->save();

        // Chuyển hướng hoặc trả về view mong muốn
        return redirect()->route('admin.blog')->with('success', 'Blog đã được tạo thành công!');
    }

    // Phương thức để upload hình ảnh lên Imgur
    private function uploadToImgur($file)
    {
        $clientId = config('app.imgur_client_id');
        $clientSecret = config('app.imgur_client_secret');

        // Kiểm tra xem đã cung cấp đủ thông tin Imgur trong file env không
        if (!$clientId || !$clientSecret) {
            // Xử lý trường hợp thiếu thông tin Imgur
            return redirect()->back()->with('error', 'Vui lòng cung cấp thông tin Imgur Client ID và Client Secret trong file env.');
        }

        // Gọi Imgur API để upload hình ảnh
        $response = Http::withHeaders([
            'Authorization' => 'Client-ID ' . $clientId,
        ])->attach('image', file_get_contents($file), $file->getClientOriginalName())
            ->post('https://api.imgur.com/3/image');

        // Kiểm tra xem có lỗi không
        if ($response->failed()) {
            // Xử lý trường hợp lỗi khi upload hình ảnh
            return redirect()->back()->with('error', 'Có lỗi khi upload hình ảnh lên Imgur.');
        }

        // Lấy link hình ảnh từ phản hồi của Imgur API
        $imgurLink = $response->json('data.link');

        return $imgurLink;
    }


    // public function create(Request $request)
    // {

    //     // Validate input data
    //     $request->validate([
    //         'title' => 'required',
    //         'tag' => 'required',
    //         'slug' => 'required',
    //         'short_description' => 'required',
    //         'long_description' => 'required',
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'status' => 'required|in:Published,Draft',
    //     ]);

    //     // Tạo đối tượng ImgurService
    //     $imgurService = new ImgurService();

    //     // Upload hình ảnh lên Imgur và lấy link
    //     $imgLink = $imgurService->uploadImage($request->file('fileImage'));

    //     // Tạo đối tượng Blog mới
    //     $blog = new Blog([
    //         'title' => $request->input('title'),
    //         'tag' => $request->input('tag'),
    //         'short_description' => $request->input('short_description'),
    //         'long_description' => $request->input('long_description'),
    //         'image' => $imgLink,
    //         'status' => $request->input('status'),
    //     ]);

    //     // Lưu vào cơ sở dữ liệu
    //     $blog->save();

    //     // Redirect hoặc thông báo thành công
    //     return redirect()->route('admin.blog.create')->with('success', 'Blog được tạo thành công');

    // }

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
