<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\Sku;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SubCategory $subcategory)
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


        // Tiếp tục xử lý dữ liệu và trả về kết quả
        $products = Product::join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
        ->select('products.*', 'sub_categories.name as sub_category_name')
        ->get();

    foreach ($products as $product) {
        $product->image_url = $product->productImages()
            ->orderBy('id', 'ASC')
            ->first()->image ?? null;
    }

    // total product's quantity
    foreach ($products as $product) {
        $skus = SKU::where('product_id', $product->id)->get();
        $totalQuantity = $skus->sum('quantity');
        $product->total_quantity = $totalQuantity;
        }
    $rcproducts = Product::join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
    ->select('products.*', 'sub_categories.name as sub_category_name')
    ->limit(10)
    ->orderBy('id', 'DESC')
    ->get();

foreach ($products as $product) {
    $product->image_url = $product->productImages()
        ->orderBy('id', 'ASC')
        ->first()->image ?? null;
}

        return view('shop.index', compact('products', 'categories', 'rcproducts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function search(Request $request)
    {
        $searchText = $request->input('text');

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

        // Tiếp tục xử lý dữ liệu và trả về kết quả
        $products = Product::join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
            ->where('products.name', 'like', '%' . $searchText . '%')
            ->select('products.*', 'sub_categories.name as sub_category_name')
            ->get();

        foreach ($products as $product) {
            $product->image_url = $product->productImages()
                ->orderBy('id', 'ASC')
                ->first()->image ?? null;
        }

        $rcproducts = Product::join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
            ->where('products.name', 'like', '%' . $searchText . '%')
            ->select('products.*', 'sub_categories.name as sub_category_name')
            ->limit(10)
            ->orderBy('id', 'DESC')
            ->get();

        foreach ($rcproducts as $product) {
            $product->image_url = $product->productImages()
                ->orderBy('id', 'ASC')
                ->first()->image ?? null;
        }

        return view('frontend.pages.search', compact('products', 'categories', 'rcproducts', 'searchText'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
