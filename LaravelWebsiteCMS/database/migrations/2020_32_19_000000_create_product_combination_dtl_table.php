<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCombinationDtlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_combination_dtl', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_combination_id')->nullable();
            $table->unsignedBigInteger('variation_id')->nullable(); // variation_id
            $table->unsignedBigInteger('product_id')->nullable();

            $table->foreign('variation_id')->references('id')->on('variations');
            $table->foreign('product_combination_id')->references('id')->on('product_combination');
            $table->foreign('product_id')->references('id')->on('products');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_combination_dtl');
    }
}
