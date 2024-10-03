<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';

    protected $fillable = [
        'order_reference',
        'user_id',
        'farmer_id',
        'driver_id',
        'total',
        'delivery_option',
        'driver_payment',
        'order_placed',
        'order_confirmed',
        'driver_picked_up',
        'delivered',
        'payment_option',
        'paypal_id',
        'paypal_intent',
        'paypal_status',
        'farmer_payment_status',
        'driver_payment_status'
    ];

    public function userName()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
