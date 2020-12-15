<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('code_order');
            $table->unsignedBigInteger('id_user');
            $table->string('address_ship');
            $table->string('phone');
            $table->date('date_ship');
            $table->float('money_subtotal');
            $table->float('money_coupon');
            $table->float('money_fee');
            $table->float('money_pay');
            $table->longtext('note')->nullable();
            $table->integer('payment');
            $table->integer('status_payment');
            $table->integer('status_shipping');
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
