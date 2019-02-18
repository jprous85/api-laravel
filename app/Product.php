<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id', 'name', 'category','description', 'quantity', 'price'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
