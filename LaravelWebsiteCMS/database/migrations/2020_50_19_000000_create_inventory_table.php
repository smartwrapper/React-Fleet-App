<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->index('product_id');
            $table->unsignedBigInteger('product_combination_id')->nullable();
            $table->index('product_combination_id')->nullable();
            $table->unsignedBigInteger('warehouse_id');
            $table->index('warehouse_id');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->enum('stock_status', ['IN', 'OUT']);
            $table->index('stock_status');
            $table->integer('qty');
            $table->unsignedBigInteger('reference_id')->nullable()->comment('purchase id, sale id, order id & stock transfer');
            $table->enum('stock_type', ['StockAdjustment', 'Purchase', 'Sale', 'Order', 'StockTransfer', 'SaleReturn', 'PurchaseReturn','ManualSale']);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('warehouse_id')->references('id')->on('warehouses');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('product_combination_id')->references('id')->on('product_combination');

            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory');
    }
}
