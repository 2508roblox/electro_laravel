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
}
