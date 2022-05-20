<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description')->nullable();
            $table->enum('position', ['position-right', 'position-left', 'position-center']);
            $table->enum('textcontent', ['textcontent-right', 'textcontent-left', 'textcontent-center']);
            $table->enum('text', ['text-white', 'text-black']);
            $table->unsignedBigInteger('language_id');
            $table->unsignedBigInteger('slider_type_id');
            $table->unsignedBigInteger('slider_navigation_id');
            $table->unsignedBigInteger('gallary_id');
            $table->unsignedBigInteger('ref_id')->nullable();
            $table->string('url')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('language_id')->references('id')->on('languages');
            $table->foreign('slider_type_id')->references('id')->on('slider_types');
            $table->foreign('slider_navigation_id')->references('id')->on('slider_navigation');
            $table->foreign('gallary_id')->references('id')->on('gallary');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sliders');
    }
}
