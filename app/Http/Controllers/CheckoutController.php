<?php

namespace App\Http\Controllers;

use App\Models\Sku;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Wallet;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\Transaction;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function index()
    {
        // Lấy user ID hiện tại từ Auth
        $userId = Auth::id();

        // Lấy danh sách các carts của user hiện tại
        $carts = Cart::where('user_id', $userId)
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->leftJoin('skus', 'carts.sku_id', '=', 'skus.id')
            // ->leftJoin('colors', 'product_colors.color_id', '=', 'colors.id') // Thêm join với bảng colors
            ->select(
                'carts.id',
                'carts.user_id',
                'carts.product_id',
                'carts.sku_id as sku_id',
                'carts.quantity',
                'carts.created_at',
                'carts.updated_at',
                'products.name AS product_name',
                'skus.original_price AS product_price',
                'skus.promotion_price AS product_promotion_price',

                'skus.sku_code AS sku_code', // Lấy ra trường name từ bảng colors
                // 'colors.code AS color_code' // Lấy ra trường code từ bảng colors
            )
            ->get();
        // Tạo một mảng để lưu thông tin checkout
        $checkoutData = [];

        // Lặp qua từng cart để lấy thông tin cần thiết
        foreach ($carts as $cart) {
            // Kiểm tra nếu promotion_price không null, lấy promotion_price, ngược lại lấy price
            $productPrice = $cart->product_promotion_price ?? $cart->product_price;

            // Tính giá ship
            $shippingCost = 0.01 * $productPrice * $cart->quantity;

            // Thêm thông tin vào mảng checkoutData
            $checkoutData[] = [
                'product_id' => $cart->product_id,
                'product_name' => $cart->product_name,
                'product_price' => $productPrice,
                'quantity' => $cart->quantity,
                'sku_id' => $cart->sku_id,
                'sku_code' => $cart->sku_code,
                'shipping_cost' => $shippingCost,
            ];
        }
        $totalRequiredAmount = 0;

        foreach ($carts as $item) {
            $quantity = $item->quantity;
            $productPrice =   $item->product_price;
            $shippingCost =  $item->shipping_cost;

            $subtotal = ($quantity * $productPrice) + $shippingCost;
            $totalRequiredAmount += $subtotal;
        }
        $wallet = Wallet::where('user_id', $userId)->first();

        $transactions = Transaction::where('wallet_id', $wallet->id)
            ->where('status', 'complete')
            ->get();

        $balance = $transactions->sum('amount');
        // dd($checkoutData);
        // Truyển dữ liệu checkoutData tới view 'frontend.pages.checkout'
        return view('frontend.pages.checkout', ['checkoutData' => $checkoutData, 'balance' => $balance, 'totalRequiredAmount' => $totalRequiredAmount]);
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

        // logic
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'country' => 'required|max:255',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'zipcode' => 'required|max:255',
            'company' => 'nullable|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:255',
            'payment_mode' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Tạo mới order
        $order = new Order;

        $order->firstname = $request->input('firstname');
        $order->lastname = $request->input('lastname');
        $order->country = $request->input('country');
        $order->address = $request->input('address');
        $order->city = $request->input('city');
        $order->zipcode = $request->input('zipcode');
        $order->company = $request->input('company');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->status = 'pending';
        $order->payment_mode = $request->input('payment_mode');
        $order->user_id = Auth::id();
        $order->save();


        // Lấy tất cả các cart items có user_id trong Auth
        $user = Auth::user();
        $carts = Cart::where('user_id', $user->id)->get();
        // them gui thong báo

        $totalAmount = 0;

        // Lặp qua từng cart để tạo order_items và tính tổng tiền đơn hàng
        foreach ($carts as $cart) {

            //descre number of product
            $descQty  = $cart->quantity;
            $descProductSkuId  = $cart->sku_id;
            $ProductSku = Sku::find($descProductSkuId);
            $ProductSku->quantity = $ProductSku->quantity - $descQty;
            $ProductSku->save();
            //end descre number of product

            $orderItem = new OrderItem;
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $cart->product_id;
            $orderItem->sku_id = $cart->sku_id;
            $orderItem->quantity = $cart->quantity;

            // Kiểm tra nếu bảng products có promotion_price cho sản phẩm trong cart
            $product = Sku::find($cart->sku_id);
            if ($product->promotion_price) {
                $orderItem->price = $product->promotion_price;
            } else {
                $orderItem->price = $product->original_price;
            }

            // Tính tổng tiền đơn hàng
            $totalAmount += ($orderItem->price * $orderItem->quantity);
            //
            $orderItem->save();
            $cart->delete();
        }

        // Tính phí vận chuyển (1% giá trị tổng đơn)


        // Cộng phí vận chuyển vào tổng tiền đơn hàng
        if (!Session::get('discount') || Session::get('discount') == 0) {
            $totalAmount = ($totalAmount + $request->shipping_price);
        } else {
            $totalAmount = ($totalAmount + $request->shipping_price) - ($totalAmount + $request->shipping_price) * (Session::get('discount') / 100);
        }

        // Lưu tổng tiền đơn hàng vào cột total_amount trong bảng orders
        $order->shipping_price = $request->shipping_price;
        $order->total_amount = $totalAmount;
        $order->update();
        Session::put('discount', 0);
        //bank payment
        if ($request->payment_mode == 'wallet') {
            $userId = Auth::id();
            $wallet = Wallet::where('user_id', $userId)->first();
            $transaction = new Transaction;
            $transaction->wallet_id = $wallet->id;
            $transaction->amount = - ($totalAmount);
            $transaction->type = 'withdraw';
            $transaction->status = 'complete';
            $transaction->method = 'shopping';
            $transaction->save();


            $order->status = 'paid';
            $order->update();
            $userId = Auth::id();

            $wallet = Wallet::where('user_id', $userId)->first();

            $transactions = Transaction::where('wallet_id', $wallet->id)
                ->where('status', 'complete')
                ->get();

            $totalAmount = $transactions->sum('amount');

            $wallet->balance = $totalAmount;
            $wallet->save();

            Session::put('wallet', $totalAmount);
        } else if ($request->payment_mode == 'bank') {

            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "http://127.0.0.1:8000/checkpayment";
            $vnp_TmnCode = "R3E63P5P"; //Mã website tại VNPAY
            $vnp_HashSecret = "GXDEHIEBSREFTEALNKYBXMKDKVVBEJPC"; //Chuỗi bí mật

            $vnp_TxnRef = $order->id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = 'Thanh Toán đơn hàng tại Electro';
            $vnp_OrderType = 'bank';
            $vnp_Amount = ($order->shipping_price + $order->total_amount == 0.0 ? 0 : $order->shipping_price + $order->total_amount) * 100 * 24305;
            $vnp_Locale = 'vn';
            $vnp_BankCode = 'NCB';
            $vnp_IpAddr = 'http://127.0.0.1:8000/checkpayment';
            //Add Params of 2.0.1 Version
            // $vnp_ExpireDate = $_POST['txtexpire'];
            // //Billing
            // $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
            // $vnp_Bill_Email = $_POST['txt_billing_email'];
            // $fullName = trim($_POST['txt_billing_fullname']);
            // if (isset($fullName) && trim($fullName) != '') {
            //     $name = explode(' ', $fullName);
            //     $vnp_Bill_FirstName = array_shift($name);
            //     $vnp_Bill_LastName = array_pop($name);
            // }
            // $vnp_Bill_Address=$_POST['txt_inv_addr1'];
            // $vnp_Bill_City=$_POST['txt_bill_city'];
            // $vnp_Bill_Country=$_POST['txt_bill_country'];
            // $vnp_Bill_State=$_POST['txt_bill_state'];
            // // Invoice
            // $vnp_Inv_Phone=$_POST['txt_inv_mobile'];
            // $vnp_Inv_Email=$_POST['txt_inv_email'];
            // $vnp_Inv_Customer=$_POST['txt_inv_customer'];
            // $vnp_Inv_Address=$_POST['txt_inv_addr1'];
            // $vnp_Inv_Company=$_POST['txt_inv_company'];
            // $vnp_Inv_Taxcode=$_POST['txt_inv_taxcode'];
            // $vnp_Inv_Type=$_POST['cbo_inv_type'];
            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,
                // "vnp_ExpireDate"=>$vnp_ExpireDate,
                // "vnp_Bill_Mobile"=>$vnp_Bill_Mobile,
                // "vnp_Bill_Email"=>$vnp_Bill_Email,
                // "vnp_Bill_FirstName"=>$vnp_Bill_FirstName,
                // "vnp_Bill_LastName"=>$vnp_Bill_LastName,
                // "vnp_Bill_Address"=>$vnp_Bill_Address,
                // "vnp_Bill_City"=>$vnp_Bill_City,
                // "vnp_Bill_Country"=>$vnp_Bill_Country,
                // "vnp_Inv_Phone"=>$vnp_Inv_Phone,
                // "vnp_Inv_Email"=>$vnp_Inv_Email,
                // "vnp_Inv_Customer"=>$vnp_Inv_Customer,
                // "vnp_Inv_Address"=>$vnp_Inv_Address,
                // "vnp_Inv_Company"=>$vnp_Inv_Company,
                // "vnp_Inv_Taxcode"=>$vnp_Inv_Taxcode,
                // "vnp_Inv_Type"=>$vnp_Inv_Type
            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                $inputData['vnp_Bill_State'] = $vnp_Bill_State;
            }

            //var_dump($inputData);
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array(
                'code' => '00', 'message' => 'success', 'data' => $vnp_Url
            );
            if (true) {
                // after payment is completed

                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
        }
        return redirect('/order');

        // Xóa các cart items sau khi đã tạo order_items

        // Thực hiện các thao tác khác, ví dụ: gửi email xác nhận đơn hàng, tính toán tổng giá trị đơn hàng, v.v.

        // Redirect hoặc trả về thông báo thành công
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
