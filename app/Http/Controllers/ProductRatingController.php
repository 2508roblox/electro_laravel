<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductComment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProductRatingController extends Controller
{
    public function rating(Request $request)
    {
        // Lấy dữ liệu từ request
        $productId = $request->input('product_id');
        $rating = $request->input('rating');
        $content = $request->input('content');

        // Lấy user_id của người dùng hiện tại
        $userId = Auth::id();

        // Tạo ProductComment
        $productComment = new ProductComment();
        $productComment->product_id = $productId;
        $productComment->user_id = $userId;
        $productComment->rating = $rating;
        $productComment->content = $content;
        $productComment->save();

        // Các xử lý khác sau khi tạo ProductComment

        // Debug để kiểm tra
        return Redirect::back()->with('message', 'Đánh giá đã được gửi thành công.');
    }
}
