<?php

namespace App\Http\Controllers\Admin;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::all();
        return view('admin.coupon.index', compact('coupons') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.coupon.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request )
    {
        $formField = $request->validate([
            "code" => 'required',
            "discount" => 'required|integer',
            "expires_at" => 'required|date',
        ]);
        // Tạo coupon
        $coupon = new Coupon();
        $coupon->code = $formField['code'];
        $coupon->discount = $formField['discount'];
        $coupon->is_active = $request->has('is_active');
        $coupon->expires_at = Carbon::createFromFormat('m/d/Y', $formField['expires_at']);
        $coupon->save();

        // Tiếp tục xử lý sau khi tạo coupon

        return redirect()->back()->with('success', 'Coupon đã được tạo thành công.');

    }

    public function edit($id)
    {
        $coupon = Coupon::find($id);
        return view('admin/coupon/edit', compact('coupon' ));
    }
    /**
     * Display the specified resource.
     */
    public function update(Request $request, $id)
    {
        $formField = $request->validate([
            "code" => 'required',
            "discount" => 'required|integer',
            "expires_at" => 'required|date',
        ]);

        $coupon = Coupon::findOrFail($id);
        $coupon->code = $formField['code'];
        $coupon->discount = $formField['discount'];
        $coupon->is_active = $request->has('is_active');
        $coupon->expires_at = Carbon::createFromFormat('m/d/Y', $formField['expires_at']);
        $coupon->save();

        // Tiếp tục xử lý sau khi cập nhật coupon

        return redirect()->back()->with('success', 'Coupon đã được cập nhật thành công.');
    }
    public function destroy($id)
    {
        $coupon = Coupon::find($id);
        $coupon->delete();
        return redirect('admin/coupon');
    }
    public function checkDiscount(Request $request)
    {

        $promotionCode = $request->input('promotion');

        // Kiểm tra coupon dựa trên mã coupon, is_active và expires_at
        $coupon = Coupon::where('code', $promotionCode)
                        ->where('is_active', 1)
                        ->where('expires_at', '>=', Carbon::now())
                        ->first();

        if ($coupon) {
            // Mã coupon hợp lệ được tìm thấy
            $discount = $coupon->discount;
            // Tiếp tục xử lý sau khi lấy discount
            Session::put('discount',   $discount );
            return redirect()->back()->with('success', $discount);
        } else {
            // Mã coupon không hợp lệ hoặc đã hết hạn
            Session::put('discount', 0);
            return redirect()->back()->with('error', 'Invalid or expired coupon code.');
        }
    }
}
