<?php

namespace App\Models;

use App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wallet extends Model
{
    use HasFactory;
    protected $table = 'wallets';
    protected $fillable = [
        'wallet_id',
'amount',
'type',

  ];

}

