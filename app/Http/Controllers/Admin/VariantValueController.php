<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VariantValue;
use Illuminate\Http\Request;

class VariantValueController extends Controller
{
    public function store(Request $request, VariantValue $variantValue)
    {
        // $formField = $request->validate([
        //     "variant_id" => 'required|exists:variants,id',
        //     "sku_id" => 'nullable|string|max:255',
        //     "parent_variant_id" => 'nullable|exists:variants,id',
        // ]);
        // $variantValue->create($formField);
        return true;
    }
    public function create(Request  $request) {
        $variantId = $request->input('id');
        $name = $request->input('name');
        $productId = $request->input('product_id');

        $variantValue = new VariantValue();
        $variantValue->variant_id = $variantId;
        $variantValue->value = $name;
        $variantValue->product_id = $productId;
        $variantValue->save();
        $variantValues = VariantValue::where('product_id', $productId)
        ->orderBy('variant_id')
        ->get();

        $mergedArray = [];
        foreach ($variantValues as $value) {
            $variantId = $value->variant_id;
            if (!isset($mergedArray[$variantId])) {
                $mergedArray[$variantId] = [];
            }
            $mergedArray[$variantId][] = $value;
        }
        $wrappedArray = [];
        foreach ($mergedArray as $variantId => $objects) {
            $wrappedArray[] = $objects;
        }
        // handle after group
        $firstArray = $wrappedArray[0]; // Lấy mảng con đầu tiên
        $wrappedArrayNew = []; // Mảng để chứa các đối tượng mới

        $wrappedArrayNew = []; // Initialize the new array

        foreach ($firstArray as $object) {
            $tempArr = [];
            $tempArr[] = $object;

            if (isset($wrappedArray[1])) {
                foreach ($wrappedArray[1] as $lv2) {
                    $tempArr[] = $lv2;

                    if (isset($wrappedArray[2])) {
                        foreach ($wrappedArray[2] as $lv3) {
                            $tempArr[] = $lv3;

                            if (isset($wrappedArray[3])) {
                                foreach ($wrappedArray[3] as $lv4) {
                                    $tempArr[] = $lv4;
                                    $wrappedArrayNew[] = $tempArr; // Move this line inside the innermost loop
                                    array_pop($tempArr); // Remove the last element for the next iteration
                                }
                            } else {
                                $wrappedArrayNew[] = $tempArr;
                                array_pop($tempArr); // Remove the last element for the next iteration
                            }
                        }
                        array_pop($tempArr); // Remove the last element for the next iteration
                    } else {
                        $wrappedArrayNew[] = $tempArr;
                        array_pop($tempArr); // Remove the last element for the next iteration
                    }
                }
                array_pop($tempArr); // Remove the last element for the next iteration
            } else {
                $wrappedArrayNew[] = $tempArr;
            }
        }

    return response()->json($wrappedArrayNew, 200);
    }
}
