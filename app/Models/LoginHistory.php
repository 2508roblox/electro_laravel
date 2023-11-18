<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginHistory extends Model
{
    use HasFactory;
    
    protected $table = 'login_histories';
    protected $fillable = [
        'user_id',
        'login_time',
        'ip_address',
        'status',
        'created_at',
  ];
}
