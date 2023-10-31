<?php

namespace App\Http\Controllers\Admin;

use App\Mail\InvoiceOrderMailable;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // Lấy user id hiện tại
         $userId = Auth::id();

         // Lấy danh sách orders của user id hiện tại
         $orders = Order::where('user_id', $userId)->get();

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
       return view('admin.order.index', ['orderData' => $orderData]);
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

        // Lấy user id hiện tại


        // Lấy danh sách orders của user id hiện tại
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
                'Name' => ucwords($order->firstname . ' '. $order->lastname),



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

        return view('admin.order.show' , ['order' => $orderData[0], 'order_data' => $order, 'order_items' => $order_items]);

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
    public function update(Request $request, $id)
    {
       Order::find($id)->update([
        'status' => 'confirm',
       ]);
       return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function cancle( )
    {
        Order::find(request()->id)->update([
            'status' => 'cancle',
           ]);
           return redirect()->back();
    }
    public function destroy(string $id)
    {
        //
    }

    public function viewinvoice(  $id)
    {
          // Lấy danh sách orders của user id hiện tại
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
                  'Name' => ucwords($order->firstname . ' '. $order->lastname),



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

        return view('admin.invoice.template',  ['order' => $orderData[0], 'order_data' => $order, 'order_items' => $order_items]);
    }
    public function downloadinvoice(  $id)
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
                'Name' => ucwords($order->firstname . ' '. $order->lastname),



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



        $pdf = Pdf::loadView('admin.invoice.download',['order' => $orderData[0], 'order_data' => $order, 'order_items' => $order_items])->setOptions(['defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
    return $pdf->download('invoice ' . $id .'.pdf');
    }
    public function sendmail( $id)
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
                'Name' => ucwords($order->firstname . ' '. $order->lastname),



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
            $order_data = $order ;
            $order = $orderData[0];
           

            Mail::to($order_data->email)->send(new InvoiceOrderMailable($order, $order_data, $order_items));
            return redirect()->back();

    }
}
