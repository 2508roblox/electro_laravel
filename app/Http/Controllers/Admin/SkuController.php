<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sku;
use App\Models\SkuVariant;
use App\Models\VariantValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SkuController extends Controller
{

    public function store(Request $request, Sku $sku)
    {
        // Lặp qua từng phần tử trong mảng data
        foreach ($request->input('data') as $data) {
            // Kiểm tra nếu sku không tồn tại, bỏ qua phần tử này
            if (!isset($data['sku'])) {
                continue;
            }

            // Tạo các hàng mới trong bảng sku_variants
            foreach ($data['variant_value_id'] as $variantValueId) {
                SkuVariant::create([
                    'sku' => $data['sku'],
                    'variant_value_id' => $variantValueId,
                ]);
            }

            // Tạo một SKU mới
            $newSku = new Sku();
            $newSku->sku_code = $data['sku'];
            $newSku->product_id =$request->input('product_id') ;
            $newSku->original_price = $data['price'];
            $newSku->promotion_price = $data['promotion'];
            $newSku->quantity = $data['quantity'];
            $newSku->save();
        }

        return true;
    }
    public function index(Request $request,  Sku $sku)
    {

        $variantValueIds = $request->data;
        $skus = DB::table('sku_variants')
        ->select('sku')
        ->whereIn('variant_value_id', $variantValueIds)
        ->groupBy('sku')
        ->having(DB::raw('COUNT(DISTINCT variant_value_id)'), '=', count($variantValueIds))
        ->get();

        $skusCount  = DB::table('sku_variants')
        ->where('sku',$skus[0]->sku)
        ->get()
        ->count();

        $validSkus = [];

        foreach ($skus as $sku) {
            if ($skusCount ==  count($variantValueIds)) {
                # code...
                $validSkus[] = $sku->sku;
            }
        }
        if (  count($validSkus) == 0)  return false;
        $sku_data = DB::table('skus')
        ->select('*')
        ->where('sku_code',$validSkus[0])
        ->get();


        return $sku_data[0];
    }
    public function update(Request $request)
    {
        // Xác thực dữ liệu
        $validator = Validator::make($request->all(), [
            'sku_id' => 'required',
            'original_price' => 'required|numeric',
            'promotion_price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        // Kiểm tra xác thực
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Lấy dữ liệu từ request
        $skuId = $request->input('sku_id');
        $originalPrice = $request->input('original_price');
        $promotionPrice = $request->input('promotion_price');
        $quantity = $request->input('quantity');

        // Tìm SKU dựa trên ID
        $sku = Sku::findOrFail($skuId);

        // Cập nhật các trường dữ liệu của SKU
        $sku->original_price = $originalPrice;
        $sku->promotion_price = $promotionPrice;
        $sku->quantity = $quantity;

        // Lưu SKU đã cập nhật
        $sku->save();

        // Trả về phản hồi thành công
        return response()->json(['message' => 'Update successful'], 200);
    }
    public function delete(Request $request, string $id)
    {
        // Tìm SKU dựa trên ID
        $sku = Sku::find($id);

        // Kiểm tra xem SKU có tồn tại hay không
        if (!$sku) {
            return response()->json(['message' => 'SKU not found'], 404);
        }

        // Xóa các SKU variant có sku_code tương ứng
        SkuVariant::where('sku', $sku->sku_code)->delete();

        // Xóa SKU
        $sku->delete();

        // Trả về phản hồi thành công
        return response()->json(['message' => 'SKU and associated SKU variants deleted'], 200);
    }
}
