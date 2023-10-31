<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Order;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();
        $categories = Category::all()->where('status', '=', 'published');
        $number = [
            '1' => 'one',
            '2' => 'two',
            '3' => 'three',
            '4' => 'four',
            '5' => 'five',
            '6' => 'six',
        ];
        $products = Product::join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
        ->select('products.*', 'sub_categories.name as sub_category_name')
        ->limit(15)
        ->orderBy('id','desc')
        ->get();

    foreach ($products as $product) {
        $product->image_url = $product->productImages()
            ->orderBy('id', 'ASC')
            ->first()->image ?? null;
    }
        return view('home', compact('sliders', 'number', 'categories', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function showCategories($category_slug)
    {
        $categories = Category::with(['sub_categories.products'])
            ->where('status', 'published')
            ->get();

        foreach ($categories as $category) {
            $totalCategoryProducts = 0;
            $subCategoriesWithProductCount = [];

            foreach ($category->sub_categories as $subCategory) {
                $productCount = $subCategory->products->count();
                $totalCategoryProducts += $productCount;

                $subCategoriesWithProductCount[] = [
                    'subCategory' => $subCategory,
                    'productCount' => $productCount,
                ];
            }

            $category->subCategoriesWithProductCount = $subCategoriesWithProductCount;
            $category->totalProducts = $totalCategoryProducts;
        }

        //current category
        $currentCategory = Category::with(['sub_categories.products'])
            ->where('status', 'published')
            ->where('slug', $category_slug)
            ->get();

        foreach ($currentCategory as $currentCate) {
            $totalCategoryProducts = 0;
            $subCategoriesWithProductCount = [];

            foreach ($currentCate->sub_categories as $subCategory) {
                $productCount = $subCategory->products->count();
                $totalCategoryProducts += $productCount;

                $subCategoriesWithProductCount[] = [
                    'subCategory' => $subCategory,
                    'productCount' => $productCount,
                ];
            }
            $currentCate->subCategoriesWithProductCount = $subCategoriesWithProductCount;
            $currentCate->totalProducts = $totalCategoryProducts;
        }
        //current category
        return view('frontend.categories', compact('categories', 'currentCategory'));
    }

    ///showCategoryProducts
    public function showCategoryProducts(SubCategory $subcategory, Brand $brand, $category_slug, $sub_slug)
    {
        $categories = Category::with(['sub_categories.products'])
            ->where('status', 'published')
            ->get();

        foreach ($categories as $category) {
            $totalCategoryProducts = 0;
            $subCategoriesWithProductCount = [];

            foreach ($category->sub_categories as $subCategory) {
                $productCount = $subCategory->products->count();
                $totalCategoryProducts += $productCount;

                $subCategoriesWithProductCount[] = [
                    'subCategory' => $subCategory,
                    'productCount' => $productCount,
                ];
            }

            $category->subCategoriesWithProductCount = $subCategoriesWithProductCount;
            $category->totalProducts = $totalCategoryProducts;
        }
        $currentCategory = Category::with(['sub_categories.products'])
            ->where('status', 'published')
            ->where('slug', $category_slug)
            ->get();

        foreach ($currentCategory as $currentCate) {
            $totalCategoryProducts = 0;
            $subCategoriesWithProductCount = [];

            foreach ($currentCate->sub_categories as $subCategory) {
                $productCount = $subCategory->products->count();
                $totalCategoryProducts += $productCount;

                $subCategoriesWithProductCount[] = [
                    'subCategory' => $subCategory,
                    'productCount' => $productCount,
                ];
            }
            $currentCate->subCategoriesWithProductCount = $subCategoriesWithProductCount;
            $currentCate->totalProducts = $totalCategoryProducts;
        }
        $currentCategory = $currentCategory[0];

        ////end categories sidebar
        $category = Category::with(['sub_categories'])
            ->where('slug', $category_slug)
            ->get()[0];

        $sub_category = $subcategory->where('slug', $sub_slug)->get()[0];
        $products = $sub_category
            ->products()
            ->filter(request(['filterOptions', 'brands']))
            ->get();
        foreach ($products as $product) {
            $product->image_url =
                $product
                    ->productImages()
                    ->orderBy('id', 'ASC')
                    ->first()->image ?? null;
        }
        $brands = Brand::with('products')->get();
        $brands = $brand->countProducts($brands, $sub_category->id);
        return view('frontend.categoryProduct', compact('sub_category', 'products', 'brands', 'currentCategory', 'categories'));
    }
    public function showSingleProduct($product_slug)
    {
        $product = Product::where('slug', $product_slug)->first();
        if (!$product) {
            // Xử lý khi không tìm thấy sản phẩm
            abort(404);
        }
        //breadcrumb
        $sub_cate_name = $product->getSubCate()->get()[0];

        $cate_name = $product
            ->getSubCate()
            ->get()[0]
            ->getCate()
            ->get()[0];
        $images = $product->productImages()->get();

        $colors_quantity =  DB::table('product_colors')->join('colors', 'product_colors.color_id', '=', 'colors.id')
        ->select('*',  'colors.name as colors_name', 'product_colors.id as product_colors_id', 'quantity as product_color_quantity'  )
        ->where('product_colors.product_id', '=', $product->id)
        ->get();
        $colors = DB::table('colors')->select('*'  )->get();
        $colorsArr = [];
        foreach ($colors as $color) {
            $colorsArr[$color->id] = $color->code;
        }
        $totalQuantity = 0;
        foreach ($colors_quantity as $color) {
            # code...
            $totalQuantity += $color->quantity;
        }
        return view(
            'frontend.pages.singleProduct',
            compact(
                'product',
                'sub_cate_name',
                'cate_name',
                'images',
                'colors_quantity',
                'colorsArr',
                'totalQuantity'
            ),
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function checkpayment(Request $request)
    {
        if ($request->vnp_ResponseCode == '24') {
            $order_id = $request->vnp_TxnRef;
            $order = Order::find($order_id);
            $order->status = 'unpaid';
            $order->save();
            // chưa thanh toán
        return redirect('/order')->with('message', 'Paid Cancelled, Please pay now');

       }elseif($request->vnp_ResponseCode == '00'){
        $order_id = $request->vnp_TxnRef;
        $order = Order::find($order_id);
        $order->status = 'paid';
        $order->save();
        return redirect('/order')->with('message', 'Paid Successfully, explore new our products');

       }

       else {
        return redirect('/order');
       }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
