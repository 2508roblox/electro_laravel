<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sku;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\InvoiceOrderMailable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
         $orders = Order::all();

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
            ->leftJoin('skus', 'order_items.sku_id', '=', 'skus.id')
            ->leftJoin('product_images', function ($join) {
                $join->on('products.id', '=', 'product_images.product_id')
                    ->whereRaw('product_images.id = (SELECT MIN(id) FROM product_images WHERE product_id = products.id)');
            })

            ->select(
                'order_items.id',
                'skus.sku_code',

                'order_items.quantity',
                'order_items.created_at',
                'order_items.updated_at',
                'product_images.image',
                'products.name AS product_name',
                'order_items.price AS product_price',

                 // Lấy ra trường name từ bảng colors
                  // Lấy ra trường code từ bảng colors
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
        'status' => 'Đã xác nhận',
       ]);
       return redirect()->back();
    }
    public function delivery(Request $request, $id)
    {
       Order::find($id)->update([
        'status' => 'Đang giao hàng',
       ]);
       return redirect()->back();
    }
    public function received(Request $request, $id)
    {
       Order::find($id)->update([
        'status' => 'Thành công',
       ]);
       return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function cancel()
    {
        $orderId = request()->id;

        // Cập nhật trạng thái đơn hàng thành 'Đã hủy'
        Order::find($orderId)->update([
            'status' => 'Đã hủy',
        ]);

        // Lấy danh sách order_items của đơn hàng
        $orderItems = OrderItem::where('order_id', $orderId)->get();

        // Cập nhật số lượng SKU
        foreach ($orderItems as $orderItem) {
            $skuId = $orderItem->sku_id;
            $quantity = $orderItem->quantity;

            // Tìm SKU và cập nhật số lượng
            $sku = Sku::find($skuId);
            $sku->quantity += $quantity;
            $sku->save();
        }

        return redirect()->back();
    }
    public function clientCancel(string $id )
    {
        Order::find($id)->update([
            'status' => 'Đã hủy',
           ]);


        // Lấy danh sách order_items của đơn hàng
        $orderItems = OrderItem::where('order_id', $id)->get();

        // Cập nhật số lượng SKU
        foreach ($orderItems as $orderItem) {
            $skuId = $orderItem->sku_id;
            $quantity = $orderItem->quantity;

            // Tìm SKU và cập nhật số lượng
            $sku = Sku::find($skuId);
            $sku->quantity += $quantity;
            $sku->save();
        }

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

              ->leftJoin('product_images', function ($join) {
                  $join->on('products.id', '=', 'product_images.product_id')
                      ->whereRaw('product_images.id = (SELECT MIN(id) FROM product_images WHERE product_id = products.id)');
              })

              ->select(
                  'order_items.id',

                  'order_items.quantity',
                  'order_items.created_at',
                  'order_items.updated_at',
                  'product_images.image',
                  'products.name AS product_name',
                  'order_items.price AS product_price',

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
            ->leftJoin('product_images', function ($join) {
                $join->on('products.id', '=', 'product_images.product_id')
                    ->whereRaw('product_images.id = (SELECT MIN(id) FROM product_images WHERE product_id = products.id)');
            })
            ->select(
                'order_items.id',

                'order_items.quantity',
                'order_items.created_at',
                'order_items.updated_at',
                'product_images.image',
                'products.name AS product_name',
                'order_items.price AS product_price',
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
            ->leftJoin('product_images', function ($join) {
                $join->on('products.id', '=', 'product_images.product_id')
                    ->whereRaw('product_images.id = (SELECT MIN(id) FROM product_images WHERE product_id = products.id)');
            })
            ->select(
                'order_items.id',

                'order_items.quantity',
                'order_items.created_at',
                'order_items.updated_at',
                'product_images.image',
                'products.name AS product_name',
                'order_items.price AS product_price',
            )
            ->get();
            $order_data = $order ;
            $order = $orderData[0];


            Mail::to($order_data->email)->send(new InvoiceOrderMailable($order, $order_data, $order_items));
            return redirect()->back();

    }
}
