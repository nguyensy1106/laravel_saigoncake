<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name_product');
            $table->string('url_image');
            $table->unsignedBigInteger('category_id');
            $table->string('slug');
            $table->float('price_sell');
            $table->float('price_discount');
            $table->longText('description');
            $table->integer('status');
            $table->integer('id_user');
            $table->foreign('category_id')->references('id')->on('category_product');
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
        Schema::dropIfExists('products');
    }
}
