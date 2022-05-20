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
            $table->enum('product_type', ['simple', 'variable', 'digital']);
            $table->string('product_slug')->unique();
            $table->string('sku')->nullable();
            $table->string('video_url')->nullable();
            $table->unsignedBigInteger('gallary_id');
            $table->float('price')->nullable();
            $table->float('discount_price')->nullable();
            $table->integer('product_unit')->nullable();
            $table->string('product_weight')->nullable();
            $table->string('digital_file')->nullable();
            $table->enum('product_status', ['active', 'inactive'])->default('active');
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->unsignedBigInteger('tax_id')->nullable();
            $table->integer('product_view')->nullable();
            $table->tinyInteger('is_featured')->default('0')->comment('0 for not featured & 1 for featured');
            $table->integer('product_min_order')->nullable();
            $table->integer('product_max_order')->nullable();
            $table->string('seo_meta_tag')->nullable();
            $table->longText('seo_desc')->nullable();
            $table->enum('is_points', ['1', '0'])->default('0');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->index(['product_type', 'product_status']);

            $table->foreign('gallary_id')->references('id')->on('gallary');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('tax_id')->references('id')->on('taxes');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('products');
    }
}
