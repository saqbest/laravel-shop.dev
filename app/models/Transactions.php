<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    protected $fillable = ['paymentId', 'cart', 'payer_email', 'payer_first_name', 'payer_last_name', 'payer_id', 'shipping_recipient_name','shipping_city','country_code','amount_total','invoice_number'];

}
