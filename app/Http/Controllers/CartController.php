<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\ProductColor;
use App\Models\Sku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // if(!Auth::user()) {
        //     return redirect('auth/register');
        // }
        $carts = DB::table('carts')
        ->join('products', 'products.id', '=', 'carts.product_id')
        ->join('skus', 'skus.id', '=', 'carts.sku_id')
        // ->join('colors', 'colors.id', '=', 'product_colors.color_id')
        ->leftJoin('product_images', function ($join) {
            $join->on('products.id', '=', 'product_images.product_id')
                ->whereRaw('product_images.id = (SELECT MIN(id) FROM product_images WHERE product_id = products.id)');
        })
        ->select('carts.id as cart_id','products.name as product_name', 'product_images.image as product_image',   'carts.quantity', 'carts.sku_id', 'skus.original_price', 'skus.promotion_price', 'skus.sku_code as sku','skus.quantity as max_variant_quantity')
        ->where('carts.user_id', Auth::user()->id)
        ->get();
        
        return view('frontend.pages.cart', compact('carts') );

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $existCart = Cart::where('user_id', $request->input('user_id'))
            ->where('product_id', $request->input('product_id'))
            ->where('sku_id', $request->input('sku_id'))
            ->exists();

        $product_variant_qty = Sku::find($request->input('sku_id'))->quantity;

        if ($existCart) {
            $existCartQty = Cart::where('user_id', $request->input('user_id'))
                ->where('product_id', $request->input('product_id'))
                ->where('sku_id', $request->input('sku_id'))
                ->first();

            // Kiểm tra số lượng
            if ($product_variant_qty < ($existCartQty->quantity + $request->input('quantity'))) {
                return 'Add error: Product is out of quantity';
            } else {
                $existCartQty->update([
                    'quantity' => $existCartQty->quantity + $request->input('quantity')
                ]);
                return response('Add success: Product added to cart successfully', 200);
            }
        } else {
            $validateData = $request->validate([
                'user_id' => 'required',
                'product_id' => 'required',
                'quantity' => 'required',
                'sku_id' => 'required',
            ]);

            Cart::create([
                'user_id' => $validateData['user_id'],
                'product_id' => $validateData['product_id'],
                'quantity' => $validateData['quantity'],
                'sku_id' => $validateData['sku_id'],
            ]);

            return response('Add success: Product added to cart successfully', 200);

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
    public function update( )
    {
        $cart_id = request()->cart_id;
        $qty = request()->quantity;
        $cart = Cart::find($cart_id);
        $cart->quantity = $qty;
        $cart->save();
        return request()->cart_id;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
      Cart::destroy($id);
      return redirect('cart');
    }
}
