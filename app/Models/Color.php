<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Color extends Model
{
    use HasFactory;
    protected $table = 'colors';
    protected $fillable = [
        "name"  ,
        "status",
        "code",


  ];
  public function products()
    {
        return $this->belongsToMany(Product::class, 'product_colors');
    }
}
