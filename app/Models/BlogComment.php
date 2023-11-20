<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    use HasFactory;
    
    protected $table = 'blog_comments';
    
    protected $fillable = [
        'blog_id',  // Thêm trường blog_id vào đây
        'user_id',
        'user_role',
        'content',
        'status',
        'ip_address',
        'ip_spam',
        'report_count',
    ];
    
    public function user()
    {
      return $this->belongsTo(User::class, 'user_id');
    }
}
