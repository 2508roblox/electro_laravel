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
        $validatedData = $request->validate([
            'product_id' => 'required',
            'rating' => 'required',
            'content' => 'required'
        ]);

        $productId = $validatedData['product_id'];
        $rating = $validatedData['rating'];
        $content = $validatedData['content'];
        // Lấy user_id của người dùng hiện tại
        $userId = Auth::id();

        if (count($validatedData) < 3) {
            return Redirect::back()->withErrors(['errors' => true]);
        }
        // Tạo ProductComment
        $productComment = new ProductComment();
        $productComment->product_id = $productId;
        $productComment->user_id = $userId;
        $productComment->rating = $rating;
        $productComment->content = $content;
        $productComment->save();

        // Các xử lý khác sau khi tạo ProductComment

        // Debug để kiểm tra
        return Redirect::back()->with(['review' => true]);
        return Redirect::back()->with(['errors' => true]);
    }
}
