<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverRequest extends Model
{
    protected $table = 'driver_request';

    protected $fillable = [
        'driver_reference',
        'order_id',
        'driver_id',
        'is_status'
    ];
}
