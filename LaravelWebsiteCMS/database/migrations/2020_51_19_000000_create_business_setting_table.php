<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_setting', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gallary_id');
            $table->unsignedBigInteger('timezone_id');
            $table->string('business_name');
            $table->date('start_date');
            $table->float('default_profit_percentage');
            $table->enum('year_start_month', ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'])->default('January');
            $table->enum('accounting_method', ['FIFO', 'LIFO'])->default('FIFO');
            $table->integer('transaction_edit_days');
            $table->enum('date_format', ['mm/dd/yyyy', 'mm-dd-yyyy', 'dd-mm-yyyy', 'dd/mm/yyyy']);
            $table->enum('time_format', ['12 hr', '24 hr']);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('gallary_id')->references('id')->on('gallary');
            $table->foreign('timezone_id')->references('id')->on('timezones');
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
        Schema::dropIfExists('business_setting');
    }
}
