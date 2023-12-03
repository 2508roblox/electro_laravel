<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public static function index()
    {


        // Get the current month and year
        $currentMonth = Carbon::now()->format('m');
        $currentYear = Carbon::now()->format('Y');



        // Query to retrieve the count of successful orders

        // Format the total revenue amount
        $totalAmountPerMonth = [];
        // Format the average revenue per month
        for ($month = 1; $month <= 12; $month++) {
            // Lấy năm hiện tại và tháng hiện tại
            $year = Carbon::now()->format('Y');

            // Truy vấn cơ sở dữ liệu để lấy tổng số đơn hàng thành công trong tháng hiện tại
            $orderCount = Order::where('status', 'Thành Công')
                ->whereMonth('created_at', $month)
                ->whereYear('created_at', $year)
                ->sum('total_amount');

            // Thêm tổng số đơn hàng vào mảng
            $totalAmountPerMonth[] = $orderCount;
        }
        $orderCount = Order::where('status', 'Thành Công')->count();

        // Format the average revenue per month
        $totalAmount = number_format(array_sum($totalAmountPerMonth), 1, '.', '' );
        // Format the average revenue per month
        $averageAmount = number_format((array_sum($totalAmountPerMonth) / $orderCount), 1, '.', '');
        // Get the total user count
        $userCount = User::count();

        // get recent orders
        $orders = Order::orderByDesc('id')->take(8)->get();



        // Tạo mảng để lưu thông tin các order
        $orderData = [];

        foreach ($orders as $order) {
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
                'Name' => $order->firstname .' ' . $order->lastname,
            ];
        }
        return view('admin.dashboard.index', compact('totalAmount', 'totalAmountPerMonth','averageAmount', 'orderCount', 'userCount', 'orderData'));
    }

}
