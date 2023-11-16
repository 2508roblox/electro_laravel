<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductImage;
use App\Models\Slider;
use App\Models\SubCategory;

class FileManagerController extends Controller
{
    public function index()
    {
        // Lấy tất cả hình ảnh từ bảng product_images
        $productImages = ProductImage::all();
        $slideImages = Slider::all();
        $blogImages = Blog::all();
        $subcategoryImages = SubCategory::all();

        // dd($images);

        return view('admin.file-manager.index', ['productImages' => $productImages, 'lenght' => $productImages->count(), 'slideImages' => $slideImages->count(), 'blogImages' => $blogImages->count(), 'subcategoryImages' => $subcategoryImages->count()]);
    }
    public function slide()

    {
        // Lấy tất cả hình ảnh từ bảng product_images
        $productImages = ProductImage::all();
        $slideImages = Slider::all();
        $blogImages = Blog::all();
        $subcategoryImages = SubCategory::all();

        // dd($images);

        return view('admin.file-manager.index', ['productImages' => $slideImages, 'lenght' => $productImages->count(), 'slideImages' => $slideImages->count(), 'blogImages' => $blogImages->count(), 'subcategoryImages' => $subcategoryImages->count()]);
    }
    public function blog()
    {
        // Lấy tất cả hình ảnh từ bảng product_images
        $productImages = ProductImage::all();
        $slideImages = Slider::all();
        $blogImages = Blog::all();
        $subcategoryImages = SubCategory::all();

        // dd($images);

        return view('admin.file-manager.index', ['productImages' => $blogImages, 'lenght' => $productImages->count(), 'slideImages' => $slideImages->count(), 'blogImages' => $blogImages->count(), 'subcategoryImages' => $subcategoryImages->count()]);
    }
    public function subcategory()
    {
        // Lấy tất cả hình ảnh từ bảng product_images
        $productImages = ProductImage::all();
        $slideImages = Slider::all();
        $blogImages = Blog::all();
        $subcategoryImages = SubCategory::all();

        // dd($images);

        return view('admin.file-manager.index', ['productImages' => $subcategoryImages, 'lenght' => $productImages->count(), 'slideImages' => $slideImages->count(), 'blogImages' => $blogImages->count(), 'subcategoryImages' => $subcategoryImages->count()]);
    }
}
