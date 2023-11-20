<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sku;
use App\Models\SkuVariant;
use App\Models\VariantValue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        // $formField = $request->validate([
        //     "variant_id" => 'required|exists:variants,id',
        //     "sku_id" => 'nullable|string|max:255',
        //     "parent_variant_id" => 'nullable|exists:variants,id',
        // ]);
        // $variantValue->create($formField);
        return true;
    }
}
