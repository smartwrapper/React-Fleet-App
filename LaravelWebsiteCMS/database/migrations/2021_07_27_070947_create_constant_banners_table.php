<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConstantBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constant_banners', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('url');
            $table->string('banner_number');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->unsignedBigInteger('language_id')->nullable();
            $table->unsignedBigInteger('gallary_id')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
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
        Schema::dropIfExists('constant_banners');
    }
}
