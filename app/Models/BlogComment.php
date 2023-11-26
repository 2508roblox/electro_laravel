<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    use HasFactory;
    
    protected $table = 'blog_comments';
    
    protected $fillable = [
        'blog_id',
        'user_id',
        'content',
        'status',
        'is_accept',
        'is_deleted',
        'ip_address',
        'report_count',
        'created_at',
    ];
    
    public function user()
    {
      return $this->belongsTo(User::class, 'user_id');
    }
}
