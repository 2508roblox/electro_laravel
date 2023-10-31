<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = 'sub_categories';
    protected $fillable = [
        'name',
        'slug',
        'image',
        'category_id',
        'status',
    ];
    public function products()
{
    return $this->hasMany(Product::class);
}
    public function countProducts()
{
    return $this->hasMany(Product::class)->count();
}
public function getCate () {
    return $this->belongsTo(Category::class, 'category_id');
  }
}
