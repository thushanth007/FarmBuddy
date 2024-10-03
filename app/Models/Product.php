<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'product';

    protected $fillable = [
        'admin_id',
        'category_id',
        'name',
        'section',
        'information',
        'description',
        'additional_info',
        'care_instructions',
        'unit',
        'price',
        'stock',
        'sold',
        'offer',
        'type',
        'sku',
        'image_1',
        'image_2',
        'image_3',
        'image_4',
        'view',
        'is_status'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function review()
    {
        return $this->hasMany(Review::class, 'product_id', 'id');
    }
}
