<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $table = 'setting';

    protected $fillable = ['name', 'title', 'description', 'keywords', 'phone', 'email', 'address', 'about', 'favicon', 'logo',
        'facebook', 'twitter', 'instagram', 'youtube'];

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin', 'user_id');
    }

}
