<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->foreignId('biller_id')->nullable()->constrained('billers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('purchaser_id')->nullable()->constrained('purchaser')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('customer_id')->nullable()->constrained('customers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('warehouse_id')->constrained('warehouses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('tax_id')->nullable()->constrained('taxes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('gallary_id')->nullable()->constrained('gallary')->onUpdate('cascade')->onDelete('cascade');
            $table->float('discount_amount')->default('0');
            $table->enum('status', ['Pending', 'Sent'])->default('Pending');
            $table->enum('type', ['sale', 'purchase'])->default('sale');
            $table->float('shipping_cost')->default('0');
            $table->float('tax_amount')->default('0');
            $table->float('grand_total')->default('0');
            $table->longText('note')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('quotations');
    }
}
