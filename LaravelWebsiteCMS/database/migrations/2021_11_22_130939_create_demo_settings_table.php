<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemoSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demo_settings', function (Blueprint $table) {
            $table->id();
            $table->string('color');
            $table->string('header_style');
            $table->string('footer_style');
            $table->string('slider_style');
            $table->string('banner_style');
            $table->string('cart_style');
            $table->string('product_page_style');
            $table->string('shop_style');
            $table->string('ip');
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
        Schema::dropIfExists('demo_settings');
    }
}
