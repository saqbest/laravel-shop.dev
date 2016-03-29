<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('paymentId');
            $table->string('cart');
            $table->string('payer_email');
            $table->string('payer_first_name');
            $table->string('payer_last_name');
            $table->integer('payer_id');
            $table->string('shipping_recipient_name');
            $table->string('shipping_city');
            $table->string('country_code');
            $table->integer('amount_total');
            $table->string('invoice_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transactions');

    }
}
