<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexToPurchaseDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchase_detail', function (Blueprint $table) {
            $table->index('product_id');
            $table->index('product_combination_id');
            $table->index('purchase_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchase_detail', function (Blueprint $table) {
            $table->dropIndex('purchase_detail_product_id_index');
            $table->dropIndex('purchase_detail_product_combination_id_index');
            $table->dropIndex('purchase_detail_purchase_id_index');

        });
    }
}
