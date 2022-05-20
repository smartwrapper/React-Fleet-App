<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrencyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currency', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('symbol_position', ['left', 'right'])->default('left');
            $table->integer('decimal_point')->default(2);
            $table->string('thousand_point')->nullable();
            $table->string('decimal_place')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->integer('country_id')->nullable();
            $table->string('code')->nullable();
            $table->float('exchange_rate')->default(0)->nullable();
            $table->tinyInteger('is_default')->default(0)->comment('if 1 then currency is set to as default!');
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
        Schema::dropIfExists('currency');
    }
}
