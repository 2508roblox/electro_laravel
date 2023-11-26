<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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

    public function post($id)
    {
        $blog = Blog::with('comments.user')->find($id);
        return view('blog.post', compact('blog'));
    }

    public function storeComment(Request $request, $id)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        // Validate request
        $request->validate([
            'content' => 'required',
        ]);

        $comment = new BlogComment([
            'blog_id' => $id,
            'user_id' => auth()->user()->id,
            'content' => $request->input('content'),
            'status' => 'show',
            'is_accept' => 'not accepted',
            'is_deleted' => '',
            'ip_address' => $request->ip(),
            'report_count' => 0,
            'created_at' => date('d-m-Y H:i:s'),
        ]);

        $comment->save();

        $telegramBotToken = env('TELEGRAM_BOT_TOKEN');
        $chatId = env('TELEGRAM_CHAT_ID');
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        $authName = Auth::check() ? Auth::user()->name : "Guest";
        $currentDateTime = date('d-m-Y H:i:s');

        $postUrl = route('fe.post', ['id' => $id]);

        // Tạo nội dung thông báo
        $message = "
        📢   User đã bình luận\n
        -Vui lòng xem xét và chấp thuận\n
        💻 $ipAddress\n
        🙍‍♂️ $authName\n
        ⌚ $currentDateTime\n
        📝 ID Bài viết: $id\n
        👌 Status: Show\n
        🗒️ Cmt: $comment->content\n
        🌐 URL Bài viết: $postUrl";

        $telegramApiUrl = "https://api.telegram.org/bot$telegramBotToken/sendMessage";

        // Dữ liệu gửi đến API
        $data = [
            'chat_id' => $chatId,
            'text' => $message,
        ];

        // cURL để gửi request
        $ch = curl_init($telegramApiUrl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

        if ($comment) {
            return redirect()->back()->with('success', 'Your comment is under review.');
        } else {
            return redirect()->back()->with('error', 'An error has occurred, please contact admin.');
        }
    }

    public function reportComment($commentId)
    {
        $comment = BlogComment::find($commentId);

        $comment->report_count += 1;
        $comment->save();

        return redirect()->back();
    }

    public function hideComment($commentId)
    {
        $comment = BlogComment::find($commentId);
        $comment->status = 'hide';
        $comment->save();

        return redirect()->back();
    }

    public function showComment($commentId)
    {
        $comment = BlogComment::find($commentId);
        $comment->status = 'show';
        $comment->save();

        return redirect()->back();
    }

    public function deleteComment($commentId)
    {
        $comment = BlogComment::find($commentId);
        $comment->is_deleted = 'deleted';
        $comment->save();

        return redirect()->back();
    }
}
