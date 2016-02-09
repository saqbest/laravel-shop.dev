<?php

namespace App\models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ShoppingCard extends Model
{
    protected $table = 'shopping_card';

    protected $fillable = ['user_id', 'product_id', 'currency', 'quantity'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function product()
    {
        return $this->belongsTo('App\models\Products', 'product_id', 'id');
    }

    public function seller()
    {
        $user_id = Products::where('id', $this->product_id)->first()->user_id;
        return User::where('id', $user_id)->first()->name;
    }
}
