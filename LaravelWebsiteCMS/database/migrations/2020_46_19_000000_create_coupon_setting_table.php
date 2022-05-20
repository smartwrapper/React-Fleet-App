<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_setting', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->longText('description')->nullable();
            $table->enum('type', ['fixed', 'percentage'])->default('fixed');
            $table->float('amount');
            $table->date('expiry_date');
            $table->integer('usage_limit_per_user')->nullable();
            $table->integer('usage_limit_per_coupon')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->softDeletes();
            $table->timestamps();

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
        Schema::dropIfExists('coupon_setting');
    }
}
