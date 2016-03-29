<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class PurchasedProducts extends Model
{
    protected $fillable = ['transaction_id', 'product_name', 'quantity', 'description', 'tax'];
}
