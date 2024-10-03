<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Basic extends Model
{

    protected $table = 'basic';

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'street',
        'city',
        'postal_code',
        'latitude',
        'longitude',
        'payment',
        'image',
        'view',
        'is_status'
    ];

      // Cast latitude and longitude to float
      protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
    ];

}
