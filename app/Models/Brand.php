<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'brands';
    protected $fillable = [
        'name',
        'slug',
        'status',
    ];
    public function products( )
{
    return $this->hasMany(Product::class, 'brand_id', 'id');
}
public function countProducts($brands, $sub_category_id) {
       foreach ($brands as $brand) {
        $totalSubCategoryProducts = 0;
        //count
        $productCount = $brand->products->where('sub_category_id', '=', $sub_category_id)->count();

        $brand->brandWithSubCateProductCount = $productCount;
    }
    return $brands;

}
 

}
