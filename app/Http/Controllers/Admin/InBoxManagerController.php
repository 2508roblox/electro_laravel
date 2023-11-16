<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;

class InBoxManagerController extends Controller
{
    public function index()
    {
        $users = User::whereNotNull('otp')->get();
        $count = User::whereNotNull('otp')->count();
        $count_invoice = Order::where('status', 'paid')->count();

        return view('admin.inbox.index', compact('users', 'count', 'count_invoice'));
    }
    public function detail_verify($id)
    {
        // dd($id);
        $user = User::find($id);
        $users = User::whereNotNull('otp')->get();
        $count = User::whereNotNull('otp')->count();
        $count_invoice = Order::where('status', 'paid')->count();

        return view('admin.inbox.verify_detail', compact('user', 'users', 'count', 'count_invoice'));
    }
    public function detail_invoice($id)
    {
        $order = Order::find($id);

        // Tạo mảng để lưu thông tin các order
        $orderData = [];


        // Lấy thông tin order
        $orderId = $order->id;
        $date = $order->created_at->format('Y-m-d');
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
            'Total Price' => $totalPrice,
            'Method' => $method,
            'Status' => $status,
            'Name' => ucwords($order->firstname . ' ' . $order->lastname),



        ];
        //order items
        $order_items = OrderItem::where('order_id', $orderId)
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->leftJoin('product_colors', 'order_items.product_color_id', '=', 'product_colors.id')
            ->leftJoin('product_images', function ($join) {
                $join->on('products.id', '=', 'product_images.product_id')
                    ->whereRaw('product_images.id = (SELECT MIN(id) FROM product_images WHERE product_id = products.id)');
            })
            ->leftJoin('colors', 'product_colors.color_id', '=', 'colors.id') // Thêm join với bảng colors
            ->select(
                'order_items.id',

                'order_items.quantity',
                'order_items.created_at',
                'order_items.updated_at',
                'product_images.image',
                'products.name AS product_name',
                'order_items.price AS product_price',
                'product_colors.color_id',
                'colors.name AS color_name', // Lấy ra trường name từ bảng colors
                'colors.code AS color_code' // Lấy ra trường code từ bảng colors
            )
            ->get();
        $order_data = $order;
        $order = $orderData[0];


        $user = Order::find($id);
        $users = User::whereNotNull('otp')->get();
        $count = User::whereNotNull('otp')->count();
        $count_invoice = Order::where('status', 'paid')->count();

        return view('admin.inbox.invoice_detail', compact('user', 'users', 'count', 'count_invoice', 'order', 'order_data', 'order_items'));
    }
    public function invoice()
    {
        $count = User::whereNotNull('otp')->count();


        $orders = Order::where('status', 'paid')->get();
        $count_invoice = Order::where('status', 'paid')->count();
        // dd($users);
        return view('admin.inbox.invoice', compact('orders', 'count', 'count_invoice'));
    }
}
