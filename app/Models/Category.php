<?php

namespace App\Models;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        "name"  ,
        "image",
        "slug",
        "title",
        "description",
        "status",
        "publish_date",
        "seo_description"

  ];
  public function products()
   {
    return $this->hasMany(Product::class, 'category_id', 'id');
  }
  public function sub_categories()
   {
    return $this->hasMany(SubCategory::class, 'category_id', 'id');
  }
 
}
