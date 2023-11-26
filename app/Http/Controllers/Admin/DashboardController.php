<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Order;
use App\Models\User;

class DashboardController extends Controller
{
    public static function index()
    {

        $totalAmount = DB::table('orders')->sum('total_amount');
        $averageAmount = DB::table('orders')->avg('total_amount');
        $totalAmount = number_format($totalAmount, 2, '.', '');
        $averageAmount = number_format($averageAmount, 2, '.', '');
        $orderCount = Order::count();
        $userCount = User::count();
        // dd($orderCount);
        // dd($averageAmount);
        // dd($totalAmount);
        return view('admin.dashboard.index', compact('totalAmount', 'averageAmount', 'orderCount', 'userCount'));
    }

}
