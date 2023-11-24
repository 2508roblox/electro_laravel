<?php

namespace App\Http\Controllers;

use App\Models\Sku;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wishlists = DB::table('wishlists')
            ->join('products', 'wishlists.product_id', '=', 'products.id')
            ->leftJoin('product_colors', 'products.id', '=', 'product_colors.product_id')
            ->leftJoin('product_images', function ($join) {
                $join->on('products.id', '=', 'product_images.product_id')->whereRaw('product_images.id = (SELECT MIN(id) FROM product_images WHERE product_id = products.id)');
            })
            ->select('product_images.image','wishlists.id as wishlisst_id', 'products.name as product_name', 'products.price as product_original_price', 'products.promotion_price as  promotion_price', 'products.id as  product_id',
            DB::raw('SUM(product_colors.quantity) as total_quantity'),
            )
            ->groupBy(
                'products.id',
                'products.name',
                'products.price',
                'products.promotion_price',
                'wishlists.id',


                'product_images.image'
            )
            ->where('wishlists.user_id', '=', Auth::user()->id)
            ->get();


        return view('frontend.pages.wishlist', compact('wishlists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            if (
                Wishlist::where('user_id', '=', Auth::user()->id)
                    ->where('product_id', '=', $request->wishlistProductId)
                    ->exists()
            ) {
                return redirect('/wishlist')->with('message', 'Product has already been add to wishlist');
            } else {
                $formValidate = $request->validate([
                    'wishlistProductId' => 'required',
                ]);
                Wishlist::create([
                    'product_id' => $formValidate['wishlistProductId'],
                    'user_id' => Auth::user()->id,
                ]);
                return redirect('/wishlist')->with('message', 'Add to wishlist successfully');
            }
        } else {
            return redirect('/auth/register');
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
    public function destroy( $id)
    {
        Wishlist::destroy($id);
       return $id;
    }
}
