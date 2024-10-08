<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    protected $fillable = ['title', 'icon', 'summary'];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

}
