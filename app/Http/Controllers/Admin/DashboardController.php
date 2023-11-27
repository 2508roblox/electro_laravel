<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public static function index()
    {


        // Get the current month and year
        $currentMonth = Carbon::now()->format('m');
        $currentYear = Carbon::now()->format('Y');

        // Query to retrieve the total revenue per month
        $revenuePerMonth = DB::table('orders')
            ->select(
                DB::raw('SUM(total_amount) as total_revenue'),
                DB::raw('MONTH(created_at) as month')
            )
            ->where('status', 'Thành Công')
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->get();

        // Query to retrieve the count of successful orders

        // Format the total revenue amount
        $orderCountPerMonth = [];
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
            $orderCountPerMonth[] = $orderCount;
        }
        $orderCount = Order::where('status', 'Thành Công')->count();

        // Format the total revenue amount
        $totalAmount = number_format($revenuePerMonth->sum('total_revenue'), 2, '.', '');

        // Format the average revenue per month
        $averageAmount = number_format($revenuePerMonth->avg('total_revenue'), 2, '.', '');

        // Get the total user count
        $userCount = User::count();

        return view('admin.dashboard.index', compact('totalAmount', 'orderCountPerMonth','averageAmount', 'orderCount', 'userCount'));
    }

}
