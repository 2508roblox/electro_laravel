<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    
    protected $fillable = [
    'title',
    'tag',
    'date_time',
    'short_description',
    'long_description',
    'image',
    'slug'
  ];
}
