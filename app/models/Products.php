<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = ['name', 'price', 'quantity', 'description', 'image'];

}
