<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FarmersBasic extends Model
{

    protected $table = 'farmers_basic';

    protected $fillable = [
        'admin_id',
        'farm_name',
        'first_name',
        'last_name',
        'email',
        'phone',
        'street',
        'city',
        'postal_code',
        'latitude',
        'longitude',
        'logo',
        'category_id',
        'bank_name',
        'bank_account_number',
        'document',
        'view',
        'is_status'
    ];

      // Cast latitude and longitude to float
      protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
    ];

}
