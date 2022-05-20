<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->index('product_id');
            $table->unsignedBigInteger('product_combination_id')->nullable();
            $table->index('product_combination_id')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->integer('qty')->nullable();
            $table->boolean('is_order')->default('0');
            $table->string('session_id')->nullable();
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products');
            // $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('product_combination_id')->references('id')->on('product_combination');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_items');
    }
}
