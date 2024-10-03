<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DriverBasic extends Model
{

    protected $table = 'driver_basic';

    protected $fillable = [
        'admin_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'street',
        'city',
        'postal_code',
        'latitude',
        'longitude',
        'license',
        'vehicle_type',
        'model',
        'registration_number',
        'bank_name',
        'bank_account_number',
        'image',
        'view',
        'is_status'
    ];

}