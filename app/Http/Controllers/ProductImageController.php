<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    public function destroy($id) {
        $image = ProductImage::find($id);
        $image->delete();
        return redirect()->back()->with('message', 'Image deleted successfully!');
    }
}
