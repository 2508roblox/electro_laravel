<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Lấy user id hiện tại
        $userId = Auth::id();

        // Lấy danh sách orders của user id hiện tại
        $orders = Order::where('user_id', $userId)
        ->orderBy('id', 'desc')
        ->get();

        // Tạo mảng để lưu thông tin các order
        $orderData = [];

        foreach ($orders as $order) {
            // Lấy thông tin order
            $orderId = $order->id;
            $date = $order->created_at;
            $method = $order->payment_mode;
            $status = $order->status;

            // Lấy thông tin order items dựa vào id của order
            $orderItems = OrderItem::where('order_id', $orderId)->get();

            // Tính tổng quantity và tổng total của order items
            $totalQuantity = $orderItems->sum('quantity');
            $totalPrice = $orderItems->sum(function ($item) {
                return $item->quantity * $item->price;
            });

            // Thêm thông tin order và order items vào mảng
            $orderData[] = [
                'ID' => $orderId,
                'Date' => $date,
                'Total Quantity' => $totalQuantity,
                'Total Price' => $order->total_amount,
                'Method' => $method,
                'Status' => $status,
            ];
        }

        // Trả về view frontend.pages.order và truyền thông tin orders vào view
        return view('frontend.pages.order', ['orders' => $orderData]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $orderItems = DB::table('order_items')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->leftJoin('product_images', function ($join) {
                $join->on('products.id', '=', 'product_images.product_id')
                    ->whereRaw('product_images.id = (SELECT MIN(id) FROM product_images WHERE product_id = products.id)');
            })
            ->select('order_items.id','order_items.quantity', 'order_items.price', 'products.name as product_name', 'product_images.image')
            ->where('order_items.order_id', $id)
            ->get();

        return view('frontend.pages.orderDetail', compact('orderItems'));
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
