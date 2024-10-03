<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    protected $table = 'user_order';

    protected $fillable = [
        'user_id',
        'shipping_payment',
        'delivery_option',
    ];
}
