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

        $telegramBotToken = env('TELEGRAM_BOT_TOKEN');
        $chatId = env('TELEGRAM_CHAT_ID');
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        $authName = Auth::check() ? Auth::user()->name : "Guest";
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $currentDateTime = date('d-m-Y H:i:s');

        // $routeName = \Route::currentRouteName();

        // Tạo nội dung thông báo
        $message = "📢 User đã bình luận\n💻 $ipAddress\n🙍‍♂️ $authName\n⌚ $currentDateTime\n📝 ID Bài viết: $id\n🗒️ Status: Draft";

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

        return redirect()->back()->with('success', 'Your comment is under review.');
    }

    public function reportComment($commentId)
    {
        $comment = BlogComment::find($commentId);

        $comment->report_count += 1;
        $comment->save();

        return redirect()->back();
    }
    
}
